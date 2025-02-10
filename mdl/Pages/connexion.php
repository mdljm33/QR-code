<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/mdl/style/styles.css">
    <title>Connexion</title>
</head>
<header>
    <?php include '../modules/header.php'; ?>
</header>

<body>
<div class="client-area">
    <div class="container">
      <form method="post" action="/Serre Connecte/modules/register_area.php" class="register-form">
          <h2>Connexion</h2>

          <div class="form-group">
              <label for="email">E-mail :</label>
              <input type="email" id="email" name="email" required>
          </div>

          <div class="form-group">
              <label for="password">Mot de passe :</label>
              <input type="password" id="password" name="password" required>
          </div>

          <div class="button">
              <input type="submit" value="Connexion" class="button">
          </div>
      </form>
  </div>
</div>

    <?php include '../Modules/footer.php'; ?>

</body>
</html>
