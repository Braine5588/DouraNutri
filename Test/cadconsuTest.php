<?php
use PHPUnit\Framework\TestCase;
require_once 'Model/cadastroconsulta.model.php';
require_once 'conexao.php';


class cadconsuTest extends TestCase
{
    private $cadastroConsultaMock;

    protected function setUp(): void
    {
        $this->cadastroConsultaMock = $this->getMockBuilder(CadastroConsulta::class)
                                           ->onlyMethods(['cadastrarConsulta'])
                                           ->getMock();
    }

    public function testcadastroconsultaSuccesso()
    {
        $dados = [
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
                                   ->with($dados)
                                   ->willReturn('<div class="message">Consulta cadastrada com sucesso!</div>');

$resultado = $this->cadastroConsultaMock->cadastrarConsulta($dados);

$this->assertStringContainsString('Consulta cadastrada com sucesso!', $resultado);
}

public function testcadastroconsultaFalha()
{
    $dados = [
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
                               ->with($dados)
                               ->willReturn('<div class="messagefalha">Erro ao cadastrar consulta!</div>');

$resultado = $this->cadastroConsultaMock->cadastrarConsulta($dados);

$this->assertStringContainsString('Erro ao cadastrar consulta!', $resultado);
}

}
?>
