<?php 
session_start();
require __DIR__ . '/../../../../vendor/autoload.php'; 
use App\controller\CoursConroller;

if ( $_SESSION["userrole"]!="Enseignant" && $_SESSION["userrole"]!="Administrateur") {
  
    session_destroy();
    header("Location: ../auth/logIn.php"); 
    exit(); 
 }
 
if (isset($_GET["id"]))
{
    $id=$_GET["id"];
    $deleteCour=new CoursConroller();
    $deleteCour->daleteCours($id);
    if ($_SESSION["userrole"]=="Enseignant") {
        header("Location: ./index.php");
    exit();
    }
    if ($_SESSION["userrole"]=="Administrateur") {
        header("Location: ../../admin/cours/index.php");
    exit();
    }
    
}


?>