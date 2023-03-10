<?php
$host = "localhost";  
    $user = "root";  
    $password = 'automatica1.';  
    $db_name = "RentalCar";  
    $ID_Locatie=$_GET['ID_Locatie'];
    $con = mysqli_connect($host, $user, $password, $db_name);  
    $sql2="select * from `Locatie` where ID_Locatie=$ID_Locatie";
    $result=mysqli_query($con,$sql2);
    $row=mysqli_fetch_assoc($result);
    $Judet=$row['Judet'];
    $Oras=$row['Oras'];
    $Strada=$row['Strada'];
    $Numar=$row['Numar'];
    if (isset($_POST['submit'])){
        $Judet=$_POST['Judet'];
        $Oras=$_POST['Oras'];
        $Strada=$_POST['Strada'];
        $Numar=$_POST['Numar'];
       // die();
    
   $sql="UPDATE `Locatie` SET  JUdet='$Judet', Oras='$Oras', Strada='$Strada', Numar='$Numar' 
   where ID_Locatie=$ID_Locatie";
    $result=mysqli_query($con,$sql);
    
    if($result){
          
            header('Location: Locatie.php');
            die();
        }
           else {
          die(mysqli_error($con));
        }}


?>
<style>
    h1{
        text-align:center;
    }
    
    </style>

<!doctype html>
<html>
<title>Update locatie</title>
    <h1>Update locatie</h1>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">


        <body margin="0">
    <div class="container">
    <form method="post">
        <div class="form-post">
            <label >Judet</label>
            <input type="text" class="form-control" placeholder="Introdu Judet " name="Judet" autocomplete="off" value=<?php echo $Judet;?>>
        </div>
        <div class="form-post">
            <label >Oras</label>
            <input type="text" class="form-control" placeholder="Introdu Oras " name="Oras" autocomplete="off" value=<?php echo $Oras;?>>
        </div>
        <div class="form-post">
            <label >Strada</label>
            <input type="text" class="form-control" placeholder="Introdu Strada " name="Strada" autocomplete="off" value=<?php echo $Strada;?>>
        </div>
        <div class="form-post">
            <label >Numar</label>
            <input type="text" class="form-control" placeholder="Introdu Numar " name="Numar" autocomplete="off" value=<?php echo $Numar;?>>
        </div>
        <div class="form-post">
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </div>
    </form>
    </div>

</body>
</html>