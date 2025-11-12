<?php

class UsuarioController {
    private $model;

    public function __construct($usuarioModel) {
        $this->model = $usuarioModel;
    }


    public function paginaLogin() {
        require 'views/login.php';
    }

    public function paginaCadastro() {
        require 'views/cadastro.php';
    }


    public function processarLogin() {
        $nome_usuario = $_POST['nome_usuario'] ?? '';
        $senha = $_POST['senha'] ?? '';

        $usuario = $this->model->buscarPorNome($nome_usuario);

        if ($usuario && password_verify($senha, $usuario['senha'])) {
            // Login com sucesso!
            $_SESSION['user_id'] = $usuario['id'];
            $_SESSION['user_nome'] = $usuario['nome_usuario'];
            header('Location: index.php?action=dashboard');
        } else {
            // Falha no login
            $erro = "Nome de usuário ou senha inválidos.";
            require 'views/login.php'; 
        }
    }

    public function processarCadastro() {
        $nome_usuario = $_POST['nome_usuario'] ?? '';
        $senha = $_POST['senha'] ?? '';
        $confirmar_senha = $_POST['confirmar_senha'] ?? '';

        // Validações
        if (empty($nome_usuario) || empty($senha)) {
            $erro = "Todos os campos são obrigatórios.";
            require 'views/cadastro.php';
            return;
        }

        if ($senha !== $confirmar_senha) {
            $erro = "As senhas não coincidem.";
            require 'views/cadastro.php';
            return;
        }

        $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

        $sucesso = $this->model->criarUsuario($nome_usuario, $senha_hash);

        if ($sucesso) {
            header('Location: index.php?action=login');
        } else {
            $erro = "Este nome de usuário já está em uso.";
            require 'views/cadastro.php';
        }
    }

    public function logout() {
        session_destroy();
        header('Location: index.php?action=login');
    }


    public function buscar() {
        $termo = $_GET['termo'] ?? '';
        $resultados = [];
        if (!empty($termo)) {
            $resultados = $this->model->buscarUsuarios($termo);
        }
        require 'views/busca.php';
    }

    public function verPerfil() {

    }
}