<?php
namespace App\class;
require __DIR__ . '/../../vendor/autoload.php';  
use App\model\Crud;
use App\class\BaseModel;

class Categorie implements BaseModel
{
    private $id ;
    private $name;
    private $idAdmin;
    private $data;
    private $dateDelete;
     public function __construct($name="",$idAdmin="",$id=null)
     {
        $this->name=$name;
        $this->idAdmin=$idAdmin;
        $this->id=$id;
        $this->data=[
            "name"=>"$this->name",
            "idAdmin"=>$this->idAdmin
        ];

     }

     public function setId($id){ $this->id=$id;}
     public function setName($name){ $this->name=$name;}
     public function setDateDalet($dateDelete){ $this->dateDelete=$dateDelete;}

     public function addAction()
     {
        Crud::createAction('categories',$this->data);
     }
     public function readAll()
     {
        return Crud::readAll('categories');
     }
     public function readOne()
     {
        return Crud::readAction('categories',["id"=>$this->id]);
     }

     public function daletAction()
     {
        Crud::updateAction('categories', $this->id,["dateDelete"=>$this->dateDelete]);
     }
     public function updateAction()
     {
        Crud::updateAction('categories', $this->id,["name"=>"$this->name"]);
     }
    
}