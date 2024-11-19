<?php
use PHPUnit\Framework\TestCase;
require_once 'Model/cadastropedido.model.php';
require_once 'conexao.php';

class cadpedTest extends TestCase
{
    private $cadastroPedidoMock;

    protected function setUp(): void
    {
        $this->cadastroPedidoMock = $this->getMockBuilder(CadastroPedido::class)
                                         ->onlyMethods(['cadastrarPedido'])
                                         ->getMock();
    }

    public function testcadastropedidoSuccesso()
    {
        $dados = [
            "nomevendedor" => "Braine Rodrigues Arantes",
            "nomeproduto" => "Fumaça em pó",
            "nomecliente" => "Marcelo Vieira da Silva Junior",
            "PrecoVender" => "200",
            "qtdPedida" => "2",
            "dataPedido" => "30/10/2024"
        ];

        $this->cadastroPedidoMock->expects($this->once())
                                 ->method('cadastrarPedido')
                                 ->with($dados)
                                 ->willReturn('<div class="message">Pedido cadastrado com sucesso!</div>');

$resultado = $this->cadastroPedidoMock->cadastrarPedido($dados);

$this->assertStringContainsString('Pedido cadastrado com sucesso!', $resultado);
}

public function testcadastropedidoFalha()
{
    $dados = [
        "nomevendedor" => "Braine Rodrigues Arantes",
        "nomeproduto" => "Fumaça em pó",
        "nomecliente" => "Marcelo Vieira da Silva Junior",
        "PrecoVender" => "200",
        "qtdPedida" => "2",
        "dataPedido" => "30/10/2024"
    ];

    $this->cadastroPedidoMock->expects($this->once())
                             ->method('cadastrarPedido')
                             ->with($dados)
                             ->willReturn('<div class="messagefalha">Erro ao cadastrar pedido!</div>');

$resultado = $this->cadastroPedidoMock->cadastrarPedido($dados);

$this->assertStringContainsString('Erro ao cadastrar pedido!', $resultado);
}

}
?>
