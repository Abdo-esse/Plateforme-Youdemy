<?php


namespace App\Controller\auth;
session_start();

require __DIR__ . '/../../../vendor/autoload.php'; 
use App\model\LoginM;

class LoginC 
{
    private $email;
    private $password;
    public function __construct($email,$password)
    {
        $this->password=$password;
        $this->email=$email;
    }

    public function loginUser()
    {
        
        $user=new LoginM();
        $user ->getUser( $this->email, $this->password);
       

        if ($user == null) {
            // echo "User not found, please check your credentials.";
            $_SESSION["erroremail"] = "User not found, please check your credentials. !";
            header("Location:../../View/auth/login.php");

            exit();
        }
           // Vérification du rôle
        switch ($_SESSION["userrole"]) {
            case "Administrateur":
                header("Location:../../View/admin/dashbord.php");
                break;
            case "Enseignant":
                header("Location:../../View/enseignant/dashbord.php");
                break;
            case "Etudiant":
                header("Location:../../View/index.php");
                break;
            default:
                header("Location:../../View/auth/login.php");
        }
        exit();
    }
}
