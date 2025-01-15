<?php
session_start();
require __DIR__ . '/../../../../vendor/autoload.php'; 
use App\controller\TagC;
if ( $_SESSION["userrole"]!="Administrateur") {
  
    session_destroy();
    header("Location: ../auth/logIn.php"); 
    exit(); 
 } 

if (isset($_POST['submit'])) {
    $tagsTitle=$_POST["tagsTitle"];
   
    foreach($tagsTitle as $tagTitle ){
      $tag = new TagC($tagTitle, $_SESSION["userid"]);
      $tag->addTagController();
      }
       header("Location: ./index.php");
      exit(); 
}
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
    <title> Youdemy | Add Tags</title>
  </head>
<body>
<div id="step-7" class="w-[50%] mx-auto">
      <h2 class="text-2xl font-bold mb-4">Add Tags</h2>
      <form  method="post" >
        <div id="form-work-experience" >
          <div class="parent-input mb-4">
            <label
             class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
            >
        Tags title
            </label>
             <input
               type="text"
               name="tagsTitle[]"
               class="input-value job-title bg-gray-50 border border-gray-300 mb-2 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
               placeholder="Tags title"
               required
             />
            
         </div>
        </div>
        
          
      
      
      <button
            type="button"
            id="add-work-experience"
            class=" text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2"
          >
            Add ather tags
       </button>
      <div class="flex justify-center">
        <button
          type="submit"
          name="submit"
          id="saveData"
          class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2"
        >
          Save
        </button>
      </div>
    </form>
    </div>

</body>
</html>
<script src="../../js/main.js"></script>