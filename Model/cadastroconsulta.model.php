<?php
class CadastroConsulta{
    private $NOME_CLIENTE;
    private $NOME_VENDEDOR;
    private $Altura;
    private $Peso;
    private $Data_consulta;
    private $Objetivo;
    private $Desc_consul;
    public $conn;

    public function __construct() {
        $this->connectaBD();
      }
    
      private function connectaBD() {
        $server = "localhost";
        $user = "root";
        $pass = "";
        $mydb = "tb_produtos";
    
        $this->conn = new mysqli($server, $user, $pass, $mydb);
    
        if ($this->conn->connect_error) {
          die("Conexão Falhou: " . $this->conn->connect_error);
        }
      }
      
      public function cadastrarConsulta(){
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $NOME_CLIENTE = $_POST["nomecli"];
    $NOME_VENDEDOR = $_POST["nomevend"];
    $Peso = $_POST["peso"];
    $Data_consulta = $_POST["dataconsu"];
    $Objetivo = $_POST["objetivo"];
    $Desc_consul = $_POST["parecer"];

    $selectedCliente = $_POST["nomecli"];
    $result = $this->conn->query("SELECT Altura FROM cadastrocliente WHERE Nome = '$selectedCliente'");

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $Altura = $row["Altura"];
    } else {
        $Altura = 0; // Defina um valor padrão ou trate o erro de alguma outra forma
    }

    $stmt = $this->conn->prepare("INSERT INTO cadastroconsulta (NOME_CLIENTE, NOME_VENDEDOR, Altura, Peso, Data_consulta, Objetivo, Desc_consul) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $NOME_CLIENTE, $NOME_VENDEDOR, $Altura, $Peso, $Data_consulta, $Objetivo, $Desc_consul);

    if ($stmt->execute()) {
        echo '<div class="message">Consulta cadastrada com sucesso!</div>';
    } else {
        echo '<div class="messagefalha">Erro ao cadastrar a consulta: </div>' . $this->conn->error;
    }

    $stmt->close();
}
}
}

?>