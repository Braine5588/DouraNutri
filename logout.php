<?php
session_start(); // Inicia a sessão

// Remove todas as variáveis de sessão
session_unset();

// Destrói a sessão
session_destroy();

// Redireciona para a página de login
header('Location: index.php');
exit();
?>
