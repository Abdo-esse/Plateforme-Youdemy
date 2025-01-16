<?php 
 namespace App\class;

 abstract class  Cours
 {
    private $titre;
    private $photoCouverture;
    private $description;
    private $idCategorie;
    private Enseignant $enseignat ;
    private $nomberChapitre;
    private $duree;
    private $prix;
    private array $tags;


    public function __construct($titre,$photoCouverture,$description,$idCategorie,$enseignat,$nomberChapitre,$duree,$prix,$tags)
    {
        $this->titre=$titre;
        $this->photoCouverture=$photoCouverture;
        $this->description=$description;
        $this->idCategorie=$idCategorie;
        $this->enseignat=$enseignat;
        $this->nomberChapitre=$nomberChapitre;
        $this->duree=$duree;
        $this->prix=$prix;
        $this->tags=$tags;

    }

    abstract public function ajouter();
    abstract public function afficher();

 }