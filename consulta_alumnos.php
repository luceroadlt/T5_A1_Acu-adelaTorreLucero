<?php

    
//    require_once('conexio_BD.php');
//    $conexion = new Conexion();
    
    $conexion = mysqli_connect("localhost", "root", "", "escuela_prog_web") or die(mysql_error());

    $respuesta = array();

    $sql = "SELECT * FROM alumnos";
    $consulta = mysqli_query($conexion, $sql);

    
    if(mysqli_num_rows($consulta)>0){
        
        $respuesta["alumnos"] = array();
        
        //se lleva el vector
        while( $fila = mysqli_fetch_assoc($consulta) ) {
            
            // se crean peque;os vectorsiots en cada vuelta 
            
            $alumno = array();
            
            
            $alumno["nc"] = $fila["Num_Control"];
            $alumno["n"] = $fila["Nombre_Alumno"];
            $alumno["pa"] = $fila["Primer_Ap"];
            $alumno["sa"] = $fila["Segundo_Ap"];
            $alumno["e"] = $fila["Edad_Alumno"];
            $alumno["s"] = $fila["Semestre_Alumno"];
            $alumno["c"] = $fila["Carrera_Alumno"];
            
            array_push($respuesta["alumnos"], $alumno);
        }
        
        $respuesta['exito'] = 1;
        echo json_encode($respuesta);
        
    }else{
        //en caso de que haya error
        $respuesta['Exito'] = 0;
        $respuesta['msj'] = "No hay registros";
        echo json_encode($respuesta);
    }
    
?>