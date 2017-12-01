<?php
    if ( !($conexion = mysqli_connect("localhost", "root", "", "escuela_prog_web"))) 
         die("Fallo conexion! ERROR: " . mysqli_connect_error()); 
      
     //   echo json_encode($conexion);
    
    
   

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        $cadena_json = file_get_contents('php://input'); //recibe informacion por HTTP, en este caso una cadena JSON
        
        $datos = json_decode($cadena_json,true);
        
        $nc = $datos['nc'];
     
       $sql = "DELETE FROM alumnos WHERE Num_control = '$nc' ";
        
        //echo json_encode($sql);
        $resultado = mysqli_query($conexion, $sql);
        
         $respuesta = array();
        if($resultado){
            $respuesta['Exito'] = 1 ;
            $respuesta['msj'] = 'Eliminacion correcta';
            echo json_encode($respuesta);
            
        }else{
            $respuesta['Exito'] = 0;
            $respuesta['msj'] = 'Error en la eliminacion';
            echo json_encode($respuesta);
        }
        
    }

?>