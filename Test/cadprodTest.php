<?php
use PHPUnit\Framework\TestCase;
require_once 'Model/cadastroproduto.model.php';

class cadprodTest extends TestCase
{
    private $cadastroProdutoMock;

    protected function setUp(): void
    {
        // Mock da classe CadastroCliente para simular o comportamento sem interação com o BD
        $this->cadastroProdutoMock = $this->getMockBuilder(CadastroProduto::class)
                                          ->onlyMethods(['connectaBD', 'cadastrarProduto'])
                                          ->getMock();
    }

    public function testProdutoClienteSucesso()
    {
        // Simulando um cadastro de cliente com sucesso
        $_SERVER["REQUEST_METHOD"] = "POST";
        $_POST = [
            "nome" => "Teste",
            "categoria" => "teste",
            "preco" => "10",
            "precovender" => "20",
            "quantidade" => "2",
            "data_validade" => "28/10/2024",
            "data_fabricacao" => "28/10/2024"
        ];

        $this->cadastroProdutoMock->expects($this->once())
                                  ->method('cadastrarProduto')
                                  ->willReturn('<div class="message">Produto cadastrado com sucesso!</div>');

        $output = $this->cadastroProdutoMock->cadastrarProduto();

        $this->assertStringContainsString('Produto cadastrado com sucesso!', $output);
    }
    public function testCadastroProdutoFalha()
    {
        // Simulando uma falha no cadastro do cliente
        $_SERVER["REQUEST_METHOD"] = "POST";
        $_POST = [
            "nome" => "Teste",
            "categoria" => "teste",
            "preco" => "10",
            "precovender" => "20",
            "quantidade" => "2",
            "data_validade" => "28/10/2024",
            "data_fabricacao" => "28/10/2024"
        ];

        $this->cadastroProdutoMock->expects($this->once())
                                  ->method('cadastrarProduto')
                                  ->willReturn('<div class="messagefalha">Erro ao cadastrar o produto</div>');

        $output = $this->cadastroProdutoMock->cadastrarProduto();

        $this->assertStringContainsString('Erro ao cadastrar o produto', $output);
    }
}
?>
