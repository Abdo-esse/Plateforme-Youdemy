<?php 
namespace App\controller;
require __DIR__ . '/../../vendor/autoload.php';  
use App\class\Cours;
 

class CoursConroller
{
   private $coursModel;

   public function __construct( $titre="",$photoCouverture="",$description="",$idCategorie="",$idEnseignant="",$nomberChapitre="",$duree="",$prix="",$idTags=[],$contenu="",$id=null)
    {
         $this->coursModel= new Cours($titre,$photoCouverture,$description,$idCategorie,$idEnseignant,$nomberChapitre,$duree,$prix,$idTags,$contenu,$id);

    }

   public function ajouterCours()
   {
     $this->coursModel->addAction();
   }

   public function afficherCours()
   {
     return  $this->coursModel->readAll();
   }
   public function publierCours($id,$isPublier)
   {
     $this->coursModel->setId($id);
     $this->coursModel->setPublier($isPublier);
     $this->coursModel->publier();
   }
   public function daleteCours($id)
   {
     $this->coursModel->setId($id);
     $this->coursModel->setDateDelete(date("Y-m-d"));
     $this->coursModel->daletAction();
   }
   public function readCour($id)
   {
     $this->coursModel->setId($id);
     return $this->coursModel->readOne();
   }
   public function updateCours()
   {
     
     $this->coursModel->updateAction();
   }
  

}