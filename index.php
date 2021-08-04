<?php 

use model\Usuario;
use infra\UsuarioRepository;
use controller\{
    IncluirUsuarioFormularioController, 
    IncluirUsuarioController, 
    LoginFormularioController,
    LoginController
};

require_once 'autoload.php';

session_start();

$router = require __DIR__ . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'router' . DIRECTORY_SEPARATOR . 'router.php';
$uri = $_SERVER['REQUEST_URI'];

if(!array_key_exists($uri, $router)){
    echo "Página não Encontrada!";
    return;
}

if(!isset($_SESSION['logado']) && ($uri != '/login' && $uri != '/autentica-usuario')){
    header('Location: /login');
    return;
}

$controllerName = $router[$uri];
$controller = new $controllerName();
$controller->handle();