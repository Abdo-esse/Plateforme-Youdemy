<?php 
namespace App\class;
require __DIR__ . '/../../vendor/autoload.php'; 
use App\model\Crud;
use App\Config\Connexion;
use PDO;


class Admin extends User
{
    
    public function afficherComptesEnseignantsEnCours()
    {
       $conn = Connexion::connexion(); 
       $sql='SELECT users.name,users.id,users.email,users.dateCreation
             FROM users
             join gestionenseignants on gestionenseignants.idEnseignant=users.id
             WHERE users.idRole=2 and gestionenseignants.etatCompte="en cours"';
       $stmt=$conn->prepare($sql);
       $stmt->execute();
       return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function gteEnseignant($idEnseignant)
    {
        return Crud::readAction('users',["id"=>$idEnseignant]);
    }
    public function accepteEnseignants($id,$etatCompte)
    {
        Crud::updateAction('gestionenseignants', $id,["etatCompte"=>"$etatCompte"]);
    }
}
