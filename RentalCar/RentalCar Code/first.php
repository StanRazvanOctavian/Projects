<style>*{
    margin: 0;
    padding: 0;
    font-family: 'Poppins', sans-serif;
}
.header{
    min-height: 160vh;
    width: 100%;
    background-size:cover;
    background-position: center;
    position:sticky;
    
}
nav{
    display: flex;
    padding: 2% 6%;
    justify-content: space-between;
    align-items: center;
    
}
nav img{
    width: 150px;
    
}
.nav-links{
    flex: 1;
    text-align: right;
}
.nav-links ul li{
    list-style: none;
    display: inline-block;
    padding: 8px 12px;
    position: relative;
    
}
.nav-links ul li a{
    
    color: #fff;
    text-decoration: none;
    font-size: 13px;
}
.nav-links ul li ::after{
    content: '';s
    width: 0%;
    height: 2px;
    background: #FF7433;
    display: block;
    margin: auto;
    transition: 0.5s; 
    
}
.nav-links ul li :hover::after{
        width: 100%;

}
.text-box{  
    width:90%;
    color: black;
    position:absolute;
    top: 25%;
    left: 50%;
    transform: translate(-50%,-50%);
    text-align: center;
    
}
.text-box h1{
    font-size: 62px;
    
}
.text-box p{
    margin: 10px 0 40px;
    font-size: 14px;
    color:black;
}
.hero-btn{
    display: inline-block;
    text-decoration: none;
    color:#fff;
    border: 1px solid #fff;
    padding: 12px 34px;
    font-size: 13px;
    background: transparent;
    position: relative;
    cursor:pointer;
}
.hero-btn:hover{
    border: 1px solid #FF7433;
    background: #FF7433;
    transition: 1s;
}
@media(max-width:700px){
    .text-box h1{
    font-size: 20px; 
}
    .nav-links ul li{
        display: block;
        
    }
    .nav-links {
        position:absolute;
        background: #FF7433;
        height:100vh;
        width:200px;
        top: 0;
        right: 0;
        text-align: left;
        z-index: 2;
    }
}
.course{
    width 80%;
    margin:auto;
    text-align: center;
    padding-top: 100px; 
}
h1{
    font-size: 36px;
    font-weight: 600;
}

p{
    color: #777;
    font-size: 14px;
    font-weight: 300;
    line-height: 22px;
    padding: 10px;
    
}
.row{
    
    margin-top: 5%;
    display: flex;
    justify-content: space-between;
    
}
.course-col{
    flex-basis: 31%;
    background: #fff3f3;
    border-radius: 10px;
    margin-bottom: 5%;
    padding: 20px 12px;
    box-sizing: border-box;
    transition: 0.5s;
    
}
h3{
    text-align: center;
    font-weight: 600;
    margin: 10px 0;
}
.course-col:hover{
    box-shadow: 0 0 20px 0px rgba(0,0,0,0.2);
}
@media(max-width: 700px){
    .row{
        flex-direction : column;
    }
}
    body{
        background-image: url(pr5.jpg);
        background-size: cover;
        background-repeat: no-repeat;
         background-color: transparent !important;
        position:fixed;
        top: 0;
        left: 0;
        width: 100%;
            height:100%;
        max-width:2500px;
        max-height:1500px;
    z-index:1;
    }

</style>





<!DOCTYPE html>
<html>
<head>
   <meta name="viewport" content="with=device-width, initial scale 1.0">
    <title>Rent A Car</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
</head>
<body>
   <section class="header">
   <nav>
       <div class="nav-links">
       <ul>
           <li><a href="">ACASA</a></li>
           <li><a href="">DESPRE NOI</a></li>
           <li><a href="">LOCATIE SEDIU</a></li>
           <li><a href="">CONTACTE</a></li>
           <li><a href="">NOUTATI</a></li>
       </ul>
       </div>    
   </nav>
 <div class="text-box">
    <h1>Rent A Car</h1>
    <p>Inchiriaza o masina, cel mai aproape de tine! </p>
    <a href="SignUp.php" class="hero-btn">SIGN UP</a> 
     <a href="PrimaPagina.php" class="hero-btn">LOGIN</a>
    </div>
     </section>
    </body>    
</html>