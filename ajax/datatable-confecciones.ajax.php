<?php
require_once "../controladores/confecciones.controlador.php";

class TablaConfecciones{
//ACTIVAR TABLA DE CONFECCIONES
public function mostrarTablaConfecciones(){
$item=null;
$valor=null;
$confecciones=ControladorConfecciones::CtrMostrarConfecciones($item,$valor);;  
 $datosJson ='{
"data":[';
for($i=0; $i<count($confecciones);$i++){
//ACCIONES
$botones=  "<div class='img-thumbnail'><button type='button' class='btn btn-info btn-circle waves-effect waves-circle waves-float editarConfeccion' idConfeccion='".$confecciones[$i]["id"]."' data-toggle='modal' data-target='#modalEditarConfeccion'><i class='material-icons'>save</i></button></div>";
//ESTATUS
if($confecciones[$i]["activo"])
{
	$estatus="<div class='switch'><label><input type='checkbox' class='estatusConfeccion' checked idConfeccion='".$confecciones[$i]["id"]."' estadoConfeccion='0'><span class='lever switch-col-light-blue' ></span></label></div>";
}else
{
$estatus="<div class='switch'><label><input type='checkbox' class='estatusConfeccion' idConfeccion='".$confecciones[$i]["id"]."' estadoConfeccion='1'><span class='lever switch-col-light-blue' ></span></label></div>";	
}
//Clave
$clave="<input type='text'class='form-control' claveConfeccion='".$confecciones[$i]["id"]."' value='".$confecciones[$i]["clave"]."'>";
//Cpnfeccion
$confeccion="<input type='text' class='form-control' Confeccion='".$confecciones[$i]["id"]."' value='".$confecciones[$i]["descripcion"]."'>";

$label_confeccion="<label class='textWhite' style='color:white;'>'".$confecciones[$i]["descripcion"]."'</label>";
$label_clave="<label class='textWhite' style='color:white;'>'".$confecciones[$i]["clave"]."'</label>";
$input_index="<input type='hidden' indexConfeccion='".$confecciones[$i]["id"]."' value='".$i."'></input>";


$datosJson .= '[
"'.($i+1).$input_index.'",
"'.$clave.$label_clave.'",
"'.$confeccion.$label_confeccion.'",
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
//ACTIVAR TABLA DE SUBCOLORES
$activarConfecciones=new TablaConfecciones();
$activarConfecciones->mostrarTablaConfecciones();