<?php
/*
error_reporting(0);

//ENTIDADES
include '../Entidades/Evaluacion/CatalogoSubProducto.php';
include '../Entidades/Evaluacion/CatalogoDocumentos.php';
include '../Entidades/Clientes.php';
include '../Entidades/Evaluacion/vw_informeIDD.php';
include '../Entidades/Evaluacion/InformeGeneralIDD.php';
include '../Entidades/Evaluacion/DocumentacionRecibida.php';
include '../Entidades/Evaluacion/ControlesAplicados.php';
include '../Entidades/Evaluacion/vw_DocumentacionRecibida.php';
include '../Entidades/Evaluacion/DocumentacionExtra.php';

//DATOS
include '../Datos/DtCombos.php';
include '../Datos/DtMatrizEvaluacion.php';
include '../Datos/DtPic.php';
include '../Datos/DtMatrizRiesgoCompartida.php';

session_start();
if (!isset($_SESSION['idUsuario'])){
    header("Location: ../dist/login.php");
}
$nombre = $_SESSION['usuario'];
$rol = $_SESSION ['idRol'];
//INSTANCIAS
$combos = new DtCombos();
$matrizE = new DtMatrizEvaluacion();


$varIdEmp = $_GET['editE'];
$varProd = $_GET['editProd'];

$empEdit;
$empEdit = $matrizE->obtenerClienteInforme($varIdEmp, $varProd);

$controlAp;
$controlAp = $matrizE->ListarControlesAplicados($varIdEmp, $varProd);

$conexion = new mysqli('localhost','admin','adminCump123.','sispla');
*/
?>

<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />

<title>DDC-Cumplimiento</title>
<link rel="STYLESHEET" href="../../reportes/css/css_printMatrizEvaluacion.css" type="text/css" />
<style>
  #h1Informe{
      text-align: center;
      top: 1.5cm;
    }

  body {
      font-family:  sans-serif;
      font-size: 10pt;
        background: #fff;
    }
  div.labels {
        border: 2px;
        position: absolute;
        padding: 0.5em;
        text-align: center;
        vertical-align: text-top;
    }
  div.input_razon_social {
        border: 1px solid black;
        position: absolute;
        padding: 0.5em;
        text-align: center;
        vertical-align: text-top;
        height: 7px;
        width: 61%;
    }
  div.input_tipo_cliente {
        border: 1px solid black;
        position: absolute;
        padding: 0.5em;
        text-align: center;
        vertical-align: baseline;
        height: 7px;
        width: 20%;
    }

  div.input_prod_solic{
      border: 1px solid black;
      position: absolute;
      padding: 0.5em;
      text-align: center;
      vertical-align: text-top;
      height: 7px;
      width: 17%;
    }



</style>
</head>

<body>
<h2 id="h1Informe" name= "h1Informe" >Informe de Debida Diligencia</h2>
<div>
  <div>
      <div class="labels" style="top: 60px; left: 40px;">
          <b>Razón Social o Nombre Completo del Cliente</b>
      </div>
      <div class="input_razon_social" style="top: 85px; left: 40px;">
          Razón Social o Nombre Completo del Cliente
      </div>
  </div>
  <div>
      <div class="labels" style="top: 60px; right: 85px;">
          <b>Tipo de Cliente</b>
      </div>
      <div class="input_tipo_cliente" style="top: 85px; right: 30px;">
          Tipo de Cliente
      </div>
  </div>
</div>

<div>
  <div>
      <div class="labels" style="top: 130px; left: 40px;">
          <b> Producto Solicitado</b>
      </div>
      <div class="input_prod_solic" style="top: 155px; left: 40px;">
        Producto Solicitado
      </div>
  </div>
  <div>
      <div class="labels" style="top: 130px; left: 200px;">
          <b>Pais</b>
      </div>
      <div class="input_prod_solic" style="top: 155px; left: 200px;">
        Pais
      </div>
  </div>
  <div>
      <div class="labels" style="top: 130px; left: 360px;">
          <b> Monto</b>
      </div>
      <div class="input_prod_solic" style="top: 155px; left: 360px;">
        Monto
      </div>
  </div>
  <div>
      <div class="labels" style="top: 130px; right: 85px;">
          <b>Fecha revision</b>
      </div>
      <div class="input_tipo_cliente" style="top: 155px; right: 30px;">
        Fecha revision
      </div>
  </div>
  
</div>

<div>
  <div>
      <div class="labels" style="top: 190px; left: 40px;">
          <b> I. Documentación Recibida</b>
      </div>
      
  </div> 
</div>



<!--
<div class="absolute" style="top: 40px; left: 40px;">
  top/left
</div>
<div class="absolute" style="top: 40px; right: 40px;">
  top/right
</div>
<div class="absolute" style="top: 80px; left: 40px; right: 40px;">
  top/left/right
</div>

<div class="absolute" style="top: 160px; left: 160px; right: 160px; bottom: 160px; ">
  top/left/right/bottom
</div>

<div class="absolute" style="bottom: 40px; right: 40px;">
  bottom/right
</div>
<div class="absolute" style="bottom: 40px; left: 40px;">
  bottom/left
</div>
<div class="absolute" style="bottom: 80px; left: 40px; right: 40px;">
  bottom/left/right
</div>
-->
</body>

</html>