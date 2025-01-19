<?php
namespace App\controller;
require __DIR__ . '/../../vendor/autoload.php';  
use App\class\Enseignant;
use App\Class\Role; 

class EnseignantController
{
    private Enseignant $enseignantModel;

   
    

    public function __construct( $nom, $email, $password,Role $role,$id=null){
       
        $this->enseignantModel=new Enseignant(  $nom, $email, $password,$role,$id=null);
       
    }
   
   

    
}