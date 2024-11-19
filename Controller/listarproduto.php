<?php
require '../start.php';
require '../conexao.php';

if ($cargo !== 'Nutricionista' && $cargo !== 'Administrador' && $cargo !== 'Vendedor') {
    echo '<script>alert("Você não tem acesso a esta função, o sistema será fechado"); window.location.href = "../logout.php";</script>';
    exit();
}
require '../Model/listproduto.model.php';
$conexao = new Conexao();
$listarProdutos = new ListarProdutos($conexao);
$produto = $listarProdutos->obterProduto();
include '../View/listproduto.view.php';
?>
