
<?php
require '../start.php';
require '../conexao.php';
require '../Model/cadastroproduto.model.php';
if ($cargo !== 'Nutricionista' && $cargo !== 'Administrador' && $cargo !== 'Vendedor' ) {
    echo '<script>alert("Você não tem acesso a esta função, o sistema será fechado"); window.location.href = "../logout.php";</script>';
    exit(); // Garante que o script seja interrompido
}

$cadastro = new CadastroProduto();

$mensagem = '';
if ($_SERVER["REQUEST_METHOD"] === "POST"){
   $mensagem = $cadastro->cadastrarProduto($_POST);
}

include '../View/produto.view.php';
?>