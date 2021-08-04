<?php namespace controller;

use helper\renderTrait;
use view\inserirUsuarioFormularioView;

class IncluirUsuarioFormularioController implements ControllerInterface
{
    use renderTrait;

    public function handle(){
        $html = $this->render('inserirUsuarioFormularioView', ['title' => 'Criar usuário']);
        echo $html;
    }
}