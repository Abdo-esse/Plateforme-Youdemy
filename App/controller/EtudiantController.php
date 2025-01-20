<?php
namespace App\controller;
require __DIR__ . '/../../vendor/autoload.php';  
use App\class\Etudiant;
use App\Class\Role; 

class EtudiantController
{
    private Etudiant $etudiantModel;

   
    

    public function __construct( $nom, $email, $password,Role $role,$id){
       
        $this->etudiantModel=new Etudiant(  $nom, $email, $password,$role,$id);
       
    }

    public function inscriptionCoursController($idCours){
        $this->etudiantModel->inscriptionACours($idCours);

    }
    public function getCoursInscrireController(){
        return $this->etudiantModel->getCoursInscrire();

    }
   
   

    
}