<?php 
namespace App\controller;
require __DIR__ . '/../../vendor/autoload.php';  
use App\model\Pagination;

class PaginationController
{

    private Pagination $paginationModel;

   
    

    public function __construct( $table ,  $nbrElementPerPage = 4){
       
        $this->paginationModel=new Pagination( $table,  $nbrElementPerPage = 4);
       
    }
    public function getDataController($page){
       return  $this->paginationModel->getData($page);
    }
    public function totalPages(){
       return $this->paginationModel->getTotalPages();
    }
    

}