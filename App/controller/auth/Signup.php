<?php 
namespace App\controller\auth;
require __DIR__ . '/../../../vendor/autoload.php'; 
use App\class\User; 
use App\class\Role; 
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
            header("location: ../../view/auth/signUp.php?error=emptyInput");
            exit();
        }
        if(Validation::validationUsername($this->nom)==false)
        {
            // echo "invalid name !";
            header("location: ../../view/auth/signUp.php?error=invaldname");
            exit();
        }
        if(Validation::validationEmail($this->email)==false)
        {
            // echo "invalid email !";
            header("location: ../../view/auth/signUp.php?error=invalidemail");
            exit();
        }
        if($this->checkUserExiste()==false)
        {
            // echo "Username or email taken !";
            header("location: ../../view/auth/signUp.php?error=UsernameOrEmailTaken");
            exit();
        }
        $role= new Role($this->idRole);
        $hashedPwd= password_hash($this->password,PASSWORD_DEFAULT);
        $user= new User($this->nom,$this->email,$hashedPwd,$role);
        $user->inscription ();
       


    }
    private function emptyInput()
    {
        $result;
        if(empty($this->idRole)||empty($this->nom)||empty($this->password)||empty($this->email))
        {
            $result=false;
        }
        else
        {
            $result=true;
        }
        return $result;
    }
    private function checkUserExiste()
    {
        $result;
        if(!Validation::checkUser( $this->nom,$this->email))
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