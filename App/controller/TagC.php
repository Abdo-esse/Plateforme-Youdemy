<?php
namespace App\controller;
require __DIR__ . '/../../vendor/autoload.php';  
use App\class\Tag;

class TagC
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

     public function addTagController()
     {
        $tag=new Tag($this->name, $this->idAdmin);
        $tag->addtag();
     }
     public function readTagController()
     {
        $tag=new Tag();
        return $tag->readAllTag();
     }
     public function readOneTagController($id)
     {
        $tag=new Tag();
        $tag->setId($id);
        return $tag->readTag();
     }
     public function daletTagController($id)
     {
        $tag=new Tag();
        $tag->setId($id);
        $tag->setDateDalet(date("Y-m-d"));
        $tag->daletTag();
     }
     public function updateTagController()
     {
        $tag=new Tag($this->name,$this->idAdmin,$this->id);
        $tag->updateTag();
     }
    
}