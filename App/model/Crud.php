<?php 
namespace App\model;


require __DIR__ . '/../../vendor/autoload.php';
use App\Config\Connexion;
use PDO;


class Crud 
{
//   public static function createActioncours($table, $data)
// {
//   $conn = Connexion::connexion();
//     $columns = implode(", ", array_keys($data));
//     $placeholders = implode(", ", array_fill(0, count($data), '?')); 

//     // Vérifier si les colonnes sont bien présentes
//     if(empty($columns) || empty($placeholders)){
//         throw new Exception("Erreur: Colonnes ou valeurs manquantes.");
//     }

//     $sql = "INSERT INTO `$table` ($columns) VALUES ($placeholders)";
    
//     try {
//         $stmt = $conn->prepare($sql);
//         $stmt->execute(array_values($data));
//     } catch (PDOException $e) {
//         die("Erreur SQL : " . $e->getMessage());
//     }
// }

      static function createAction ($table,$data){
        $conn = Connexion::connexion();
        $columns = implode(',', array_keys($data));
        $values = implode(',', array_fill(0, count($data), '?'));
        $sql = "INSERT INTO $table ($columns) VALUES ($values)";
         $stmt = $conn->prepare($sql);
         $stmt->execute(array_values($data));
         return $conn->lastInsertId();
      }

      static function readAll($table){
        $conn = Connexion::connexion(); 
        $sql="SELECT * FROM $table";
        $stmt=$conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
      }
     
      static function readAction($table,$wher){
        $conn = Connexion::connexion();
        $column = key($wher);
        $sql="SELECT * FROM $table WHERE $column= ?";
        $stmt= $conn->prepare($sql);
        $stmt->execute(array_values($wher));

        return $stmt->fetch(PDO::FETCH_OBJ);
      }

      static function updateAction($table,$id,$data){
        $conn = Connexion::connexion();
        $columns=implode(' = ?, ',array_keys($data)) . ' = ?';
        $sql="UPDATE $table SET  $columns  WHERE id = ?";
        $stmt= $conn->prepare($sql);
        $stmt->execute(array_merge(array_values($data), [$id]));
      }


      static function deleteAction($tabel,$id){
        $conn = Connexion::connexion();
        $column = key($wher);
        $sql="DELETE FROM $tabel WHERE $column= ?";
        $stmt= $conn->prepare($sql);
        $stmt->execute(array_values($wher));
      }


      

}

