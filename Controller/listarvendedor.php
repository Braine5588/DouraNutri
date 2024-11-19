<?php
require '../start.php';
require '../conexao.php';
if ($cargo !== 'Nutricionista' && $cargo !== 'Administrador') {
    echo '<script>alert("Você não tem acesso a esta função, o sistema será fechado"); window.location.href = "../logout.php";</script>';
    exit(); // Garante que o script seja interrompido
}
require '../Model/listvendedor.model.php';
$conexao = new Conexao();
$listarVendedor = new ListarVendedor($conexao);
$vendedor = $listarVendedor->obterVendedor();
include '../View/listvendedor.view.php';
?>
