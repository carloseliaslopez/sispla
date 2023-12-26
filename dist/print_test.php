<?php
//error_reporting(0);
require_once 'dompdf/autoload.inc.php';

use Dompdf\Dompdf;
$dompdf = new Dompdf(['chroot' => __DIR__]);
ob_start();
include "../dist/reportes/templates/printMatrizEvaluacion.php";
$html = ob_get_clean();
$dompdf->loadHtml($html);
$dompdf->render();
header("Content-type: application/pdf");
header("Content-Disposition: inline; filename=documento.pdf");
echo $dompdf->output();

?>