<?php
require_once "../controladores/lineas.controlador.php";
require_once "../modelos/lineas.modelo.php";

require_once "../controladores/marcas.controlador.php";
require_once "../modelos/marcas.modelo.php";


class TablaLineas{

//ACTIVAR TABLA DE MARCAS

public function mostrarTablaLineas(){
$item=null;
$valor=null;
$lineas=ControladorLineas::ctrMostrarLineas($item,$valor);
        
 $datosJson ='{
"data":[';
for($i=0; $i<count($lineas);$i++){
//ACCIONES
$botones=  "<div class='img-thumbnail'><button type='button' class='btn btn-info btn-circle waves-effect waves-circle waves-float btnEditarLinea' idLinea='".$lineas[$i]["id"]."' data-toggle='modal' data-target='#modalEditarLinea'><i class='material-icons'>create</i></button></div>";
//ESTATUS
if($lineas[$i]["activa"])
{
	$estatus="<div class='switch'><label><input type='checkbox' class='estatusLinea' checked idLinea='".$lineas[$i]["id"]."' estadoLinea='0'><span class='lever switch-col-light-blue' ></span></label></div>";
}else
{
$estatus="<div class='switch'><label><input type='checkbox' class='estatusLinea' idLinea='".$lineas[$i]["id"]."' estadoLinea='1'><span class='lever switch-col-light-blue' ></span></label></div>";	
}
//MARCA

$item="id";
$valor=$lineas[$i]["id_marca"];
$marcas=ControladorMarcas::ctrMostrarMARCAS($item,$valor);


$datosJson .= '[
"'. ($i+1) .'",
"'.$lineas[$i]["clave"] .'",
"'.$lineas[$i]["descripcion"] .'",
"'.$marcas["descripcion"] .'",
"'.$estatus.'",
"'.$botones.'"
],';
}
$datosJson=substr($datosJson, 0,-1);
$datosJson .=   ']
} ';
echo $datosJson ;
}
}
//ACTIVAR TABLA DE MARCAS
$activarLineas=new TablaLineas();
$activarLineas->mostrarTablaLineas();