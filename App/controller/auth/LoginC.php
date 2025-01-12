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
        // Utilisation de la méthode héritée
        $user=new LoginM();
        $user ->getUser( $this->email, $this->password);

        if ($user == null) {
            echo "User not found, please check your credentials.";
            exit();
        }

        // Vérification du rôle
        switch ($user->getRole()->getTitle()) {
            case "Administrateur":
                header("Location:../../Views/admin/dashbord.php?natadmin");
                break;
            case "Enseignant":
                header("Location:../../Views/candidat/index.php?ntacandidate");
                break;
            case "Étudiant":
                header("Location:../../Views/recruteur/index.php?recruiter");
                break;
            default:
                header("Location:../../Views/auth/login.php?error=unknownrole");
        }
        exit();
    }
}
