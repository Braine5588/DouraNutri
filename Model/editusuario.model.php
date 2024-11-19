<?php
class EditarUsuarioModel {
    private $conn;

    public function __construct($conexao) {
        $this->conn = $conexao->conn;
    }

    public function obterUsuarioPorNome($usuario) {
        $sql = "SELECT Usuario, Senha FROM cadastrovendedor WHERE Usuario = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('s', $usuario);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function atualizarUsuario($usuarioAtual, $novoUsuario, $novaSenha) {
        $sql = "UPDATE cadastrovendedor SET Usuario = ?, Senha = ? WHERE Usuario = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('sss', $novoUsuario, $novaSenha, $usuarioAtual);
        return $stmt->execute();
    }
}
?>
