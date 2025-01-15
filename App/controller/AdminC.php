<?php
namespace App\controller;
require __DIR__ . '/../../vendor/autoload.php';  
use App\class\Admin;
use App\Class\Role; 

class AdminC
{
    protected $id;
    protected $nom ;
    protected $email;
    protected $password ;
    protected Role $role;
    protected Admin $adminM;

   
    

    public function __construct( $nom, $email, $password,Role $role,$id=null){
        $this->id=$id;
        $this->nom=$nom;
        $this->email=$email;
        $this->password=$password;
        $this->role=$role;
        $this->adminM=new Admin(  $this->nom,$this->email, $this->password, $this->role, $this->id);
       
    }
   
    public function afficherComptesEnseignantsEnCoursConreller()
    {
        return $this->adminM->afficherComptesEnseignantsEnCours();
    }
    public function validerEnseignantConreller($id,$etatCompte){
        $this->adminM->validerEnseignant($id,$etatCompte);

    }
    public function gteEnseignantConreller($idEnseignant){
       return $this->adminM->gteEnseignant($idEnseignant);

    }
    public function gteAllUsersConreller()
    {
        return $this->adminM->gteAllUsers();
    }
   

    
}