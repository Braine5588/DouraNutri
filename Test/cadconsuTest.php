<?php
use PHPUnit\Framework\TestCase;
require_once 'Model/cadastroconsulta.model.php';

class cadconsuTest extends TestCase
{
    private $cadastroConsultaMock;

    protected function setUp(): void
    {
        $this->cadastroConsultaMock = $this->getMockBuilder(CadastroConsulta::class)
        ->onlyMethods(['connectaBD', 'cadastrarConsulta'])
        ->getMock();
    }

    public function testcadastroconsultaSuccesso()
    {
        // Simulando valores de POST
        $_SERVER["REQUEST_METHOD"] = "POST";
        $_POST = [
            "nomecli" => "Marcelo Vieira da Silva Junior ",
            "nomevend" => "Victoria Souza Fernandes",
            "altura" => "1.70",
            "peso" => "70",
            "dataconsu" => "30/10/2024",
            "objetivo" => "Ganhar massa",
            "parecer" => "Consulta inicial"
        ];

        $this->cadastroConsultaMock->expects($this->once())
        ->method('cadastrarConsulta')
        ->willReturn('<div class="message">Consulta cadastrada com sucesso!</div>');

$output = $this->cadastroConsultaMock->cadastrarConsulta();

$this->assertStringContainsString('Consulta cadastrada com sucesso!', $output);
}

public function testcadastroconsultaFalha()
{
    // Simulando valores de POST
    $_SERVER["REQUEST_METHOD"] = "POST";
    $_POST = [
        "nomecli" => "Marcelo Vieira da Silva Junior ",
        "nomevend" => "Victoria Souza Fernandes",
        "altura" => "1.70",
        "peso" => "70",
        "dataconsu" => "30/10/2024",
        "objetivo" => "Ganhar massa",
        "parecer" => "Consulta inicial"
    ];

    $this->cadastroConsultaMock->expects($this->once())
    ->method('cadastrarConsulta')
    ->willReturn('<div class="messagefalha">Erro ao cadastrar consulta!</div>');

$output = $this->cadastroConsultaMock->cadastrarConsulta();

$this->assertStringContainsString('Erro ao cadastrar consulta!', $output);
}

}
?>
