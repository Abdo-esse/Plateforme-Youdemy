<?php 
namespace App\class;
require __DIR__ . '/../../vendor/autoload.php'; 
use App\model\Crud;
use App\Config\Connexion;
use PDO;


class Admin extends User
{
    



    public function inscription (){
       //vide 
 }

    public function afficherComptesEnseignantsEnCours()
    {
       $conn = Connexion::connexion(); 
       $sql='SELECT users.name,users.id,users.email,users.dateCreation,gestionenseignants.id as enseignants 
             FROM users
             join gestionenseignants on gestionenseignants.idEnseignant=users.id
             WHERE users.idRole=2 and gestionenseignants.etatCompte="en cours"';
       $stmt=$conn->prepare($sql);
       $stmt->execute();
       return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

   
    public function validerEnseignant($id,$etatCompte)
    {
        Crud::updateAction('gestionenseignants', $id,["etatCompte"=>"$etatCompte"]);
    }
    public function gestionUtilisateurs($id,$compteStatut)
    {
        Crud::updateAction('users', $id,["compteStatut"=>"$compteStatut"]);
        
    }

    public function  courPlusEtudiants(){
        $conn = Connexion::connexion(); 
        $sql='SELECT MAX(nombre_etudiants) AS max_nombre_etudiants
              FROM (
              SELECT COUNT(inscription.idEtudiant) AS nombre_etudiants
              FROM cours
              JOIN inscription ON inscription.idCours = cours.id
              GROUP BY cours.id, cours.titre
              ) AS SubRequete;';
       $stmt=$conn->prepare($sql);
       $stmt->execute();
       return $stmt->fetch(PDO::FETCH_OBJ);
    }
}
