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
        $sql='SELECT cours.titre,cours.id ,cours.description,cours.photoCouverture, COUNT(inscription.idEtudiant) AS max_nombre_etudiants
              FROM cours
              JOIN inscription ON inscription.idCours = cours.id
              GROUP BY cours.id, cours.titre
              ORDER BY max_nombre_etudiants DESC
              LIMIT 1;';
       $stmt=$conn->prepare($sql);
       $stmt->execute();
       return $stmt->fetch(PDO::FETCH_OBJ);
    }
    public function  totalCour(){
        $conn = Connexion::connexion(); 
        $sql='SELECT COUNT(cours.id) as total_cours
        from cours
        where cours.isPublier= true and cours.dateDelete is null;';
       $stmt=$conn->prepare($sql);
       $stmt->execute();
       return $stmt->fetch(PDO::FETCH_OBJ);
    }
    public function  topEnseignants(){
        $conn = Connexion::connexion(); 
        $sql='SELECT users.name, COUNT(cours.id) AS nombre_cours
              FROM users
              JOIN cours ON cours.idEnseignant = users.id
              JOIN inscription ON inscription.idCours = cours.id
              GROUP BY users.id, users.name
              ORDER BY nombre_cours DESC
              LIMIT 3;';
       $stmt=$conn->prepare($sql);
       $stmt->execute();
       return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
}
