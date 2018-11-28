<?php
require_once "../controladores/composiciones_telas.controlador.php";

class TablaComposiciones{
//ACTIVAR TABLA DE CATEGORIAS
public function mostrarTablaComposiciones(){
$item=null;
$valor=null;
$composiciones=ControladorComposiciones::CtrMostrarComposiciones($item,$valor);;  
 $datosJson ='{
"data":[';
for($i=0; $i<count($composiciones);$i++){
//ACCIONES
$botones=  "<div class='img-thumbnail'><button type='button' class='btn btn-info btn-circle waves-effect waves-circle waves-float editarComposicion' idComposicion='".$composiciones[$i]["id"]."' data-toggle='modal' data-target='#modalEditarComposicion'><i class='material-icons'>save</i></button></div>";
//ESTATUS
if($composiciones[$i]["activa"])
{
	$estatus="<div class='switch'><label><input type='checkbox' class='estatusComposicion' checked idComposicion='".$composiciones[$i]["id"]."' estadoComposicion='0'><span class='lever switch-col-light-blue' ></span></label></div>";
}else
{
$estatus="<div class='switch'><label><input type='checkbox' class='estatusComposicion' idComposicion='".$composiciones[$i]["id"]."' estadoComposicion='1'><span class='lever switch-col-light-blue' ></span></label></div>";	
}
//Clave
$clave="<input type='text'class='form-control'  idComposicion='".$composiciones[$i]["id"]."'  claveComposicion='".$composiciones[$i]["id"]."' value='".$composiciones[$i]["clave"]."'>";
//Composicion
$composicion="<input type='text' class='form-control repetirComposicionUpdate' id='inputComposicion' idComposicion='".$composiciones[$i]["id"]."' Composicion='".$composiciones[$i]["id"]."' value='".$composiciones[$i]["descripcion"]."'>";
//Lavado
//$lavado="<input type='text' class='form-control'   value='".$composiciones[$i]["descripcion"]."'>";
$lavado="<input type='text' class='form-control' id='inputLavadoComposicion' Lavado='".$composiciones[$i]["id"]."' value='".$composiciones[$i]["lavado"]."'>";
$label_composicion="<label class='textWhite'>'".$composiciones[$i]["descripcion"]."'</label>";
$label_clave="<label class='textWhite'>'".$composiciones[$i]["clave"]."'</label>";
$label_lavado="<label class='textWhite'>'".$composiciones[$i]["lavado"]."'</label>";
$input_index="<input type='hidden' indexComposicion='".$composiciones[$i]["id"]."' value='".$i."'></input>";

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
"'.$composicion.$label_composicion.'",
"'.$lavado.$label_lavado.'",
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
//ACTIVAR TABLA DE CATEGORIAS
$activarComposiciones=new TablaComposiciones();
$activarComposiciones->mostrarTablaComposiciones();