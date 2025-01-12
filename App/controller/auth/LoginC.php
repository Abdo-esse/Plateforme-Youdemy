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
        }else{
           
            
            echo $_SESSION["userid"] ;
            echo$_SESSION["userName"] ;
            echo $_SESSION["userrole"] ;
            var_dump ($user);
        }

        

        // Vérification du rôle
    //     switch ($user->getRole()->getTitle()) {
    //         case "Administrateur":
    //             header("Location:../../Views/admin/dashbord.php?natadmin");
    //             break;
    //         case "Enseignant":
    //             header("Location:../../Views/enseignant/dashbord.php?ntacandidate");
    //             break;
    //         case "Etudiant":
    //             header("Location:../../Views/etudiant/index.php?recruiter");
    //             break;
    //         default:
    //             header("Location:../../Views/auth/login.php?error=unknownrole");
    //     }
    //     exit();
    }
}
