<?php
class Conexao {
    private $server = "localhost";
    private $user = "root";
    private $pass = "";
    private $dbname = "tb_produtos";
    public $conn;

    public function __construct() {
        $this->conectar();
    }

    private function conectar() {
        $this->conn = new mysqli($this->server, $this->user, $this->pass, $this->dbname);

        if ($this->conn->connect_error) {
            die("Falha na conexão: " . $this->conn->connect_error);
        }
    }
}
?>
