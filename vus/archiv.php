<?php
include('../dbase/dbase.php');
include("../admin/admin.php");
//code pour archiver en changeant la valeur 0 par 1
if (isset($_GET['archive'])) {
    $id=$_GET['archive'];
/*  $elev= SELECT * FORM User */
    $req=$conn->query("UPDATE User SET etat='1' WHERE id='$id'");

        /* header('location:../admin/admin.php'); */
     
     
}
?>