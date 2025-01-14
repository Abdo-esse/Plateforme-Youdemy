<?php
namespace App\class;
require __DIR__ . '/../../vendor/autoload.php';  
use App\model\Crud;

class Tag
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

     public function addtag()
     {
        Crud::createAction('tags',$this->data);
     }
     public function readAlltag()
     {
        return Crud::readAll('tags');
     }
     public function readTag()
     {
        return Crud::readAction('categories',["id"=>$this->id]);
     }
     public function daletTag()
     {
        Crud::updateAction('tags', $this->id,["dateDelete"=>$this->dateDelete]);
     }
     public function updatetag()
     {
        Crud::updateAction('tags', $this->id,["name"=>"$this->name"]);
        
     }
    
}