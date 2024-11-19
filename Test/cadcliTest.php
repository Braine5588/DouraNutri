<?php
use PHPUnit\Framework\TestCase;
require_once 'Model/cadastrocliente.model.php';
require_once 'conexao.php';

class cadcliTest extends TestCase
{
    private $cadastroClienteMock;

    protected function setUp(): void
    {
        // Criação de mock da classe CadastroCliente
        $this->cadastroClienteMock = $this->getMockBuilder(CadastroCliente::class)
                                          ->onlyMethods(['cadastrarCliente'])
                                          ->getMock();
    }

    public function testCadastroClienteSucesso()
    {
        // Simulando os dados do formulário enviados via POST
        $dados = [
            "nome" => "Maria",
            "idade" => 30,
            "cpf" => "123.456.789-00",
            "endereco" => "Rua Exemplo, 123",
            "altura" => "1.70"
        ];

        // Definindo o comportamento esperado do método cadastrarCliente
        $this->cadastroClienteMock->expects($this->once())
                                  ->method('cadastrarCliente')
                                  ->with($dados)
                                  ->willReturn('<div class="message">Cliente cadastrado com sucesso!</div>');

        // Executando o método
        $resultado = $this->cadastroClienteMock->cadastrarCliente($dados);

        // Verificando o resultado
        $this->assertStringContainsString('Cliente cadastrado com sucesso!', $resultado);
    }

    public function testCadastroClienteFalha()
    {
        // Simulando os dados do formulário enviados via POST
        $dados = [
            "nome" => "Maria",
            "idade" => 30,
            "cpf" => "123.456.789-00",
            "endereco" => "Rua Exemplo, 123",
            "altura" => "1.70"
        ];

        // Definindo o comportamento esperado do método cadastrarCliente
        $this->cadastroClienteMock->expects($this->once())
                                  ->method('cadastrarCliente')
                                  ->with($dados)
                                  ->willReturn('<div class="messagefalha">Erro ao cadastrar o cliente</div>');

        // Executando o método
        $resultado = $this->cadastroClienteMock->cadastrarCliente($dados);

        // Verificando o resultado
        $this->assertStringContainsString('Erro ao cadastrar o cliente', $resultado);
    }
}
