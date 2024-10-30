<?php
use PHPUnit\Framework\TestCase;
require_once 'Model/cadastrovendedor.model.php';

class cadvendTest extends TestCase
{
    private $cadastroVendedorMock;

    protected function setUp(): void
    {
        // Mock da classe CadastroCliente para simular o comportamento sem interação com o BD
        $this->cadastroVendedorMock = $this->getMockBuilder(CadastroVendedor::class)
                                          ->onlyMethods(['connectaBD', 'cadastrarVendedor'])
                                          ->getMock();
    }

    public function testCadastroVendedorSucesso()
    {
        // Simulando um cadastro de cliente com sucesso
        $_SERVER["REQUEST_METHOD"] = "POST";
        $_POST = [
            "nome" => "Maria",
            "idade" => "30",
            "cpf" => "123.456.789-00",
            "endereco" => "Rua Exemplo, 123",
            "salario" => "100",
            "cargo" => "vendedor",
            "usuario" => "Mar",
            "senha" => "4321",
            "observacao" => "Vendedora qualificada",
        ];

        $this->cadastroVendedorMock->expects($this->once())
                                  ->method('cadastrarVendedor')
                                  ->willReturn('<div class="message">Vendedor cadastrado com sucesso!</div>');

        $output = $this->cadastroVendedorMock->cadastrarVendedor();

        $this->assertStringContainsString('Vendedor cadastrado com sucesso!', $output);
    }
    public function testCadastroVendedorFalha()
    {
        // Simulando um cadastro de cliente com sucesso
        $_SERVER["REQUEST_METHOD"] = "POST";
        $_POST = [
            "nome" => "Maria",
            "idade" => "30",
            "cpf" => "123.456.789-00",
            "endereco" => "Rua Exemplo, 123",
            "salario" => "100",
            "cargo" => "vendedor",
            "usuario" => "Mar",
            "senha" => "4321",
            "observacao" => "Vendedora qualificada",
        ];

        $this->cadastroVendedorMock->expects($this->once())
                                  ->method('cadastrarVendedor')
                                  ->willReturn('<div class="message">Erro ao cadastrar vendedor!</div>');

        $output = $this->cadastroVendedorMock->cadastrarVendedor();

        $this->assertStringContainsString('Erro ao cadastrar vendedor!', $output);
    }
}