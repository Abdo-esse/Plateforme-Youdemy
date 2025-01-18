<?php 
namespace App\controller;
require __DIR__ . '/../../vendor/autoload.php';  
use App\model\Pagination;

class PaginationController
{

    private Pagination $paginationModel;

   
    

    public function __construct( $table ,  $nbrElementPerPage = 6){
       
        $this->paginationModel=new Pagination( $table,  $nbrElementPerPage = 6);
       
    }
    public function getDataController($page){
        $this->paginationModel->getData($page);
    }
    public function totalPages($page){
        $this->paginationModel->getTotalPages();
    }
    

}