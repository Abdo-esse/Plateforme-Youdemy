<?php 
namespace App\controller;
require __DIR__ . '/../../vendor/autoload.php';  
use App\class\Cours;
 

class CoursConroller
{
    
   public function ajouterCours($titre="",$photoCouverture="",$description="",$idCategorie="",$idEnseignant="",$nomberChapitre="",$duree="",$prix="",$tags=[],$urlContenu="",$id=null)
   {
      $coursVedio= new Cours($titre,$photoCouverture,$description,$idCategorie,$idEnseignant,$nomberChapitre,$duree,$prix,$tags,$urlContenu,$id=null);
      $coursVedio->addAction();
   }
   public function afficherCours()
   {
      $coursVedio= new Cours();
      return $coursVedio->readAll();
   }
  

}