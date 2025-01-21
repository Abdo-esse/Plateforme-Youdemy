<?php 
session_start();
require __DIR__ . '/../../../vendor/autoload.php';
use App\controller\CoursConroller;



if(isset($_GET['keyword']) && !empty($_GET['keyword'])){
    $keyword=$_GET['keyword'];
    $cours=new CoursConroller();
    print_r($cours->searchCoursController($keyword));

}





?>