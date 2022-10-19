<?php
require_once("lib/nusoap.php");
$urlServicio=new nusoap_client('http://localhost/CasoPractico4/servidor/servecio.php');
$resultado = $urlServicio->call('ObtenerDato');
?>