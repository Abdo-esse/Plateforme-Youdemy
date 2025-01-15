<?php
session_start();

    if ($_SESSION["userrole"]!="Administrateur") {

    }
     require __DIR__ . '/../../../../vendor/autoload.php'; 
     use App\Class\Role; 
     use App\Class\Enseignant; 
    use App\controller\AdminC;
    if(isset($_GET["id"]))
    {
        $etatCompte="accepter";
     $idEnseignant=$_GET["id"];
     $roleAdmin = new Role(1);
     $admin= new AdminC( $_SESSION["userName"],$_SESSION["useremail"],"",$roleAdmin);
     $enseignantData= $admin->gteEnseignantConreller($idEnseignant);
     $roleEnseignant = new Role(2);
     $enseignant=new Enseignant($enseignantData->name,$enseignantData->email,"",$roleEnseignant,$etatCompte);
     $etatCompte=$enseignant->getEtatCompte();
     $admin->accepteEnseignantsConreller($enseignantData->id,$etatCompte);

     header("Location: ./index.php");
     exit(); 

    }