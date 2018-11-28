<?php
require_once "../controladores/tipos_telas.controlador.php";

class TablaTipos{
//ACTIVAR TABLA DE TIPOS
public function mostrarTablaTipos(){
$item=null;
$valor=null;
$tipos=ControladorTipos::CtrMostrarTipos($item,$valor);;  
 $datosJson ='{
"data":[';
for($i=0; $i<count($tipos);$i++){
//ACCIONES
$botones=  "<div class='img-thumbnail'><button type='button' class='btn btn-info btn-circle waves-effect waves-circle waves-float editarTipo' idTipo='".$tipos[$i]["id"]."' data-toggle='modal' data-target='#modalEditarComposicion'><i class='material-icons'>save</i></button></div>";
//ESTATUS
if($tipos[$i]["activo"])
{
	$estatus="<div class='switch'><label><input type='checkbox' class='estatusTipo' checked idTipo='".$tipos[$i]["id"]."' estadoTipo='0'><span class='lever switch-col-light-blue' ></span></label></div>";
}else
{
$estatus="<div class='switch'><label><input type='checkbox' class='estatusTipo' idTipo='".$tipos[$i]["id"]."' estadoTipo='1'><span class='lever switch-col-light-blue' ></span></label></div>";	
}
//Clave
$clave="<input type='text'class='form-control' claveTipo='".$tipos[$i]["id"]."' value='".$tipos[$i]["clave"]."'>";
//Subcolor
$tipo="<input type='text' class='form-control' Tipo='".$tipos[$i]["id"]."' value='".$tipos[$i]["descripcion"]."'>";

$label_tipo="<label class='textWhite'>'".$tipos[$i]["descripcion"]."'</label>";
$label_clave="<label class='textWhite'>'".$tipos[$i]["clave"]."'</label>";
$input_index="<input type='hidden' indexTipo='".$tipos[$i]["id"]."' value='".$i."'></input>";

/*
$item="id";
$valor=$tallas[$i]["id_genero"];
$generos=ControladorGeneros::ctrMostrarGeneros($item,$valor);
$genero="<select class='form-control show-tick' idTallaGenero='".$tallas[$i]["id"]."' data-live-search='true'><option value='".$generos["id"]."' >".
$generos["descripcion"]."</option>";
	$generos_complemento=ControladorGeneros::ctrMostrarGenerosSelect($item,$valor);
	foreach ($generos_complemento as $key => $value) {
 	$genero.="<option value='".$value["id"] ."'>".$value["descripcion"]."</option>";}                   
	$genero.="</select>";
//Division
$item="id";
$valor=$tallas[$i]["id_division"];
$divisiones=ControladorDivisiones::ctrMostrarDivisiones($item,$valor);
$division="<select class='form-control show-tick' idTallaDivision='".$tallas[$i]["id"]."' data-live-search='true'><option value='".$divisiones["id"]."' >".$divisiones["descripcion"]."</option>";
	$divisiones_complemento=ControladorDivisiones::ctrMostrarDivisionesSelect($item,$valor);
	foreach ($divisiones_complemento as $key => $value) {
 	$division.="<option value='".$value["id"] ."'>".$value["descripcion"]."</option>";}                   
	$division.="</select>";*/

$datosJson .= '[
"'.($i+1).$input_index.'",
"'.$clave.$label_clave.'",
"'.$tipo.$label_tipo.'",
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
//ACTIVAR TABLA DE TIPOS
$activarTipos=new TablaTipos();
$activarTipos->mostrarTablaTipos();