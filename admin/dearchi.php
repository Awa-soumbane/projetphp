<?php
require_once '../dbase/dbase.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dearchivages</title>
   <link rel="stylesheet" href=".css">
   <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">
<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/js/brands.min.js">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>
<body>
       <div class="font">
       <h3>ESPACE ADMIN</h3>
        <img src="image/photo.jpg" alt="">
        <p>AWA Soumbane
          SN-1234
        </p>
     <!--    
      <div class="dec">
        <span>Deconnexion</span>
    </div>  -->
      <a href=""><i class="fa-regular fa-inbox-out" id="icon" ></i></a>
       </div>
       <div class="menu">
       
        <button id="bout">Utilisateur</button>
       <button id="bot"> Liste Déarchivage </button>
       
       </div>
       <form>
        
       <div class="recher">
        <label for=""></label>
        <input type="search" id="site-search" name="q">
        <button id="rech"> Recherche </button> 
       
        </form>
       </div>
    <div class="contrainer">
        <table>
          <thead>
            <tr id="items">
                <th>Prenom</th>
                <th>Nom</th>
                <th>Email</th>
                <th>Role</th>
                   <th>Matricule</th>
                      <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
            
                include("../dbase/dbase.php");
       /* liste des eleves inscrit */
                $list = "SELECT * FROM User WHERE etat=1";
                $result = $conn->query($list);
                while($data = $result->fetch()){
                    $id = $data["id"];
                    $prenom = $data["prenom"];
                    $nom = $data["nom"];
                    $email = $data["email"];
                    $roles = $data["roles"];
                    $matricules = $data["matricule"];
                    $etat = $data["etat"];
                    if($etat==1){
                    echo "<tr><td>$prenom</td><td>$nom</td><td>$email</td><td>$roles</td><td>$matricules</td>";
                 
                    echo "<td><a href='admin.php?dearchive=$id'><i class='fa-solid fa-pen-to-square'></i><i class='fa-solid fa-folder-xmark'></i></a>";
                    
                    echo "</td";
                    echo "</tr>";
                    }
                }
                //code pour archiver en changeant la valeur 0 par 1
if (isset($_GET['dearchive'])) {
  $id=$_GET['dearchive'];
/*  $elev= SELECT * FORM User */
  $req=$conn->query("UPDATE User SET etat='0' WHERE id='$id'");

      header('location:dearch.php');
   
   
}
                ?>
            </tbody>
  
        </table>
    </div>

    </body>
    <style>

   table {
  
  color: #404040;
  display: block;
  justify-content: center;
}
th{
  font-size:  30px;
  border-bottom: 3px solid #ffcb61;
  padding: 5px 20px;
  font-weight: 500;
  border: 2px solid;
  padding: 5px 60px;
  margin: 5px 90px;

}
td{
  
  font-weight: 400;
  padding: 5px 30px;
  font-size: 20px;
  border: 2px solid;
  height: 70px;

}
img
{
  height: 25px;

}tr:nth-child(2n){
background-color: #f6f8f8;

}tr:nth-child(2n){
  border-bottom: 1px solid #e0e0e0;
  border-top: 1px solid #e0e0e0; 
  
  }
  .font{
      background-color: blue;
      height: 130px;
    
  }
  .contrainer{
    width: 100%;
    display: flex;
  justify-content: center;
  }
  .recher{
    background-color:  #ffff;
    border-top: 40px solid #ffff;
    height: 60px;
    gap: 12px;
    display: flex;
    padding-left: 900px
  }
  #site-search
  {
    width: 50%;
    height: 30px;
    border: 2px solid;
    
  }
  form{
  ;
  }
  #rech{
    width: 20%;
    height: 40px;
    background-color:  blue;
    font-size: 20px;
   
    padding-left: 5px;
  }
  h3{
    display: flex;
  justify-content: center;
  font-size: 20px;
 /*  margin-bottom: -120px; */

  }
  
  .dec{
    margin-bottom: 70px;
    color: #ffff;
  } .font img{
    width: 10%;
    height: 90px;
    border-radius: 100px;
    
  } 
  img{
    margin-top: -40px;
    padding-left: 10px;
  }
  .menu{
  
    width: 100%;
    height: 40px;
    display: flex;
  justify-content: center;
  padding-left: 260px;
 
  }#bout{
    width: 30%;
    height: 40px;
   
    font-size: 20px;
  
  }
  #bot{
    width: 30%;
    height: 40px;
 
    font-size: 20px;
  }
  span{
   
  }

    </style>
 </body>
</html>
