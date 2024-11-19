<?php
    class ListarProdutos {
        private $conn;

        public function __construct($conexao) {
            $this->conn = $conexao->conn;
        }
        public function obterProduto(){
            $sql = "SELECT * FROM cadastroproduto";
            $result = $this->conn->query($sql);

            $produto = [];
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()){
                    $produto[] = $row;

                }
            }
            return $produto;
        }
    }
        ?>