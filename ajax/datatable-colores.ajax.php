<?php
require_once "../controladores/colores_telas.controlador.php";
require_once "../controladores/subcolores_telas.controlador.php";

class TablaColores{
//ACTIVAR TABLA DE CATEGORIAS
public function mostrarTablaColores(){
$item=null;
$valor=null;
$colores=ControladorColores::CtrMostrarColores($item,$valor);;  
 $datosJson ='{
"data":[';
for($i=0; $i<count($colores);$i++){
//ACCIONES
$botones=  "<div class='img-thumbnail'><button type='button' class='btn btn-info btn-circle waves-effect waves-circle waves-float editarColor' idColor='".$colores[$i]["id"]."' data-toggle='modal' data-target='#modalEditarComposicion'><i class='material-icons'>save</i></button></div>";
//ESTATUS
if($colores[$i]["activo"])
{
	$estatus="<div class='switch'><label><input type='checkbox' class='estatusColor' checked idColor='".$colores[$i]["id"]."' estadoColor='0'><span class='lever switch-col-light-blue' ></span></label></div>";
}else
{
$estatus="<div class='switch'><label><input type='checkbox' class='estatusColor' idColor='".$colores[$i]["id"]."' estadoColor='1'><span class='lever switch-col-light-blue' ></span></label></div>";	
}
//Clave
$clave="<input type='text'class='form-control' claveColor='".$colores[$i]["id"]."' value='".$colores[$i]["clave"]."'>";
//Color
$color="<input type='text' class='form-control' Color='".$colores[$i]["id"]."' value='".$colores[$i]["descripcion"]."'>";
//Subcolor
$item="id";
$valor=$colores[$i]["id_subcolor"];
$subcolores=ControladorSubcolores::ctrMostrarSubcolores($item,$valor);
$subcolor="<select class='form-control show-tick' idColorSubcolor='".$colores[$i]["id"]."' data-live-search='true'><option value='".$subcolores["id"]."' >".
$subcolores["descripcion"]."</option>";
	$subcolores_complemento=ControladorSubcolores::ctrMostrarSubcoloresSelect($item,$valor);
	foreach ($subcolores_complemento as $key => $value) {
 	$subcolor.="<option value='".$value["id"] ."'>".$value["descripcion"]."</option>";}                   
	$subcolor.="</select>";
$label_subcolor="<label class='textWhite'>'".$subcolores["descripcion"]."'</label>";
$label_color="<label class='textWhite'>'".$colores[$i]["descripcion"]."'</label>";
$label_clave="<label class='textWhite'>'".$colores[$i]["clave"]."'</label>";
$input_index="<input type='hidden' indexColor='".$colores[$i]["id"]."' value='".$i."'></input>";

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
"'.$color.$label_color.'",
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
$activarColores=new TablaColores();
$activarColores->mostrarTablaColores();