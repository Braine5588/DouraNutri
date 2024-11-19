<?php

use PHPUnit\Framework\TestCase;
require 'Model/editvendedor.model.php';
class editvendTest extends TestCase
{
    public function testObterVendedorPorId()
    {
        // Criar o mock para o objeto de resultado da consulta
        $mockResult = $this->createMock(mysqli_result::class);
        $mockResult->method('fetch_assoc')->willReturn([
            'Id_Vendedor' => 1,
            'Nome' => 'João',
            'Idade' => 30,
            'CPF' => '123.456.789-00',
            'Endereco' => 'Rua A',
            'Salario' => '2000',
            'Cargo' => 'Vendedor',
            'Observacao' => 'Ótimo vendedor',
        ]);

        // Criar o mock para o statement
        $mockStmt = $this->createMock(mysqli_stmt::class);
        $mockStmt->method('get_result')->willReturn($mockResult);

        // Criar o mock para a conexão com o banco de dados
        $mockConn = $this->createMock(mysqli::class);
        $mockConn->method('prepare')->willReturn($mockStmt);

        // Instanciar o objeto EditarVendedorModel com o mock da conexão
        $editarVendedorModel = new EditarVendedorModel((object) ['conn' => $mockConn]);

        // Executar o método que estamos testando
        $resultado = $editarVendedorModel->obterVendedorPorId(1);

        // Asserções
        $this->assertIsArray($resultado, 'O retorno deve ser um array.');
        $this->assertEquals('João', $resultado['Nome'], 'O nome do vendedor deve ser João.');
    }
}