`timescale 1ns / 1ps

module gray (		    	
        input  [23:0]        in_pix,	        // valoarea pixelului de pe pozitia [in_row, in_col] din imaginea de intrare (R 23:16; G 15:8; B 7:0)
        output reg [23:0]        out_pix       // valoarea pixelului care va fi scrisa in imaginea de iesire pe pozitia [out_row, out_col] (R 23:16; G 15:8; B 7:0)

	 );
	reg[7:0] max;
	reg[7:0] min;
	reg[8:0] suma;
	reg[23:0] grey;
	
	always@(*)begin
		max=in_pix[7:0];
		if(max<in_pix[15:8])
			max=in_pix[15:8];
		if(max<in_pix[23:16])
			max=in_pix[23:16];	// calculez min/max al numarului pentru a creea imaginea cenusie
		min=in_pix[7:0];
		if(min>in_pix[15:8])
			min=in_pix[15:8];
		if(min>in_pix[23:16])
			min=in_pix[23:16];
		suma = max+min;
		grey=suma/2;
		out_pix=grey<<8;
	end    
endmodule
