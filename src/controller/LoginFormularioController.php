<?php namespace controller;

use helper\renderTrait;

class LoginFormularioController implements ControllerInterface
{
    use renderTrait;

    public function handle(){        
        $html = $this->render('loginFormularioView', ['title' => 'Login']);
        echo $html;
    }
}