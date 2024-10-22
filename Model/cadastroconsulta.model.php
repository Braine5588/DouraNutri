<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $server = "localhost";
    $user = "root";
    $pass = "";
    $mydb = "tb_produtos";

    $db = new mysqli($server, $user, $pass, $mydb);

    if ($db->connect_error) {
        die("Conexão Falhou: " . $db->connect_error);
    }

    $nomecli = $_POST["nomecli"];
    $nomevend = $_POST["nomevend"];
    $peso = $_POST["peso"];
    $dataconsu = $_POST["dataconsu"];
    $objetivo = $_POST["objetivo"];
    $parecer = $_POST["parecer"];

    $selectedCliente = $_POST["nomecli"];
    $result = $db->query("SELECT Altura FROM cadastrocliente WHERE Nome = '$selectedCliente'");

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $altura = $row["Altura"];
    } else {
        $altura = 0; // Defina um valor padrão ou trate o erro de alguma outra forma
    }

    $stmt = $db->prepare("INSERT INTO cadastroconsulta (NOME_CLIENTE, NOME_VENDEDOR, Altura, Peso, Data_consulta, Objetivo, Desc_consul) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $nomecli, $nomevend, $altura, $peso, $dataconsu, $objetivo, $parecer);

    if ($stmt->execute()) {
        echo '<div class="message">Consulta cadastrada com sucesso!</div>';
    } else {
        echo '<div class="messagefalha">Erro ao cadastrar a consulta: ' . $stmt->error . '</div>';
    }

    $stmt->close();
}


?>