<?php 
namespace App\controller\auth;
session_start();

require __DIR__ . '/../../../vendor/autoload.php'; 
use App\class\User; 
use App\class\Role; 
use App\class\Enseignant; 
use App\class\Etudiant; 
use App\model\Crud;
use App\model\Validation;

class Signup
{
    protected $idRole;
    protected $nom ;
    protected $email;
    protected $password ; 
    public function __construct($idRole,$nom,$email,$password)
    {
        $this->idRole=$idRole;
        $this->nom=$nom;
        $this->password=$password;
        $this->email=$email;
    }
    public function signupUser()
    {
        if($this->emptyInput()==false)
        {
            // echo "empty input !";
            $_SESSION["errorGenerale"] = "empty input !";
            header("location: ../../view/auth/signUp.php");
            exit();
        }
        if(Validation::validationUsername($this->nom)==false)
        {
            // echo "invalid name !";
            $_SESSION["errorname"] = "invalid name !";

            header("location: ../../view/auth/signUp.php");
            exit();
        }
        if(Validation::validationEmail($this->email)==false)
        {
            // echo "invalid email !";
            $_SESSION["erroremail"] = "invalid email !";
            header("location: ../../view/auth/signUp.php");
            exit();
        }
        if(!Validation::checkUser( $this->nom,$this->email))
        {
            // echo "Username or email taken !";
            $_SESSION["errorGenerale"] = "Username or email taken !";
            header("location: ../../view/auth/signUp.php");
            exit();
        }
        $role= new Role($this->idRole);
        $hashedPwd= password_hash($this->password,PASSWORD_DEFAULT);

        

       
        if ($role->getId()==2) {
            $enseignant=new Enseignant($this->nom,$this->email,$hashedPwd,$role);
            $enseignant->inscription ();
        }
        else if ($role->getId()==3) {
            $etudiant=new Etudiant($this->nom,$this->email,$hashedPwd,$role);
            $etudiant->inscription ();
        }
    }
    private function emptyInput()
    {
        $result;
        if(empty($this->idRole) && empty($this->nom) && empty($this->password) && empty($this->email))
        {
            $result=false;
        }
        else
        {
            $result=true;
        }
        return $result;
    }
    
}