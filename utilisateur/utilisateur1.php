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
    <title>ESPACE ADMIN</title>
    <link rel="stylesheet" href="admn.css">
   <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/js/brands.min.js">

  <!--  <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/js/brands.min.js"
   
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
 -->         </head>
<body>
<!-- <body> -->
<header style="background-color:blue;"> 
<div class="header my-4">
  <div class=" profil ml-3">
       <img class="rounded-circle" src="data:image/jpg;base64,<?= base64_encode($_SESSION['photo']) ?>" alt="" style="width:100px; height:100px">
       <p> <?php echo $_SESSION['prenom'] ?> 
       <?php echo $_SESSION['nom'] ?></p>
       <p><?php echo $_SESSION['matricule'] ?></p>
  </div>
  <div><h3 class="text-center">UTILISATEUR</h3></div>
       <div class="end my-5">
       
        <!-- <button id="bout"><a href="../utilisateur/utilisateur.php">Utilisateur</a></button> -->
      
       <button type="button" class="btn btn-light">
       <a href="../vus/deconnection.php"><i class="fa-solid fa-right-to-bracket" ></i></a>
       </button> 
      </div> 
       </div>     
</header>
<main>
<!-- <div class="recher">
       <form method="GET">
        <label for=""></label>
        <input type="search" id="site-search" name="q">
        <button id="rech" name="valider"> Recherche </button> 
        </form>
   
     
       </div> -->

        <div class="container-fluid col-4" >
          <form class="d-flex" role="search" method="GET">
            <input class="form-control me-2" type="search" placeholder="Recherche" aria-label="Search" name="q">
            <button class="btn btn-outline-success"id="rech" name="valider" type="submit">Recherche</button>
          </form>
        </div>

        <table class="table  table-bordered w-75 my-4">
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
if (isset($_GET['page']) && !empty($_GET['page'])) {
  $currentPage = (int) strip_tags($_GET['page']);
}else{
  $currentPage=1;
}

$list = $conn->prepare("SELECT COUNT(*) AS nb_user FROM User WHERE etat=0");
$list->execute();

$result = $list->fetch();
$nbUser = (int) $result['nb_user'];

$parPage =6;
$pages = ceil($nbUser / $parPage);

$premier = ($currentPage * $parPage) - $parPage;


$list=$conn->prepare("SELECT * FROM User WHERE etat=0 ORDER BY id DESC LIMIT $premier, $parPage;");
$list->execute();

            /* liste des eleves inscrit */


            /*  /traitement recherche / */
  if(isset($_GET['valider']) && !empty($_GET['q'])){  /* permet d'effecter la recherche */
    $q= $_GET['q'];
$list=$conn->query('SELECT * FROM User where nom LIKE "%'.$q.'%" ORDER BY id DESC');
  } 
/*   <i class="fa-solid fa-user"></i> */
while($data = $list->fetch(PDO::FETCH_ASSOC)){
    $id = $data["id"];
    $nom = $data["nom"];
    $prenom = $data["prenom"];
    $email = $data["email"];
    $roles = $data["roles"];
    $matricules = $data["matricule"];
    $date = $data["date_ins"];
    $etat = $data["etat"];
   /*  if($etat==0){ */
    $matSession = $_SESSION['matricule'];
    /*   /supprimer le nom de l'utilisateur qui se connect/ */
      if($etat==0 && $matricules!=$matSession){
    echo "<tr>
    <td>$nom</td>
    <td>$prenom</td>
    <td>$email</td>
    <td>$roles</td>
    <td>$matricules</td>
    <td>$date</td>";
    }
   } 
//code pour archiver en changeant la valeur 0 par 1 avec 1=archiver et 0=dearchiver
if (isset($_GET['archive'])) {
$id=$_GET['archive'];
/*  $elev= SELECT * FORM User */
$req=$conn->query("UPDATE User SET etat='1' WHERE id='$id'");

header('location:admin.php');


}
                //code pour archiver en changeant la valeur 0 par 1 avec 1=archiver et 0=dearchiver
         if (isset($_GET['archive'])) {
              $id=$_GET['archive'];
             /*  $elev= SELECT * FORM User */
  $req=$conn->query("UPDATE User SET etat='1' WHERE id='$id'");
}
$date_ins = date('y-m-d');


                ?>
            </tbody>
  
        </table>

        <nav aria-label="Page navigation example">
        <ul class="pagination fixed-bottom justify-content-center">
          <li class="page-item  <?= ($currentPage == 1) ? "disabled" : "" ?>">
            <a class="page-link" href="?page=<?= $currentPage - 1 ?>">Precedent</a>
          </li>
          <?php
          for($page = 1; $page <= $pages; $page++) : ?>
            <li class="page-item <?= ($currentPage == $page) ? "active" : "" ?>">
              <a class="page-link" href="?page=<?= $page ?>"><?= $page ?></a>
            </li>
            <?php endfor ?>
            <li class="page-item  <?= ($currentPage == $pages) ? "disabled" : "" ?>">
            <a class="page-link" href="?page=<?= $currentPage + 1 ?>">Suivant</a>
          </li>
        </ul>
      </nav>

        </main>       








    <style>
  .header{
    display:flex;
    justify-content: space-between;
  }
  .table{
    margin-left: 10%;
 margin-top: 10%;
 border: 2px solid; 

  }
  .profil{
    margin-left: 5%;
  }
  .end{
    margin-right: 5%;
  }
 p{
    margin-top: -5px;
    font-size: 20px;
  }
  h3{

  font-size: 45px;
  color: white;

  }


  #rech{
    background-color:  blue;
    font-size: 20px;
  
  }
  </style>
    
    </body>
   </html>

