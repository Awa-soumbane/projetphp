<?php
require_once('../dbase/dbase.php');

if (isset($_GET['switeid'])) {
    $id = $_GET['switeid'];

    $req = $conn->prepare("SELECT * FROM User WHERE id = $id");
    $req->execute();

    if ($req->rowCount()>0) {
        $data = $req->fetchAll()[0];
        if ($data['roles'] === 'Administrateur') {
            $req = $conn-> prepare("UPDATE User SET etat_roles = 1, roles = 'Utilisateur' WHERE id = $id");
            $req->execute();
        }else{
            $req = $conn-> prepare("UPDATE User SET etat_roles = 0, roles = 'Administrateur' WHERE id = $id");
            $req->execute();
        }
    }
    if ($req) {
        header("Location:../admin/admin.php"); 
       
    }
}
?>