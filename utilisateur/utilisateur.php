<?php
session_start();
require_once '../dbase/dbase.php';
$articles;
$articles=$conn->query('SELECT nom FROM User ORDER BY id DESC');

$sql= $conn->prepare("SELECT * FROM User WHERE email=?");
$sql->execute(array($_SESSION['email']));
$user = $sql->fetch();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Utilisateur</title>
   <link rel="stylesheet" href=".css">
   <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">
<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/js/brands.min.js"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>
<body>
<header class="pages">
<span><a href="../CONNEXION/connection.php"><i class="fa-solid fa-right-to-bracket"id="iconn" >deconnecter</i></a></span>
<h3 style="color:white ;"> ESPACE Utilisateur</h3>
<img src="data:image/jpg;base64,<?= base64_encode($_SESSION['photo']) ?>" alt="">
       <p> <?php echo $user['prenom'] ?> <?php echo $user['nom'] ?></p>
       <p> <?php echo $user['matricule'] ?></p>
        <div class="menu">
      
       
       </div>  
        
</header>
<form method="GET">
        
        <div class="recher">
         <label for=""></label>
         <input type="search" id="site-search" name="q">
         <button id="rech" name="valider"> Recherche </button> 
         </form>
    
       </div>
    <div class="contrainer">
        <table>
          <thead>
            <tr id="items">
                <th>Nom</th>
                <th>Prenom</th>
                <th>Email</th>
                <th>Role</th>
                   <th>Matricule</th>
                      <th>Date_ins</th>
            </tr>
            </thead>
            <tbody>

            <?php
            /* liste des eleves inscrit */
              /*   include("../dbase/dbase.php");
      
                $list = "SELECT * FROM User WHERE etat=0";
                $result = $conn->query($list); */
                include("../dbase/dbase.php");
      
                $list = "SELECT * FROM User WHERE etat=0";
                $result = $conn->query($list);
            /*  /traitement recherche / */
  if(isset($_GET['valider']) && !empty($_GET['q'])){/* permet d'effecter la recherche */
    $q= $_GET['q'];
$result=$conn->query('SELECT * FROM User where nom LIKE "%'.$q.'%" ORDER BY id DESC');
  }
                  /*  /listes/ */
                while($data = $result->fetch()){
                    $id = $data["id"];
                    $nom = $data["nom"];
                    $prenom = $data["prenom"];
                    $email = $data["email"];
                    $roles = $data["roles"];
                    $matricules = $data["matricule"];
                    $date = $data["date_ins"];
                   /*  if($etat==0){ */
                    echo "<tr>
                    <td>$nom</td>
                    <td>$prenom</td>
                    <td>$email</td>
                    <td>$roles</td>
                    <td>$matricules</td>
                    <td>$date</td>";
                    echo "<td style='display:flex; gap: 20px; justify-content:center;'>";
                 
                     
                   "</tr>";
                    }
              /*   } */
                //code pour archiver en changeant la valeur 0 par 1 avec 1=archiver et 0=dearchiver
         if (isset($_GET['archive'])) {
              $id=$_GET['archive'];
             /*  $elev= SELECT * FORM User */
  $req=$conn->query("UPDATE User SET etat='1' WHERE id='$id'");

      header('location:admin.php');
   
   
}


                ?>
            </tbody>
  
        </table>
   
        </body>














    <style>

   table {
  
  color: #404040;
  display: block;
  justify-content: center;
  margin: 5px 90px; 
}
th{
  font-size:  30px;
  border-bottom: 3px solid #ffcb61;
  padding: 5px 10px;

  border: 2px solid;


}
td{
  margin: 0px; 
 /*  font-weight: 400; */
  padding: 2px 10px;
  font-size: 20px;
  border: 2px solid;
  height: 40px; 
}
  img
{
  height: 70px;
  width: 200px;
    margin-top: -95px;
    border-radius: 60%; 
    

} 
tr:nth-child(2n){
background-color: #f6f8f8;

}tr:nth-child(2n){
  border-bottom: 1px solid #e0e0e0;
  border-top: 1px solid #e0e0e0; 
  
  }
 /*  .font{
      background-color: blue;
      height: 130px;
    
  }
  . */.contrainer{
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
  
  #rech{
    width: 20%;
    height: 40px;
    background-color:  blue;
    font-size: 20px;
   
    padding-left: 5px;
  }
  #iconn{
    display: flex;
  justify-content: center;
  margin-left: 80%;
  margin-top: 12px;
  width: 80px;
  color: black;
  }.pages{
    width: 100%;
    height: 200px;
    border: 2px solid;
    background-color:  blue;
  }
   h3{
    display: flex;
  justify-content: center;
  font-size: 30px;
  color:  write;
 /*  margin-bottom: -120px; */

  } p{
    margin-top: -10px;
    font-size: 20px;
  }
  .menu{
  
  width: 100%;
  height: 40px;
  display: flex;
justify-content: center;
padding-left: 500px;
margin-top: -20px;;
}#bout{
  width: 15%;
  height: 40px;
 
  font-size: 20px;

}
#bot{
  width: 15%;
  height: 40px;

  font-size: 20px;
} 
/* span{
  width: 40%;
  height: 40px;
} */
a{
  color: black;
  display: flex;
justify-content: center;
}
    </style>

</html>