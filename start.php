<?php
session_start();
// Verifica se a variável de sessão está definida corretamente
if (empty($_SESSION['autenticar'])) {
    header('location: index.php');
    exit();
}
$usuario = $_SESSION['autenticar']; // Obtém o nome do usuário e cargo da sessão
$parte = explode("\n", $usuario); // Divide a string em partes usando o espaço como delimitador
$cargo = isset($parte[1]) ? $parte[1] : ''; // Obtém a segunda parte (cargo), se existir
$usu = isset ($parte[0]) ? $parte[0] : '';
?>