<?php 


session_start();

var_dump($_SESSION);

require_once(__DIR__."/src/views/header.php");
require_once(__DIR__."/src/controllers/UsersController.php");

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
}

?>


