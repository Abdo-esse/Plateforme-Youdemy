<?php 
session_start();
require __DIR__ . '/../../../vendor/autoload.php';
use App\controller\EtudiantController;
use App\class\Role;
if ( $_SESSION["userrole"]!="Etudiant") {
  
   session_destroy();
   header("Location: ../auth/logIn.php"); 
   exit(); 
   }
  if(isset($_GET['id'])){
    $id=$_GET['id'];
    $roleEtudiant= new Role(3);
    $etudiant= new EtudiantController( $_SESSION["userName"],$_SESSION["useremail"],"",$roleEtudiant, $_SESSION["userid"]);
    $etudiant->inscriptionCoursController($id);
    
    header("Location: ../index.php");
    exit();
   

  }



?>