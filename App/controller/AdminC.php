<?php
namespace App\controller;
require __DIR__ . '/../../vendor/autoload.php';  
use App\class\Admin;
use App\Class\Role; 

class AdminC
{
    private Admin $adminM;

   
    

    public function __construct( $nom, $email, $password,Role $role,$id=null){
       
        $this->adminM=new Admin(  $nom, $email, $password,$role,$id=null);
       
    }
   
    public function afficherComptesEnseignantsEnCoursConreller()
    {
        return $this->adminM->afficherComptesEnseignantsEnCours();
    }
    public function validerEnseignantConreller($id,$etatCompte){
        $this->adminM->validerEnseignant($id,$etatCompte);

    }
    public function gteUserConreller($idUser){
       return $this->adminM->gteUser($idUser);

    }
    public function gteAllUsersConreller()
    {
        return $this->adminM->gteAllUsers();
    }
    public function gestionUtilisateursConreller($id,$compteStatut)
    {
        $this->adminM->gestionUtilisateurs($id,$compteStatut);
    }
   

    
}