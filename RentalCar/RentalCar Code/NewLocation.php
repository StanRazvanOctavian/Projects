<?php
$host = "localhost";  
    $user = "root";  
    $password = 'automatica1.';  
    $db_name = "RentalCar";  
    $con = mysqli_connect($host, $user, $password, $db_name); 
        if(isset($_POST['submit'])){
        $Judet=$_POST['Judet'];
        $Oras=$_POST['Oras'];
        $Strada=$_POST['Strada'];
        $Numar=$_POST['Numar'];
       $sql="insert into `Locatie` (Judet,Oras,Strada,Numar)
       values('$Judet','$Oras','$Strada','$Numar')";
       $result=mysqli_query($con,$sql);
       if($result){
        header("location: Locatie.php");
        die();
       } else {die(mysqli_error($con));
    }}
?>
<style>
    h1{
        text-align:center;
    }
</style>    

<!doctype html>
<html>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">

    <title>Locatie noua</title>
    <h1>Locatie noua</h1>
        <body margin="0">
    <div class="container">
    <form method="post">
        <div class="form-post">
            <label >Judet</label>
            <input type="text" class="form-control" placeholder="Introdu judet " name="Judet" autocomplete="off" >
        </div>
        <div class="form-post">
            <label >Oras</label>
            <input type="text" class="form-control" placeholder="Introdu oras " name="Oras" autocomplete="off" >
        </div>
        <div class="form-post">
            <label >Strada</label>
            <input type="text" class="form-control" placeholder="Introdu strada " name="Strada" autocomplete="off" >
        </div>
        <div class="form-post">
            <label >Numar</label>
            <input type="text" class="form-control" placeholder="Introdu numar " name="Numar" autocomplete="off" >
        </div>
       
        <div class="form-post">
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </div>
    </form>
    </div>

</body>
</html>