<?php 

use model\Usuario;
use infra\UsuarioRepository;

require_once 'autoload.php';

$pdo = new \PDO(
    'sqlite:' . __DIR__ . DIRECTORY_SEPARATOR . 'db.sqlite3', 
    null, 
    null, 
    [
        PDO::ATTR_PERSISTENT => true
    ]
);
$usuarioRepository = new UsuarioRepository($pdo);

$jon = new Usuario('JonThunder', 'jon@thunder.com');
$jon->setNomeCompleto('Jon');
$jon->cadastrarSenha('12345678');

$greg = new Usuario('GregSnake', 'greg@snake.com');
$greg->setNomeCompleto('Greg');
$greg->cadastrarSenha('gregsnake');

$tom = new Usuario('TomStrike', 'tom@strike.com');
$tom->setNomeCompleto('Tom');
$tom->cadastrarSenha('tom123,');


$usuarioRepository->inserir($jon);
$usuarioRepository->inserir($greg);
$usuarioRepository->inserir($tom);

$todos = $usuarioRepository->encontrarTodos();
var_dump($todos);