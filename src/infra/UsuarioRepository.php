<?php namespace infra;

use model\Usuario;

class UsuarioRepository
{
    private \PDO $pdo;

    public function __construct(\PDO $pdo){
        $this->pdo = $pdo;
        $this->iniciar();
    }

    private function iniciar(){
        $this->pdo->exec('create table if not exists usuarios (nome_completo text, nome_usuario text, email text, senha text)');
    }

    public function inserir(Usuario $usuario) : bool{
        $ps = $this->pdo->prepare('insert into usuarios(nome_completo, nome_usuario, email, senha) values (:nomeCompleto, :nomeUsuario, :email, :senha)');
        return $ps->execute([
            ':nomeCompleto' => $usuario->getNomeCompleto(),
            ':nomeUsuario' => $usuario->getNomeUsuario(),
            ':email' => $usuario->getEmail(),
            ':senha' => $usuario->getSenha()
        ]);
    }

    public function encontrarUm(string $email){
        $ps = $this->pdo->prepare('select * from usuarios where email = :email', PDO::FETCH_ASSOC);
        $ps->execute([
            ':email' => $email
        ]);
        return $ps->fetch(PDO::FETCH_ASSOC);
    }

    public function encontrarTodos() : array{
        $ps = $this->pdo->prepare('select * from usuarios');
        $ps->execute();
        return $ps->fetchAll(\PDO::FETCH_ASSOC);
    }
}    