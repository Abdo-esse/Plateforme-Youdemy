<?php 
session_start();

require __DIR__ . '/../../../vendor/autoload.php'; 
use App\controller\auth\Signup; 

if(isset($_POST["submit"]))
{
    $fullName=$_POST["fullname"];
    $password=$_POST["password"];
    $idRole=$_POST["idRole"];
    $email=$_POST["email"];
    $signup=new Signup($idRole,$fullName,$email,$password);
    $signup->signupUser();
    header ("location: logIn.php");
    exit();
  }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- link css -->
    <link rel="stylesheet" href="assets/style/style.css">
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



    <link rel="shortcut icon" href="assets/images/logo/faveicon.webp" type="image/x-icon">
    <title> Youdemy | Sign Up Page</title>
  </head>


<body class="bg-gray-100 min-h-screen flex items-center justify-center p-4">
    <div class="max-w-md w-full">
        <!-- Card Container -->
        <div class="bg-white rounded-2xl shadow-xl p-8">
            <!-- Logo et Titre -->
            <div class="text-center mb-8">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-blue-600 rounded-full mb-4">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <h2 class="text-3xl font-bold text-gray-900">Inscription</h2>
                <p class="text-gray-600 mt-2">Rejoignez notre communauté d'apprentissage</p>
                <?php
    if (isset($_SESSION['errorGenerale'])) {
        echo '<div class="text-red-600 error-message">' . $_SESSION['errorGenerale'] . '</div>';
        unset($_SESSION['errorGenerale']); 
    }
    ?>
            </div>

            <!-- Formulaire -->
            <form class="space-y-6" method="post">
                <!-- Nom complet -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2" for="fullname">
                        Nom complet
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                        </div>
                        <input 
                            id="fullname" 
                            name="fullname" 
                            type="text" 
                            required 
                            class="block w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent transition-colors"
                            placeholder="John Doe"
                        >
                    </div>
                    <?php
    if (isset($_SESSION['errorname'])) {
        echo '<div class="text-red-600 error-message">' . $_SESSION["errorname"] . '</div>';
        unset($_SESSION['errorname']); 
    }
    ?>
                </div>

                <!-- Email -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2" for="email">
                        Adresse email
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"/>
                            </svg>
                        </div>
                        <input 
                            id="email" 
                            name="email" 
                            type="email" 
                            required 
                            class="block w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent transition-colors"
                            placeholder="vous@exemple.com"
                        >
                    </div>
                    <?php
    if (isset($_SESSION['erroremail'])) {
        echo '<div class="text-red-600 error-message">' . $_SESSION["erroremail"] . '</div>';
        unset($_SESSION['erroremail']); 
    }
    ?>
                </div>

                <!-- Mot de passe -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2" for="password">
                        Mot de passe
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                            </svg>
                        </div>
                        <input 
                            id="password" 
                            name="password" 
                            type="password" 
                            required 
                            class="block w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent transition-colors"
                            placeholder="••••••••"
                        >
                    </div>
                    <?php
    if (isset($_SESSION['errorGenerale'])) {
        echo '<div class="text-red-600 error-message">' . $_SESSION['errorGenerale'] . '</div>';
        unset($_SESSION['errorGenerale']); 
    }
    ?>
                </div>

                <!-- Choix du rôle -->
                <div class="space-y-4">
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Je suis...
                    </label>
                    <div class="grid grid-cols-2 gap-4">
                        <!-- Option Étudiant -->
                        <div>
                            <input type="radio" id="student" name="idRole" value="3" class="hidden peer" required>
                            <label for="student" class="flex items-center justify-center p-4 text-gray-500 bg-white border border-gray-300 rounded-lg cursor-pointer peer-checked:border-blue-600 peer-checked:bg-blue-50 peer-checked:text-blue-600 hover:bg-gray-50 transition-colors">
                                <div class="flex items-center justify-center space-x-2">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                    </svg>
                                    <span>Étudiant</span>
                                </div>
                            </label>
                        </div>
                        <!-- Option Enseignant -->
                        <div>
                            <input type="radio" id="teacher" name="idRole" value="2" class="hidden peer">
                            <label for="teacher" class="flex items-center justify-center p-4 text-gray-500 bg-white border border-gray-300 rounded-lg cursor-pointer peer-checked:border-blue-600 peer-checked:bg-blue-50 peer-checked:text-blue-600 hover:bg-gray-50 transition-colors">
                                <div class="flex items-center justify-center space-x-2">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z"/>
                                    </svg>
                                    <span>Enseignant</span>
                                </div>
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Bouton d'inscription -->
                <button 
                   type="submit" name="submit"
                    class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors"
                >
                    Créer mon compte
                </button>
            </form>

            <!-- Lien de connexion -->
            <p class="mt-8 text-center text-sm text-gray-600">
                Déjà un compte ?
                <a href="#" class="font-medium text-blue-600 hover:text-blue-500">
                    Se connecter
                </a>
            </p>
        </div>
    </div>
</body>
</html>