<?php
require_once "../controladores/confecciones_completas.controlador.php";
require_once "../controladores/categorias.controlador.php";
require_once "../controladores/confecciones.controlador.php";
require_once "../controladores/proveedores.controlador.php";


class TablaConfeccionesCompletas{
//ACTIVAR TABLA DE CATEGORIAS
public function mostrarConfeccionesCompletas(){
$item=null;
$valor=null;
$confecciones_completas=ControladorConfeccionesCompletas::CtrMostrarConfeccionesCompletas($item,$valor);;  
 $datosJson ='{
"data":[';
for($i=0; $i<count($confecciones_completas);$i++){
//ACCIONES
$botones=  "<div class='img-thumbnail'><button type='button' class='btn btn-info btn-circle waves-effect waves-circle waves-float editarConfeccionCompleta' idConfeccionCompleta='".$confecciones_completas[$i]["id"]."' data-toggle='modal' data-target='#modalEditarCategoria'><i class='material-icons'>save</i></button></div>";
//ESTATUS
if($confecciones_completas[$i]["activo"])
{
	$estatus="<div class='switch'><label><input type='checkbox' class='estatusConfeccionCompleta' checked idConfeccionCompleta='".$confecciones_completas[$i]["id"]."' estadoConfeccionCompleta='0'><span class='lever switch-col-light-blue' ></span></label></div>";
}else
{
$estatus="<div class='switch'><label><input type='checkbox' class='estatusConfeccionCompleta' idConfeccionCompleta='".$confecciones_completas[$i]["id"]."' estadoConfeccionCompleta='1'><span class='lever switch-col-light-blue' ></span></label></div>";	
}
//Clave
$clave="<input type='text'class='form-control' claveConfeccionCompleta='".$confecciones_completas[$i]["id"]."' value='".$confecciones_completas[$i]["clave"]."'>";
//Confeccion
$confeccion="<input type='text' class='form-control' ConfeccionCompleta='".$confecciones_completas[$i]["id"]."' value='".$confecciones_completas[$i]["descripcion"]."'>";
//Confeccion
$precio="<input type='number' class='form-control' PrecioConfeccionCompleta='".$confecciones_completas[$i]["id"]."' value='".$confecciones_completas[$i]["precio"]."'>";
//Index
$input_index="<input type='hidden' indexConfeccionCompleta='".$confecciones_completas[$i]["id"]."' value='".$i."'></input>";


//Categoria
$item="id";
$valor=$confecciones_completas[$i]["id_categoria"];
$categorias=ControladorCategorias::ctrMostrarCategoriasRegistro($item,$valor);
$categoria="<select class='form-control show-tick' idCategoriaConfeccion='".$confecciones_completas[$i]["id"]."' data-live-search='true'><option value='".$categorias["id"]."' >".
$categorias["descripcion"]."</option>";
	$categorias_complemento=ControladorCategorias::ctrMostrarCategoriasSelect($item,$valor);
	foreach ($categorias_complemento as $key => $value) {
 	$categoria.="<option value='".$value["id"] ."'>".$value["descripcion"]."</option>";}                   
	$categoria.="</select>";
//Tipo
$item="id";
$valor=$confecciones_completas[$i]["id_tipo"];
$tipos=ControladorConfecciones::ctrMostrarConfecciones($item,$valor);
$tipo="<select class='form-control show-tick' idTipoConfeccion='".$confecciones_completas[$i]["id"]."' data-live-search='true'><option value='".$tipos["id"]."' >".$tipos["descripcion"]."</option>";
	$tipos_complemento=ControladorConfecciones::ctrMostrarConfeccionesSelect($item,$valor);
	foreach ($tipos_complemento as $key => $value) {
 	$tipo.="<option value='".$value["id"] ."'>".$value["descripcion"]."</option>";}                   
	$tipo.="</select>";
//Tipo
$item="id";
$valor=$confecciones_completas[$i]["id_proveedor"];
$proveedores=ControladorProveedores::ctrMostrarProveedores($item,$valor);
$proveedor="<select class='form-control show-tick' idProveedorConfeccion='".$confecciones_completas[$i]["id"]."' data-live-search='true'><option value='".$proveedores["id"]."' >".$proveedores["nombre"]."</option>";
	$proveedores_complemento=ControladorProveedores::ctrMostrarProveedoresSelect($item,$valor);
	foreach ($proveedores_complemento as $key => $value) {
 	$proveedor.="<option value='".$value["id"] ."'>".$value["nombre"]."</option>";}                   
	$proveedor.="</select>";



$datosJson .= '[
"'. ($i+1) .$input_index.'",
"'.$clave.'",
"'.$confeccion.'",
"'.$precio.'",
"'.$categoria.'",
"'.$tipo.'",
"'.$proveedor.'",
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
$activarConfeccionesCompletas=new TablaConfeccionesCompletas();
$activarConfeccionesCompletas->mostrarConfeccionesCompletas();