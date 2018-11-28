<?php
require_once "../controladores/diseños_telas.controlador.php";

class TablaDiseños{
//ACTIVAR TABLA DE CATEGORIAS
public function mostrarTablaDiseños(){
$item=null;
$valor=null;
$diseños=ControladorDiseños::CtrMostrarDiseños($item,$valor);;  
 $datosJson ='{
"data":[';
for($i=0; $i<count($diseños);$i++){
//ACCIONES
$botones=  "<div class='img-thumbnail'><button type='button' class='btn btn-info btn-circle waves-effect waves-circle waves-float editarDiseño' idDiseño='".$diseños[$i]["id"]."' data-toggle='modal' data-target='#modalEditarDiseño'><i class='material-icons'>save</i></button></div>";
//ESTATUS
if($diseños[$i]["activo"])
{
	$estatus="<div class='switch'><label><input type='checkbox' class='estatusDiseño' checked idDiseño='".$diseños[$i]["id"]."' estadoDiseño='0'><span class='lever switch-col-light-blue' ></span></label></div>";
}else
{
$estatus="<div class='switch'><label><input type='checkbox' class='estatusDiseño' idDiseño='".$diseños[$i]["id"]."' estadoDiseño='1'><span class='lever switch-col-light-blue' ></span></label></div>";	
}
//Clave
$clave="<input type='text'class='form-control'  idDiseño='".$diseños[$i]["id"]."'  claveDiseño='".$diseños[$i]["id"]."' value='".$diseños[$i]["clave"]."'>";
//Composicion
$diseño="<input type='text' class='form-control repetirComposicionUpdate' id='inputComposicion' idComposicion='".$diseños[$i]["id"]."' Composicion='".$diseños[$i]["id"]."' value='".$diseños[$i]["descripcion"]."'>";
//Muestra
$muestra="<a href='".$diseños[$i]["muestra"]."'><img class='img-responsive img-thumbnail'  src='".$diseños[$i]["muestra"]."' width='60px'></a>";

$label_diseño="<label class='textWhite'>'".$diseños[$i]["descripcion"]."'</label>";
$label_clave="<label class='textWhite'>'".$diseños[$i]["clave"]."'</label>";
$input_index="<input type='hidden' indexComposicion='".$diseños[$i]["id"]."' value='".$i."'></input>";

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
"'.$muestra.'",
"'.$clave.$label_clave.'",
"'.$diseño.$label_diseño.'",
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
$activarDiseños=new TablaDiseños();
$activarDiseños->mostrarTablaDiseños();