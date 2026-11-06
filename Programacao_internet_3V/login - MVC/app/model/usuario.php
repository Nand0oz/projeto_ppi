<?php 

require_once __DIR__ . '/../config/database.php'; 

  Class Usuario{
        private mysqli $conn;

        public function __construct(){
            $db = new Database();
            $this->conn = $db->conectar();
        }
        public function buscarPorEmail(string $email){
            $sql = "SELECT * FROM usuario WHERE email = ? ";

            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param('ii',$descricao,$usuario_id);
            $resposta = $stmt->execute();
            $resposta = $stmt->get_result();
            $stmt->close();
            return $resposta->fetch_assoc();
        }
    }
 



?>