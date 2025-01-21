<?php 
namespace App\class;
require __DIR__ . '/../../vendor/autoload.php'; 
use App\model\Crud;
use App\Config\Connexion;
use PDO;


class Etudiant extends User
{
    
    public function inscription (){
        Crud::createAction('users', $this->data);
 }


 public function verifyEtudiatCourseEnrollment($idCours){
    $conn = Connexion::connexion();
$sql = "SELECT *
        FROM inscription
        WHERE idEtudiant = :idEtudiant AND idCours = :idCours;";

$stmt = $conn->prepare($sql);
$stmt->execute([
    ":idEtudiant" => $this->id, // Ajout du paramètre idEtudiant
    ":idCours" => $idCours
]);
         $resultCheck;
         if($stmt->rowCount() > 0){ $resultCheck=false; }
         else { $resultCheck=true; }
         return $resultCheck;
    }


    public function inscriptionACours($idCours){
      
            if ($this->verifyEtudiatCourseEnrollment($idCours)){
                $data=[
                    "idEtudiant" => $this->id,
                    "idCours" => $idCours
                ];
                Crud::createAction('inscription',$data);
            }else{
                // $_SESSION['errorInscription']="vous ete deja inscrit";
                echo'jajaja';
                exit();
          }
        

     

      
        
    }
    public function getCoursInscrire(){
        $conn = Connexion::connexion();
        $sql="SELECT cours.id,cours.titre,cours.photoCouverture,cours.contenu,cours.description,cours.nomberChapitre,cours.duree,cours.prix,cours.dateCreation,categories.name as categories,GROUP_CONCAT(tags.name)as tags, enseignants.name AS enseignant_name
             from cours
             JOIN users AS enseignants on enseignants.id=cours.idEnseignant
             join categories on categories.id=cours.idCategorie
             join cours_tags on cours_tags.idCours=cours.id
             join tags on tags.id=cours_tags.idTags
             join inscription on inscription.idCours=cours.id
             join users AS etudiant on inscription.idEtudiant=etudiant.id
             WHERE inscription.idEtudiant=:idetudiant
             GROUP by cours.id";
        $stmt = $conn->prepare($sql);
        $stmt->execute(array(":idetudiant" => $this->id));
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }    
}
