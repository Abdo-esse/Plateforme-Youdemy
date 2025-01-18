<?php
class Paginator {
 
    private $table;
    private $nbrElementPerPage;

    public function __construct(  $table, int $nbrElementPerPage = 6) {
        $this->table = $table;
        $this->nbrElementPerPage = $nbrElementPerPage;
    }

    // Obtenir le nombre total d'éléments dans la table
    public function getTotalCount(){
        $conn = Connexion::connexion();
        $query = $conn->prepare("SELECT COUNT(id) as total FROM {$this->table}");
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
        return  $result['total'];
    }

    // Récupérer les données paginées
    public function getData( $page) {
        $debut = ($page - 1) * $this->nbrElementPerPage;
        $query = $this->pdo->prepare("SELECT * FROM {$this->table} ORDER BY id LIMIT ?, ?");
        $query->execute([$debut,$this->nbrElementPerPage]);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    // Obtenir le nombre total de pages
    public function getTotalPages() {
        $totalCount = $this->getTotalCount();
        return  ceil($totalCount / $this->nbrElementPerPage);
    }
}
