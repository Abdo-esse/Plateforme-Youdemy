<?php 
 namespace App\class;

 abstract class  Cours
 {
    private $id;
    private $titre;
    private $photoCouverture;
    private $description;
    private $idCategorie;
    private Enseignant $enseignat ;
    private $nomberChapitre;
    private $duree;
    private $prix;
    private array $idTags;
    private $data;


    public function __construct($titre,$photoCouverture,$description,$idCategorie,$enseignat,$nomberChapitre,$duree,$prix,$idTags)
    {
        $this->titre=$titre;
        $this->photoCouverture=$photoCouverture;
        $this->description=$description;
        $this->idCategorie=$idCategorie;
        $this->enseignat=$enseignat;
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
            "idEnseignant" => $this->enseignat->getId() 
        ];

    }

    abstract public function ajouter();
    abstract public function afficher();

 }