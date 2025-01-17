<?php 
 namespace App\class;
 require __DIR__ . '/../../vendor/autoload.php'; 
use App\Class\Enseignant; 
use App\model\Crud;
use App\Config\Connexion;
use App\class\BaseModel;
use PDO;
 class  Cours implements BaseModel
 {
    private $id;
    private $titre;
    private $photoCouverture;
    private $contenu;
    private $description;
    private $idCategorie;
    private  $idEnseignant ;
    private $nomberChapitre;
    private $duree;
    private $prix;
    private array $idTags;
    private  bool $isPublier;
    private   $dateDelete;
    private $data;


    public function __construct( $titre="",$photoCouverture="",$description="",$idCategorie="",$idEnseignant="",$nomberChapitre="",$duree="",$prix="",$idTags=[],$contenu="",$id=null)
    {
        $this->id=$id;
        $this->titre=$titre;
        $this->photoCouverture=$photoCouverture;
        $this->description=$description;
        $this->contenu=$contenu;
        $this->idCategorie=$idCategorie;
        $this->idEnseignant=$idEnseignant;
        $this->nomberChapitre=$nomberChapitre;
        $this->duree=$duree;
        $this->prix=$prix;
        $this->idTags=$idTags;
        $this->data = [
            "titre" => " $this->titre",
            "photoCouverture" => "$this->photoCouverture",
            "description" => "$this->description",
            "contenu" => $this->contenu,
            "idCategorie" => "$this->idCategorie",
            "nomberChapitre" => "$this->nomberChapitre",
            "duree" => "$this->duree",
            "prix" => "$this->prix",
            "idEnseignant" => $this->idEnseignant
        ];

    }

    public function getData(){return $this->data;}
    public function getId(){return  $this->id;}
    public function gettags(){return  $this->idTags;}
    public function setId($id){  $this->id=$id;}
    public function setPublier($isPublier){ $this->isPublier=$isPublier;}
    public function setDateDelete($dateDelete){ $this->dateDelete=$dateDelete;}
    
    public function addAction(){
        $this->id=Crud::createAction('cours', $this->data);
        foreach($this->idTags as $idTag )
       {
        Crud::createAction('cours_tags',["idCours"=>$this->id,"idTags"=>$idTag]);
       }
    
    }
    public function readAll(){
       $conn = Connexion::connexion(); 
       $sql="SELECT cours.id,cours.titre,cours.idEnseignant,cours.isPublier,cours.photoCouverture,cours.contenu,cours.description,cours.nomberChapitre,cours.duree,cours.prix,cours.dateCreation,cours.dateDelete,categories.name as categories ,users.name,GROUP_CONCAT(tags.name)as tags
            from cours
            JOIN users on users.id=cours.idEnseignant
            join categories on categories.id=cours.idCategorie
            join cours_tags on cours_tags.idCours=cours.id
            join tags on tags.id=cours_tags.idTags
            GROUP by cours.id";
        $stmt=$conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
}
    public function readOne(){
        $conn = Connexion::connexion(); 
        $sql="SELECT cours.id,cours.titre,cours.idEnseignant,cours.isPublier,cours.idCategorie,cours.photoCouverture,cours.contenu,cours.description,cours.nomberChapitre,cours.duree,cours.prix,cours.dateCreation,cours.dateDelete,categories.name as categories ,users.name,GROUP_CONCAT(tags.name)as tags,GROUP_CONCAT(tags.id, '=>',tags.name) AS arrayTags
             from cours
             JOIN users on users.id=cours.idEnseignant
             join categories on categories.id=cours.idCategorie
             join cours_tags on cours_tags.idCours=cours.id
             join tags on tags.id=cours_tags.idTags
             Where cours.id=?
             GROUP by cours.id";
         $stmt=$conn->prepare($sql);
         $stmt->execute([$this->id]);
         return $stmt->fetch(PDO::FETCH_OBJ);
        
    } 
    public function daletAction(){
        Crud::updateAction('cours', $this->id,["dateDelete"=>$this->dateDelete]);
     }
    public function updateAction(){
        Crud::updateAction('cours', $this->id,$this->data);
        $this->updateCoursTags();

    }
    public function publier(){

        Crud::updateAction('cours', $this->id,["isPublier"=>"$this->isPublier"]);
       
    }

    public function updateCoursTags()
    {
        $conn = Connexion::connexion(); 
        $conn->beginTransaction(); // Démarrer la transaction

try {
    // Suppression des tags existants
    $sqlDelete = "DELETE FROM cours_tags WHERE idCours = ?";
    $stmt = $conn->prepare($sqlDelete);
    if (!$stmt->execute([$this->id])) {
        throw new PDOException("Erreur lors de la suppression des tags."); // Lever une exception manuellement
    }

    // Insertion des nouveaux tags
    foreach($this->idTags as $idTag )
    {
    $sqlInsert = "INSERT INTO cours_tags (idCours, idTags) VALUES (?, ?)";
    $stmt = $conn->prepare($sqlInsert);
    if (!$stmt->execute([$this->id, $idTag])) {
        throw new PDOException("Erreur lors de l'insertion des nouveaux tags."); // Lever une exception manuellement
    }
    }
    $conn->commit(); // Valider la transaction
    echo "Transaction réussie.";
} catch (PDOException $e) {
    $conn->rollBack(); // Annuler la transaction en cas d'erreur
    echo "Erreur : " . $e->getMessage();
}


    }

 }