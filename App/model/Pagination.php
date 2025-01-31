<?php 
namespace App\model;


require __DIR__ . '/../../vendor/autoload.php';
use App\Config\Connexion;
use PDO;

class Pagination  {
 
    private $table;
    private $nbrElementPerPage;

    public function __construct(  $table,  $nbrElementPerPage ) {
        $this->table = $table;
        $this->nbrElementPerPage = $nbrElementPerPage;
    }

    // Obtenir le nombre total d'éléments dans la table
    public function getTotalCount(){
        $conn = Connexion::connexion();
        $query = $conn->prepare("SELECT COUNT(id) as total 
        FROM {$this->table}
          where cours.isPublier= true and cours.dateDelete IS NULL ");
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
        return  $result['total'];
    }

    // Récupérer les données paginées
    public function getData( $page) {
        $conn = Connexion::connexion();
        $debut = ($page - 1) * $this->nbrElementPerPage;
        $query = $conn->prepare("SELECT cours.id,cours.titre,cours.idEnseignant,cours.isPublier,cours.photoCouverture,cours.contenu,cours.description,cours.nomberChapitre,cours.duree,cours.prix,cours.dateCreation,cours.dateDelete,categories.name as categories ,users.name,GROUP_CONCAT(tags.name)as tags,(SELECT COUNT(inscription.idEtudiant) 
     FROM inscription 
     WHERE inscription.idCours = cours.id) AS Etudiant
            from cours
            JOIN users on users.id=cours.idEnseignant
            join categories on categories.id=cours.idCategorie
            join cours_tags on cours_tags.idCours=cours.id
            join tags on tags.id=cours_tags.idTags
            where cours.isPublier= true and cours.dateDelete IS NULL 
            GROUP by cours.id
            ORDER BY cours.id LIMIT :offset, :nbr_element");
        $query->bindValue(':nbr_element', $this->nbrElementPerPage, PDO::PARAM_INT);
        $query->bindValue(':offset', $debut, PDO::PARAM_INT);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    // Obtenir le nombre total de pages
    public function getTotalPages() {
        $totalCount = $this->getTotalCount();
        return  ceil($totalCount / $this->nbrElementPerPage);
    }
}
