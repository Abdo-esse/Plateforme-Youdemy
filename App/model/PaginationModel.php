<?php 


class Pagination 
{


    static public function nbrTotal($table){
        $conn = Connexion::connexion();
        $sql="SELECT COUNT(id) as total from $table ";
        $stmt= $conne->prepare($sql);
        $stmt->executer();
        $countResult=$stmt->fetch(PDO::FETCH_ASSOC);
        return $countResult['total'];
    }

    static public function nbrdonnesPagines($table,$debut,$nbrElement){
        $conn = Connexion::connexion();
        $sql="SELECT * FROM $table ORDER BY id LIMIT ? , ?";
        $stmt= $conne->prepare($sql);
        $stmt->executer([$debut,$nbrElement]);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
        
    }
}