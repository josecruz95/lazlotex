<?php
require_once "../controladores/generos.controlador.php";
//require_once "../modelos/categorias.modelo.php";
require_once "../controladores/tallas.controlador.php";
require_once "../controladores/division.controlador.php";

//require_once "../modelos/subcategorias.modelo.php";


class TablaTallas{
//ACTIVAR TABLA DE CATEGORIAS
public function mostrarTablaTallas(){
$item=null;
$valor=null;
$tallas=ControladorTallas::CtrMostrarTallas($item,$valor);;  
 $datosJson ='{
"data":[';
for($i=0; $i<count($tallas);$i++){
//ACCIONES
$botones=  "<div class='img-thumbnail'><button type='button' class='btn btn-info btn-circle waves-effect waves-circle waves-float editarTalla' idTalla='".$tallas[$i]["id"]."' data-toggle='modal' data-target='#modalEditarCategoria'><i class='material-icons'>save</i></button></div>";
//ESTATUS
if($tallas[$i]["activa"])
{
	$estatus="<div class='switch'><label><input type='checkbox' class='estatusTalla' checked idTalla='".$tallas[$i]["id"]."' estadoTalla='0'><span class='lever switch-col-light-blue' ></span></label></div>";
}else
{
$estatus="<div class='switch'><label><input type='checkbox' class='estatusTalla' idTalla='".$tallas[$i]["id"]."' estadoTalla='1'><span class='lever switch-col-light-blue' ></span></label></div>";	
}
//Clave
$clave="<input type='text'class='form-control' claveTalla='".$tallas[$i]["id"]."' value='".$tallas[$i]["clave"]."'>";
//Talla
$talla="<input type='text' class='form-control' Talla='".$tallas[$i]["id"]."' value='".$tallas[$i]["descripcion"]."'>";
//Orden
$orden="<input type='number' class='form-control' Orden='".$tallas[$i]["id"]."' value='".$tallas[$i]["orden"]."' >";



//Genero
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
	$division.="</select>";

$datosJson .= '[
"'. ($i+1) .'",
"'.$orden.'",
"'.$clave.'",
"'.$talla .'",
"'.$division .'",
"'.$genero .'",
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
$activarTallas=new TablaTallas();
$activarTallas->mostrarTablaTallas();