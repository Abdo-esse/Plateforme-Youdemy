<?php


namespace App\Controller\auth;

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
            echo "User not found, please check your credentials.";
            exit();
        }
           // Vérification du rôle
        switch ($_SESSION["userrole"]) {
            case "Administrateur":
                header("Location:../../View/admin/dashbord.php?natadmin");
                break;
            case "Enseignant":
                header("Location:../../View/enseignant/dashbord.php?ntacandidate");
                break;
            case "Etudiant":
                header("Location:../../View/etudiant/index.php?recruiter");
                break;
            default:
                header("Location:../../View/auth/login.php?error=unknownrole");
        }
        exit();
    }
}
