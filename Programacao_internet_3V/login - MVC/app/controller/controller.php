
<?php

require_once __DIR__ . '/../model/tarefa.php';

class tarefaController {

    private $tarefaModel;

    public function __construct() {
        $this->tarefaModel = new Tarefa();
    }

    public function index() {
        $tarefas = [];

        if (isset($_SESSION['id'])) {
            $tarefas = $this->tarefaModel->listar($_SESSION['id']);
        }

        return $tarefas;
    }

    public function criar() {

        if (
            isset($_POST['descricao']) &&
            !empty(trim($_POST['descricao'])) &&
            isset($_SESSION['id'])
        ) {
            $this->tarefaModel->criar(
                $_POST['descricao'],
                $_SESSION['id']
            );
        }

        header("Location: index.php");
        exit();
    }

    public function excluir() {

        if (
            isset($_GET['id']) &&
            isset($_SESSION['id'])
        ) {
            $this->tarefaModel->excluir(
                $_GET['id'],
                $_SESSION['id']
            );
        }

        header("Location: index.php");
        exit();
    }

    public function editar() {

        if (
            isset($_POST['descricao']) &&
            !empty(trim($_POST['descricao'])) &&
            isset($_POST['id']) &&
            isset($_SESSION['id'])
        ) {
            $this->tarefaModel->editar(
                $_POST['descricao'],
                $_POST['id'],
                $_SESSION['id']
            );
        }

        header("Location: index.php");
        exit();
    }
}

?>
