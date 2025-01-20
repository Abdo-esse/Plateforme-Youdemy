<?php 
namespace App\class;
require __DIR__ . '/../../vendor/autoload.php'; 
use App\model\Crud;



class Etudiant extends User
{
    
    public function inscription (){
        Crud::createAction('users', $this->data);
 }

    public function inscriptionACours($idCours){
        $data=[
            "idEtudiant" => $this->id,
            "idCours" => $idCours
        ];
        Crud::createAction('inscription',$data);
    }

    public function search($keyword){
        $conn = Connexion::connexion();
        $query = $conn->prepare("SELECT cours.id,cours.titre,cours.idEnseignant,cours.isPublier,cours.photoCouverture,cours.contenu,cours.description,cours.nomberChapitre,cours.duree,cours.prix,cours.dateCreation,cours.dateDelete,categories.name as categories ,users.name,GROUP_CONCAT(tags.name)as tags
            from cours
            JOIN users on users.id=cours.idEnseignant
            join categories on categories.id=cours.idCategorie
            join cours_tags on cours_tags.idCours=cours.id
            join tags on tags.id=cours_tags.idTags
            where cours.isPublier= true and cours.dateDelete IS NULL and (cours.titre like :keyword or categories like :keyword or tags like :keyword )
            GROUP by cours.id
            ORDER BY cours.id LIMIT 4");
        $query->execute(array(":keyword" => '%' . $keyword . '%'));
        $resulta= $query->fetchAll(PDO::FETCH_OBJ);
        return json_encode($resulta);
    }
}
