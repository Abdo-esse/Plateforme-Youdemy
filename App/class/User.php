<?php
namespace App\class;
require __DIR__ . '/../../vendor/autoload.php'; 

use App\Class\Role; 
use App\model\Crud;
use App\Config\Connexion;

abstract class User
{
    protected $id;
    protected $nom ;
    protected $email;
    protected $password ;
    protected Role $role;
    protected $compteStatut;
    protected $data;
   
    

    public function __construct( $nom, $email, $password,Role $role,$id=null,$compteStatut=""){
        $this->id=$id;
        $this->nom=$nom;
        $this->email=$email;
        $this->password=$password;
        $this->role=$role;
        $this->compteStatut=$compteStatut;
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
    public function getCompteStatut() { return $this->compteStatut;}
    public function getData() { return  $this->data; }
    public function setId($id) { $this->id=$id; }

    abstract public function inscription ();
    
    public function gteUser($idUser)
    {
        return Crud::readAction('users',["id"=>$idUser]);
    }
    public function gteAllUsers()
    {
        return Crud::readAll('users');
    }

    

}

