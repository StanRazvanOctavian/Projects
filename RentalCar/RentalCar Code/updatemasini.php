<?php
$host = "localhost";  
    $user = "root";  
    $password = 'automatica1.';  
    $db_name = "RentalCar";  
    $ID_Auto=$_GET['ID_Auto'];
    $con = mysqli_connect($host, $user, $password, $db_name);  
    $sql2="select * from `Auto` where ID_Auto=$ID_Auto";
    $result=mysqli_query($con,$sql2);
    $row=mysqli_fetch_assoc($result);
    $Marca=$row['Marca'];
    $Model=$row['Model'];
    $AnFabricatie=$row['AnFabricatie'];
    $Culoare=$row['Culoare'];
    $NrMasina=$row['NrMasina'];
    $CantitateBenzina=$row['CantitateBenzina'];
        $Categorie=$row['ID_Categorie'];
        $Kilometri=$row['Kilometri'];
    if (isset($_POST['submit'])){
        $Marca=$_POST['Marca'];
        $Model=$_POST['Model'];
        $AnFabricatie=$_POST['AnFabricatie'];
        $Culoare=$_POST['Culoare'];
        $NrMasina=$_POST['NrMasina'];
        $CantitateBenzina=$_POST['CantitateBenzina'];
        $Categorie=$_POST['Categorie'];
        $Kilometri=$_POST['Kilometri'];
       // die();
    
   $sql="UPDATE `Auto` SET  Marca='$Marca', Model='$Model', AnFabricatie='$AnFabricatie', Culoare='$Culoare', NrMasina='$NrMasina',
   CantitateBenzina='$CantitateBenzina',ID_Categorie='$Categorie',Kilometri='$Kilometri'
   where ID_Auto=$ID_Auto";
    $result=mysqli_query($con,$sql);
       echo $Marca;
    
    if($result){
          
            header('Location: masini.php');
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
<title>Update masina</title>
    <h1>Update masina</h1>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">


        <body margin="0">
    <div class="container">
    <form method="post">
        <div class="form-post">
            <label >Marca</label>
            <input type="text" class="form-control" placeholder="Introdu marca " name="Marca" autocomplete="off" value=<?php echo $Marca;?>>
        </div>
        <div class="form-post">
            <label >Model</label>
            <input type="text" class="form-control" placeholder="Introdu model " name="Model" autocomplete="off" value=<?php echo $Model;?>>
        </div>
        <div class="form-post">
            <label >AnFabricatie</label>
            <input type="text" class="form-control" placeholder="Introdu An Fabricatie " name="AnFabricatie" autocomplete="off" value=<?php echo $AnFabricatie;?>>
        </div>
        <div class="form-post">
            <label >Culoare</label>
            <input type="text" class="form-control" placeholder="Introdu culoare " name="Culoare" autocomplete="off" value=<?php echo $Culoare;?>>
        </div>
        <div class="form-post">
            <label >NrMasina</label>
            <input type="text" class="form-control" placeholder="Introdu Nr Masina " name="NrMasina" autocomplete="off" value=<?php echo $NrMasina;?>>
        </div>
        <div class="form-post">
            <label >CantitateBenzina</label>
            <input type="text" class="form-control" placeholder="Introdu Cantitate Benzina " name="CantitateBenzina" autocomplete="off"  value=<?php echo $CantitateBenzina;?> >
        </div>
        <div class="form-post">
            <label >Categorie</label>
            <input type="text" class="form-control" placeholder="Introdu Categorie " name="Categorie" autocomplete="off"  value=<?php echo $Categorie;?> >
        </div>
        <div class="form-post">
            <label >Kilometri</label>
            <input type="text" class="form-control" placeholder="Introdu Kilometri " name="Kilometri" autocomplete="off"  value=<?php echo $Kilometri;?> >
        </div>
        <div class="form-post">
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </div>
    </form>
    </div>

</body>
</html>