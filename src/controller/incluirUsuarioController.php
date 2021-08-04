<?php namespace controller;

use model\Usuario;
use infra\UsuarioRepository;

class IncluirUsuarioController implements ControllerInterface
{
    private $usuarioRepository;

    public function __construct(){
        $this->usuarioRepository = new UsuarioRepository();            
    }

    public function handle(){
        extract($_POST);
        $usuario = new Usuario($nomeUsuario, $email);
        $usuario->setNomeCompleto($nomeCompleto);
        $usuario->cadastrarSenha($senha);

        $this->usuarioRepository->inserir($usuario);
    }    
}

