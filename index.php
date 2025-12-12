<?php 


session_start();

require_once(__DIR__."/src/views/header.php");
require_once(__DIR__."/src/controllers/UsersController.php");
require_once(__DIR__."/src/controllers/PostsController.php");

$controller = isset($_GET['c']) ? $_GET['c'] : 'home';
$action = isset($_GET['a']) ? $_GET['a'] : 'lister';

switch ($controller) {

    case 'home':
        require_once(__DIR__."/src/views/home.php");
        break;

    case 'User' :

        $userController = new UserController();

        switch ($action) {

            case 'inscription' :
                $userController->inscription();
                break;
    
            case 'enregistrer' :
                $userController->enregistrer();
                break;

            case 'connexion' :
                $userController->connexion();
                break;

            case 'connecter' : 
                $userController->verifieConnexion();
                break;

            case 'deconnexion' :
                $userController->deconnexion();
                break;

            default:
                $_SESSION['message'] = ['danger' => 'Page non trouvée'];
                header('Location: ?c=home');
                break;

        }

    case 'Posts' :

        $postsController = new postsController();

        switch ($action) {

            case 'ajouter' :
                $postsController->ajouter();
                break;
            
            case 'enregistrer' :
                $postsController->enregistrer();
                break;

            case 'lister' :
                $postsController->lister();
                break;

            default:
                $_SESSION['message'] = ['danger' => 'Page non trouvée'];
                header('Location: ?c=home');
                break;

        }
}

?>


