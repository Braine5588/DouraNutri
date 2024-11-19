<?php

class CadastroPedido {
    private $conn;

    public function __construct() {
        $this->conn = (new Conexao())->conn;
    }

    public function cadastrarPedido($dados) {
        $nomeVendedor = $dados["nomevendedor"];
        $nomeProduto = $dados["nomeproduto"];
        $nomeCliente = $dados["nomecliente"];
        $qtdPedida = $dados["qtdPedida"];
        $dataPedido = $dados["dataPedido"];

        // Buscar preço do produto
        $stmtProduto = $this->conn->prepare("SELECT PrecoVender, Quantidade FROM cadastroproduto WHERE Nome = ?");
        $stmtProduto->bind_param("s", $nomeProduto);
        $stmtProduto->execute();
        $resultProduto = $stmtProduto->get_result();

        if ($resultProduto->num_rows > 0) {
            $produto = $resultProduto->fetch_assoc();
            $precoVender = $produto["PrecoVender"];
            $quantidadeAtual = $produto["Quantidade"];
        } else {
            return '<div class="messagefalha">Produto não encontrado.</div>';
        }

        if ($quantidadeAtual < $qtdPedida) {
            return '<div class="messagefalha">Estoque insuficiente para atender o pedido.</div>';
        }

        // Inserir pedido
        $stmtPedido = $this->conn->prepare("INSERT INTO cadastropedido (NOME_VENDEDOR, NOME_PRODUTO, NOME_CLIENTE, PrecoVender, Qtd_Pedida, data_pedido) VALUES (?, ?, ?, ?, ?, ?)");
        $stmtPedido->bind_param("sssids", $nomeVendedor, $nomeProduto, $nomeCliente, $precoVender, $qtdPedida, $dataPedido);

        if ($stmtPedido->execute()) {
            // Atualizar quantidade do produto no estoque
            $novaQuantidade = $quantidadeAtual - $qtdPedida;
            $stmtUpdate = $this->conn->prepare("UPDATE cadastroproduto SET Quantidade = ? WHERE Nome = ?");
            $stmtUpdate->bind_param("ds", $novaQuantidade, $nomeProduto);

            if ($stmtUpdate->execute()) {
                return '<div class="message">Pedido cadastrado com sucesso!</div>';
            } else {
                return '<div class="messagefalha">Erro ao atualizar o estoque: ' . $this->conn->error . '</div>';
            }
        } else {
            return '<div class="messagefalha">Erro ao cadastrar o pedido: ' . $stmtPedido->error . '</div>';
        }
    }
}
?>
