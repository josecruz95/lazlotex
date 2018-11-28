<?php
require_once "../controladores/subcategorias.controlador.php";
require_once "../modelos/subcategorias.modelo.php";


class TablaSubcategorias{
//ACTIVAR TABLA DE MARCAS
public function mostrarTablaSubcategorias(){
$item=null;
$valor=null;
$subcategorias=ControladorSubcategorias::ctrMostrarSubcategorias($item,$valor);
        
 $datosJson ='{
"data":[';
for($i=0; $i<count($subcategorias);$i++){
//ACCIONES
$botones=  "<div class='img-thumbnail'><button type='button' class='btn btn-info btn-circle waves-effect waves-circle waves-float btnEditarSubcategoria' idSubcategoria='".$subcategorias[$i]["id"]."' data-toggle='modal' data-target='#modalEditarSubcategoria'><i class='material-icons'>create</i></button></div>";
//ESTATUS
if($subcategorias[$i]["activa"])
{
	$estatus="<div class='switch'><label><input type='checkbox' class='estatusSubcategoria' checked idSubcategoria='".$subcategorias[$i]["id"]."' estadoSubcategoria='0'><span class='lever switch-col-light-blue' ></span></label></div>";
}else
{
$estatus="<div class='switch'><label><input type='checkbox' class='estatusSubcategoria' idSubcategoria='".$subcategorias[$i]["id"]."' estadoSubcategoria='1'><span class='lever switch-col-light-blue' ></span></label></div>";	
}


$datosJson .= '[
"'. ($i+1) .'",
"'.$subcategorias[$i]["clave"] .'",
"'.$subcategorias[$i]["descripcion"] .'",
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
//ACTIVAR TABLA DE MARCAS
$activarSubcategorias=new TablaSubcategorias();
$activarSubcategorias->mostrarTablaSubcategorias();