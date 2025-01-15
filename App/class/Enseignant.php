<?php 
namespace App\class;
require __DIR__ . '/../../vendor/autoload.php'; 
use App\model\Crud;


class Enseignant extends User
{
    private $etatCompte;


    public function __construct($nom, $email, $password, Role $role,$etatCompte= null, $id = null)
    {
        parent::__construct($nom, $email, $password, $role, $id);
        $this->etatCompte = $etatCompte;
      }

    public function getEtatCompte(){ return $this->etatCompte;  }
    public function setEtatCompte($etatCompte){ $this->etatCompte = $etatCompte;}


    public function inscription (){
        $idEnseignant=Crud::createAction('users', $this->data);
        Crud::createAction('gestionEnseignants',["idEnseignant"=> $idEnseignant]) ;
 }
}