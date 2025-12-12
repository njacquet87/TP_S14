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

        $ok = $this->postsModel->add($titre, $contenu, $utilisateur_id);
        
        if ($ok) {
            require_once(__DIR__ . '/../Views/Posts/enregistrer.php');
        } else {
            echo "Erreur lors de l'enregistrement du post.";
        }
    }

    public function lister() {

    }

}