<?php

    class Conexion{
        $conexion;
        
        function __construct(){
            
            this-->conectar();
            
        }//function
        
        function  __desctruct(){
            
            $this-->desconectar();
            
        }
        
        function conectar(){
            
            require_once(__DIR__.'configuracion_BD.php');
            $this-->conexion = mysqli_connect(host, user, password, db) or die(mysql_error());
            return $this-->conexion;
            
        }
        
        function desconectar(){
            
            mysql_close($this-->conexion);
            
            
        }
        
    }//class

?>