<?php
// Verifica se a variável de sessão está definida corretamente
if (empty($_SESSION['autenticar'])) {
    header('location: index.php');
    exit();
}
$usuario = $_SESSION['autenticar']; // Obtém o nome do usuário da sessão
$parte = explode("\n", $usuario); // Divide a string em partes usando o espaço como delimitador
$cargo = isset($parte[1]) ? $parte[1] : ''; // Obtém a segunda parte (cargo), se existir

?>
<?php
if ($cargo == 'Nutricionista') {
    ?>
<div class="menu">
    <a href="cadastroproduto.php">Cadastro de Produto</a>
    <a href="listarproduto.php">Produtos Cadastrados</a>
    <a href="cadastropedido.php">Cadastro de Pedido</a>
    <a href="listarpedido.php">Pedidos Cadastrados</a>
    <a href="cadastrovendedor.php">Cadastro de Funcionários</a>
    <a href="listarvendedor.php">Funcionários Cadastrados</a>
    <a href="cadastrocliente.php">Cadastro de Cliente</a>
    <a href="listarcliente.php">Clientes Cadastrados</a>
    <a href="cadastroconsulta.php">Cadastro de Consulta</a>
    <a href="gerenciamentoconsulta.php">Consultas Cadastradas</a>
    <a href = "editarusuario.php"> Editar Usuário </a>
    <a href="logout.php">Sair</a> 
</div>

<?php
} elseif ($cargo == 'Administrador'){
    ?>
<div class="menu">
    <a href="cadastroproduto.php">Cadastro de Produto</a>
    <a href="listarproduto.php">Produtos Cadastrados</a>
    <a href="cadastropedido.php">Cadastro de Pedido</a>
    <a href="listarpedido.php">Pedidos Cadastrados</a>
    <a href="cadastrovendedor.php">Cadastro de Funcionários</a>
    <a href="listarvendedor.php">Funcionários Cadastrados</a>
    <a href="cadastrocliente.php">Cadastro de Cliente</a>
    <a href="listarcliente.php">Clientes Cadastrados</a>
    <a href = "editarusuario.php"> Editar Usuário </a>
    <a href="logout.php">Sair</a> 
</div>
<?php
} elseif ($cargo == 'Vendedor'){
    ?>
<div class="menu">
    <a href="cadastroproduto.php">Cadastro de Produto</a>
    <a href="listarproduto.php">Produtos Cadastrados</a>
    <a href="cadastropedido.php">Cadastro de Pedido</a>
    <a href="cadastrocliente.php">Cadastro de Cliente</a>
    <a href = "editarusuario.php"> Editar Usuário </a>
    <a href="logout.php">Sair</a> 
</div>
<?php
}
?>
