<?php 
namespace App\class;
require __DIR__ . '/../../vendor/autoload.php'; 
use App\model\Crud;
use App\Config\Connexion;



class Etudiant extends User
{
    
    public function inscription (){
        Crud::createAction('users', $this->data);
 }


 public function verifyEtudiatCourseEnrollment($idCours){
    $conn = Connexion::connexion();
    $sql="SELECT users.name FROM users
         join inscription on inscription.idEtudiant=users.id
         join cours on cours.id=inscription.idCours
         WHERE cours.id= :idCours";
          $stmt = $conn->prepare($sql);
         $stmt->execute(array(":idCours" => $idCours));
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
            $_SESSION['errorInscription']="vous ete deja inscrit";
      }
        
    }

    
}
