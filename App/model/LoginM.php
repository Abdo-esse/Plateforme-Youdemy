<?php 
namespace App\model;



require __DIR__ . '/../../vendor/autoload.php';
use App\Config\Connexion;
use App\Class\Role; 
use App\Class\User; 
use PDO;




class LoginM

{
    
   public function getUser($email, $password)
{
  
        $conn = Connexion::connexion();
        
        
        $stmt = $conn->prepare('SELECT users.id, users.email, users.name, users.password, roles.id as role_id, roles.name as role
                                FROM users 
                                JOIN roles ON roles.id = users.idRole 
                                WHERE users.email = ?;');

        if (!$stmt->execute([$email])) {
            header("location: ../view/auth/logIn.php?error=stmtfaile");
            exit();
        }

        
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        
        if (!$user) {
            header("location: ../view/auth/logIn.php?error=usernotfound");
            exit();
        }
        if ($user["compteStatut"];) {
            header("location: ../view/auth/logIn.php?error=usernotfound");
            exit();
        }

     
        if (!password_verify($password, $user['password'])) {
            header("location: ../view/auth/logIn.php?error=wrongpassword");
            exit();
        }

       
        session_start();
        $_SESSION["userid"] = $user["id"];
        $_SESSION["userName"] = $user["name"];
        $_SESSION["userrole"] = $user["role"];

        
        $role = new Role($user["role_id"], $user["role"]);
        $user= new User($user["name"], $user["email"], $user["password"], $role, $user["id"]);
}

}
