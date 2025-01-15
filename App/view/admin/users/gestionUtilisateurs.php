<?php
session_start();

    if ($_SESSION["userrole"]!="Administrateur") {

    }
     require __DIR__ . '/../../../../vendor/autoload.php'; 
     use App\Class\Role; 
     use App\Class\User; 
    use App\controller\AdminC;
    if(isset($_GET["id"]))
    {
        $compteStatut=$_GET["status"];
     $idUser=$_GET["id"];
     $roleAdmin = new Role(1);
     $admin= new AdminC( $_SESSION["userName"],$_SESSION["useremail"],"",$roleAdmin);
     $userData= $admin->gteUserConreller($idUser);
     print_r($userData);
     $roleUser = new Role($userData->idRole);
     $user=new User($userData->name,$userData->email,"",$roleUser,$userData->id,$compteStatut);
     $compteStatut=$user->getCompteStatut();
     $idUser=$user->getId();
     $admin->gestionUtilisateursConreller($idUser,$compteStatut);

     header("Location: ./index.php");
     exit(); 

    }