<?php 
namespace App\controller;
require __DIR__ . '/../../vendor/autoload.php';  
use App\model\Pagination;

class PaginationController
{

    private Pagination $paginationModel;

   
    

    public function __construct( $table ,  $nbrElementPerPage){
       
        $this->paginationModel=new Pagination( $table,  $nbrElementPerPage);
       
    }
    public function getDataController($page){
       return  $this->paginationModel->getData($page);
    }
    public function totalPages(){
       return $this->paginationModel->getTotalPages();
    }
    

}