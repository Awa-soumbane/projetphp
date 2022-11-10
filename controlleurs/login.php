<?php
session_start();

//inclusion du script de connexion à la base de donnée
$conn = require_once('../dbase/dbase.php');
if (isset( $_POST["button"])){
     

if (isset( $_POST["email"]) && isset($_POST["password"])){
    $email = $_POST["email"];

    $pass= $_POST["password"]; 


    //récupération de l'utilisateur au niveau de la base de donnée
    $sql = "SELECT * FROM User WHERE email='$email'";
    $res = $conn->query($sql);
    $user = $res->fetch();
    /* var_dump($res->rowCount());
        exit; */
    if (count($user) > 0){
        //récupération des donnés sous forme de tableau

        //données récupéré de la base
        $password = $user['mdp'];

        //vérification mot de passe
         if (password_verify($pass, $password)){
            echo password_verify($pass, $password);
            $_SESSION["email"] = $user["email"];
            $_SESSION["roles"] = $user["roles"];
            $_SESSION["photo"] = $user["photo"];
            $_SESSION["nom"] =    $user["nom"];
            $_SESSION["prenom"] = $user["prenom"];
            $_SESSION["matricule"] = $user["matricule"];

        if($user["roles"] === "Administrateur" && $user ['etat']==0){ 
            header("Location: ../admin/admin.php");

        }elseif($user["roles"] === "Utilisateur" && $user ['etat']==0){
            header("Location:../utilisateur/utilisateur1.php");
        } 
        elseif($user['etat']==1)
        {
            $erreur["invalidMdp"] = " Vous etes deja archiver";
            header('location: ../CONNEXION/connection.php?erreur_mdp='.$erreur["invalidMdp"].'');
            exit; 
        }

    
        } else{
            $erreur["invalidMdp"] = "vous n'etes pas dans la base de donnée";
            header('location: ../CONNEXION/connection.php?erreur_mdp='.$erreur["invalidMdp"].'');
            exit; 
        }
      
            
        }
    }
}

 
