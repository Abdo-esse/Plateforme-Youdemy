<?php
session_start();
require __DIR__ . '/../../vendor/autoload.php';  
use App\controller\PaginationController;
$cours=new PaginationController('cours',8);
$totalPages=$cours->totalPages();
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
$data=$cours->getDataController($currentPage);

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
    <title> Youdemy | Home Page</title>
  </head>
  <body>

    <!-- header -->
    <nav x-data="{ isOpen: false }"
      class="relative bg-white shadow dark:bg-gray-800">
      <div
        class="container px-6 py-4 mx-auto md:flex md:justify-between md:items-center">
        <div class="flex items-center justify-between">
          <a href="#"
            class="text-2xl font-bold text-gray-800 hover:text-blue-600">
            <svg viewBox="0 0 200 60" xmlns="http://www.w3.org/2000/svg" width="150" height="50">
    <!-- Fond du logo -->
    <rect width="200" height="60" fill="white"/>
    
    <!-- Symbole du livre/écran -->
    <path d="M 40 15 
             L 60 15 
             L 60 45 
             L 40 45 
             Z" 
          fill="#4A90E2" 
          stroke="#2171CD" 
          stroke-width="2"/>
    
    <!-- Pages/écrans qui se superposent -->
    <path d="M 45 20 
             L 65 20 
             L 65 50 
             L 45 50 
             Z" 
          fill="#5CA0E2" 
          stroke="#2171CD" 
          stroke-width="2"/>
    
    <!-- Texte "You" -->
    <text x="80" y="38" 
          font-family="Arial" 
          font-weight="bold" 
          font-size="20" 
          fill="#2171CD">You</text>
    
    <!-- Texte "demy" -->
    <text x="125" y="38" 
          font-family="Arial" 
          font-weight="bold" 
          font-size="20" 
          fill="#4A90E2">demy</text>
    
    <!-- Tagline (facultatif, supprimé pour compacité) -->
    
    <!-- Graduation cap icon -->
    <path d="M 170 25 
             L 180 20 
             L 190 25 
             L 180 30 
             Z 
             M 180 30 
             L 180 35 
             M 172 26 
             L 172 33" 
          fill="none" 
          stroke="#4A90E2" 
          stroke-width="2"/>
</svg>

          </a>

          <!-- Mobile menu button -->
          <div class="flex lg:hidden">
            <button x-cloak @click="isOpen = !isOpen" type="button"
              class="text-gray-500 dark:text-gray-200 hover:text-gray-600 dark:hover:text-gray-400 focus:outline-none focus:text-gray-600 dark:focus:text-gray-400"
              aria-label="toggle menu">
              <svg x-show="!isOpen" xmlns="http://www.w3.org/2000/svg"
                class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                  d="M4 8h16M4 16h16" />
              </svg>

              <svg x-show="isOpen" xmlns="http://www.w3.org/2000/svg"
                class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                  d="M6 18L18 6M6 6l12 12" />
              </svg>
            </button>
          </div>
        </div>

        <!-- Mobile Menu open: "block", Menu closed: "hidden" -->
        <div x-cloak
          :class="[isOpen ? 'translate-x-0 opacity-100 ' : 'opacity-0 -translate-x-full']"
          class="absolute inset-x-0 z-20 w-full px-6 py-4 transition-all duration-300 ease-in-out bg-white dark:bg-gray-800 md:mt-0 md:p-0 md:top-0 md:relative md:bg-transparent md:w-auto md:opacity-100 md:translate-x-0 md:flex md:items-center text-center">
          <div class="flex flex-col md:flex-row md:mx-6">
            <a
              class="my-2 text-gray-700 transition-colors duration-300 transform dark:text-gray-200 hover:text-blue-500 dark:hover:text-blue-400 md:mx-4 md:my-0"
              href="index.html">Home</a>
            <a
              class="my-2 text-gray-700 transition-colors duration-300 transform dark:text-gray-200 hover:text-blue-500 dark:hover:text-blue-400 md:mx-4 md:my-0"
              href="#">About</a>
              <?php
              if (isset($_SESSION["userrole"])&&$_SESSION["userrole"]=="Etudiant") {?>
              <a
              class="my-2 text-gray-700 transition-colors duration-300 transform dark:text-gray-200 hover:text-blue-500 dark:hover:text-blue-400 md:mx-4 md:my-0"
              href="./etudiant/mesCours.php">Mes cours</a>
          </div>

      <div>
      <a href="http://localhost/Plateforme-Youdemy/App/view/auth/logout.php">
      <button type="button" class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">Log OUT</button>
        </a>
     <?php } else{?>

        <a href="./auth/logIn.php">
      <button type="button" class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">Log In</button>
        </a>
        <a href="./auth/signUp.php">
        <button type="button" class="text-white bg-blue-500 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Sign Up</button>

        </a>
        <?php }?>
      </div>
        </div>
      </div>
    </nav>

    <!-- hero section -->
    <section id="hero-section" class="h-[80vh] bg-gray-100 bg-cover bg-center relative">
      <div class="flex items-center justify-center h-full bg-black bg-opacity-50 mb-0">
        <div class="text-center text-white px-6">
          <h1 class="text-4xl lg:text-5xl font-bold mb-4">Welcome to  Youdemy: Your One-Stop Online Course Platform !</h1>
          <p class="text-lg mb-6">
          Explorez notre gamme complète de cours éducatifs interactifs, conçus pour enrichir vos connaissances et développer vos compétences tout en favorisant un apprentissage durable et accessible à tous..
          </p>
          <a href="#products" class="bg-blue-500 text-white py-3 px-5 rounded-lg hover:bg-blue-600 transition duration-300">
          get started
          </a>
        </div>
      </div>
    </section>



    <!-- Catalogue -->
    <div class="font-[sans-serif] mt-5 bg-gray-100">
    <div class="p-4 mx-auto lg:max-w-7xl sm:max-w-full">
        <div class="flex justify-between items-center mb-2">
            <h2 class="text-4xl font-extrabold text-gray-800">Catalogue</h2>
            <div class="relative">
                <input type="text" 
                       id="keyword"
                       oninput="searchKeyword()"
                       placeholder="Rechercher..." 
                       class="w-64 px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                >
                <svg class="w-5 h-5 absolute right-3 top-2.5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
            </div>
        </div>
        <hr>
        <div id="coursContanaire" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 max-xl:gap-4 gap-6">
        <?php
             foreach ($data as $cours) {
                  $tagsArray = explode(',', $cours->tags);
                 
                        ?>
 <article id="coursCatalogue" class="bg-white mt-4 rounded-xl shadow hover:shadow-md transition-shadow duration-300">
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
     
      <div class="flex items-center text-gray-500 text-sm">
        <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
        </svg>
        <span><?php echo $cours->Etudiant?>  étudiants</span>
      </div>
    </div>

    <div class="flex justify-between items-center">
      <span class="text-blue-600 font-bold"><?php echo $cours->prix?>  €</span>
      <a href=" ./etudiant/details.php?id=<?php echo $cours->id ?>"
        class="bg-blue-500 hover:bg-blue-600 text-white text-sm px-4 py-2 rounded-lg transition-colors">
        Read More
      </a>
    </div>
  </div>
</article>
    <?php
                }
                
            ?>
          

  



        </div>
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
    </body>
     <!-- footer -->
     <footer class="bg-white">
      <hr>
      <div class="mx-auto max-w-screen-xl px-4 pb-8 pt-16 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-md">
          <strong class="block text-center text-xl font-bold text-gray-900 sm:text-3xl">
            Want us to email you with the latest blockbuster news?
          </strong>

          <form class="mt-6">
            <div class="relative max-w-lg">
              <label class="sr-only" for="email"> Email </label>

              <input
                class="w-full rounded-full border-gray-200 bg-gray-100 p-4 pe-32 text-sm font-medium"
                id="email"
                type="email"
                placeholder="john@doe.com"
              />

              <button
                class="absolute end-1 top-1/2 -translate-y-1/2 rounded-full bg-blue-600 px-5 py-3 text-sm font-medium text-white transition hover:bg-blue-700"
              >
                Subscribe
              </button>
            </div>
          </form>
        </div>

        <div class="mt-16 grid grid-cols-1 gap-8 lg:grid-cols-2 lg:gap-32">
          <div class="mx-auto max-w-sm lg:max-w-none">
            <p class="mt-4 text-center text-gray-500 lg:text-left lg:text-lg">
              Lorem ipsum, dolor sit amet consectetur adipisicing elit. Praesentium natus quod eveniet
              aut perferendis distinctio iusto repudiandae, provident velit earum?
            </p>

            <div class="mt-6 flex justify-center gap-4 lg:justify-start">
              <a
                class="text-gray-700 transition hover:text-gray-700/75"
                href="#"
                target="_blank"
                rel="noreferrer"
              >
                <span class="sr-only"> Facebook </span>

                <svg class="size-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                  <path
                    fill-rule="evenodd"
                    d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"
                    clip-rule="evenodd"
                  />
                </svg>
              </a>

              <a
                class="text-gray-700 transition hover:text-gray-700/75"
                href="#"
                target="_blank"
                rel="noreferrer"
              >
                <span class="sr-only"> Instagram </span>

                <svg class="size-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                  <path
                    fill-rule="evenodd"
                    d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z"
                    clip-rule="evenodd"
                  />
                </svg>
              </a>

              <a
                class="text-gray-700 transition hover:text-gray-700/75"
                href="#"
                target="_blank"
                rel="noreferrer"
              >
                <span class="sr-only"> Twitter </span>

                <svg class="size-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                  <path
                    d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"
                  />
                </svg>
              </a>

              <a
                class="text-gray-700 transition hover:text-gray-700/75"
                href="#"
                target="_blank"
                rel="noreferrer"
              >
                <span class="sr-only"> GitHub </span>

                <svg class="size-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                  <path
                    fill-rule="evenodd"
                    d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z"
                    clip-rule="evenodd"
                  />
                </svg>
              </a>

              <a
                class="text-gray-700 transition hover:text-gray-700/75"
                href="#"
                target="_blank"
                rel="noreferrer"
              >
                <span class="sr-only"> Dribbble </span>

                <svg class="size-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                  <path
                    fill-rule="evenodd"
                    d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10c5.51 0 10-4.48 10-10S17.51 2 12 2zm6.605 4.61a8.502 8.502 0 011.93 5.314c-.281-.054-3.101-.629-5.943-.271-.065-.141-.12-.293-.184-.445a25.416 25.416 0 00-.564-1.236c3.145-1.28 4.577-3.124 4.761-3.362zM12 3.475c2.17 0 4.154.813 5.662 2.148-.152.216-1.443 1.941-4.48 3.08-1.399-2.57-2.95-4.675-3.189-5A8.687 8.687 0 0112 3.475zm-3.633.803a53.896 53.896 0 013.167 4.935c-3.992 1.063-7.517 1.04-7.896 1.04a8.581 8.581 0 014.729-5.975zM3.453 12.01v-.26c.37.01 4.512.065 8.775-1.215.25.477.477.965.694 1.453-.109.033-.228.065-.336.098-4.404 1.42-6.747 5.303-6.942 5.629a8.522 8.522 0 01-2.19-5.705zM12 20.547a8.482 8.482 0 01-5.239-1.8c.152-.315 1.888-3.656 6.703-5.337.022-.01.033-.01.054-.022a35.318 35.318 0 011.823 6.475 8.4 8.4 0 01-3.341.684zm4.761-1.465c-.086-.52-.542-3.015-1.659-6.084 2.679-.423 5.022.271 5.314.369a8.468 8.468 0 01-3.655 5.715z"
                    clip-rule="evenodd"
                  />
                </svg>
              </a>
            </div>
          </div>

          <div class="grid grid-cols-1 gap-8 text-center lg:grid-cols-3 lg:text-left">
            <div>
              <strong class="font-medium text-gray-900"> Services </strong>

              <ul class="mt-6 space-y-1">
                <li>
                  <a class="text-gray-700 transition hover:text-gray-700/75" href="#"> Marketing </a>
                </li>

                <li>
                  <a class="text-gray-700 transition hover:text-gray-700/75" href="#">
                    Graphic Design
                  </a>
                </li>

                <li>
                  <a class="text-gray-700 transition hover:text-gray-700/75" href="#">
                    App Development
                  </a>
                </li>

                <li>
                  <a class="text-gray-700 transition hover:text-gray-700/75" href="#">
                    Web Development
                  </a>
                </li>
              </ul>
            </div>

            <div>
              <strong class="font-medium text-gray-900"> About </strong>

              <ul class="mt-6 space-y-1">
                <li>
                  <a class="text-gray-700 transition hover:text-gray-700/75" href="#"> About </a>
                </li>

                <li>
                  <a class="text-gray-700 transition hover:text-gray-700/75" href="#"> Careers </a>
                </li>

                <li>
                  <a class="text-gray-700 transition hover:text-gray-700/75" href="#"> History </a>
                </li>

                <li>
                  <a class="text-gray-700 transition hover:text-gray-700/75" href="#"> Our Team </a>
                </li>
              </ul>
            </div>

            <div>
              <strong class="font-medium text-gray-900"> Support </strong>

              <ul class="mt-6 space-y-1">
                <li>
                  <a class="text-gray-700 transition hover:text-gray-700/75" href="#"> FAQs </a>
                </li>

                <li>
                  <a class="text-gray-700 transition hover:text-gray-700/75" href="#"> Contact </a>
                </li>

                <li>
                  <a class="text-gray-700 transition hover:text-gray-700/75" href="#"> Live Chat </a>
                </li>
              </ul>
            </div>
          </div>
        </div>

        <div class="mt-16 border-t border-gray-100 pt-8">
          <p class="text-center text-xs/relaxed text-gray-500">
            © Company 2022. All rights reserved.

            <br />

            Created with
            <a href="#" class="text-gray-700 underline transition hover:text-gray-700/75">Laravel</a>
            and
            <a href="#" class="text-gray-700 underline transition hover:text-gray-700/75"
              >Laravel Livewire</a
            >.
          </p>
        </div>
      </div>
    </footer>
</html>

<script
      src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"
      defer></script>
      <script src="./js/search.js"></script>
      


      

