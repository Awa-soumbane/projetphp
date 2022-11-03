<?php
require_once '../dbase/dbase.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ESPACE ADMIN</title>
   <link rel="stylesheet" href=".css">
   <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">
<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/js/brands.min.js"
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
      
       </div>
       <div class="menu">
       
        <button id="bout"> Liste eleve </button>
       <button id="bot"> <a href="dearchi.php">Liste Archivage </a> </button>
       
       </div>
       <form>
        
       <div class="recher">
        <label for=""></label>
        <input type="search" id="site-search" name="q">
        <button id="rech"> Recherche </button> 
       <?php
    /*  traitement bare de recherche */
        /* $eleves = [];
        $sql = "SELECT * FROM User where archive=0 and (nom like '%$recherche%' or prenom like  '%$recherche%'  or email like '%$recherche%'  or roles like '%$recherche%'  or matricule like '%$recherche%') ORDER BY id DESC" ;
           $reponse = $this->conn->query($sql);
           if ($reponse->rowCount() > 0) {
               $eleves = $reponse->fetchAll();

           } */
           /* else (isset($_GET["recherche"]))
           {
            $eleves = $eleveRepo->recherche($_GET["recherche"]);
            }  */  
          /*  return $eleves; */
      
       ?>
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
            /* liste des eleves inscrit */
                include("../dbase/dbase.php");
      
                $list = "SELECT * FROM User WHERE etat=0";
                $result = $conn->query($list);
                while($data = $result->fetch()){
                    $id = $data["id"];
                    $prenom = $data["prenom"];
                    $nom = $data["nom"];
                    $email = $data["email"];
                    $roles = $data["roles"];
                    $matricules = $data["matricule"];
                    $etat = $data["etat"];
                    if($etat==0){
                    echo "<tr><td>$prenom</td><td>$nom</td><td>$email</td><td>$roles</td><td>$matricules</td>";
                    echo "<td style='display:flex; gap: 20px; justify-content:center;'>";
                    echo "<a href='admin.php?id=$id'><i class='fa-solid fa-repeat'></i></a>";
                    echo "<a href='../vus/modification.php?modif=$id'><i class='fa-solid fa-pen-to-square'></i></a>";
                    echo "<a href='admin.php?archive=$id'><i class='fa-solid fa-box-archive'></i></a>";
                    
                    echo "</td";
                    echo "</tr>";
                    }
                }
                //code pour archiver en changeant la valeur 0 par 1 avec 1=archiver et 0=dearchiver
         if (isset($_GET['archive'])) {
              $id=$_GET['archive'];
             /*  $elev= SELECT * FORM User */
  $req=$conn->query("UPDATE User SET etat='1' WHERE id='$id'");

      header('location:admin.php');
   
   
}
/* modification de l'eleve */

/* 
if(isset($_GET['modif'])){
 
    $ID =$_GET['modif'];
    $stmt=$conn->prepare("SELECT * FROM User where id='$ID'");

    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        $check=$stmt->fetchAll()[0];
    }
     
if(isset($_POST['nom'],$_POST['prenom'],$_POST['email'])){


	$nom=$_POST['prenom'];	
    $prenom=$_POST['nom'];
    $email=$_POST['email'];			
  
    $ID=$_GET['modif'];	
    $datemodif=date('y-m-d h:i:s');
 
    $stmtAjoutPersonne=$bdd->prepare("UPDATE User SET pernom='$pernom',nom='$nom',email='$email', date_modif='$datemodif' WHERE id=$ID");
    $stmtAjoutPersonne->execute();
    if($stmtAjoutPersonne){
        header('location:/admin.php? modif=modification réussie');
    }else { die('Erreur : '.$e->getMessage());}
   
}

}
 */


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


































/* <!-- <div class="img">
    <div class=aligne> -->
   <!--      <div ci>
       <img src="image/photo.jpg" alt="">
       </div>


    <a href="">Deconnecter</a>
        
        
        
    </div>
</div>
 <table class="tableau-style">

<thead>
    <tr>
    <th>prenom</th>
    <th>nom</th>
    <th>email</th>
    <
       </tr>
</thead>
<tbody>
    <tr>
        <td>Awa</td>
        <td>Awa</td>
        <td>Awa</td>
        <td>Awa</td>
        <td>Awa</td>
    </tr>  
</tbody>

</table> 
</body>

<style>
    *, ::before, :: after{
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    } .img{
        background: blue;
         border: 2px solid ;
         height: 200px;
    }
    body{
        height: 100vh;
        font-family: Arial,Helvetica, sans-serif;
    }
    
    .tableau-style{
        border-collapse: collapse;
        min-width: 400px;
        width: auto;
box-shadow: 0  5px 50px rgba(0);
cursor: pointer;
margin: 100px auto;
border: 2px solid ;

    }
    thead tr {
        background-color: blue;
        color: #fff;
text-align: left;
    }
    th; td{
        padding: 15px 20px;

    }
    tbody tr, td, th{
        border: 1px solid #ddd;
    }
    tbody tr:tmth-child(event){
        background-color: #f3f3f3;
    }
    
     .aligne{
 
     }
     a{
        color: white;
  text-align: center;
  font-size: 30px;
  margin-right: -1600px;
  margin-top: -20px
     }
</style> --> */