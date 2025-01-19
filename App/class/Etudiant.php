<?php 
namespace App\class;
require __DIR__ . '/../../vendor/autoload.php'; 
use App\model\Crud;



class Etudiant extends User
{
    


    public function inscriptionACours($idCours){
        $data=[
            "idEtudiant" => $this->id,
            "idCours" => $idCours
        ];
        Crud::createAction('inscription',$data);
    }
}
