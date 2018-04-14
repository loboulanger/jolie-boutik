<?php
// Domaine ou IP du serveur ou est située la base de données
define('HOST', 'localhost');
// Nom d'utilisateur autorisé à se connecter à la base
define('USER', 'root');
// Mot de passe de connexion à la base
define('PASS', 'mysql');
// Base de données sur laquelle on va faire les requêtes
define('DB', 'authent');

// Le bloc try teste tout ce qui se situe à l'intérieur
try {
    // Tableau d'options pour la base de données
    $db_options = array(
        // Activation des exceptions PDO :
		PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
		// Change le fetch mode par défaut sur FETCH_ASSOC pour retourner un tableau associatif :
		PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    );

    // On crée une connexion avec la base de données
    $db = new PDO('mysql:host='.HOST.';dbname='.DB, USER, PASS, $db_options);
}

// Si une erreur survient, on entre dans le bloc catch et on récupère l'erreur
catch (Exception $e) {
    // On quitte l'execution du script en affichant le message d'erreur
    exit('MySQL Connect Error >> '.$e->getMessage());
}