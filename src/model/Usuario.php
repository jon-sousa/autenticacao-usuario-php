<?php namespace model;

class Usuario
{
    private string $nomeCompleto;

    private string $nomeUsuario;

    private string $email;

    private string $senha;

    public function __construct(string $nomeUsuario, string $email){
        $this->nomeUsuario = $nomeUsuario;
        $this->email = $email;
    }

    public function verificarSenha(string $senha) : bool{
        return password_verify($senha, $this->senha);
    }

    public function cadastrarSenha(string $senha){
        $senhaHash = password_hash($senha, PASSWORD_ARGON2I);
        $this->senha = $senhaHash;
    }

    public function getNomeCompleto()
    {
        return $this->nomeCompleto;
    }

    /**
     * Set the value of nomeCompleto
     *
     * @return  self
     */ 
    public function setNomeCompleto($nomeCompleto)
    {
        $this->nomeCompleto = $nomeCompleto;

        return $this;
    }

    public function getNomeUsuario()
    {
        return $this->nomeUsuario;
    }


    public function getEmail()
    {
        return $this->email;
    }

    public function getSenha()
    {
        return $this->senha;
    }
}