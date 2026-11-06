
<?php

session_start();

require_once __DIR__ . '/../app/controller/usuarioController.php';
require_once __DIR__ . '/../app/controller/TarefaController.php';

$usuarioController = new UsuarioController();
$tarefaController = new tarefaController();

$action = $_GET['action'] ?? 'index';

switch($action) {

    case 'autenticar':
        $usuarioController->autenticar();
        break;

    case 'painel':
        $usuarioController->painel();
        break;

    case 'logout':
        $usuarioController->logout();
        break;

    case 'criar':
        $tarefaController->criar();
        break;

    case 'excluir':
        $tarefaController->excluir();
        break;
    
    case 'editar':
        $tarefaController->editar();
        break;

    default:
    $controller->index();
    break;
}
