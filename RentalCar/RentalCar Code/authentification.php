<?php
$host = "localhost";  
    $user = "root";  
    $password = 'automatica1.';  
    $db_name = "RentalCar";  
      
    $con = mysqli_connect($host, $user, $password, $db_name);  
    if(mysqli_connect_errno()) {  
        die("Failed to connect with MySQL: ". mysqli_connect_error());  
    }  
    

    $sql="select * from Locatie";
    $result = mysqli_query($con, $sql);
?>



<style type="text/css">

body    { background-color: aquamarine;
    background-repeat: no-repeat;
         background-image: url("pr4.jpg"); 
    background-size: 100%;
    margin: 0;
    
    }
    .topnav a:hover {
  background-color: #ddd;
  color: black;
        transition:1s;
}
    .topnav a.active {
  background-color: #04AA6D;
  color: white;
}
    
    a{
        text-align: center;
        font-weight: 200;
        margin 5px;
        
        
    }
    .topnav {
  background-color: #333;
  overflow: hidden;
}
    .topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}
    h1{
        
         font-size: 36px;
    font-weight: 600;
        margin-left:10%;
        color:black;
    }
    
    p{
        margin-left:10%;
         font-size: 20px;
    font-weight: 200;
        
        margin-right:25%;
        color:black;
    }
    label{
        margin-left:10%;
         font-size: 20px;
    font-weight: 200;
        
      
        color:black;
    }
    input{
        
         font-size: 15px;
    font-weight: 200;
        
        
        color:black;
    }
    p1{
        font-size: 36px;
        font-weight:600;
        color:black;
        
    }
    p2{
        font-size: 36px;
        font-weight:600;
        color:black;
        
    }
    table{
        margin-left:10%;
         font-size: 20px;
    font-weight: 200;
        
        margin-right:25%;
        color:black;
        text-align: center;
        border-collapse: collapse;
        width:30%;
    }
    
    button{
        
       background-color: #4CAF50;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
    }

 
   
</style>











<!DOCTYPE html>
<html>
<body>
   <div class="topnav">
  <a class="active" href="authentification.php">Acasa</a>
  <a href="masini.php">Masini </a>
  <a href="Locatie.php">Locatii</a>
  <a href="categori.php">Categori</a>
    <a href="factura.php">Factura</a>
    </div>
        <h1>Inchiriaza masina simplu si usor</h1>
    <p>
        Vacantele sunt mai frumoase la volanul unei masini!
Descopera locuri noi in tara sau peste granita impreuna cu prietenii sau familia.
La noi beneficiezi de masini care se pliaza perfect pe nevoile tale, fie ca ai multe bagaje de luat cu tine in calatorie sau din contra, pleci doar cu un geamantan.
Pentru confortul tau, masinile pot fi predate si preluate oriunde in Romania, datorita acoperirii nationale.
    </p>
    <p>
        Intelegem ca flexibilitatea este importanta pentru tine in deplasarile de business, asa ca in flota noastra poti gasi autoturisme fiabile care te ajuta sa te deplasezi rapid si comod in oras.
Ne poti gasi cu usurinta in principalele aeroporturi din tara, iar colegii nostri iti stau la dispozitie 24/7.
    </p>
    <p>
    Oferim servicii de inchirieri auto personalizate pentru a satisfice nevoile de mobilitatea ale companiei dumneavoastra.
Principalele avantaje ale detinerii unei flote temporare sunt riscurile scazute, eficienta crescuta, optimizarea costurilor si solutionarea imediata a indisponibilitatii autovehiculelor.
</p><p>Serviciile noastre sunt oferite doar in Bucuresti!
<p>
</p>
<?php
if(isset($_GET["pret"])){
  $prt=$_GET["pret"];
  $pretmic="SELECT C.Tip_Caroserie, C.Combustibil,a.Model,a.Marca,C.PretZI
  FROM rentalcar.Categorie C, rentalcar.auto a
  WHERE C.ID_Categorie IN ( SELECT C2.ID_Categorie
  FROM rentalcar.Categorie C2
  WHERE C2.PretZI<'$prt'  and a.ID_Categorie=C2.ID_Categorie) Order by C.PretZI";
  $query2=mysqli_query($con,$pretmic);
  $num=mysqli_num_rows($query2);
  
  if($num>0){
    echo" 
    <table  cellpadding ='0' border='2' >
    <tr cellspacing='0'>
        <th>Marca</th>
        <th>Model</th>
        <th>Tip Caroserie</th>
        <th>Combustibil</th>
        <th>Pret pe zi</th>
    </tr>";
      while($result2=mysqli_fetch_assoc($query2)){
        echo"
    <tr>
      <td>".$result2['Marca']."</td>
      <td>".$result2['Model']."</td>
      <td>".$result2['Tip_Caroserie']."</td>
      <td>".$result2['Combustibil']."</td>
      <td>".$result2['PretZI']."</td>
    </tr>
    ";
      }}
  
    }
  
  
  ?> 
  </p>
<form >
  <label for="fname">Masini al caror pret e mai mic de:</label>
  <input type="text" id="pret" name="pret">
  <input type="submit" value="Submit">
</form>

    </body>


   
</html>