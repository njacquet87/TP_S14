<?php

require_once(__DIR__."/../models/Posts.php");

class postsController {

    private $postsModel;

    public function __construct() {
        $this->postsModel = new User();
    }

    public function ajouter() {
        require_once(__DIR__."/../views/Posts/ajouter.php");
    }

public function enregistrer() {
    $id = isset($_GET['id']) ? $_GET['id'] : null;

    $titre = $_POST['titre'];
    $contenu = $_POST['contenu'];
    $utilisateur_id = $_POST['utilisateur_id'];

    if ($id) {
        $ok = $this->postsModel->update($id, $titre, $contenu, $utilisateur_id);
    } else {
        $ok = $this->postsModel->add($titre, $contenu, $utilisateur_id);
        echo 'aaa';
    }

    if ($ok) {
        require_once(__DIR__ . '/../Views/Posts/enregistrer.php');
    } else {
        echo "Erreur lors de l'enregistrement du post.";
    }
}

}