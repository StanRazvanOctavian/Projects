<?php
 $host = "localhost";  
    $user = "root";  
    $password = 'automatica1.';  
    $db_name = "RentalCar";  
      
    $con = mysqli_connect($host, $user, $password, $db_name);  
    if(mysqli_connect_errno()) {  
        die("Failed to connect with MySQL: ". mysqli_connect_error());  
    }  
$nume="";
$prenume="";
$username="";
$password="";
$NrTelefon="";
$CNP="";
$Judet="";
$Oras="";
$Strada="";
$Numar="";
if(isset($_POST['nume'])){
    $nume=$_POST['nume'];
} 
echo $nume;
if(isset($_POST['prenume'])){
    $prenume=$_POST['prenume'];
} 
if(isset($_POST['username'])){
  $username=$_POST['username'];
} 
if(isset($_POST['psw'])){
    $password=$_POST['psw'];
} 
if(isset($_POST['NrTelefon'])){
  $NrTelefon=$_POST['NrTelefon'];
} 
if(isset($_POST['Judet'])){
  $Judet=$_POST['Judet'];
} 
if(isset($_POST['Strada'])){
   $Strada=$_POST['Strada'];
} 
if(isset($_POST['Oras'])){
  $Oras=$_POST['Oras'];
} 
if(isset($_POST['CNP'])){
   $CNP=$_POST['CNP'];
} 
if(isset($_POST['Numar'])){
    $Numar=$_POST['numar'];
} 



  $sql="INSERT INTO `Client` (`Nume`,`Prenume`,`Username`,`Password`, `CNP`,`Telefon`,`Judet`,`Oras`,`Strada`,`Numar`) VALUES('$nume', '$prenume', '$username',  '$password', '$CNP', '$NrTelefon', '$Judet', '$Oras', '$Strada', '$Numar')";
    $result=mysqli_query($con,$sql); 
if(!$result)
{
    echo "Conectare esuata";
    die(mysqli_error($con));
} 

// $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
    //  $count = mysqli_num_rows($result); 
//if(count>0)
  // echo "Inregistrare efectuata ";
    //else echo "Nu a mers";

?>
<style>
body{   
    background: url("backpr.jpg");  
    background-repeat:no-repeat;
    background-size: 100% 100%;
    
} 

body {
  background-image: url('pr3.jpg');
}

.header{
    min-height: 160vh;
    width: 100%;
    background-image: linear-gradient(rgba(4,9,30,0.7),rgba(4,9,30,0.7)),url(backpr.jpg);
    background-size:cover;
    background-position: center;
    position:sticky;
    
}
h1{
    font-family: "Times New Roman", Times, serif;
    text-align: center;
}
#frm{  
    border: solid black 1px;  
    width:15%;  
    height: 45%;
    border-radius: 2px;  
    margin: 110px auto;  
    background: rgba(255, 255, 255, 0.5);  
    padding: 50px; 
}  
#btn:hover{
  background:#FF7433;
  color:#EEE;
    transition-delay:0.2s;
}
#btn{  
    color: black;  
    background: rgba(255, 255, 255, 0.5);  
    padding: 5px;  
    margin-left: 75%;  
}  
p{
    font-family: "Times New Roman", Times, serif;
    color: black;
    font-size: 14px;
    font-weight: 300;
    padding: 10px;
    }
    p1{     
        color:orangered;
       font-family: "Times New Roman", Times, serif;
        
        
        
        
    }
</style>






<!DOCTYPE html>
<html>  
         <head> 


    <title>SignUP Page</title>  
      <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
</head>  
<body>     <div id = "frm">  
        <form name="f1" action = "" onsubmit = "return validation("Inregistrarea a fost efectuata")" method = "POST">  
        
        <form action="action_page.php">
  <div class="container">
    <h1>REGISTER</h1>
    <p>Introdu toate datele pentru a crea un cont .</p>
    <hr>
   
    <input type="text" placeholder="Introdu Nume" name="nume" id="nume" required>
     <label for="Nume"><b>Nume</b></label>
    
    <input type="text" placeholder="Introdu Prenume" name="prenume" id="prenume" required>
    <label for="Prenume"><b>Prenume</b></label>
   
    <input type="text" placeholder="Introdu username" name="username" id="username" required>
     <label for="Username"><b>Username</b></label>
 
    <input type="password" placeholder="Introdu Password" name="psw" id="psw" required>
       <label for="psw"><b>Password</b></label>
    
    
    <input type="NrTelefon" placeholder="Introdu NrTelefon" name="NrTelefon" id="NrTelefon" required>
    <label for="NrTelefon"><b>NrTelefon</b></label>
   
    <input type="CNP" placeholder="Introdu CNP        " name="CNP" id="CNP" required>
     <label for="CNP"><b>CNP</b></label>
 
    <input type="Judet" placeholder="Introdu Judet" name="Judet" id="Judet" required>
       <label for="Judet"><b>Judet</b></label>
  
    <input type="Oras" placeholder="Introdu Oras" name="Oras" id="Oras" required>
      <label for="Oras"><b>Oras</b></label>
 
    <input type="Strada" placeholder="Introdu Strada" name="Strada" id="Strada" required>
       <label for="Strada"><b>Strada</b></label>
    
    <input type="numar" placeholder="Introdu numar" name="numar" id="numar" required>
    <label for="numar"><b>Numar</b></label>
   <div class="container signin">
    <p>Already have an account? <a href="PrimaPagina.php">Sign in</a>.</p>
  </div>
    <button type="submit" class="registerbtn">Register</button>
  </div>

  
</form>
        
        
        </form> 
    
    </div> 
 </body>
</html> 


