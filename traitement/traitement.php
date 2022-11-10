<?php
//connexion du base de donné Mysql
try{
     $conn = new PDO("mysql:host=localhost;dbname=Inscription", "root", "aaaa");

}catch(PDOException $e){
     die('erreur : ' .$e->getMessage());
}
/* affichages bdonne */
 
if (isset( $_POST["nom"], $_POST["prenom"], $_POST["email"], $_POST["password"],  $_POST["roles"])){ 
     // var_dump( $_POST["nom"], $_POST["prenom"], $_POST["email"], $_POST["password"],  $_POST["roles"],$_POST["photo"]);

     $nom = $_POST['nom']; 
     $prenom = $_POST['prenom']; 
     $email = $_POST['email'];
     $password= $_POST['password']; 
     $role =$_POST['roles'];
           /* /photo/ */
     if (!empty($_FILES['photo'])) {
          $photo = file_get_contents($_FILES['photo']['tmp_name']) ?? null;
     } 

                /*   matricule */
     $sql =  "SELECT matricule from User";
     $mat;
     $res = $conn->query($sql);
     if ($res->rowCount() > 0) {
         $matricules = $res->fetchAll();
         $matricule = $matricules[count($matricules) - 1]['matricule'];
         $increment = (int) explode("/", $matricule)[1] + 1;
         $mat = "SN-1234/$increment";
         
     }

    
$sql= $conn->prepare('SELECT * FROM User WHERE email=?');
$sql->execute(array($email));
$data=$sql->fetch();
$row=$sql->rowCount();
if($row == 0){

     $stmt=$conn->prepare("INSERT INTO User( nom, prenom, email, roles,matricule, mdp, photo) VALUES (?,?,?,?,?,?,?)");
/* /recuperer les données/ */
     $stmt->bindParam(1, $nom);
     $stmt->bindParam(2, $prenom);
     $stmt->bindParam(3, $email);
     $stmt->bindParam(4, $role);
     $stmt->bindParam(5, $mat);
     $stmt->bindParam(6, password_hash($password, PASSWORD_BCRYPT));
     $stmt->bindParam(7, $photo);
     $stmt->execute(); 

     header('location: ../vus/inscript.php');
     exit;
}else{  
     $erreur["erreur_compte"] = " Compte deja existant";
     header('location: ../vus/inscript.php?erreur_compte='.$erreur["erreur_compte"].'');
     exit; 

}



  
      } 
    /*   / date modif/ */
     /*  else {
        $date_modif = date('y-m-d');
        $sql = "UPDATE User SET nom='$nom', prenom='$prenom', email='$email', mdp='$password', roles='$role', date_modif='$date_modif' WHERE id=$edit_id";
        $conn->exec($sql);
      
 } */
     
    
     ?>
     
    
    