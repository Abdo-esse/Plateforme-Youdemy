<?php
namespace App\class;
require __DIR__ . '/../../vendor/autoload.php'; 

use App\Class\Role; 
use App\model\Crud;
use App\Config\Connexion;

class User
{
    protected $id;
    protected $nom ;
    protected $email;
    protected $password ;
    protected Role $role;
    protected $data;
   
    

    public function __construct( $nom, $email, $password,Role $role,$id=null){
        $this->id=$id;
        $this->nom=$nom;
        $this->email=$email;
        $this->password=$password;
        $this->role=$role;
        $this->data = [
            "id" => $this->id,
            "name" => "$this->nom",
            "email" => "$this->email",
            "password" => "$this->password",
            "idRole" => $this->role->getId() 
        ];
    }

    public function getId() { return $this->id; }
    public function getNom() { return $this->nom; }
    public function getRole() { return $this->role; }
    public function getEmail() { return $this->email; }
    public function getPassword() { return $this->password; }
    public function getData() { return  $this->data; }

    public function inscription (){
        Crud::createAction('users', $this->data);
 }


    

}

