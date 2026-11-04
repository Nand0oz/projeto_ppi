<?php 

require_once __DIR__ . '/../config/database.php';

class Tarefa{
    private $conn; 

    public function __construct(){
        $db = new Database();
        $this->conn = $db->conectar();
    }

    # Listar

    public function listar(int $usuario_id){
        $sql = "SELECT * FROM tarefas WHERE usuario_id = ?"; 
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $usuario_id);
        $stmt->execute();
        $resposta = $stmt->get_result();
        $tarefas = $resposta->fetch_all(MYSQLI_ASSOC);
        $stmt->close();
        return $tarefas; 
    }

    # Criar

    public function criar($descricao){
        $descricao = $this->conn->real_escape_string($descricao);
        $sql = "INSERT INTO tarefas (descricao) VALUES ('$descricao')";
        return $this->conn->query($sql); 
    }

    #Excluir 

    public function excluir($id){
        $id = intval($id);
        $sql = "DELETE FROM tarefas WHERE id = '$id'"; 
        return $this->conn->query($sql); 
    }

    # Editar

    public function editar($descricao, $id){
        $id = intval($id);
        $descricao = $this->conn->real_escape_string($descricao);
        $sql = "UPDATE tarefas SET descricao = '$descricao' WHERE id = $id"; 
        return $this->conn->query($sql); 
    }
}

?>