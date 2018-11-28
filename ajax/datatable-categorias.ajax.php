<?php
require_once "../controladores/categorias.controlador.php";
//require_once "../modelos/categorias.modelo.php";

require_once "../controladores/subcategorias.controlador.php";
//require_once "../modelos/subcategorias.modelo.php";


class TablaCategorias{
//ACTIVAR TABLA DE CATEGORIAS
public function mostrarTablaCategorias(){
$item=null;
$valor=null;
$categorias=ControladorCategorias::CtrMostrarCategorias($item,$valor);;  
 $datosJson ='{
"data":[';
for($i=0; $i<count($categorias);$i++){
//ACCIONES
$botones=  "<div class='img-thumbnail'><button type='button' class='btn btn-info btn-circle waves-effect waves-circle waves-float editarCategoria' idCategoria='".$categorias[$i]["id"]."' data-toggle='modal' data-target='#modalEditarCategoria'><i class='material-icons'>save</i></button></div>";
//ESTATUS
if($categorias[$i]["activa"])
{
	$estatus="<div class='switch'><label><input type='checkbox' class='estatusCategoria' checked idCategoria='".$categorias[$i]["id"]."' estadoCategoria='0'><span class='lever switch-col-light-blue' ></span></label></div>";
}else
{
$estatus="<div class='switch'><label><input type='checkbox' class='estatusCategoria' idCategoria='".$categorias[$i]["id"]."' estadoCategoria='1'><span class='lever switch-col-light-blue' ></span></label></div>";	
}
//Clave
$clave="<input type='text' class='form-control' claveCategoria='".$categorias[$i]["id"]."' value='".$categorias[$i]["clave"]."'>";
//Categoria
$categoria="<input type='text' class='form-control' Categoria='".$categorias[$i]["id"]."' value='".$categorias[$i]["descripcion"]."'>";

//Subcategoria
$item="id";
$valor=$categorias[$i]["id_subcategoria"];
$subcategorias=ControladorSubcategorias::ctrMostrarSubcategorias($item,$valor);


$subcategoria="<select class='form-control show-tick' idSubcategoria='".$categorias[$i]["id"]."' data-live-search='true'><option value='".$subcategorias["id"]."' >".$subcategorias["descripcion"]."</option>";           
	$subcategorias_complemento=ControladorSubcategorias::ctrMostrarSubcategoriasSelect($item,$valor);
	foreach ($subcategorias_complemento as $key => $value) {
 	$subcategoria.="<option value='".$value["id"] ."'>".$value["descripcion"]."</option>";}                   
	$subcategoria.="</select>";

$datosJson .= '[
"'. ($i+1) .'",
"'.$clave.'",
"'.$categoria .'",
"'.$subcategoria .'",
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
$activarCategorias=new TablaCategorias();
$activarCategorias->mostrarTablaCategorias();