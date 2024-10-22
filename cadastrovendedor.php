<?php
require 'start.php';
if ($cargo !== 'Nutricionista' && $cargo !== 'Administrador') {
    echo '<script>alert("Você não tem acesso a esta função, o sistema será fechado"); window.location.href = "logout.php";</script>';
    exit(); // Garante que o script seja interrompido
}
require 'Model/cadastrovendedor.model.php';

$cadastro = new CadastroVendedor();
$cadastro->cadastrarVendedor();
include 'View/vendedor.view.php';

?>

