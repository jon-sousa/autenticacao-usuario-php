<?php namespace controller;

use infra\UsuarioRepository;

class LoginController implements ControllerInterface
{

    private $usuarioRepository;

    public function __construct(){
        $this->usuarioRepository = new UsuarioRepository();            
    }

    public function handle(){
        extract($_POST);

        $usuario = $this->usuarioRepository->encontrarUm($email);

        if(is_null($usuario)){
            echo "Usuário não encontrado";
            return;
        }


        if(!($usuario->verificarSenha($senha))){
            echo "Senha incorreta!";
            return;
        }

        $_SESSION['logado'] = $usuario->getNomeUsuario();
        header('Location: /');
    }
}