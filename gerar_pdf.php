<?php
require 'vendor/autoload.php'; 

use Dompdf\Dompdf;
use Dompdf\Options;

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['tabelaHTML'])) {
    $options = new Options();
    $options->set('isHtml5ParserEnabled', true);
    $options->set('isPhpEnabled', true);
    $options->set('isRemoteEnabled', TRUE);
    $options->set('debugKeepTemp', TRUE); 
    $options->set('chroot', '/'); 
    $pdf = new Dompdf($options);

    // Inclua o código HTML com a imagem centralizada em uma folha A4


$html = '<div style="text-align: center;">';
$html .= '<img src="D:\Xampp\htdocs\DouraNutri\img\fundopdf.jpg" style="display: inline-block;">';
$html .= '<br><h1 style="text-align: center;">Lista de Produtos e Alimentos</h1><br>';
$html .= '<div style="display: inline-block; text-align: left;">'; // Adicione uma div para centralizar a tabela
$html .= $_POST['tabelaHTML'];
$html .= '</div>';
$html .= '</div>';


    
    $pdf->loadHtml($html);

    $pdf->setPaper('A4', 'portrait');

    // Renderize o PDF (gera o PDF)
    $pdf->render();

    // Saída para o navegador
    $pdf->stream("estoque.pdf", array("Attachment" => 0));
}
?>
