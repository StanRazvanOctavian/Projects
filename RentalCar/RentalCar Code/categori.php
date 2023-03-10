
<?php
$host = "localhost";  
    $user = "root";  
    $password = 'automatica1.';  
    $db_name = "RentalCar";  
      
    $con = mysqli_connect($host, $user, $password, $db_name);  
    $select= "select * from Categorie";
    $select1= "SELECT DISTINCT Tip_Caroserie from Categorie";
    $select2= "SELECT DISTINCT Combustibil from Categorie";
    $query=mysqli_query($con,$select);
    $query1=mysqli_query($con,$select1);
    $query2=mysqli_query($con,$select2);
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
    p{
        font-size: 2.5em;
        text-align: center;

    }
    a{
        text-decoration: none;
        font-size:1.5em;
    }
    a:hover{
        color: red;
    }
    h3{
        width:100%;
        background-color: #4CAF50;
        padding:5px;
        color:white;
    }
    body    { 
    background-repeat: no-repeat;
         margin:0;
    background-size: 100%;
    
    
    }

</style>

<!doctype html>
<html>
    
     
    <h3>
    <a href="authentification.php">&#8592;</a>
    <a href="categori.php" class="w3-bar-item w3-button">&#8635;</a>
    <p>Categori</p> <br>
   <p1 style="margin-left:25px;">Cautati masina dupa</p1>
</br>
    <p1 style="margin-left:25px;">
<?php 
    echo "<form action='categori.php' method='get' style='margin-left:25px;'>";
    echo "Tip Caroserie <input type='search' list='dtlist' name='ceva' />";
    echo"<datalist id='dtlist'>";
    while($row1=mysqli_fetch_array($query1))
    {
        echo "<option>".$row1['Tip_Caroserie']."</option>";
    }
echo "</datalist>";


echo " Tip Combustibil <input type='search' list='dtlist1' name='ceva2' />";
    echo"<datalist id='dtlist1'>";
    while($row2=mysqli_fetch_array($query2))
    {
        echo "<option>".$row2['Combustibil']."</option>";
    }
echo "</datalist>";
echo "<input type='submit'>";
echo "</form>";
if(isset($_GET['ceva']))
$TCar=$_GET['ceva'];
if(isset($_GET['ceva2']))
$Comb=$_GET['ceva2'];
?>
</p1>
</h3>

<?php
    if(isset($_GET['ceva'])){
        if(isset($_GET['ceva2'])){
            $sql_q="SELECT A.Marca,A.Model,A.NrMasina,C.Tip_Caroserie,C.Combustibil FROM rentalcar.Auto A
            inner join rentalcar.Categorie C where C.Tip_Caroserie='$TCar' and C.ID_Categorie=A.ID_Categorie and C.Combustibil='$Comb' ";
        }
         if($_GET['ceva2']=="")
        {   
            $sql_q="SELECT A.Marca,A.Model,A.NrMasina,C.Tip_Caroserie,C.Combustibil FROM rentalcar.Auto A
            inner join rentalcar.Categorie C where C.Tip_Caroserie='$TCar' and C.ID_Categorie=A.ID_Categorie ";}
    $query_q=mysqli_query($con,$sql_q);
    $num_q=mysqli_num_rows($query_q);
    if($num_q>0){
     
     echo "<table  cellpadding ='0' border='2' >
     <tr cellspacing='0'>
         <th>Marca</th>
         <th>Model</th>
         <th>Numar Masina</th>
         <th>Tip Caroserie</th>
         <th>Combustibil</th>
     </tr>";
    
    
         while($result_q=mysqli_fetch_assoc($query_q)){
             echo"
       <tr>
         <td>".$result_q['Marca']."</td>
         <td>".$result_q['Model']."</td>
         <td>".$result_q['NrMasina']."</td>
         <td>".$result_q['Tip_Caroserie']."</td>
         <td>".$result_q['Combustibil']."</td>
                   </tr>
      ";
         }
         echo "</table>";
     }    }



?>
<body>
    <table  cellpadding ="0" border="2" >
        <tr cellspacing="0">
            <th>Tip Caroserie</th>
            <th>Combustibil</th>
            <th>Transmisie</th>
            <th>PretKM</th>
            <th>PretZI</th>
        </tr>
        <?php
        $num=mysqli_num_rows($query);
        if($num>0){
            while($result=mysqli_fetch_assoc($query)){
                echo"
          <tr>
            <td>".$result['Tip_Caroserie']."</td>
            <td>".$result['Combustibil']."</td>
            <td>".$result['Transmisie']."</td>
            <td>".$result['PretKM']."</td>
            <td>".$result['PretZI']."</td>
                      </tr>
         ";
            }
        }

        ?>    
</table>
</body>
</html>