<?php

require_once(__DIR__."/../models/Posts.php");

class postsController {

    private $postsModel;

    public function __construct() {
        $this->postsModel = new Posts();
    }

    public function ajouter() {
        require_once(__DIR__."/../views/Posts/ajouter.php");
    }

    public function enregistrer() {

        $titre = $_POST['titre'];
        $contenu = $_POST['contenu'];
        $utilisateur_id = $_SESSION['id'];

        $id = $this->postsModel->add($titre, $contenu, $utilisateur_id);
        
        if ($id !== false && $id !== null) {
            require_once(__DIR__ . '/../Views/Posts/enregistrer.php');
        } else {
            echo "Erreur lors de l'enregistrement du post.";
        }
    }

    public function lister() {
        $posts = $this->postsModel->findAll();

        require_once(__DIR__.'/../views/Posts/lister.php');
    }

    public function supprimer() {
        $id = $_GET['id'];
        
    }

}