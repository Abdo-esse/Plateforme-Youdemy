<?php
session_start();
require __DIR__ . '/../../../../vendor/autoload.php'; 
use App\controller\TagC;
if ( $_SESSION["userrole"]!="Administrateur") {
  
    session_destroy();
    header("Location: ../auth/logIn.php"); 
    exit(); 
 }?> 

if (isset($_GET['id'])) {
    $tag = new TagC();
    $tag->daletTagController($_GET['id']);
    header("Location: ./index.php");
    exit(); 
}
    ?>