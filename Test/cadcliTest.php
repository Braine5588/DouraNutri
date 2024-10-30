<?php
use PHPUnit\Framework\TestCase;
require_once 'Model/cadastrocliente.model.php';

class cadcliTest extends TestCase
{
    private $cadastroClienteMock;

    protected function setUp(): void
    {
        // Mock da classe CadastroCliente para simular o comportamento sem interação com o BD
        $this->cadastroClienteMock = $this->getMockBuilder(CadastroCliente::class)
                                          ->onlyMethods(['connectaBD', 'cadastrarCliente'])
                                          ->getMock();
    }

    public function testCadastroClienteSucesso()
    {
        // Simulando um cadastro de cliente com sucesso
        $_SERVER["REQUEST_METHOD"] = "POST";
        $_POST = [
            "nome" => "Maria",
            "idade" => "30",
            "cpf" => "123.456.789-00",
            "endereco" => "Rua Exemplo, 123",
            "altura" => "1.70"
        ];

        $this->cadastroClienteMock->expects($this->once())
                                  ->method('cadastrarCliente')
                                  ->willReturn('<div class="message">Cliente cadastrado com sucesso!</div>');

        $output = $this->cadastroClienteMock->cadastrarCliente();

        $this->assertStringContainsString('Cliente cadastrado com sucesso!', $output);
    }

    public function testCadastroClienteFalha()
    {
        // Simulando uma falha no cadastro do cliente
        $_SERVER["REQUEST_METHOD"] = "POST";
        $_POST = [
            "nome" => "Maria",
            "idade" => "30",
            "cpf" => "123.456.789-00",
            "endereco" => "Rua Exemplo, 123",
            "altura" => "1.70"
        ];

        $this->cadastroClienteMock->expects($this->once())
                                  ->method('cadastrarCliente')
                                  ->willReturn('<div class="messagefalha">Erro ao cadastrar o cliente</div>');

        $output = $this->cadastroClienteMock->cadastrarCliente();

        $this->assertStringContainsString('Erro ao cadastrar o cliente', $output);
    }
}
?>
