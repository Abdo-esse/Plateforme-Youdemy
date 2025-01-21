<?php 
namespace App\class;
require __DIR__ . '/../../vendor/autoload.php'; 
use App\model\Crud;


class Enseignant extends User
{
    private $etatCompte;


    public function __construct($nom, $email, $password, Role $role,$etatCompte= null, $id = null)
    {
        parent::__construct($nom, $email, $password, $role, $id);
        $this->etatCompte = $etatCompte;
      }

    public function getEtatCompte(){ return $this->etatCompte;  }
    public function setEtatCompte($etatCompte){ $this->etatCompte = $etatCompte;}


    public function inscription (){
        $idEnseignant=Crud::createAction('users', $this->data);
        Crud::createAction('gestionEnseignants',["idEnseignant"=> $idEnseignant]) ;
 }

 public function totalEtudiantInscrits(){
  $conn = Connexion::connexion(); 
  $sql="SELECT  count(inscription.idEtudiant)
        from inscription
        JOIN cours ON cours.id=inscription.idCours
        join users on users.id=cours.idEnseignant
        WHERE users.id=? ";
        $stmt=$conn->prepare($sql);
        $stmt->execute($this->id);
        return $stmt->fetch(PDO::FETCH_OBJ);

 }
 public function totalCoursIspulier(){
  $conn = Connexion::connexion(); 
  $sql="SELECT COUNT(id) AS nombre_cours
        FROM cours
        WHERE isPublier = ? AND idEnseignant = 16; ";
        $stmt=$conn->prepare($sql);
        $stmt->execute($boolean,$this->id);
        return $stmt->fetch(PDO::FETCH_OBJ);

 }




}