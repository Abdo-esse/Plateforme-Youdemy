<?php 
session_start();
require __DIR__ . '/../../../../vendor/autoload.php'; 
use App\controller\CoursConroller;
if (isset($_GET["id"]))
{
    $id=$_GET["id"];
    $isPublier= true;
    $publierCours=new CoursConroller();
    $publierCours->publierCours($id,$isPublier);
    header("Location: ./index.php");
    exit();
}


?>