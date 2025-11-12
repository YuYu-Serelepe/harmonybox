<?php

class AvaliacaoController {
    private $avaliacaoModel;
    private $usuarioModel; 

    public function __construct($avaliacaoModel, $usuarioModel) {
        $this->avaliacaoModel = $avaliacaoModel;
        $this->usuarioModel = $usuarioModel;
    }

    private function checarLogin() {
        if (!isset($_SESSION['user_id'])) {
            header('Location: index.php?action=login');
            exit;
        }
    }

    public function meuDashboard() {
        $this->checarLogin();
        $id_usuario = $_SESSION['user_id'];
        $avaliacoes = $this->avaliacaoModel->buscarPorUsuario($id_usuario);
        
        // Carrega a view e passa os dados
        require 'views/dashboard.php';
    }

    public function adicionar() {
        $this->checarLogin();
        
        $album = $_POST['album'] ?? '';
        $artista = $_POST['artista'] ?? '';
        $nota = $_POST['nota'] ?? '';
        $id_usuario = $_SESSION['user_id'];

        if (!empty($album) && !empty($artista) && !empty($nota)) {
            $this->avaliacaoModel->criar($id_usuario, $album, $artista, $nota);
        }
        
        header('Location: index.php?action=dashboard');
    }

    public function paginaEditar() {
        $this->checarLogin();
        $id_avaliacao = $_GET['id'] ?? 0;
        $id_usuario = $_SESSION['user_id'];

        $avaliacao = $this->avaliacaoModel->buscarPorId($id_avaliacao);


        if (!$avaliacao || $avaliacao['id_usuario'] != $id_usuario) {
            header('Location: index.php?action=dashboard'); 
            exit;
        }

        require 'views/editar_avaliacao.php';
    }

    public function processarEditar() {
        $this->checarLogin();
        
        $album = $_POST['album'] ?? '';
        $artista = $_POST['artista'] ?? '';
        $nota = $_POST['nota'] ?? '';
        $id_avaliacao = $_POST['id_avaliacao'] ?? 0;
        $id_usuario = $_SESSION['user_id'];

        $avaliacao = $this->avaliacaoModel->buscarPorId($id_avaliacao);
        if ($avaliacao && $avaliacao['id_usuario'] == $id_usuario) {
            $this->avaliacaoModel->atualizar($id_avaliacao, $album, $artista, $nota);
        }

        header('Location: index.php?action=dashboard');
    }

    public function deletar() {
        $this->checarLogin();
        $id_avaliacao = $_GET['id'] ?? 0;
        $id_usuario = $_SESSION['user_id'];

        $avaliacao = $this->avaliacaoModel->buscarPorId($id_avaliacao);
        if ($avaliacao && $avaliacao['id_usuario'] == $id_usuario) {
            $this->avaliacaoModel->deletar($id_avaliacao);
        }

        header('Location: index.php?action=dashboard');
    }
    
    public function verPerfil() {

        $id_perfil = $_GET['id'] ?? 0;
        
        $usuario = $this->usuarioModel->buscarPorId($id_perfil);
        
        if (!$usuario) {
            header('Location: index.php?action=buscar');
            exit;
        }
        
        $avaliacoes = $this->avaliacaoModel->buscarPorUsuario($id_perfil); 

        require 'views/perfil_publico.php';
    }
}