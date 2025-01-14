<?php
namespace App\controller;
require __DIR__ . '/../../vendor/autoload.php';  
use App\class\Categorie;

class CategorieC
{
    private $id ;
    private $name;
    private $idAdmin;
     public function __construct($name="",$idAdmin="",$id=null)
     {
        $this->name=$name;
        $this->idAdmin=$idAdmin;
        $this->id=$id;
    }

     public function addCategorieController()
     {
        $categorie=new Categorie($this->name, $this->idAdmin);
        $categorie->addCategorie();
     }
     public function readCategorieController()
     {
        $categorie=new Categorie();
        return $categorie->readAllCategorie();
     }
     public function readOneCategorieController($id)
     {
        $categorie=new Categorie();
        $categorie->setId($id);
        return $categorie->readCategorie();
     }
     public function daletCategorieController($id)
     {
        $categorie=new Categorie();
        $categorie->setId($id);
        $categorie->setDateDalet(date("Y-m-d"));
        $categorie->daletCategorie();
     }
     public function updateCategorieController()
     {
        $categorie=new Categorie($this->name,$this->idAdmin,$this->id);
        $categorie->updateCategorie();
     }
    
}