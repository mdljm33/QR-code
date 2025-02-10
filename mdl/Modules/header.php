<!DOCTYPE html>
<html lang="fr">
  <!-- Vérifier si l'utilisateur n'est pas déjà connecté-->
  <?php
  if (session_status() === PHP_SESSION_NONE) {
      session_start();
  }
  //include 'db.php'; // Connexion à la base de données
  
  // Vérifiez si l'utilisateur est connecté
  $isLoggedIn = isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true;
  
  if ($isLoggedIn) {
      $email = $_SESSION['email']; // Email de l'utilisateur stocké en session
      $sql = "SELECT username FROM users WHERE email='$email'";
      $result = $conn->query($sql);
      $user = $result->fetch_assoc();
  }
  ?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Chasse aux QR Codes</title>
  <link rel="stylesheet" href="/mdl/style/styles.css">
</head>

<header>
  <H1>La fête de pâque à la MDL</H1>
  <img src="/mdl/Photo/logo.png"width="80" height="90" alt="Logo MDL">

  <!-- Espace utilisateur à droite -->
  <?php if ($isLoggedIn): ?>
  <div class="client-area">
    <a href="/Serre Connecte/pages/client_area.php" class="login-button">Votre classement</a>
    <a href="/Serre Connecte/pages/logout.php"  class="login-button" >Se Déconnecter</a>
  </div>

  <?php else: ?>
    <div class="client-nonlog">
      <a href="/mdl/Pages/connexion.php">Se Connecter</a>
      <a href="/mdl/Pages/inscription.php">S'inscrire</a>
    </div>
  <?php endif; ?>

</header>