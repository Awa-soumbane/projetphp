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

     if (!empty($_FILES['photo'])) {
          $photo = file_get_contents($_FILES['photo']['tmp_name']) ?? null;
     } 

    
$sql="SELECT email FROM User WHERE email='$email'";
$res=$conn->query($sql);
if($res->rowCount()>0){
     header("location: ../vus/inscript.php? messages=email déja pris");
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
     // $sql = "INSERT INTO User(matricule, nom, prenom, email, mdp, roles, date_ins) VALUES ('$mat', '$nom', '$prenom', '$email', '$role', '$date_ins')";
      //insertion des donées dans la base
      $date_ins = date('y-m-d');
      
      //execution de la requete
     //  $conn->exec($sql);
     $stmt=$conn->prepare("INSERT INTO User( nom, prenom, email, roles,matricule, mdp, photo) VALUES (?,?,?,?,?,?,?)");

     $stmt->bindParam(1, $nom);
     $stmt->bindParam(2, $prenom);
     $stmt->bindParam(3, $email);
     $stmt->bindParam(4, $role);
     $stmt->bindParam(5, $mat);
     $stmt->bindParam(6, $password);
     $stmt->bindParam(7, $photo);
     $stmt->execute(); 
     if ($stmt) {
          header('location: ../vus/inscript.php');
          exit;
      }


  
      } 
     //  else {
     //    $date_modif = date('y-m-d');
     //    $sql = "UPDATE User SET nom='$nom', prenom='$prenom', email='$email', mdp='$password', roles='$role', date_modif='$date_modif' WHERE id=$edit_id";
     //    $conn->exec($sql);
      
     //  }
     
    
     ?>
     
    
    