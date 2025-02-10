<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="/Serre Connecte/styles/style.css">
<title>Espace CLient</title>
</head>
<body>
<header>
  <?php include '../modules/header.php'; ?>
</header>

<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $classe = $_POST['classe'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hachage du mot de passe

    // Insertion des données dans la base de données
    $sql = "INSERT INTO users (username, email, password, role) VALUES ('$username', '$email', '$password', '$role')";

    if ($conn->query($sql) === TRUE) {
        echo "Inscription réussie. Vous pouvez vous connecter !";
    } else {
        echo "Erreur : " . $conn->error;
    }
}

$conn->close();
?>


        <?php include 'footer.php'; ?>
</body>

</html>