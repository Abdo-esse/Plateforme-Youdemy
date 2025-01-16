<?php
namespace App\controller;
require __DIR__ . '/../../vendor/autoload.php';  
use App\class\Enseignant;
use App\Class\Role; 

class EnseignantConroller
{
    private Enseignant $enseignantModel;

   
    

    public function __construct( $nom, $email, $password,Role $role,$id=null){
       
        $this->enseignantModel=new enseignantModel(  $nom, $email, $password,$role,$id=null);
       
    }
   
    // public function afficherComptesEnseignantsEnCoursConreller()
    // {
    //     return $this->adminM->afficherComptesEnseignantsEnCours();
    // }
    // public function validerEnseignantConreller($id,$etatCompte){
    //     $this->adminM->validerEnseignant($id,$etatCompte);

    // }
    // public function gteUserConreller($idUser){
    //    return $this->adminM->gteUser($idUser);

    // }
    // public function gteAllUsersConreller()
    // {
    //     return $this->adminM->gteAllUsers();
    // }
    // public function gestionUtilisateursConreller($id,$compteStatut)
    // {
    //     $this->adminM->gestionUtilisateurs($id,$compteStatut);
    // }
   

    
}