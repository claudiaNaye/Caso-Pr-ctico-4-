<?php
    require_once("lib/nusoap.php");
    require_once("conexion.php");


    function restaurante($N,$Insumo,$Categoria,$Unidad,$Medida,$Cantidad_Medida){
        try {
        $conectar=new conexion();//se hace intancia ala clase
        $consulta=$conectar->prepare("INSERT INTO usuarios(N,Insumo,Categoria,Unidad,Medida,Cantidad_Medida)
        VALUE(:N,:Insumo,:Categoria,:Unidad,:Medida,:Cantidad_Medida)");
        $consulta->bindParam(":N",$N,PDO::PARAM_STR");
        $consulta->bindParam(":Insumo",$Insumo,PDO::PARAM_STR");
        $consulta->bindParam(":Categoria",$Categoria,PDO::PARAM_STR");
        $consulta->bindParam(":Unidad",$Unidad,PDO::PARAM_STR");
        $consulta->bindParam(":Medida",$Medida,PDO::PARAM_STR");
        $consulta->bindParam(":Cantidad_Medida",$Cantidad_Medida,PDO::PARAM_STR");
        $consulta->execute();//inserta
        $ultimoId=$conectar->lastInserId();

    return join(",",array($ultimoId));
    } catch (Exception $e) {
        echo $e->getMessage();
    }

    function ObtenerDato(){
        $consulta=$conectar->prepare("SELECT * FROM restaurante");
        $consulta->execute();
        $consulta->setFetchMode(PDO::FETCH_ASSOC);
        return $consulta->fetchAll();

    }
        function ModificarDatos($N,$Insumo,$Categoria,$Unidad,$Medida,$Cantidad_Medida){
            $consulta=$conectar->prepare("UPDATE restaurante SET N=:N,Insumo=:Insumo,Categoria=:Categoria,Unidad=:Unidad,Cantidad_Medida=:Cantidad_Medida WHERE Nº=Nº");
            $consulta->bindParam(":N",$N,PDO::PARAM_STR);
                $consulta->bindParam(":Insumo",$Insumo,PDO::PARAM_STR);
                $consulta->bindParam(":Categoria",$Categoria,PDO::PARAM_STR);
                $consulta->bindParam(":Unidad",$Unidad,PDO::PARAM_STR);
                $consulta->bindParam("Medida",$Medida,PDO::PARAM_STR);
                $consulta->bindParam(":Cantidad_Medida",$Cantidad_Medida,PDO::PARAM_STR);
                $consulta->execute();
                return 1;
            }
                function EliminarDatos($N){
                    $conectar=new Conexion();
                    $consulta=$conectar->prepare("DELETE FROM restaurante WHERE N=N");
                    $consulta->bindParam(":N",$N,PDO::PARAM_STR);
                    $consulta->execute();
                    $ultimoId=$conectar->lastInsertId();
                    return join(",",array($ultimoId));
                }
                }
                $server=new soap_server();
$server->configureWSDL('usuarioservice',"urn:usuarioservice");
$server->wsdl->schemaTargetNamespace="urn:usuarioservice";
$server->register(
'Insertarrestaurante',
array('N'=>'xsd:integer','Insumo'=>'xsd:string','Categoria'=>'xsd:string','Unidad'=>'xsd:string','Medida'=>'xsd:string','Cantidad_Medida'=>'xsd:string'),
array('return'=>'xsd:string'),
'urn:usuarioservice',
'urn:usuarioservice#Insertarrestaurante',
'rpc',
'encoded',
'insertar restaurante a restaurante'
);
$server->register(
    'EliminarDatos',
    array('N'=>'xsd:integer'),
    array('return'=>'xsd:string'),
    'urn:usuarioservice',
    'urn:usuarioservice#EliminarDatos',
    'rpc',
    'encoded',
    'insertar restaurante a restaurante'
    );
$post=file_get_contents('php://input');
$server->service($post);
    ?>
