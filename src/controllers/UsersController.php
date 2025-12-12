<?php

namespace App\Controllers;
use App\Models\User;

class userController {

    private $userModel;

    public function __construct() {
        $this->userModel = new User();
    }

    public function inscription() {
        require_once(__DIR__.'/../views/Users/inscription.php');
    }

    public function enregistrer() {
        $nom = $_POST['nom'];
        $password = $_POST['password'];
        $password = password_hash($password, PASSWORD_DEFAULT);
        $email = $_POST['email'];

        $id = $this->userModel->add($nom, $email, $password);

        if ($id !== false && $id !== null) {
            require_once(__DIR__.'/../views/Users/enregistrer.php');
        } else {
            echo 'Erreur lors de l\'enregistrement de l\'utilisateur.';
        }
    }

    public function connexion() {
        require_once(__DIR__.'/../views/Users/connexion.php');
    }

    public function verifieConnexion() {

        $nom = $_POST['nom'];
        $password = $_POST['password'];

        $user = $this->userModel->findBy(['nom' => $nom])[0];

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['id'] = $user['id'];
            $_SESSION['nom'] = $user['nom'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['date_inscription'] = $user['date_inscription'];

            header("location: ?c=home");
        } else {
            echo 'Nom ou mot de passe incorrect.';
        }
    }

    public function deconnexion() {
        session_destroy();
        header("location: ?c=home");
    }
}
