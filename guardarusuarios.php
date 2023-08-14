<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Origin, X-Requestes-Whit, Content-Type, Accept');
header("Content-Type: application/json; charset=UTF-8");
header('Content-Type: application/json');
$json=file_get_contents('php://input');//captura el parametro en json {'id':118}
$params=json_decode($json);//paramteros
require('conexion.php');

$respuesta['codigo']='-1';
$respuesta['mensaje']='No hay registros';
// si le enviamos parametros
if(isset($params))//si recibe una variable por get llamada 'id'
{
    $documento=$params->documento;
    $nombres=$params->nombres;
    $apellidos=$params->apellidos;
    $direccion=$params->direccion;
    $telefono=$params->telefono;
    $correo=$params->correo;
    $fecha = date("Y-m-d H:i:s");

    /* Prepare an insert statement */
    $stmt = $mysqli->prepare("INSERT INTO usuarios (documento, nombres, apellidos, direccion, telefono, correo, created) VALUES (?,?,?,?,?,?,?)");
    /* Bind variables to parameters */
    $numparam = "sssssss"; //cantidad de caracteres debe ser igual al numero de parametros
    $stmt->bind_param($numparam,$documento,$nombres,$apellidos,$direccion,$telefono,$correo,$fecha);
    /* Execute the statement */
    $stmt->execute();
   

    if( $stmt->affected_rows>0)//si trajo registro
    {
        $respuesta['codigo']='ok';
        $respuesta['mensaje']='Registro guardado';
        //echo json_encode($respuesta);// {'codigo':'ok','mensaje':'registro guarado'}
    }
    else
    {
        $respuesta['mensaje']='Error no se pudo guardar';
     }
}
echo json_encode($respuesta);//{'codigo':'-1','mensaje':'No hay registros'}
   
?>
