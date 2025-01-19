<?php
namespace App\controller;
require __DIR__ . '/../../vendor/autoload.php';  
use App\class\Etudiant;
use App\Class\Role; 

class EtudiantController
{
    private Etudiant $etudiantModel;

   
    

    public function __construct( $nom, $email, $password,Role $role,$id=null){
       
        $this->etudiantModel=new Enseignant(  $nom, $email, $password,$role,$id=null);
       
    }

    public function inscriptionCoursController($idCours){
        $this->etudiantModel->inscriptionACours($idCours);

    }
   
   

    
}