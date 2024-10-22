<?php
require 'start.php';
if ($cargo !== 'Nutricionista') {
    echo '<script>alert("Você não tem acesso a esta função, o sistema será fechado"); window.location.href = "logout.php";</script>';
    exit(); // Garante que o script seja interrompido
}
require 'Model/cadastroconsulta.model.php';
include 'View/consulta.view.php';
?>