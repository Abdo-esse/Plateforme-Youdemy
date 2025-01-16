<?php
namespace App\class;
require __DIR__ . '/../../vendor/autoload.php'; 
use App\model\Crud;
use App\class\Enseignant;
use App\class\Cours;


class CoursTexte extends Cours 
{
    private $texteContenu;

    public function __construct($titre,$photoCouverture,$description,$idCategorie,$enseignat,$nomberChapitre,$duree,$prix,$tags,$texteContenu,$id=null)
    {
        parent::__construct($titre,$photoCouverture,$description,$idCategorie,$enseignat,$nomberChapitre,$duree,$prix,$tags,$id);
        $this->texteContenu=$texteContenu;
        $this->data = array_merge($this->data, ["contenu" => $this->texteContenu]);
    }

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