<?php
require_once "../controladores/telas.controlador.php";
require_once "../controladores/tipos_telas.controlador.php";
require_once "../controladores/colores_telas.controlador.php";
require_once "../controladores/diseños_telas.controlador.php";
require_once "../controladores/composiciones_telas.controlador.php";
require_once "../controladores/unidades.controlador.php";




class TablaTelas{
//ACTIVAR TABLA DE CATEGORIAS
public function mostrarTablaTelas(){
$item=null;
$valor=null;
$telas=ControladorTelas::CtrMostrarTelas($item,$valor);;  
 $datosJson ='{
"data":[';
for($i=0; $i<count($telas);$i++){
//ACCIONES
$botones=  "<div class='img-thumbnail'><button type='button' class='btn btn-info btn-circle waves-effect waves-circle waves-float editarTela' idTela='".$telas[$i]["id"]."' data-toggle='modal' data-target='#modalEditarComposicion'><i class='material-icons'>save</i></button></div>";
//ESTATUS
if($telas[$i]["activa"])
{
	$estatus="<div class='switch'><label><input type='checkbox' class='estatusTela' checked idTela='".$telas[$i]["id"]."' estadoTela='0'><span class='lever switch-col-light-blue' ></span></label></div>";
}else
{
$estatus="<div class='switch'><label><input type='checkbox' class='estatusTela' idTela='".$telas[$i]["id"]."' estadoTela='1'><span class='lever switch-col-light-blue' ></span></label></div>";	
}
//Clave
$clave="<input type='text'class='form-control' claveTela='".$telas[$i]["id"]."' value='".$telas[$i]["clave"]."'>";
//Tela
$tela="<input type='text' class='form-control' Tela='".$telas[$i]["id"]."' value='".$telas[$i]["descripcion"]."'>";
//OZ
$oz="<input type='text' class='form-control' OZ='".$telas[$i]["id"]."' value='".$telas[$i]["oz"]."'>";
//Ancho
$ancho="<input type='number' class='form-control' Ancho='".$telas[$i]["id"]."' value='".$telas[$i]["ancho"]."'>";

//Tipo
$item="id";
$valor=$telas[$i]["id_tipo"];
$tipos=ControladorTipos::ctrMostrarTipos($item,$valor);
$tipo="<select class='form-control show-tick' idTipoTela='".$telas[$i]["id"]."' data-live-search='true'><option value='".$tipos["id"]."' >".
	$tipos["descripcion"]."</option>";
	$tipos_complemento=ControladorTipos::ctrMostrarTiposSelect($item,$valor);
	foreach ($tipos_complemento as $key => $value) {
 	$tipo.="<option value='".$value["id"] ."'>".$value["descripcion"]."</option>";}                   
	$tipo.="</select>";
//Color
$item="id";
$valor=$telas[$i]["id_color"];
$colores=ControladorColores::ctrMostrarColoresRegistro($item,$valor);
$color="<select class='form-control show-tick' idColorTela='".$telas[$i]["id"]."' data-live-search='true'><option value='".$colores["id"]."' >".
	$colores["descripcion"]."</option>";
	$colores_complemento=ControladorColores::ctrMostrarColoresSelect($item,$valor);
	foreach ($colores_complemento as $key => $value) {
 	$color.="<option value='".$value["id"] ."'>".$value["descripcion"]."</option>";}                   
	$color.="</select>";
//Diseño
$item="id";
$valor=$telas[$i]["id_diseno"];
$diseños=ControladorDiseños::ctrMostrarDiseños($item,$valor);
$diseño="<select class='form-control show-tick' idDiseñoTela='".$telas[$i]["id"]."' data-live-search='true'><option value='".$diseños["id"]."' >".
	$diseños["descripcion"]."</option>";
	$diseños_complemento=ControladorDiseños::ctrMostrarDiseñosSelect($item,$valor);
	foreach ($diseños_complemento as $key => $value) {
 	$diseño.="<option value='".$value["id"] ."'>".$value["descripcion"]."</option>";}                   
	$diseño.="</select>";
//Composicion
$item="id";
$valor=$telas[$i]["id_composicion"];
$composiciones=ControladorComposiciones::ctrMostrarComposiciones($item,$valor);
$composicion="<select class='form-control show-tick' idComposicionTela='".$telas[$i]["id"]."' data-live-search='true'><option value='".$composiciones["id"]."' >".
	$composiciones["descripcion"]."</option>";
	$composiciones_complemento=ControladorComposiciones::ctrMostrarComposicionesSelect($item,$valor);
	foreach ($composiciones_complemento as $key => $value) {
 	$composicion.="<option value='".$value["id"] ."'>".$value["descripcion"]."</option>";}                   
	$composicion.="</select>";
//Medida
$item="id";
$valor=$telas[$i]["id_unidad"];
$unidades=ControladorUnidades::ctrMostrarUnidades($item,$valor);
$unidad="<select class='form-control show-tick' idUnidadTela='".$telas[$i]["id"]."' data-live-search='true'><option value='".$unidades["id"]."' >".
	$unidades["descripcion"]."</option>";
	$unidades_complemento=ControladorUnidades::ctrMostrarUnidadesSelect($item,$valor);
	foreach ($unidades_complemento as $key => $value) {
 	$unidad.="<option value='".$value["id"] ."'>".$value["descripcion"]."</option>";}                   
	$unidad.="</select>";


$datosJson .= '[
"'.($i+1).'",
"'.$clave.'",
"'.$tela.'",
"'.$tipo.'",
"'.$color.'",
"'.$diseño.'",
"'.$unidad.'",
"'.$composicion.'",
"'.$oz.'",
"'.$ancho.'",
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
$activarTelas=new TablaTelas();
$activarTelas->mostrarTablaTelas();