<?php 
namespace App\controller\auth;
require __DIR__ . '/../../../vendor/autoload.php'; 
use App\class\User; 
use App\class\Role; 


class Signup
{
    protected $idRole;
    protected $nom ;
    protected $email;
    protected $password ; 
    public function __construct($idRole,$password,$nom,$email)
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
            header("location: ../public/index.php?error=emptyInput");
            exit();
        }
        if(Validation::validationUsername($this->uid)==false)
        {
            // echo "invalid name !";
            header("location: ../public/index.php?error=invaldname");
            exit();
        }
        if(Validation::validationEmail($this->email)==false)
        {
            // echo "invalid email !";
            header("location: ../public/index.php?error=invalidemail");
            exit();
        }
        if(Validation::passwordMatch($this->pwd,$this->pwdReapeat)==false)
        {
            // echo "Passworde don't match !";
            header("location: ../public/index.php?error=PasswordDontMatch");
            exit();
        }
        if($this->uidTakenCheck()==false)
        {
            // echo "Username or email taken !";
            header("location: ../public/index.php?error=UsernameOrEmailTaken");
            exit();
        }
        $role= new Role($this->idRole);

        $user= new User($this->nom,$this->email,$this->password,$role);
        $user->inscription ();
        $this-> setUser($this->uid,$this->pwd,$this->email);


    }
    private function emptyInput()
    {
        $result;
        if(empty( $this->idRole)||empty($this->nom)||empty( $this->password)||empty($this->email))
        {
            $result=false;
        }
        else
        {
            $result=true;
        }
        return $result;
    }
    private function uidTakenCheck()
    {
        $result;
        if(!$this-> checkUser( $this->nom,$this->email))
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