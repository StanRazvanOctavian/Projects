<?php
$host = "localhost";  
    $user = "root";  
    $password = 'automatica1.';  
    $db_name = "RentalCar";  
      
    $con = mysqli_connect($host, $user, $password, $db_name);  
    if (isset($_GET['ID_Auto'])){
      $ID_Auto=$_GET['ID_Auto'];
      $delete=mysqli_query($con,"DELETE FROM `auto` WHERE `ID_Auto`='$ID_Auto'");
      header("Location: masini.php");
      die();

    }

    $select= "select * from auto";
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
    form{
      margin-top:2%;
        margin-left: 11%;
        border-collapse: collapse;
        font-family:'Poppins',sans-serif;
        color:black;
        font-size:1.2em;
    
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
    p{
      margin-top:2%;
        margin-left: 11%;
        border-collapse: collapse;
        font-family:'Poppins',sans-serif;
        color:black;
        font-size:1.2em;

    }
    p2{
      margin-left:80%;
      color:white;
      font-family:'Poppins',sans-serif;
      font-size:1.2em;
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

<title>Masini</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<body>

<!-- Sidebar -->
<div class="w3-sidebar w3-bar-block w3-border-right" style="display:none" id="mySidebar">
  <button onclick="w3_close()" class="w3-bar-item w3-large">Close &times;</button>
  <a href="authentification.php" class="w3-bar-item w3-button">&#8592;</a>
  <a href="masini.php" class="w3-bar-item w3-button">Masini</a>
 
  <a href="Locatie.php" class="w3-bar-item w3-button">Locatie</a>
  <a href="factura.php" class="w3-bar-item w3-button">Facturi</a>
  <a href="categori.php" class="w3-bar-item w3-button">Categori</a>
</div>
<a href='NewCar.php'  class='btn btn-new'>Masina noua</a> 
<!-- Page Content -->
<div class="w3-teal">
  <button class="w3-button w3-teal w3-xlarge" onclick="w3_open()">☰</button>
  <a href="masini.php" class="w3-bar-item w3-button">&#8635;</a>
  <div class="w3-container">
    <h1>Masini</h1>
    <input type="button" style="margin-left:83%;background:white;" onclick="window.location.href='masini.php?a=1';" value="Cea mai utilizata" />
  <?php 
    if(isset($_GET['a'])){
    if($_GET['a']==1){
    $sql_high="select *,count(*) as nr from rentalcar.Auto A 
    inner join rentalcar.Factura F where F.ID_Auto=A.ID_Auto 
    group by a.ID_Auto
    order by nr Desc LIMIT 1";
    $query_high=mysqli_query($con,$sql_high);
   
      $result=mysqli_fetch_assoc($query_high);
      
      echo "Marca: ".$result['Marca']."";
      echo "  Model: ".$result['Model']."";
      
    }}
    ?>
    
  </div>
</div>

<div class="w3-container">

<body>   
    <table  cellpadding ="0" border="2" >
        <tr cellspacing="0">
            <th>Nr</th>
            <th>Marca</th>
            <th>Model</th>
            <th>An Fabricatie</th>
            <th>Culoare</th>
            <th>Nr Masina</th>
            <th>Kilometri</th>
            <th>Disponibilitate</th>
            <th>Operatie</th>
        </tr>
        <?php
        $num=mysqli_num_rows($query);
        if($num>0){
            while($result=mysqli_fetch_assoc($query)){
                echo"
          <tr>
            <td>".$result['ID_Auto']."</td>
            <td>".$result['Marca']."</td>
            <td>".$result['Model']."</td>
            <td>".$result['AnFabricatie']."</td>
            <td>".$result['Culoare']."</td>
            <td>".$result['NrMasina']."</td>
            <td>".$result['Kilometri']."</td>
            <td>".$result['Disponibilitate']."
            </td>
            <td>
                  <a href='updatemasini.php?ID_Auto=".$result['ID_Auto']."'class='btn btn-update'>Update</a>
                  <a href='masini.php?ID_Auto=".$result['ID_Auto']."'class='btn btn-danger'>Delete</a>
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
  <label for="fname">Numar Masina:</label>
  <input type="text" id="nrmas" name="nrmas">
  <input type="submit" value="Submit">
</form>

<?php 


if(isset($_GET['nrmas'])){
  $aa=$_GET['nrmas'];
  echo "<p>Rezultatul cautarii $aa<p>";
$cautare="SELECT C.Nume,C.Prenume,C.CNP,C.Oras,C.Judet FROM rentalcar.client C, rentalcar.factura F
inner join rentalcar.auto A where F.ID_Auto=A.ID_Auto and A.NrMasina='".$aa."' and C.ID_Client=F.ID_Client";

$query2=mysqli_query($con,$cautare);
$num=mysqli_num_rows($query2);

if($num>0){
  echo" 
  <table  cellpadding ='0' border='2' >
  <tr cellspacing='0'>
      <th>Nume</th>
      <th>Prenume</th>
      <th>CNP</th>
      <th>Oras</th>
      <th>Judet</th>
  </tr>";
    while($result2=mysqli_fetch_assoc($query2)){
        
      echo"
  <tr>
    <td>".$result2['Nume']."</td>
    <td>".$result2['Prenume']."</td>
    <td>".$result2['CNP']."</td>
    <td>".$result2['Oras']."</td>
    <td>".$result2['Judet']."</td>
  </tr>
  ";

    }}}
?>
<form>
<label for="fname">Masina care nu a mai fost folosita din:</label>
<input type="date" id="myDate" name="mydate"/>
<input type="submit" href="masini.php?myDate"/>
  </form>
<?php
  if(isset($_GET['mydate'])){
       $date=$_GET['mydate'];
       echo "<form>";
        echo "Rezultatul cautarii pentru $date";
        echo"</form>";
$utilizata="select a.Marca,a.Model,a.NrMasina,a.AnFabricatie from rentalcar.Auto a 
where a.ID_Auto not in (select distinct a2.ID_Auto from rentalcar.Auto a2 
inner join rentalcar.factura f where a2.ID_Auto=f.ID_Auto and f.data>'$date')";

$query_utilizata=mysqli_query($con,$utilizata);
$util=mysqli_num_rows($query_utilizata);

if($util>0){
  echo" 
  <table  cellpadding ='0' border='2' >
  <tr cellspacing='0'>
      <th>Marca</th>
      <th>Model</th>
      <th>Numar Masina</th>
      <th>An Fabricatie</th>
  </tr>";
    while($result_utilizata=mysqli_fetch_assoc($query_utilizata)){
        
      echo"
  <tr>
    <td>".$result_utilizata['Marca']."</td>
    <td>".$result_utilizata['Model']."</td>
    <td>".$result_utilizata['NrMasina']."</td>
    <td>".$result_utilizata['AnFabricatie']."</td>
  </tr>
  ";
    }}
  }
  
?>


<form>
  <?php 
     $select1= "SELECT NrMasina from Auto";
     $query1=mysqli_query($con,$select1);
     echo "<form>";
     echo " Numar masina <input type='search' list='dtlist3' name='ceva3' />";
     echo"<datalist id='dtlist3'>";
     echo"</form>";
     while($row2=mysqli_fetch_array($query1))
     {
         echo "<option>".$row2['NrMasina']."</option>";
     }
     echo"</datalist>";
     ?>

     </form>
     <?php
    
     if(isset($_GET['ceva3'])){
        $nrm=$_GET['ceva3'];
        echo "<form>";
        echo "<label for='fname'>Istoric locatii masina:$nrm</label>";
        echo "</form>";
        $sql_q="select * from rentalcar.locatie l where ID_Locatie in 
        (select rl.ID_LocatiePreluare from rentalcar.rezervarelocatie rl where rl.NrRezervare in 
          (select r.NrRezervare from rentalcar.rezervare r where ID_Auto in
            (select a.ID_Auto from rentalcar.auto a where a.NrMasina='$nrm'))) ";
        $query_q=mysqli_query($con,$sql_q);
        $num_q=mysqli_num_rows($query_q);
       if($num_q>0){
      echo "<table  cellpadding ='0' border='2' >
     <tr cellspacing='0'>
        <th>Judet</th>
       <th>Oras</th>
       <th>Strada</th>
       <th>Numar</th>
     </tr>";


    while($result_q=mysqli_fetch_assoc($query_q)){
         echo"
   <tr>
     <td>".$result_q['Judet']."</td>
     <td>".$result_q['Oras']."</td>
     <td>".$result_q['Strada']."</td>
     <td>".$result_q['Numar']."</td>
               </tr>
  ";
     }
     echo "</table>";
    }}



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