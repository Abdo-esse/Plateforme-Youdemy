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

   
    

    public function __construct( $nom, $email, $password,Role $role,$id=null){
        $this->id=$id;
        $this->nom=$nom;
        $this->email=$email;
        $this->password=$password;
        $this->role=$role;
       
    }
   
    public function afficherComptesEnseignantsEnCoursConreller()
    {
        $admin= new Admin(  $this->nom,$this->email, $this->password, $this->role, $this->id);
        return $admin->afficherComptesEnseignantsEnCours();
    }
   

    
}