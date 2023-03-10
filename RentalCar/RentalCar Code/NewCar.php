<?php
$host = "localhost";  
    $user = "root";  
    $password = 'automatica1.';  
    $db_name = "RentalCar";  
    $con = mysqli_connect($host, $user, $password, $db_name); 
        if(isset($_POST['submit'])){
        $Marca=$_POST['Marca'];
        $Model=$_POST['Model'];
        $AnFabricatie=$_POST['AnFabricatie'];
        $Culoare=$_POST['Culoare'];
        $NrMasina=$_POST['NrMasina'];
        $CantitateBenzina=$_POST['CantitateBenzina'];
        $Categorie=$_POST['Categorie'];
        $Kilometri=$_POST['Kilometri'];
       $sql="insert into `Auto` (Marca,Model,AnFabricatie,Culoare,NrMasina,CantitateBenzina,ID_Categorie,Kilometri)
       values('$Marca','$Model','$AnFabricatie','$Culoare','$NrMasina','$CantitateBenzina','$Categorie','$Kilometri')";
       $result=mysqli_query($con,$sql);
       if($result){
        header("location: masini.php");
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

    <title>Masina noua</title>
    <h1>Masina noua</h1>
        <body margin="0">
    <div class="container">
    <form method="post">

        <div class="form-post">
            <label >Marca</label>
            <input type="text" class="form-control" placeholder="Introdu marca " name="Marca" autocomplete="off" >
        </div>
        <div class="form-post">
            <label >Model</label>
            <input type="text" class="form-control" placeholder="Introdu model " name="Model" autocomplete="off" >
        </div>
        <div class="form-post">
            <label >AnFabricatie</label>
            <input type="text" class="form-control" placeholder="Introdu An Fabricatie " name="AnFabricatie" autocomplete="off" >
        </div>
        <div class="form-post">
            <label >Culoare</label>
            <input type="text" class="form-control" placeholder="Introdu culoare " name="Culoare" autocomplete="off" >
        </div>
        <div class="form-post">
            <label >NrMasina</label>
            <input type="text" class="form-control" placeholder="Introdu Nr Masina " name="NrMasina" autocomplete="off" >
        </div>
        <div class="form-post">
            <label >CantitateBenzina</label>
            <input type="text" class="form-control" placeholder="Introdu Cantitate Benzina " name="CantitateBenzina" autocomplete="off" >
        </div>
        <div class="form-post">
            <label >Categorie</label>
            <input type="text" class="form-control" placeholder="Introdu Categorie " name="Categorie" autocomplete="off" >
        </div>
        <div class="form-post">
            <label >Kilometri</label>
            <input type="text" class="form-control" placeholder="Introdu Kilometri " name="Kilometri" autocomplete="off" >
        </div>
        <div class="form-post">
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </div>
    </form>
    </div>

</body>
</html>