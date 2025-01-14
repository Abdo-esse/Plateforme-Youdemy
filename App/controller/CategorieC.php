<?php
namespace App\controller;
require __DIR__ . '/../../vendor/autoload.php';  
use App\class\Categorie;

class CategorieC
{
    private $id ;
    private $name;
    private $idAdmin;
    private $dateDelete;
     public function __construct($name="",$idAdmin="",$id=null)
     {
        $this->name=$name;
        $this->idAdmin=$idAdmin;
        $this->id=$id;
    }

     public function setId($id){ $this->id=$id;}
     public function setName($name){ $this->name=$name;}
     public function setDateDalet($dateDelete){ $this->dateDelete=$dateDelete;}

     public function addCategorieController()
     {
        $categorie=new Categorie($this->name, $this->idAdmin);
        $categorie->addCategorie();
     }
     public function readCategorie()
     {
        return Crud::readAll('categories');
     }
     public function daletCategorie()
     {
        Crud::updateAction('categories', $this->id,["dateDelete"=>$this->dateDelete]);
     }
     public function updateCategorie()
     {
        Crud::updateAction('categories', $this->id,["name"=>"$this->name"]);
     }
    
}