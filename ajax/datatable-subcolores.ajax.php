<?php
require_once "../controladores/subcolores_telas.controlador.php";

class TablaSubcolores{
//ACTIVAR TABLA DE CATEGORIAS
public function mostrarTablaSubcolores(){
$item=null;
$valor=null;
$subcolores=ControladorSubcolores::CtrMostrarSubcolores($item,$valor);;  
 $datosJson ='{
"data":[';
for($i=0; $i<count($subcolores);$i++){
//ACCIONES
$botones=  "<div class='img-thumbnail'><button type='button' class='btn btn-info btn-circle waves-effect waves-circle waves-float editarSubcolor' idSubcolor='".$subcolores[$i]["id"]."' data-toggle='modal' data-target='#modalEditarComposicion'><i class='material-icons'>save</i></button></div>";
//ESTATUS
if($subcolores[$i]["activo"])
{
	$estatus="<div class='switch'><label><input type='checkbox' class='estatusSubcolor' checked idSubcolor='".$subcolores[$i]["id"]."' estadoSubcolor='0'><span class='lever switch-col-light-blue' ></span></label></div>";
}else
{
$estatus="<div class='switch'><label><input type='checkbox' class='estatusSubcolor' idSubcolor='".$subcolores[$i]["id"]."' estadoSubcolor='1'><span class='lever switch-col-light-blue' ></span></label></div>";	
}
//Clave
$clave="<input type='text'class='form-control' claveSubcolor='".$subcolores[$i]["id"]."' value='".$subcolores[$i]["clave"]."'>";
//Subcolor
$subcolor="<input type='text' class='form-control repetirSubcolorUpdate' Subcolor='".$subcolores[$i]["id"]."' value='".$subcolores[$i]["descripcion"]."'>";

$label_subcolor="<label class='textWhite'>'".$subcolores[$i]["descripcion"]."'</label>";
$label_clave="<label class='textWhite'>'".$subcolores[$i]["clave"]."'</label>";
$input_index="<input type='hidden' indexSubcolor='".$subcolores[$i]["id"]."' value='".$i."'></input>";

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
"'.$subcolor.$label_subcolor.'",
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
$activarSubcolores=new TablaSubcolores();
$activarSubcolores->mostrarTablaSubcolores();