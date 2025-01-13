<?php 
namespace App\model;
session_start();
require __DIR__ . '/../../vendor/autoload.php';
use App\Config\Connexion;
use App\Class\Role; 
use App\Class\User; 
use App\Class\Enseignant; 
use PDO;





class LoginM

{
    
   public function getUser($email, $password)
{
  
        $conn = Connexion::connexion();
        $stmt = $conn->prepare('SELECT users.id,users.compteStatut, users.email, users.name, users.password, roles.id as role_id, roles.name as role
                                FROM users 
                                JOIN roles ON roles.id = users.idRole 
                                WHERE users.email = ?;');

        if (!$stmt->execute([$email])) {
            header("location: ../../../../Plateforme-Youdemy/App/view/auth/logIn.php");
            exit();
        }
         $user = $stmt->fetch(PDO::FETCH_ASSOC);
         if (!$user) {
            $_SESSION["errorGenerale"] = "User not found check your email or you password!";

            header("location: ../../../../Plateforme-Youdemy/App/view/auth/logIn.php");
            exit();
        }
        if ($user["compteStatut"]!=='actif') {
            // User not found, please check your credentials.
            $_SESSION["errorGenerale"] = "Your account not active !";
            header("location: ../../../../Plateforme-Youdemy/App/view/auth/logIn.php");
            exit();
        }
        if (!password_verify($password, $user['password'])) {
            $_SESSION["errorGenerale"] = "Your password not correcte !";

            header("location: ../../../../Plateforme-Youdemy/App/view/auth/logIn.php");
            exit();
        }

        $_SESSION["userid"] = $user["id"];
        $_SESSION["userName"] = $user["name"];
        $_SESSION["userrole"] = $user["role"];
        $role = new Role($user["role_id"], $user["role"]);
          echo $user["id"];
        if ($user["role"]=="Enseignant") {
           $enseignantDonner= Crud::readAction("gestionEnseignants",["idEnseignant"=>$user["id"]]);
           if($enseignantDonner->etatCompte=="accepter"){
          return  new Enseignant($user["name"], $user["email"], $user["password"], $role,$enseignantDonner->etatCompte, $user["id"]);
              
           }else {
            $_SESSION["errorGenerale"] = "Your account is $enseignantDonner->etatCompte !";

            header("location: ../../../../Plateforme-Youdemy/App/view/auth/logIn.php");
            exit();
        }
        }

        return new User($user["name"], $user["email"], $user["password"], $role, $user["id"]);
       
        

        
        
}

}
