<?php
    if ( !($conexion = mysqli_connect("localhost", "root", "", "escuela_prog_web"))) 
         die("Fallo conexion! ERROR: " . mysqli_connect_error()); 
      
     //   echo json_encode($conexion);
    
    
   

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        $cadena_json = file_get_contents('php://input'); //recibe informacion por HTTP, en este caso una cadena JSON
        
        $datos = json_decode($cadena_json,true);
        
        $nc = $datos['nc'];
        $n = $datos['n'];
        $pa = $datos['pa'];
        $sa = $datos['sa'];
        $e = $datos['e'];
        $s = $datos['s'];
        $c = $datos['c'];
        
        $sql = "UPDATE alumnos SET Nombre_Alumno ='$n', Primer_Ap = '$pa', Segundo_Ap = '$sa', Edad_Alumno = $e, Semestre_Alumno = $s,
                                    Carrera_Alumno ='$c' WHERE Num_Control = '$nc'";
        //echo json_encode($sql);
        $resultado = mysqli_query($conexion, $sql);
        
         $respuesta = array();
        if($resultado){
            $respuesta['Exito'] = 1 ;
            $respuesta['msj'] = 'Modificacion correcta';
            echo json_encode($respuesta);
            
        }else{
            $respuesta['Exito'] = 0;
            $respuesta['msj'] = 'Error en la modificacion';
            echo json_encode($respuesta);
        }
        
    }

?>