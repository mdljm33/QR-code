<?php
$servername = "localhost"; // Adresse du serveur
$username = "root"; // Nom d'utilisateur (par défaut c'est 'root'
$password = "root"; // Mot de passe (par défaut root sur UwAMP)
$dbname = "chasse_qrcode"; // Nom de la base de données

// Créer une connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Erreur de connexion : " . $conn->connect_error);
}
?>