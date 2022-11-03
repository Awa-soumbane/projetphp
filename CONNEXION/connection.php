<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Document</title>
 <link rel="stylesheet" href="connection.css">
</head>
<body> 
     <div>
    <img src="eva1.jpg" alt="" style=" width: 100%; height: 350px;object-fit: cover;">
</div>
           <div class="container w-50 p-3 col-md-5 mb-8">

            <h1>FORMULAIRE DE CONNEXION</h1>
    <form id="form" action="../controlleurs/login.php" method="POST" class="row g-3 d-flex justify-content-center no-wrap m-2 bg-light" >
     <?php
     if(isset($_GET["erreur_mdp"])){
        $erreur=$_GET["erreur_mdp"];
      
        echo "<p style='color:red'>".$erreur."</p>";
     }
    
     ?>
      <div class="col-md-12">
        <div class="input-control">
            <label for="email">Email</label>
            <input id="email" name="email" class=" p-3 rounded-0" type="email">
            <p class="error"></p>
            </div>
        </div>
      
        <div class="col-md-12">
        <div class="input-control">
            <label for="password">Password</label>
            <input id="password"name="password"  class=" p-3 rounded-0" type="password">
            <p class="error"></p>
        </div>
        </div>
        <input type="submit" value="CONNEXION" name="button" id="button">
        <a href="../vus/inscript.php">S'INSCRIRE</a>
    </form>
    
    <script src="connexion.js"></script>
</body>
<style>
    form{
        height: 430px;
    background-color: #ffcb61;
    padding: 35px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
    border-radius: 10px;
}#email{
    height: 50px;
    width: 100%;
    font-size: 80%;
}
#password{
    height: 50px;
    width: 100%;
}
#button{
    height: 50px;
    width: 50%;
    background-color: blue;
}

 h1 {
  color: #0f2027;
  text-align: center;
  font-size: 30px;
 /*  margin-left: 12px; */
}.input-control .error {
  color: #ff3860;
  font-size: 20px;
  height: 13px;
}label{
    font-size: 25px;  
} 
a{
text-decoration: none;
color: orange;
font-size: 20px;
margin-left: 1363px;
}
a:hover{
  color: blue;
}
p{
    text-align: center  
}

</style>
</html>
