<?php
session_start();
session_unset();
session_destroy();

  // Retour à la page d'accueil
  header ("location: ../index.php");