`timescale 1ns / 1ps

module process (
        input                clk,		    	// clock 
        input  [23:0]        in_pix,	        // valoarea pixelului de pe pozitia [in_row, in_col] din imaginea de intrare (R 23:16; G 15:8; B 7:0)
        input  [8*512-1:0]   hiding_string,     // sirul care trebuie codat
        output   reg [6-1:0]       row, col, 	        // selecteaza un rand si o coloana din imagine
        output   reg            out_we, 		    // activeaza scrierea pentru imaginea de iesire (write enable)
        output  reg[23:0]        out_pix,	        // valoarea pixelului care va fi scrisa in imaginea de iesire pe pozitia [out_row, out_col] (R 23:16; G 15:8; B 7:0)
        output reg           gray_done,		    // semnaleaza terminarea actiunii de transformare in grayscale (activ pe 1)
        output  reg             compress_done,		// semnaleaza terminarea actiunii de compresie (activ pe 1)
        output   reg            encode_done 	  // semnaleaza terminarea actiunii de codare (activ pe 1)
	 );
`define read 0
`define greyscale 1
`define exe 2
`define done 3
`define exee 4
`define init 5
`define cmpread 6
`define matrix_init 7
`define varr 8
`define var 9
`define bitmap_matrix 10
`define bitmap_var 11
`define calc_var 12
`define calc_matrix 13
`define cmp_var 14
`define cmp_inc 15
`define cmp_contor 16
`define cmp_out 17
`define cmp_next 18
`define cmp_done 19
`define cmp_outer 20
`define hs_read 21
`define convert 22
`define waiting 23
`define base3_done 24
`define encode_varr 27
`define encode_init 28
`define encode_inpix 29
`define encode_matrix 30
`define transform_equal 31
`define transform 32
`define encode_exe 33
`define encode_exee 34
`define encode_contor 35
`define encode_outer 36
`define encode_out 37
`define encode_next 38
`define enc_done 39
`define encode_var 40
	 reg  [5:0] state=0,next_state=0;
    //TODO - instantiate base2_to_base3 here
	 wire [31:0] base3;
	 wire d;
	 reg [15:0] base2;
	 reg[31:0] base3_nr;
	 reg en=0;
	 base2_to_base3 b(base3,d,base2,en,clk);
	 reg [8:0] max;
	 reg [8:0] min;
	 reg [23:0] AVG;
	 reg [23:0] scad;
	 reg [23:0] sum_var;
	 reg [23:0] var;
	 reg [23:0] beta;
	 reg [23:0] Lm,Hm;
	 reg [8:0] grey_rgb;
	 reg [23:0] arr [3:0][3:0];
  	 reg [23:0] bit_map [3:0][3:0];
	 reg [23:0] c;
	 integer i,j;
	 integer ii,jj;
	 integer p,k,r;
	 reg[23:0] in_pix_r;
	 reg[23:0] suma;
	 wire[23:0] out_pix_r;
	 gray g(in_pix_r,out_pix_r); // declararea modulului pe care l am folosit pentru a face grayscale
	 reg [6:0] curr_row ,curr_col;
	 reg [6:0] enc_row ,enc_col;
	 reg [6:0] cmp_row,cmp_col;
    //TODO - build your FSM here
	 
	 always@(posedge clk) begin
		state<=next_state;
	 end	 

		always @(*)begin
			gray_done=0;
			en=0;				// initializare variabile in/out
			out_we=0;
			case(state) 
		
				`read: begin 
					curr_col=0;
					curr_row=0;	
					out_pix=0;
					next_state=`init;
				end	 
		
				`init:begin
					col=curr_col;
					row=curr_row;
					in_pix_r=in_pix;			//citirea pixelului si scrierea noilor valori in
					out_we=0;					// pentru row si col, pentru a citi toti pixelii
					next_state=`greyscale;
				end
				
				`greyscale: begin
					out_we=1;
					out_pix=out_pix_r;		//scrierea pixelilor inapoi in poza, si incrementare coloana
					curr_col=curr_col+1;
					next_state=`exe;
				end

				`exe: begin
					if(curr_col>63)	begin	
						curr_row=curr_row+1;		//incrementez coloana si verific daca trece de 63, pentru fiecare 
						curr_col=0;					//rand si ma intorc pentru a citi noul pixel
					end 
					if(curr_row>=64)begin
						next_state=`done;
					end else 
						next_state=`init;
				end

				`done: begin
					gray_done=1;
					out_we=0;					
					next_state=`cmpread;
				end
				
			`cmpread: begin
				compress_done=0;
				i=0;
				j=0;
				cmp_row=0;			
				cmp_col=0;	
				suma=0;
				next_state=`varr;
			end
		
			`varr: begin
				sum_var=0;
				out_we=0;
				scad=0;
				suma=0;				//initializare variabile pentru compres
				AVG=0;
				i=0;
				j=0;
				next_state=`matrix_init;
			end
			
			`matrix_init:begin
				col=cmp_col+i;
				row=cmp_row+j;			//incrementare row si col pentru fiecare bloc de 4x4
				next_state=25;			
			end	
			25:begin
				arr[i][j]=in_pix;
				next_state=`var;		//scrierea pixelului in matrice
			end	
			
			`var: begin
				suma=suma+arr[i][j][15:8];
				i=i+1;
				if(i>3)begin
					i=0;
					j=j+1;
				end
				if(j>=4) begin				// calculez suma si incrementez i,j pentru a merge in tot blocul de 4x4
					ii=0;
					jj=0;
					AVG=suma/16;		//calcul medie
					beta=0;				
					sum_var=0;
					next_state=`bitmap_matrix;
				end else 
				next_state=`matrix_init;
			end
			
			`bitmap_matrix: begin
				if(arr[ii][jj][15:8]<AVG)begin
					bit_map[ii][jj]=0;
					scad=AVG-arr[ii][jj][15:8];				//crearea bitmapului in functie de valoarea AVG
				end													// si calcularea modulului
				else begin bit_map[ii][jj]=1;
					scad=arr[ii][jj][15:8]-AVG;
					beta=beta+1;
				end	
				sum_var=sum_var+scad;						
				next_state=`bitmap_var;
			end
		
			`bitmap_var:begin
				ii=ii+1;
				if(ii>3)begin
					ii=0;
					jj=jj+1;					// loop pentru incrementare a i,j pentru crearea bitmapului
				end
				if(jj>=4) begin
					next_state=`calc_var;
				end else 
					next_state=`bitmap_matrix;
			end

			`calc_var:begin
				var=sum_var/16;
				Lm=AVG-(4*4*var)/(2*(16-beta));
				Hm=AVG+(4*4*var)/(2*beta);						//calcul LM,HM
				ii=0;
				jj=0;
				next_state=`calc_matrix;
			end
			
			`calc_matrix:begin
				if(bit_map[ii][jj]==1)
					bit_map[ii][jj]=Hm;
				else bit_map[ii][jj]=Lm;					// stare pentru scrierea pixelior in functie de lm si hm 1 respectiv 0
					next_state=`cmp_var;
			end
			
			`cmp_var:begin
				ii=ii+1;
				if(ii>3)begin
					ii=0;
					jj=jj+1;
				end
				if(jj>=4) begin						// incrementare pentru scirerea pixelilor in functie de hm si lm
					i=0;
					j=0;
					p=0;
					k=0;
					next_state=`cmp_contor;
				end else 
					next_state=`calc_matrix;
			end
			
			`cmp_contor:begin
				col=cmp_col+p;
				row=cmp_row+k;							// resetarea row si col pentru out pixel a cate 4x4 bocuri
				next_state=`cmp_outer;
			end

			`cmp_outer:begin
				next_state=`cmp_out;					// stare pentru resetare a clock ului
			end
		
			`cmp_out:begin
				out_we=1;
				out_pix[15:8]=bit_map[p][k][7:0];
				p=p+1;
				if(p>3)begin
					p=0;									//scriere out pixel si incrementare
					k=k+1;
				end
				if(k>=4) begin
					next_state=26;
				end else 
				next_state=`cmp_contor;	
			end
		
			26:begin 
				next_state=`cmp_next;    			// stare pentru resetare a clockului
			end			
		
			`cmp_next:begin
				cmp_col=cmp_col+4;
				if(cmp_col>63)begin
					cmp_col=0;							//incrementare row si col din 4 in 4 pentru a lua fiecare bloc de 4x4
					cmp_row=cmp_row+4;				// sipentru a calcula din nou , pentru fiecare bloc
				end
				if(cmp_row>=64)
					next_state=`cmp_done;
				else next_state=`varr;
				end

			`cmp_done: begin
				compress_done=1;
				out_we=0;								//stare de final a compresului
				next_state=`hs_read;
			end

			`hs_read: begin
				curr_col=0;
				curr_row=0;
				c=0;
				i=0;
				j=0;
				enc_row=0;
				enc_col=0;
				next_state=`convert;
			end
			
			`convert: begin
				en=1;
				base2=hiding_string[c+:16];			//egalare base2 , cu hiding string pentru a putea fi
				next_state=`waiting;						// instantiat in modulul base2tobase3
			end
			
			`waiting: begin
				if(d==1) begin
					base3_nr=base3;
					next_state=`base3_done;				// stare ce asteapta ca numarul sa fie gata , si creaza o clona pentru
				end											// urmatoarele calcule
				else next_state=`waiting;
			end
		
			`base3_done: begin
				encode_done=0;
				next_state=`encode_var;
			end
	
			`encode_var: begin
				out_we=0;
				i=0;							
				j=0;
				next_state=`encode_init;
			end
		
			`encode_init:begin
				col=enc_col+i;
				row=enc_row+j;								//egalare row si col pentru fiecare bloc de 4x4
				next_state=`encode_inpix;
			end	
			
			`encode_inpix:begin
				arr[i][j]=in_pix;							// citire in pix si scriere in matrice 
				next_state=`encode_varr;
			end		
			
			`encode_varr: begin	
				i=i+1;
				if(i>3)begin
			     i=0;
			     j=j+1;										// incrementare row si col pentru a putea lua blocuri de 4x4
				end
				if(j>=4) begin
					next_state=41;
				end else 
				next_state=`encode_init;
			end
		
			41:begin
				r=0;
				for(i=0;i<3;i=i+1)
					for(j=0;j<3;j=j+1)
						if(arr[0][0]==arr[i][j])				// stare pentru numararea a cati pixeli sunt egali cu primul, daca numarul
								r=r+1;								// daca numarul acestora e egal cu 16, primi 2 pixeli vor fi omisi 
					if(r>15)begin									// pentru lsb si msb
							ii=1;
							jj=0;
							i=0;
						next_state=`encode_exee;
				end else begin
					ii=1;
					jj=0;
					i=0;
					next_state=`encode_matrix;	
				end
			end

			`encode_matrix:begin
				if(arr[0][0]==arr[ii][jj])
					next_state=`transform_equal;			// daca primul numar este egal cu al doilea il prelucrez . si verific din nou
				else begin										// iar daca nu este , trec pentru el , adica peste lsb si msb
					next_state=`encode_exe;	
				end
			end
			
			`transform_equal: begin
				if(base3_nr[i+:2]==2'b10)
				arr[ii][jj][15:8]=arr[ii][jj][15:8]-1;
				else if(base3_nr[i+:2]==2'b01)						// verific daca ultimele 2 cifre din numar sunt egale cu 1/2 pentru
					arr[ii][jj][15:8]=arr[ii][jj][15:8]+1;			// pentru a aduna sau scadea cu 1 
					i=i+2;
				next_state=`encode_exee;
				end
				
			`encode_exee:begin
				ii=ii+1;
				if(ii>3)begin
			     ii=0;
			     jj=jj+1;								// incrementare pentru a face tot blocul de 4x4
				end
				if(jj>=4) begin
					next_state=`encode_contor;
				end else 
				next_state=`encode_matrix;		
			end
		
			`transform:begin
				if(base3_nr[i+:2]==2'b10)
					arr[ii][jj][15:8]=arr[ii][jj][15:8]-1;
				else if(base3_nr[i+:2]==2'b01)
					arr[ii][jj][15:8]=arr[ii][jj][15:8]+1;
				i=i+2;
				next_state=`encode_exe;
			end
		
			`encode_exe:begin
				ii=ii+1;
				if(ii>3)begin
			     		ii=0;
			     		jj=jj+1;
				end
				if(jj>=4) begin
					p=0;
					k=0;
					next_state=`encode_contor;
				end else 
				next_state=`transform;
			end
		
			`encode_contor:begin
				col=enc_col+p;
				row=enc_row+k;							//egalez row,col cu cei 2 contori pentru a putea lua toate valorile 
				next_state=`encode_outer;			
			end

			`encode_outer:begin
				next_state=`encode_out;				//stare pentru resetare a clock ului
			end
		
			`encode_out:begin
				out_we=1;
				out_pix=arr[p][k];
				p=p+1;
				if(p>3)begin							// scrierea fiecarei pozitii a matricii in out 
					p=0;
					k=k+1;
				end
				if(k>=4) begin
					next_state=46;
				end else 
				next_state=`encode_contor;
			end
			
			46:begin 
				next_state=`encode_next;
			end			
		
			`encode_next:begin
				c=c+16;
				enc_col=enc_col+4;
				if(enc_col>63)begin							// cresc coloana si randul cu 4 pentru a putea fi 
					enc_col=0;									// calculate toate blocurile de 4x4
					enc_row=enc_row+4;
				end
				if(enc_row>=64)
					next_state=`enc_done;
				else next_state=`convert;
			end


			`enc_done: begin
				encode_done=1;
				out_we=0;
			end

	 endcase
end
 
 	
	   
endmodule