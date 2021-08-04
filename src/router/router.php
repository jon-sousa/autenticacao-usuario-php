<?php

use controller\{
    IncluirUsuarioController,
    IncluirUsuarioFormularioController, 
    LoginFormularioController, 
    LoginController,
    HomeController
};

return [
    '/incluir-usuario' => IncluirUsuarioFormularioController::class,
    '/salvar-usuario' => IncluirUsuarioController::class,
    '/login' => LoginFormularioController::class,
    '/autentica-usuario' => LoginController::class,
    '/' => HomeController::class
];