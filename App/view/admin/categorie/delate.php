<?php
session_start();
require __DIR__ . '/../../../../vendor/autoload.php'; 
use App\controller\CategorieC;
if ( $_SESSION["userrole"]!="Administrateur") {
  
    session_destroy();
    header("Location: ../auth/logIn.php"); 
    exit(); 
 }?>

if (isset($_GET['id'])) {
    $categorie = new CategorieC();
    $categorie->daletCategorieController($_GET['id']);
    header("Location: ./index.php");
    exit(); 
}
    ?>