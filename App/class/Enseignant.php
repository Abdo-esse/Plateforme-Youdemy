<?php 
namespace App\class;
require __DIR__ . '/../../vendor/autoload.php'; 
use App\model\Crud;
use App\Config\Connexion;
use PDO;

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

 public function totalEtudiantInscrits($id){
  $conn = Connexion::connexion(); 
  $sql="SELECT  count(inscription.idEtudiant) as etudiants
        from inscription
        JOIN cours ON cours.id=inscription.idCours
        join users on users.id=cours.idEnseignant
        WHERE users.id=? ";
        $stmt=$conn->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_OBJ);

 }
 public function totalCoursIspublier($boolean,$id){
  $conn = Connexion::connexion(); 
  $sql="SELECT COUNT(id) AS nombre_cours
        FROM cours
        WHERE isPublier = ? AND idEnseignant =?; ";
        $stmt=$conn->prepare($sql);
        $stmt->execute([$boolean,$id]);
        return $stmt->fetch(PDO::FETCH_OBJ);

 }




}