<?php
 $host = "localhost";  
    $user = "root";  
    $password = 'automatica1.';  
    $db_name = "RentalCar";  
      
    $con = mysqli_connect($host, $user, $password, $db_name);  
    if(mysqli_connect_errno()) {  
        die("Failed to connect with MySQL: ". mysqli_connect_error());  
    }  
  $username = "";

if(isset($_POST['user'])){
    $username = $_POST['user'];
}  
  $password = "";

if(isset($_POST['pass'])){
    $password = $_POST['pass'];
} 
        
      
        //to prevent from mysqli injection  
        $username = stripcslashes($username);  
        $password = stripcslashes($password);  
        $username = mysqli_real_escape_string($con, $username);  
        $password = mysqli_real_escape_string($con, $password);  
      
        $sql = "select *from client where username = '$username' and password = '$password'";  
        $result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
              

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
    height: 35%;
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


    <title>Login Page</title>  
     <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
</head>  
<body>     <div id = "frm">  
        <h1>LOGIN</h1>  
        <form name="f1" action = "PrimaPagina.php" onsubmit = "return validation()" method = "POST">  
        
         <div box>
        
            <p>  
                <label> USERNAME: </label>  
                <input type = "text" id ="user" name  = "user" />  
            </p>  
            <p>  
                <label> PASSWORD: </label>  
                <input type = "password" id ="pass" name  = "pass" />  
            </p>  
            <p>     
                <input type =  "submit" id = "btn" value = "Login" />  
               
            </p> 
            </div>
               <p1>
           <?php     
           if($count == 1){  
        echo "conectare reusita";
            header("location: authentification.php");
        }  
        else{  
            echo "Conectare nereusita!Username sau Parola gresita!" ;
        }  
       if($username=="admin" && $password=="admin123"){
            header('Location: admin.php');
            die();
        }
    ?>
          </p1>
        
        
        </form> 
    
    </div> 
 </body>
</html> 



