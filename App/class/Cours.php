<?php 
 namespace App\class;
 require __DIR__ . '/../../vendor/autoload.php'; 
use App\Class\Enseignant; 
 abstract class  Cours
 {
    protected $id;
    protected $titre;
    protected $photoCouverture;
    protected $description;
    protected $idCategorie;
    protected Enseignant $enseignant ;
    protected $nomberChapitre;
    protected $duree;
    protected $prix;
    protected array $idTags;
    protected $data;


    public function __construct($titre,$photoCouverture,$description,$idCategorie,Enseignant $enseignant,$nomberChapitre,$duree,$prix,$idTags,$id)
    {
        $this->id=$id;
        $this->titre=$titre;
        $this->photoCouverture=$photoCouverture;
        $this->description=$description;
        $this->idCategorie=$idCategorie;
        $this->enseignant=$enseignant;
        $this->nomberChapitre=$nomberChapitre;
        $this->duree=$duree;
        $this->prix=$prix;
        $this->idTags=$idTags;
        $this->data = [
            "titre" => " $this->titre",
            "photoCouverture" => "$this->photoCouverture",
            "description" => "$this->description",
            "idCategorie" => "$this->idCategorie",
            "nomberChapitre" => "$this->nomberChapitre",
            "duree" => "$this->duree",
            "prix" => "$this->prix",
            "idEnseignant" => $this->enseignant->getId() 
        ];

    }

    abstract public function ajouter();
    abstract public function afficher();
    public function getData(){return $this->data;}

 }