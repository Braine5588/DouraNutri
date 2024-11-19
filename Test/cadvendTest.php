<?php
use PHPUnit\Framework\TestCase;
require_once 'Model/cadastrovendedor.model.php';
require_once 'conexao.php';

class cadvendTest extends TestCase
{
    private $cadastroVendedorMock;

    protected function setUp(): void
    {
        // Mock da classe CadastroCliente para simular o comportamento sem interação com o BD
        $this->cadastroVendedorMock = $this->getMockBuilder(CadastroVendedor::class)
                                          ->onlyMethods(['cadastrarVendedor'])
                                          ->getMock();
    }

    public function testCadastroVendedorSucesso()
    {
        $dados = [
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
                                  ->with($dados)
                                  ->willReturn('<div class="message">Vendedor cadastrado com sucesso!</div>');

        $resultado = $this->cadastroVendedorMock->cadastrarVendedor($dados);

        $this->assertStringContainsString('Vendedor cadastrado com sucesso!', $resultado);
    }
    public function testCadastroVendedorFalha()
    {
        $dados = [
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
                                  ->with($dados)
                                  ->willReturn('<div class="message">Erro ao cadastrar vendedor!</div>');

        $resultado = $this->cadastroVendedorMock->cadastrarVendedor($dados);

        $this->assertStringContainsString('Erro ao cadastrar vendedor!', $resultado);
    }
}