<?php
//connexion du base de donné Mysql
try{
     $conn = new PDO("mysql:host=localhost;dbname=Inscription", "root", "aaaa");

}catch(PDOException $e){
     die('erreur : ' .$e->getMessage());
}



// return $conn;
 
if (isset( $_POST["nom"], $_POST["prenom"], $_POST["email"], $_POST["password"],  $_POST["roles"],$_POST["photo"])){ 
     // var_dump( $_POST["nom"], $_POST["prenom"], $_POST["email"], $_POST["password"],  $_POST["roles"],$_POST["photo"]);

     $nom = $_POST['nom']; 
     $prenom = $_POST['prenom']; 
     $email = $_POST['email'];

     $password= $_POST['password']; 
     $role =$_POST['roles'];
     $photo =$_POST['photo'];

     $insertion = $conn -> prepare("INSERT INTO User (nom, prenom, email, mdp, roles, photo) VALUE(?, ?, ?, ?, ?, ?)");
     $insertion -> execute (array($nom, $prenom, $email, $password, $role, $photo));
   
     
     $sql =  "SELECT matricule from User";
     $mat;
     $res = $conn->query($sql);
     if ($res->rowCount() > 0) {
         $matricules = $res->fetchAll();
         $matricule = $matricules[count($matricules) - 1]['matricule'];
         $increment = (int) explode("/", $matricule)[0] + 1;
         $mat = "SN-1234/$increment";
     }
      //insertion des donées dans la base
      $date_ins = date('y-m-d');
      $sql = "INSERT INTO User(/* matricule */, nom, prenom, email, mdp, roles, date_ins) VALUES (/* '$mat', */'$nom', '$prenom', '$email', '$role', '$date_ins')";
      
      //execution de la requete
      $conn->exec($sql);

      if ($sql) {
          header('location: ../vus/inscript.php');
          exit;
      }

  
      } else {
        $date_modif = date('y-m-d');
        $sql = "UPDATE User SET nom='$nom', prenom='$prenom', email='$email', mdp='$password', roles='$role', date_modif='$date_modif' WHERE id=$edit_id";
        $conn->exec($sql);
      
      }
     
    
     ?>
     
    
    