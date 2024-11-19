<?php
require '../start.php';
require '../conexao.php';
require '../Model/editvendedor.model.php';

if ($cargo !== 'Nutricionista' && $cargo !== 'Administrador') {
    echo '<script>alert("Você não tem acesso a esta função, o sistema será fechado"); window.location.href = "../logout.php";</script>';
    exit();
}

$editarVendedorModel = new EditarVendedorModel(new Conexao());

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['Id_Vendedor'])) {
    $vendedor_id = $_GET['Id_Vendedor'];
    $vendedor = $editarVendedorModel->obterVendedorPorId($vendedor_id);
    include '../View/editvendedor.view.php';
} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
    $vendedor_id = $_POST['vendedor_id'];
    $nome = $_POST['Nome'];
    $idade = $_POST['Idade'];
    $cpf = $_POST['CPF'];
    $endereco = $_POST['Endereco'];
    $salario = $_POST['Salario'];
    $cargo = $_POST['Cargo'];
    $observacao = $_POST['Observacao'];

    $editarVendedorModel->atualizarVendedor($vendedor_id, $nome, $idade, $cpf, $endereco, $salario, $cargo, $observacao);
    header("Location: listarvendedor.php");
    exit();
}
?>
