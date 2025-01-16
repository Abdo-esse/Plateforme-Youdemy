<?php 

class CoursConroller
{
    
   public function ajouterCoursVedio($titre,$photoCouverture,$description,$idCategorie,$enseignat,
                                      $nomberChapitre,$duree,$prix,$tags,$urlContenu,$id=null)
   {
    $coursVedio= new CoursVedio($titre,$photoCouverture,$description,$idCategorie,$enseignat,
                                 $nomberChapitre,$duree,$prix,$tags,$urlContenu,$id=null);
    $coursVedio->ajouter();
   }
   public function ajouterCoursText($titre,$photoCouverture,$description,$idCategorie,$enseignat,
                                      $nomberChapitre,$duree,$prix,$tags,$texteContenu,$id=null)
   {
    $coursVedio= new CoursTexte($titre,$photoCouverture,$description,$idCategorie,$enseignat,
                                 $nomberChapitre,$duree,$prix,$tags,$texteContenu,$id=null);
    $coursVedio->ajouter();
   }

}