<?php
include 'View/login.view.php';
include 'conexao.php';
session_start();
header('Content-Type: text/html; charset=UTF-8');

class Login {
    private $conn;
    
    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function autenticar($usuario, $senha, $cargo) {
        // Prepare a consulta SQL com placeholders
        $sql = "SELECT * FROM cadastrovendedor WHERE Usuario = ? AND Cargo = ?";
        $stmt = $this->conn->prepare($sql);

        // Verificar se a preparação da consulta foi bem-sucedida
        if ($stmt === false) {
            die('Erro na preparação da consulta: ' . $this->conn->error);
        }

        // Bind dos parâmetros e execução da consulta
        $stmt->bind_param('ss', $usuario, $cargo);
        $stmt->execute();

        // Obter o resultado da consulta
        $result = $stmt->get_result();

        // Verificar se há resultados
        if ($result->num_rows > 0) {
            // Obter os dados do usuário
            $row = $result->fetch_assoc();
            if (password_verify($senha, $row['Senha'])) {
                $_SESSION['autenticar'] = $row['Usuario'] . "\n" . $row['Cargo']; // Armazenar o nome do usuário na sessão
                return true;
            } else {
                return false; // Senha incorreta
            }
        } else {
            return false; // Usuário não encontrado
        }
    }
}

// Instanciar a classe de conexão
$conexao = new Conexao();

// Passar a conexão para a classe de login
$login = new Login($conexao->conn);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["Usuario"];
    $senha = $_POST["Senha"];
    $cargo = $_POST["Cargo"];

    if ($login->autenticar($usuario, $senha, $cargo)) {
        header("Location: home.php");
        exit();
    } else {
        // Autenticação falhou, exibir uma mensagem de erro
        echo '<div class="falhalogin">Login falhou. Verifique suas credenciais.</div>';
    }
}
?>
