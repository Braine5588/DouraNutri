<?php
use PHPUnit\Framework\TestCase;
require_once 'Model/cadastroproduto.model.php';
require_once 'conexao.php';

class cadprodTest extends TestCase
{
    private $cadastroProdutoMock;

    protected function setUp(): void
    {
        // Mock da classe CadastroCliente para simular o comportamento sem interação com o BD
        $this->cadastroProdutoMock = $this->getMockBuilder(CadastroProduto::class)
                                          ->onlyMethods(['cadastrarProduto'])
                                          ->getMock();
    }

    public function testProdutoClienteSucesso()
    {
        $dados = [
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
                                  ->with($dados)
                                  ->willReturn('<div class="message">Produto cadastrado com sucesso!</div>');

        $resultado = $this->cadastroProdutoMock->cadastrarProduto($dados);

        $this->assertStringContainsString('Produto cadastrado com sucesso!', $resultado);
    }
    public function testCadastroProdutoFalha()
    {
        $dados= [
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
                                  ->with($dados)
                                  ->willReturn('<div class="messagefalha">Erro ao cadastrar o produto</div>');

        $resultado = $this->cadastroProdutoMock->cadastrarProduto($dados);

        $this->assertStringContainsString('Erro ao cadastrar o produto', $resultado);
    }
}
?>
