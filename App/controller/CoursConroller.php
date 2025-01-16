<?php 
namespace App\controller;
require __DIR__ . '/../../vendor/autoload.php';  
use App\class\CoursVedio;
use App\Class\CoursTexte; 

class CoursConroller
{
    
   public function ajouterCoursVedio($titre,$photoCouverture,$description,$idCategorie,$enseignant,$nomberChapitre,$duree,$prix,$tags,$urlContenu,$id=null)
   {
      $coursVedio= new CoursVedio($titre,$photoCouverture,$description,$idCategorie,$enseignant,$nomberChapitre,$duree,$prix,$tags,$urlContenu,$id=null);
      $coursVedio->ajouter();
   }
   public function ajouterCoursText($titre,$photoCouverture,$description,$idCategorie,$enseignat,$nomberChapitre,$duree,$prix,$tags,$texteContenu,$id=null)
   {
    $coursVedio= new CoursTexte($titre,$photoCouverture,$description,$idCategorie,$enseignat,$nomberChapitre,$duree,$prix,$tags,$texteContenu,$id=null);
    $coursVedio->ajouter();
   }

}