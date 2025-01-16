<?php
namespace App\class;
require __DIR__ . '/../../vendor/autoload.php'; 
use App\model\Crud;
use App\class\Enseignant;
use App\class\Cours;


class CoursVedio extends Cours 
{
    private $urlContenu;

    public function __construct($titre,$photoCouverture,$description,$idCategorie,Enseignant $enseignant,$nomberChapitre,$duree,$prix,$idTags,$urlContenu,$id=null)
    {                            
        parent::__construct($titre,$photoCouverture,$description,$idCategorie,$enseignant,$nomberChapitre,$duree,$prix,$idTags,$id);
        $this->urlContenu=$urlContenu;
        $this->data = array_merge($this->data, ["contenu" => $this->urlContenu]);
    }
    
    public function getData(){return $this->data;}
    public function ajouter()
    {
        $this->id=Crud::createAction('cours', $this->data);
        foreach($this->idTags as $idTag )
       {
        Crud::createAction('cours_tags',["idCours"=>$this->id,"idTags"=>$idTag]);
       }
    }
    public function afficher()
    {
        $this->id=Crud::createAction('cours', $this->data);
        foreach($this->idTags as $idTag )
       {
        Crud::createAction('cours_tags',["idCours"=>$this->id,"idTags"=>$idTag]);
       }
    }

   
}