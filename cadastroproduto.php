
<?php
require 'start.php';
if ($cargo !== 'Nutricionista' && $cargo !== 'Administrador' && $cargo !== 'Vendedor' ) {
    echo '<script>alert("Você não tem acesso a esta função, o sistema será fechado"); window.location.href = "logout.php";</script>';
    exit(); // Garante que o script seja interrompido
}
require 'Model/cadastroproduto.model.php';
$cadastro = new CadastroProduto();
$cadastro->cadastrarProduto();
include 'View/produto.view.php';
?>