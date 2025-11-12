<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);  

session_start();

require_once 'db.php';

require_once 'models/UsuarioModel.php';
require_once 'models/AvaliacaoModel.php';
require_once 'controllers/UsuarioController.php';
require_once 'controllers/AvaliacaoController.php';

$usuarioModel = new UsuarioModel($pdo);
$avaliacaoModel = new AvaliacaoModel($pdo);

$usuarioController = new UsuarioController($usuarioModel);
$avaliacaoController = new AvaliacaoController($avaliacaoModel, $usuarioModel);

$action = $_GET['action'] ?? 'home';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? $action;
}

switch ($action) {
    
    case 'login':
        $usuarioController->paginaLogin();
        break;
    case 'processar_login':
        $usuarioController->processarLogin();
        break;
    case 'cadastro':
        $usuarioController->paginaCadastro();
        break;
    case 'processar_cadastro':
        $usuarioController->processarCadastro();
        break;
    case 'logout':
        $usuarioController->logout();
        break;
    case 'buscar':
        $usuarioController->buscar();
        break;
    case 'perfil':
        $avaliacaoController->verPerfil(); 
        break;
    case 'dashboard':
        $avaliacaoController->meuDashboard();
        break;
    case 'adicionar_avaliacao':
        $avaliacaoController->adicionar();
        break;
    case 'editar':
        $avaliacaoController->paginaEditar();
        break;
    case 'processar_edicao':
        $avaliacaoController->processarEditar();
        break;
    case 'deletar':
        $avaliacaoController->deletar();
        break;

    case 'home':
    default:
        if (isset($_SESSION['user_id'])) {
            header('Location: index.php?action=dashboard');
        } else {
            header('Location: index.php?action=login');
        }
        exit;
}