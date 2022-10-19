<?php
class conexion extends PDO{
    private $tipo_de_base='mysql';
    private $hot= 'localhost';   
    private $nombre_de_base='restaurante'
    private $usuario='root';
    private $contrasena='';
    public function _construct(){
        try{
            paret::_construct("this->tipo_de_base}:dbname={$this->$nombre_de_base};host={$this->host};charset=utf8",$this->usuario,$this->contrasena);
        }catch(PDOException $e){

        }
    }
}
?>