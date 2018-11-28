<?php
require_once "../controladores/marcas.controlador.php";
require_once "../modelos/marcas.modelo.php";


class TablaMarcas{

//ACTIVAR TABLA DE MARCAS

public function mostrarTablaMarcas(){
$item=null;
$valor=null;
$marcas=ControladorMarcas::ctrMostrarMarcas($item,$valor);
        
 $datosJson ='{
"data":[';
for($i=0; $i<count($marcas);$i++){
//ACCIONES
$botones=  "<div class='img-thumbnail'><button type='button' class='btn btn-info btn-circle waves-effect waves-circle waves-float btnEditarMarca' idMarca='".$marcas[$i]["id"]."' data-toggle='modal' data-target='#modalEditarMarca'><i class='material-icons'>create</i></button></div>";
//ESTATUS
if($marcas[$i]["activa"])
{
	$estatus="<div class='switch'><label><input type='checkbox' class='estatusMarca' checked idMarca='".$marcas[$i]["id"]."' estadoMarca='0'><span class='lever switch-col-light-blue estatusMarca' ></span></label></div>";
}else
{
$estatus="<div class='switch'><label><input type='checkbox' class='estatusMarca' idMarca='".$marcas[$i]["id"]."' estadoMarca='1'><span class='lever switch-col-light-blue estatusMarca' ></span></label></div>";	
}
$datosJson .= '[
"'. ($i+1) .'",
"'.$marcas[$i]["clave"] .'",
"'.$marcas[$i]["descripcion"] .'",
"'.$marcas[$i]["tipo"] .'",
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
$activarMarcas=new TablaMarcas();
$activarMarcas->mostrarTablaMarcas();