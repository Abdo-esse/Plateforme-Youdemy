<?php 
namespace App\class;
require __DIR__ . '/../../vendor/autoload.php'; 
use App\Classes\Utilisateur; 
use App\model\Crud;


class Recruteur extends User
{
    private $nomEntreprise;
    private $emailProfessionnel;
    private $dataRecruteur;


    public function __construct($nom, $email, $password, Role $role, $nomEntreprise, $emailProfessionnel, $id = null)
    {
        parent::__construct($nom, $email, $password, $role, $id);

        $this->nomEntreprise = $nomEntreprise;
        $this->emailProfessionnel = $emailProfessionnel;
        $this->dataRecruteur = [
            
            "name_entreprise" => " $this->nomEntreprise",
            "email_professionnel" => " $this->emailProfessionnel"
        ];
        
    }

    public function getNomEntreprise(){ return $this->nomEntreprise;  }
    public function getEmailProfessionnel(){ return $this->emailProfessionnel;  }
    public function getDataRecruteur(){ return $this->dataRecruteur;  }
    public function getidRecruteur(){ return $this->idRecruteur;  }

    public function inscription (){
        $idRecruteur=Crud::createAction('users', $this->data);
        Crud::createAction('info_recruteurs',array_merge($this->dataRecruteur,["id_recruteur"=> $idRecruteur]) );
 }
}