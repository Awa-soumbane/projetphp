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
    /* var_dump($res->rowCount());
        exit; */
    if ($res->rowCount() > 0){
        //récupération des donnés sous forme de tableau
        $user = $res->fetchAll()[0];

        //données récupéré de la base
        $password = $user['mdp'];

        //vérification mot de passe
        if ($pass!==$password){
            //mot de passe incorrect
            $erreur["invalidMdp"] = "vous n'etes pas dans la base de donnée";
            header('location: ../CONNEXION/connection.php?erreur_mdp='.$erreur["invalidMdp"].'');
            exit;
        }
        else if($pass === $password && $user["roles"] === "Administrateur"){ 
    
        $_SESSION["email"] = $user["email"];
        $_SESSION["roles"] = $user["roles"];
        //vérification du statut de l'utilisateur

        
            header("Location: ../admin/admin.php");
        }else{
            header("Location: utiliteur/utilisateur.php");
        }
    }
}
}

