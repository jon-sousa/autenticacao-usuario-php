<?php namespace infra;

use model\Usuario;

class UsuarioRepository
{
    private \PDO $pdo;

    public function __construct(){
        $this->pdo = new \PDO(
            'sqlite:' . __DIR__ . DIRECTORY_SEPARATOR . '..'. DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'db.sqlite3', 
            null, 
            null, 
            [
                \PDO::ATTR_PERSISTENT => true
            ]
        );

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
        $ps = $this->pdo->prepare('select * from usuarios where email = :email');
        $ps->execute([
            ':email' => $email
        ]);
        $usuarioArray = $ps->fetch(\PDO::FETCH_ASSOC);

        $usuario = new Usuario($usuarioArray['nome_usuario'], $usuarioArray['email']);
        $usuario->setNomeCompleto($usuarioArray['nome_completo']);
        $usuario->setSenha($usuarioArray['senha']);

        return $usuario;
    }

    public function encontrarTodos() : array{
        $ps = $this->pdo->prepare('select * from usuarios');
        $ps->execute();
        return $ps->fetchAll(\PDO::FETCH_ASSOC);
    }
}    