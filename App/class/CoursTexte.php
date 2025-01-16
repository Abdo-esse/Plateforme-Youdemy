<?php
namespace App\class;
require __DIR__ . '/../../vendor/autoload.php'; 
use App\Config\Connexion;
use PDO;


class CoursTexte extends Cours 
{
    private $texteContenu;

    public function __construct($titre,$photoCouverture,$description,$idCategorie,$enseignat,$nomberChapitre,$duree,$prix,$tags,$texteContenu)
    {
        parent::__construct($titre,$photoCouverture,$description,$idCategorie,$enseignat,$nomberChapitre,$duree,$prix,$tags);
        $this->texteContenu=$texteContenu;
    }

    public function ajouter()
    {

    }

   
}