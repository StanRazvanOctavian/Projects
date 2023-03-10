<?php
$host = "localhost";  
    $user = "root";  
    $password = 'automatica1.';  
    $db_name = "RentalCar";  
    $ID_Factura="";    
    $pret1="";
    if(isset($_POST['pret1'])){
    $pret1=$_POST['pret1'];}
    if(isset($_POST['factura'])){
        $ID_Factura=$_POST['factura'];
    }
   // echo $ID_Factura;
    $con = mysqli_connect($host, $user, $password, $db_name);  
    if(mysqli_connect_errno()) {  
        die("Failed to connect with MySQL: ". mysqli_connect_error());  
    }  
    $sql2="Select * from factura where ID_Factura='$ID_Factura'";
    $sql="Select A.* from auto A 
    inner join factura F on F.ID_Auto=A.ID_Auto 
    inner join client C on C.ID_Client=F.ID_Client
    where ID_Factura='$ID_Factura'";
    $sql1="Select C.* from Client C 
    inner join factura F on C.ID_Client=F.ID_Client
    where ID_Factura='$ID_Factura'";

    $sqlpret="SELECT A.Marca,A.Model,F.Valoare,C.Nume,C.Prenume from rentalcar.Auto A ,rentalcar.Client C
    inner join rentalcar.Factura F where F.Valoare>'$pret1' and F.ID_Auto=A.Id_Auto and C.ID_Client=F.ID_Client
    order  by F.Valoare ";
 $result=mysqli_query($con,$sql); 
 $result1=mysqli_query($con,$sql1); 
 $result2=mysqli_query($con,$sql2);
 $resultpret=mysqli_query($con,$sqlpret);
if(!$result)
{
    echo "Conectare esuata";
    die(mysqli_error($con));
} 
if(!$result1)
{
    echo "Conectare esuata";
    die(mysqli_error($con));
} 


?>
<style >
body    { 
    background-repeat: no-repeat;
         margin:0;
    background-size: 100%;
    
    
    }

    
  table {
      margin-left: 10%;
      text-align: center;
    border-collapse: collapse;
    width:75%;
    font-family: Arial;
     
}
    table, th, td {
  border:1px solid black;

    }
    h1{
        
        font-family: Arial;
         font-size: 50px;
    font-weight: 600;
        text-align: center;
        color:white;
    }
    
    p{
        
         font-size: 20px;
        font-weight: 200;
   text-align: left;
        color:black;
    }
    th{
        text-align: center;
        font-size: 25px;
        font-weight: 400;
    }
    tr{
        margin-left:1%;

    }
    h3{
      
        width:100%;
        background-color: #4CAF50;
        padding:5px;
        color:white;
    }
   a{
    color:white;
    text-decoration: none;
    font-size: 25px;
   }
   a:hover{
    color:black;
   }
</style>
    










<!DOCTYPE html>
<html>

<h3> 
    <a href="authentification.php">&#8592;</a>
    <a href="factura.php" class="w3-bar-item w3-button">&#8635;</a>
    <p>
    <form name="f1" action = ""  method = "POST">  
         
     <input type="text" name="factura" id="factura">
     <label for="Factura"><b>Numarul facturii</b></label>
     <button type="submit" class="registerbtn" style="display: none;"> </button>
</p>
     <form name="f1" action = ""  method = "POST">  
         
     <input type="text" name="pret1" id="pret1">
     <label for="pret1"><b>Facturi mai mari de</b></label>
 
   <h1>FACTURA</h1>
</h3>
    

    <body>
    <?php
    if($ID_Factura){
        
    while($row_auto = mysqli_fetch_array($result) )
    {
     $auto=$row_auto['ID_Auto'];
     $culoare=$row_auto['Culoare'];
     $an=$row_auto['AnFabricatie'];
     $model=$row_auto['Model'];
     $marca=$row_auto['Marca'];
     $nr=$row_auto['NrMasina'];  
    }
    while($row_client = mysqli_fetch_array($result1) )
    {
     $nume=$row_client['Nume'];
     $prenume=$row_client['Prenume'];
     $telefon=$row_client['Telefon'];
     $judet=$row_client['Judet'];
     $oras=$row_client['Oras']; 
    }
     while($row_factura = mysqli_fetch_array($result2) )
     {
         $Valoare=$row_factura['Valoare'];
     }}
   ?>
 
<?php 

$num1=mysqli_num_rows($result1);
if($num1>0){
    if($ID_Factura){
    echo
    "<table>
    <tr>
    <th>Detalii Autovehicul</th>
    <th>Detalii Factura</th>
        <th>Date Client</th> 
       </tr>
     <tr>
    <td>
        <p>Numar auto: $auto </p>
        <p>Culoare:  $culoare </p>
        <p>An Fabricatie: $an </p>
        <p>Model: $model </p>
        <p>Marca:  $marca </p>
        <p>$nr </p></td>
        <td>
        <p>Numar Factura: $ID_Factura</p>
        <p>Pret Total: $Valoare </p>
    </td><td>
        <p>Nume: $nume </p>
        <p>Prenume: $prenume </p>
        <p>Telefon: $telefon </p>
        <p>Judet: $judet </p>
        <p>Oras: $oras </p>
     </td>
            
        </td>
      </tr>
      </table>";
        }}
    ?>
        <?php  
    if($pret1){
       $num=mysqli_num_rows($resultpret);
    if($num>0){
    if(isset($_POST['pret1'])){
        echo "<table>
        <tr>
        <th>Nume</th>
        <th>Prenume</th>
        <th>Marca</th>
        <th>Model</th>
        <th>Valoare</th>
        </tr>";
        while($rezultat=mysqli_fetch_assoc($resultpret)){
            echo"
            
            <tr>
        <th>".$rezultat['Nume']."</th>
        <th>".$rezultat['Prenume']."</th>
        <th>".$rezultat['Marca']."</th>
        <th>".$rezultat['Model']."</th>
        <th>".$rezultat['Valoare']."</th>
        </tr>    
        
   ";}
echo "</table>";
}}}
?>
     
    </body>
</html>