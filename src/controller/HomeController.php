<?php namespace controller;

use helper\renderTrait;
use infra\UsuarioRepository;

class HomeController implements ControllerInterface
{
    use renderTrait;

    private $usuarioRepository;

    public function __construct(){
        $this->usuarioRepository = new UsuarioRepository();
    }

    public function handle(){
        $usuarios = $this->usuarioRepository->encontrarTodos();
        $html = $this->render('homeView', ['usuarios' => $usuarios, 'title' => 'Home']);
        echo $html;
    }
}