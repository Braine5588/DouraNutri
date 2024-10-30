<?php
use PHPUnit\Framework\TestCase;
require_once 'Model/cadastropedido.model.php';

class cadpedTest extends TestCase
{
    private $cadastroPedidoMock;

    protected function setUp(): void
    {
        $this->cadastroPedidoMock = $this->getMockBuilder(CadastroPedido::class)
        ->onlyMethods(['connectaBD', 'cadastrarPedido'])
        ->getMock();
    }

    public function testcadastropedidoSuccesso()
    {
        // Simulando valores de POST
        $_SERVER["REQUEST_METHOD"] = "POST";
        $_POST = [
            "nomevendedor" => "Braine Rodrigues Arantes",
            "nomeproduto" => "Fumaça em pó",
            "nomecliente" => "Marcelo Vieira da Silva Junior",
            "PrecoVender" => "200",
            "qtdPedida" => "2",
            "dataPedido" => "30/10/2024"
        ];

        $this->cadastroPedidoMock->expects($this->once())
        ->method('cadastrarPedido')
        ->willReturn('<div class="message">Pedido cadastrado com sucesso!</div>');

$output = $this->cadastroPedidoMock->cadastrarPedido();

$this->assertStringContainsString('Pedido cadastrado com sucesso!', $output);
}

public function testcadastropedidoFalha()
{
    // Simulando valores de POST
    $_SERVER["REQUEST_METHOD"] = "POST";
    $_POST = [
        "nomevendedor" => "Braine Rodrigues Arantes",
        "nomeproduto" => "Fumaça em pó",
        "nomecliente" => "Marcelo Vieira da Silva Junior",
        "PrecoVender" => "200",
        "qtdPedida" => "2",
        "dataPedido" => "30/10/2024"
    ];

    $this->cadastroPedidoMock->expects($this->once())
    ->method('cadastrarPedido')
    ->willReturn('<div class="messagefalha">Erro ao cadastrar pedido!</div>');

$output = $this->cadastroPedidoMock->cadastrarPedido();

$this->assertStringContainsString('Erro ao cadastrar pedido!', $output);
}

}
?>
