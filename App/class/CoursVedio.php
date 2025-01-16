<?php
namespace App\class;
require __DIR__ . '/../../vendor/autoload.php'; 
use App\Config\Connexion;
use PDO;


class CoursVedio extends Cours 
{
    private $urlContenu;

    public function __construct($titre,$photoCouverture,$description,$idCategorie,$enseignat,$nomberChapitre,$duree,$prix,$tags,$urlContenu)
    {
        parent::__construct($titre,$photoCouverture,$description,$idCategorie,$enseignat,$nomberChapitre,$duree,$prix,$tags);
        $this->urlContenu=$urlContenu;
    }

    public function ajouter()
    {

    }

   
}