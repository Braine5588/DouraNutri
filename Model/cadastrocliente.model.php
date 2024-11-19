<?php
class CadastroCliente {
    private $conn;

    public function __construct() {
        // Conecta ao banco de dados usando o arquivo `conexao.php`
        $this->conn = (new Conexao())->conn;
    }

    public function cadastrarCliente($dados) {
        // Extrai os dados do formulário
        $nome = $dados["nome"];
        $idade = $dados["idade"];
        $cpf = $dados["cpf"];
        $endereco = $dados["endereco"];
        $altura = $dados["altura"];

        // Prepara e executa a consulta SQL
        $sql = "INSERT INTO cadastrocliente (Nome, Idade, CPF, Endereco, Altura) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sisss", $nome, $idade, $cpf, $endereco, $altura);

        if ($stmt->execute()) {
            return '<div class="message">Cliente cadastrado com sucesso!</div>';
        } else {
            return '<div class="messagefalha">Erro ao cadastrar o cliente: ' . $this->conn->error . '</div>';
        }
    }
}
?>
