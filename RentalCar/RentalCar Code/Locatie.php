<?php
$host = "localhost";  
    $user = "root";  
    $password = 'automatica1.';  
    $db_name = "RentalCar";  
      
    $con = mysqli_connect($host, $user, $password, $db_name);  
    if (isset($_GET['ID_Locatie'])){
      $ID_Locatie=$_GET['ID_Locatie'];
      $delete=mysqli_query($con,"DELETE FROM `Locatie` WHERE `ID_Locatie`='$ID_Locatie'");
      header("Location: Locatie.php");
    die();

    }


    $select= "select * from Locatie";
    $query=mysqli_query($con,$select);


?>






<style>
    table{
        margin-top:2%;
        margin-left: 10%;
        border-collapse: collapse;
        width:75%;
        font-family:'Poppins',sans-serif;
        box-sizing: border-box;
        border-spacing:0px;
        
    }
    table th{
      border-spacing:0;
      border-collapse: collapse;
        color:black;
        padding:10px;
    }
    table td{
      border-spacing:0;
      border-collapse: collapse;
      color: black;
      font-size:1.2em;
      padding:10px;
      text-align: center;
    }
    .btn-danger{
      background:#fff;
      color:red;
      font-size:1.2em;
      padding:5px 30px;
      text-decoration:none;
    }
    .btn-danger:hover{
      background:red;
      color:#fff;
    }
    .btn-update{
      background:#fff;
      color:blue;
      font-size:1.2em;
      padding:5px 30px;
      text-decoration:none;
    }
    .btn-update:hover{
      background:blue;
      color:#fff;
    }
    .btn-new{
      background:#fff;
      color:green;
      font-size:1.2em;
      padding:10px 60px;
      text-decoration:none;
      float:right;
      margin-right:10%;
    }
    b{
     float:right;
     margin-right:10%;
    }
    
    .btn-new:hover{
      background:green;
      color:#fff;
      
    }
    label{
        margin-top:2%;
        margin-left: 11%;
        border-collapse: collapse;
        width:75%;
        font-family:'Poppins',sans-serif;
        box-sizing: border-box;
        border-spacing:0px;
        font-size:1.2em;
    }
    p{
        margin-top:2%;
        margin-left: 11%;
        border-collapse: collapse;
        width:75%;
        font-family:'Poppins',sans-serif;
        box-sizing: border-box;
        border-spacing:0px;
        font-size:1.2em;
    }
    btn{
     float:right;
     margin-right:5%;
    }
    btn:hover{
      background-color:green;
    }



</style>
<!DOCTYPE html>
<html>
<title>Locatii</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<body>

<!-- Sidebar -->
<div class="w3-sidebar w3-bar-block w3-border-right" style="display:none" id="mySidebar">
  <button onclick="w3_close()" class="w3-bar-item w3-large">Close &times;</button>
  <a href="authentification.php" class="w3-bar-item w3-button">&#8592;</a>
  <a href="masini.php" class="w3-bar-item w3-button">Masini</a>
  <a href="#" class="w3-bar-item w3-button">Locatie</a>
  <a href="factura.php" class="w3-bar-item w3-button">Facturi</a>
  <a href="categori.php" class="w3-bar-item w3-button">Categori</a>
</div>
<a href='NewLocation.php'  class='btn btn-new'>Locatie noua</a> 
<!-- Page Content -->
<div class="w3-teal">
  <button class="w3-button w3-teal w3-xlarge" onclick="w3_open()">☰</button>
  <a href="Locatie.php" class="w3-bar-item w3-button">&#8635;</a>
  <div class="w3-container">
    <h1>Locatii</h1>
    <input type="button" style="margin-left:83%;background:white;" onclick="window.location.href='Locatie.php?a=2';" value="Cea mai frecventata locatie" />

  </div>
</div>

<div class="w3-container">

<body> 
<?php 
    if(isset($_GET['a'])){
    if($_GET['a']==2){
    $sql_high="select *,Count(l.ID_Locatie) as nr from rentalcar.Locatie l inner join
    (select rl.ID_LocatiePreluare from rentalcar.Rezervarelocatie rl where rl.NrRezervare in
      (select NrRezervare from rentalcar.rezervare where ID_Factura in 
        (select ID_Factura from rentalcar.factura  ))) d on d.ID_LocatiePreluare=l.ID_Locatie group by ID_Locatie order by nr desc 
              limit 1";
    $query_high=mysqli_query($con,$sql_high);
      $result=mysqli_fetch_assoc($query_high);
      echo "<p2>";
      echo "  Judet: ".$result['Judet'].",";
      echo "  Oras: ".$result['Oras'].",";
      echo "Strada: ".$result['Strada'].",";
      echo "Numar: ".$result['Numar'].",";
      echo "Numar vizite: ".$result['nr']."";
      echo "</p2>";
    
    }}
    ?>  
    <table  cellpadding ="0" border="2" >
        <tr cellspacing="0">
            <th>ID_Locatie</th>
            <th>Judet</th>
            <th>Oras</th>
            <th>Strada</th>
            <th>Numar</th>
            <th>Operatie</th>
        </tr>
        <?php
        $num=mysqli_num_rows($query);
        if($num>0){
            while($result=mysqli_fetch_assoc($query)){
                echo"
          <tr>
            <td>".$result['ID_Locatie']."</td>
            <td>".$result['Judet']."</td>
            <td>".$result['Oras']."</td>
            <td>".$result['Strada']."</td>
            <td>".$result['Numar']."</td>
            <td>
                  <a href='updatelocatie.php?ID_Locatie=".$result['ID_Locatie']."'class='btn btn-update'>Update</a>
                  <a href='Locatie.php?ID_Locatie=".$result['ID_Locatie']."'class='btn btn-danger'>Delete</a>
            </td>
                      </tr>
         ";
            }
        }    
        ?>
       
    </table>
</body>
</div>
<form >
  <label for="fname">Ce masini se gasesc in locatia:</label>
  <input type="text" id="loc" name="loc">
  <input type="submit" value="Submit">
</form>

<?php

if(isset($_GET['loc'])){
  $aa=$_GET['loc'];
  
$cautare="SELECT A.Marca,A.Model,A.NrMasina,A.AnFabricatie FROM rentalcar.Auto A , rentalcar.Locatie L, rentalcar.rezervarelocatie rl
INNER JOIN rentalcar.rezervare R 
WHERE L.Strada='".$aa."' AND L.ID_Locatie=rl.ID_LocatiePredare AND rl.NrRezervare=R.NrRezervare AND R.ID_Auto=A.ID_Auto";

$query2=mysqli_query($con,$cautare);
$num=mysqli_num_rows($query2);

if($num>0){
  echo "<p>Rezultatul cautarii $aa<p>";
  echo" 
  <table  cellpadding ='0' border='2' >
  <tr cellspacing='0'>
      <th>Marca</th>
      <th>Model</th>
      <th>NrMasina</th>
      <th>An</th>
  </tr>";
    while($result2=mysqli_fetch_assoc($query2)){
        
      echo"
  <tr>
    <td>".$result2['Marca']."</td>
    <td>".$result2['Model']."</td>
    <td>".$result2['NrMasina']."</td>
    <td>".$result2['AnFabricatie']."</td>
  </tr>
  ";
    }}

  }


?> 





<script>

function w3_open() {
  document.getElementById("mySidebar").style.display = "block";
}

function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
}
</script>
</body>
</html> 