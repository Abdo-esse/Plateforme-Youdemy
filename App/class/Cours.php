<?php 
 namespace App\class;
 require __DIR__ . '/../../vendor/autoload.php'; 
use App\Class\Enseignant; 
use App\model\Crud;
use App\class\BaseModel;
 class  Cours implements BaseModel
 {
    private $id;
    private $titre;
    private $photoCouverture;
    private $contenu;
    private $description;
    private $idCategorie;
    private Enseignant $enseignant ;
    private $nomberChapitre;
    private $duree;
    private $prix;
    private array $idTags;
    private $data;


    public function __construct($titre,$photoCouverture,$description,$idCategorie,Enseignant $enseignant,$nomberChapitre,$duree,$prix,$idTags,$contenu,$id=null)
    {
        $this->id=$id;
        $this->titre=$titre;
        $this->photoCouverture=$photoCouverture;
        $this->description=$description;
        $this->contenu=$contenu;
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
            "contenu" => $this->contenu,
            "idCategorie" => "$this->idCategorie",
            "nomberChapitre" => "$this->nomberChapitre",
            "duree" => "$this->duree",
            "prix" => "$this->prix",
            "idEnseignant" => $this->enseignant->getId() 
        ];

    }

    public function addAction(){
        $this->id=Crud::createAction('cours', $this->data);
        foreach($this->idTags as $idTag )
       {
        Crud::createAction('cours_tags',["idCours"=>$this->id,"idTags"=>$idTag]);
       }
    
    }
    public function readAll(){


    }
    public function readOne(){


    }
    public function daletAction(){


    }
    public function updateAction(){


    }
    public function getData(){return $this->data;}

 }