<?php
namespace App\class;
require __DIR__ . '/../../vendor/autoload.php'; 
use App\model\Crud;


class CoursVedio extends Cours 
{
    private $urlContenu;

    public function __construct($titre,$photoCouverture,$description,$idCategorie,$enseignat,$nomberChapitre,$duree,$prix,$tags,$urlContenu,$id=null)
    {
        parent::__construct($titre,$photoCouverture,$description,$idCategorie,$enseignat,$nomberChapitre,$duree,$prix,$tags,$id);
        $this->urlContenu=$urlContenu;
        array_push($this->data,$this->urlContenu);
    }

    public function ajouter()
    {
        $this->id=Crud::createAction('cours', $this->data);
        foreach($this->idTags as $idTag )
       {
        Crud::createAction('cours_tags',["idCours"=>$this->id,"idTags"=>$idTag]);
       }
    }

   
}