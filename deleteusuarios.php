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
    $id=$params->id;
    $sql="delete from usuarios where id=".$id;
}

$result=$mysqli->query($sql);//hace la consulta en la BD
if($mysqli->affected_rows>0)//si trajo registro
{
    $respuesta['codigo']='ok';
    $respuesta['mensaje']='Registro eliminado';
    echo json_encode($respuesta);// {'id':1,'nombres':'pedro'}
}
else
{
    $respuesta['mensaje']='Error no se pudo eliminar';
    echo json_encode($respuesta);//{'codigo':'-1','mensaje':'No se pudo eliminar'}
}
?>