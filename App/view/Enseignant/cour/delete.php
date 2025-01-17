<?php 
session_start();
require __DIR__ . '/../../../../vendor/autoload.php'; 
use App\controller\CoursConroller;

if ( $_SESSION["userrole"]!="Enseignant") {
  
    session_destroy();
    header("Location: ../auth/logIn.php"); 
    exit(); 
 }
 
if (isset($_GET["id"]))
{
    $id=$_GET["id"];
    $deleteCour=new CoursConroller();
    $deleteCour->daleteCours($id);
    header("Location: ./index.php");
    exit();
}


?>