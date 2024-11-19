
<?php
if ($cargo == 'Nutricionista') {
    ?>
<div class="menuhome">
    <a href="Controller/cadastroproduto.php">Cadastro de Produto</a>
    <a href="Controller/listarproduto.php">Produtos Cadastrados</a>
    <a href="Controller/cadastropedido.php">Cadastro de Pedido</a>
    <a href="Controller/listarpedido.php">Pedidos Cadastrados</a>
    <a href="Controller/cadastrovendedor.php">Cadastro de Funcionários</a>
    <a href="Controller/listarvendedor.php">Funcionários Cadastrados</a>
    <a href="Controller/cadastrocliente.php">Cadastro de Cliente</a>
    <a href="Controller/listarcliente.php">Clientes Cadastrados</a>
    <a href="Controller/cadastroconsulta.php">Cadastro de Consulta</a>
    <a href="Controller/gerenciamentoconsulta.php">Consultas Cadastradas</a>
    <a href = "Controller/editarusuario.php"> Editar Usuário </a>
    <a href="logout.php">Sair</a> 
</div>

<?php
} elseif ($cargo == 'Administrador'){
    ?>
<div class="menuhome">
    <a href="Controller/cadastroproduto.php">Cadastro de Produto</a>
    <a href="Controller/listarproduto.php">Produtos Cadastrados</a>
    <a href="Controller/cadastropedido.php">Cadastro de Pedido</a>
    <a href="Controller/listarpedido.php">Pedidos Cadastrados</a>
    <a href="Controller/cadastrovendedor.php">Cadastro de Funcionários</a>
    <a href="Controller/listarvendedor.php">Funcionários Cadastrados</a>
    <a href="Controller/cadastrocliente.php">Cadastro de Cliente</a>
    <a href="Controller/listarcliente.php">Clientes Cadastrados</a>
    <a href = "Controller/editarusuario.php"> Editar Usuário </a>
    <a href="logout.php">Sair</a> 
</div>
<?php
} elseif ($cargo == 'Vendedor'){
    ?>
<div class="menuhome">
    <a href="Controller/cadastroproduto.php">Cadastro de Produto</a>
    <a href="Controller/listarproduto.php">Produtos Cadastrados</a>
    <a href="Controller/cadastropedido.php">Cadastro de Pedido</a>
    <a href="Controller/cadastrocliente.php">Cadastro de Cliente</a>
    <a href = "Controller/editarusuario.php"> Editar Usuário </a>
    <a href="logout.php">Sair</a> 
</div>
<?php
}
?>