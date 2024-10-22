
<?php
if ($cargo == 'Nutricionista') {
    ?>
<div class="menuhome">
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
<div class="menuhome">
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
<div class="menuhome">
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