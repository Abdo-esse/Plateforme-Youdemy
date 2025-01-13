<?php 
namespace App\class;
require __DIR__ . '/../../vendor/autoload.php'; 
use App\model\Crud;


class Enseignant extends User
{
    private $statue;


    public function __construct($nom, $email, $password, Role $role,$statue= null, $id = null)
    {
        parent::__construct($nom, $email, $password, $role, $id);
        $this->statue = $statue;
      }

    public function getStatue(){ return $this->statue;  }
    public function setStatue($statue){ $this->statue = $statue;}


    public function inscription (){
        $idEnseignant=Crud::createAction('users', $this->data);
        Crud::createAction('gestionEnseignants',["idEnseignant"=> $idEnseignant]) ;
 }
}