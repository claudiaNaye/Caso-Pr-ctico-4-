<?php
require_once("lib/nusoap.php");
$urlServicio=new nusoap_client('http://localhost/CasoPractico4/servidor/servecio.php');
$resultado=$urlServicio->call('InsertarRestaurante',
array('N'=>'1234','Insumo'=>'rolex','Categoria'=>'unisex','Unidad'=>'digital','Medida'=>'litro','Cantidad_Medida'=>'2l'));
echo $resultado;
?>