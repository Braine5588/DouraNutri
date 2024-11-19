<?php
require '../start.php';
require '../conexao.php';
require '../Model/editusuario.model.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $novoUsuario = $_POST['novoUsuario'];
    $novaSenha = $_POST['novaSenha'];

    $editarUsuarioModel = new EditarUsuarioModel(new Conexao());
    $hashedSenha = password_hash($novaSenha, PASSWORD_DEFAULT);
    $resultado = $editarUsuarioModel->atualizarUsuario($usu, $novoUsuario, $hashedSenha);

    if ($resultado) {
        $_SESSION['autenticar'] = $novoUsuario . "\n" . $cargo; // Atualiza a sessão com o novo nome de usuário
        header('Location: editarusuario.php?message=Usuário e senha atualizados com sucesso!');
    } else {
        header('Location: editarusuario.php?message=Erro ao atualizar usuário e senha.');
    }
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $editarUsuarioModel = new EditarUsuarioModel(new Conexao());
    $usuarioData = $editarUsuarioModel->obterUsuarioPorNome($usu);
    include '../View/editusuario.view.php';
}
?>
