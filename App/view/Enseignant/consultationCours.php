<?php
session_start();
require __DIR__ . '/../../../vendor/autoload.php';

use App\controller\CoursConroller;
if ( $_SESSION["userrole"]!="Enseignant") {
  
   session_destroy();
   header("Location: ../auth/logIn.php"); 
   exit(); 
   }
   
   $idEseignant=$_SESSION["userid"];

   $cours=new CoursConroller();
   $totalPages=$cours->totalPages($idEseignant);
   if(isset($_GET["page"])){

    if (!is_numeric($_GET["page"]) || $_GET["page"] < 1 ||$_GET["page"]> $totalPages) {
        $currentPage=1;
    }else{
      $currentPage=$_GET["page"];
    }
     
   } 
   else{
    $currentPage=1;
   }
   $data=$cours->afficherCoursPublier($idEseignant,$currentPage);
   ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

   
       <!-- font -->
       <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    <!-- tailwind -->
    <!-- carousel -->
    <link href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" rel="stylesheet"/>
    <script src="https://cdn.tailwindcss.com"></script>
    <script
      src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries"></script>
    <script>
      tailwind.config = {
        theme: {
          extend: {
            colors: {
              clifford: '#da373d',
            }
          }
        }
      }
    </script>
    <style type="text/tailwindcss">
      @layer utilities {
        .content-auto {
          content-visibility: auto;
        }
      }
    </style>


 <!-- link css -->
 <link rel="stylesheet" href="./css/style.css">
    <link rel="shortcut icon" href="assets/images/logo/faveicon.webp" type="image/x-icon">
    <title> Youdemy | Dashbord</title>
  </head>
  <body>
        
        <main>
            
   
        <?php include './sideBar.php' ?>
<div class="p-4 sm:ml-64">
   
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    

    <section class="grid grid-cols-1 ml-1.5 mt-1.5 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 max-xl:gap-4 gap-6">
  
      <?php
             foreach ($data as $cours) {
                  $tagsArray = explode(',', $cours->tags);
                 
                        ?>
 <article class="bg-white rounded-xl shadow hover:shadow-md transition-shadow duration-300">
  <div class="relative">
    <iframe class="w-full h-40 object-cover rounded-t-xl" src="<?php echo $cours->photoCouverture?>" frameborder="0"></iframe>

    <!-- Catégorie -->
    <span class="absolute top-2 left-2 bg-purple-500 text-white text-xs px-2 py-1 rounded-full">
    <?php echo $cours->categories?>
    </span>
  </div>
  
  <div class="p-4">
    <div class="mb-2">
      <h3 class="text-lg font-semibold line-clamp-1"><?php echo $cours->titre?></h3></h3>
    </div>
    
    <!-- Tags -->
    <div class="flex flex-wrap gap-1 mb-2">
    <?php foreach($tagsArray as $tag){?>
        <span class="bg-gray-100 text-gray-600 text-xs px-2 py-0.5 rounded"><?php echo $tag?></span>
      <?php }?>
    </div>

    <p class="text-gray-600 text-sm line-clamp-2 mb-3">
    <?php echo $cours->description?>
    </p>
    
    <div class="space-y-1.5 mb-4">
      <div class="flex items-center text-gray-500 text-sm">
        <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
        </svg>
        <span><?php echo $cours->duree?>h</span>
      </div>
      <div class="flex items-center text-gray-500 text-sm">
        <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
        </svg>
        <span><?php echo $cours->nomberChapitre?> chapitres</span>
      </div>
      <!-- Ajout du nombre d'étudiants -->
      <div class="flex items-center text-gray-500 text-sm">
        <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
        </svg>
        <span>125 étudiants</span>
      </div>
    </div>

    <div class="flex justify-between items-center">
      <span class="text-blue-600 font-bold"><?php echo $cours->prix?>  €</span>
      <a href="./cour/detaille.php?id=<?php echo $cours->id ?>" class="bg-blue-500 hover:bg-blue-600 text-white text-sm px-4 py-2 rounded-lg transition-colors">
        Read More
      </a>
    </div>
  </div>
</article>
    <?php
                }
                
            ?>


  </section>
  <nav aria-label="Pagination" class="flex justify-center mt-8">
  <ul class="inline-flex -space-x-px">
    <li>
      <a href="?page=<?php echo  $currentPage - 1 ?>" 
         class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 <?php echo $currentPage === 1 ? 'opacity-50 cursor-not-allowed' : '' ?>">
        Précédent
      </a>
    </li>
    
    <?php
    $showEllipsis = $totalPages > 7;
    
    if (!$showEllipsis) {
      for ($i = 1; $i <= $totalPages; $i++) {
        ?>
        <li>
          <a href="?page=<?php echo $i ?>" 
             class="flex items-center justify-center px-3 h-8 leading-tight border <?php echo $currentPage === $i 
               ? 'text-blue-600 border-blue-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700'
               : 'text-gray-500 bg-white border-gray-300 hover:bg-gray-100 hover:text-gray-700' ?>">
            <?php echo $i ?>
          </a>
        </li>
        <?php
      }
    } else {
      // Logic for showing ellipsis
      $pageNumbers = [];
      if ($currentPage <= 4) {
        $pageNumbers = array_merge(range(1, 5), ['...', $totalPages]);
      } elseif ($currentPage >= $totalPages - 3) {
        $pageNumbers = array_merge([1, '...'], range($totalPages - 4, $totalPages));
      } else {
        $pageNumbers = array_merge(
          [1, '...'],
          range($currentPage - 1, $currentPage + 1),
          ['...', $totalPages]
        );
      }
      
      foreach ($pageNumbers as $pageNumber) {
        if ($pageNumber === '...') {
          ?>
          <li>
            <span class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300">
              ...
            </span>
          </li>
          <?php
        } else {
          ?>
          <li>
            <a href="?page=<?php echo $pageNumber ?>" 
               class="flex items-center justify-center px-3 h-8 leading-tight border <?php echo $currentPage === $pageNumber 
                 ? 'text-blue-600 border-blue-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700'
                 : 'text-gray-500 bg-white border-gray-300 hover:bg-gray-100 hover:text-gray-700' ?>">
              <?php echo $pageNumber ?>
            </a>
          </li>
          <?php
        }
      }
    }
    ?>
    
    <li>
      <a href="?page=<?php echo  $currentPage + 1 ?>" 
         class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 <?php echo $currentPage === $totalPages ? 'opacity-50 cursor-not-allowed' : '' ?>">
        Suivant
      </a>
    </li>
  </ul>
</nav>
</div>
</div>

        </main>
    




</body>
</html>


