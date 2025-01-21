
<?php
session_start();
require __DIR__ . '/../../../vendor/autoload.php';
use App\controller\EtudiantController;
use App\class\Role;
if ( $_SESSION["userrole"]!="Etudiant") {
  
   session_destroy();
   header("Location: ../auth/logIn.php"); 
   exit(); 
   }
   $roleEtudiant= new Role(3);
   $etudiant= new EtudiantController( $_SESSION["userName"],$_SESSION["useremail"],"",$roleEtudiant, $_SESSION["userid"]);
   $data=$etudiant->getCoursInscrireController();

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
              href="../index.php">Home</a>
            <a
              class="my-2 text-gray-700 transition-colors duration-300 transform dark:text-gray-200 hover:text-blue-500 dark:hover:text-blue-400 md:mx-4 md:my-0"
              href="#">About</a>
              <?php
              if (isset($_SESSION["userrole"])&&$_SESSION["userrole"]=="Etudiant") {?>
              <a
              class="my-2 text-gray-700 transition-colors duration-300 transform dark:text-gray-200 hover:text-blue-500 dark:hover:text-blue-400 md:mx-4 md:my-0"
              href="#">Mes cours</a>
          </div>

      <div>
      <a href="../auth/logIn.php">
      <button type="button" class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">Log OUT</button>
        </a>
     <?php } else{?>

        <a href="../auth/logIn.php">
      <button type="button" class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">Log In</button>
        </a>
        <a href="../auth/signUp.php">
        <button type="button" class="text-white bg-blue-500 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Sign Up</button>

        </a>
        <?php }?>
      </div>
        </div>
      </div>
    </nav>

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

    <div class="flex justify-between items-center">
      <span class="text-blue-600 font-bold"><?php echo $cours->prix?>  €</span>
      <a href="./cours.php?id=<?php echo $cours->id ?>"
        class="bg-blue-500 hover:bg-blue-600 text-white text-sm px-4 py-2 rounded-lg transition-colors">
        Read More
      </a>
    </div>
  </div>
</article>
    <?php
                }
                
            ?>