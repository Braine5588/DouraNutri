<?php
use PHPUnit\Framework\TestCase;

require_once 'conexao.php';
require_once 'Model/editusuario.model.php';

class editusuTest extends TestCase {
    private $mockConexao;
    private $editarUsuarioModel;

    protected function setUp(): void {
        // Cria um mock para a classe Conexao
        $this->mockConexao = $this->createMock(Conexao::class);
        
        // Mock da conexão do banco de dados
        $mockConn = $this->createMock(mysqli::class);
        $this->mockConexao->conn = $mockConn;

        $this->editarUsuarioModel = new EditarUsuarioModel($this->mockConexao);
    }

    public function testObterUsuarioPorNome(): void {
        // Mock do resultado do banco de dados
        $mockStmt = $this->createMock(mysqli_stmt::class);
        $mockResult = $this->createMock(mysqli_result::class);

        $mockStmt->expects($this->once())
            ->method('bind_param')
            ->with('s', 'usuario_teste');
        
        $mockStmt->expects($this->once())
            ->method('execute')
            ->willReturn(true);

        $mockStmt->expects($this->once())
            ->method('get_result')
            ->willReturn($mockResult);

        $mockResult->expects($this->once())
            ->method('fetch_assoc')
            ->willReturn([
                'Usuario' => 'usuario_teste',
                'Senha' => 'senha_teste',
            ]);

        // Mock da conexão para retornar o mock do stmt
        $this->mockConexao->conn->expects($this->once())
            ->method('prepare')
            ->with('SELECT Usuario, Senha FROM cadastrovendedor WHERE Usuario = ?')
            ->willReturn($mockStmt);

        $resultado = $this->editarUsuarioModel->obterUsuarioPorNome('usuario_teste');

        // Verifica se o resultado está correto
        $this->assertIsArray($resultado);
        $this->assertEquals('usuario_teste', $resultado['Usuario']);
        $this->assertEquals('senha_teste', $resultado['Senha']);
    }

    public function testAtualizarUsuario(): void {
        // Mock do statement
        $mockStmt = $this->createMock(mysqli_stmt::class);

        $mockStmt->expects($this->once())
            ->method('bind_param')
            ->with('sss', 'novoUsuario', 'senhaHash', 'usuarioAntigo');

        $mockStmt->expects($this->once())
            ->method('execute')
            ->willReturn(true);

        // Mock da conexão para retornar o mock do stmt
        $this->mockConexao->conn->expects($this->once())
            ->method('prepare')
            ->with('UPDATE cadastrovendedor SET Usuario = ?, Senha = ? WHERE Usuario = ?')
            ->willReturn($mockStmt);

        $resultado = $this->editarUsuarioModel->atualizarUsuario('usuarioAntigo', 'novoUsuario', 'senhaHash');

        // Verifica se a atualização foi bem-sucedida
        $this->assertTrue($resultado);
    }
}
