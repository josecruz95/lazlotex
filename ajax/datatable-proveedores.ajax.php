<?php
require_once "../controladores/proveedores.controlador.php";

class TablaProveedores{
//ACTIVAR TABLA DE CONFECCIONES
public function mostrarTablaProveedores(){
$item=null;
$valor=null;
$proveedores=ControladorProveedores::CtrMostrarProveedores($item,$valor);;  
 $datosJson ='{
"data":[';
for($i=0; $i<count($proveedores);$i++){
//ACCIONES
$botones=  "<div class='img-thumbnail'><button type='button' class='btn btn-info btn-circle waves-effect waves-circle waves-float editarProveedor' idProveedor='".$proveedores[$i]["id"]."' data-toggle='modal' data-target='#modalEditarConfeccion'><i class='material-icons'>save</i></button></div>";
//ESTATUS
if($proveedores[$i]["activo"])
{
	$estatus="<div class='switch'><label><input type='checkbox' class='estatusProveedor' checked idProveedor='".$proveedores[$i]["id"]."' estadoProveedor='0'><span class='lever switch-col-light-blue' ></span></label></div>";
}else
{
$estatus="<div class='switch'><label><input type='checkbox' class='estatusProveedor' idProveedor='".$proveedores[$i]["id"]."' estadoProveedor='1'><span class='lever switch-col-light-blue' ></span></label></div>";	
}

//Proveedor
$proveedor="<input type='text' class='form-control repetirProveedorUpdate' Proveedor='".$proveedores[$i]["id"]."' idProveedor='".$proveedores[$i]["id"]."' value='".$proveedores[$i]["nombre"]."'>";
//contacto
$contacto="<input type='text' class='form-control' Contacto='".$proveedores[$i]["id"]."' value='".$proveedores[$i]["contacto"]."'>";
//telefono
$telefono="<input type='text' class='form-control telefono' Telefono='".$proveedores[$i]["id"]."' value='".$proveedores[$i]["telefono"]."'>";
//email
$email="<input type='text' class='form-control email' Email='".$proveedores[$i]["id"]."' value='".$proveedores[$i]["email"]."'>";


$label_proveedor="<label style='color:white;'>'".$proveedores[$i]["nombre"]."'</label>";
$label_contacto="<label style='color:white;'>'".$proveedores[$i]["contacto"]."'</label>";
$label_telefono="<label style='color:white;'>'".$proveedores[$i]["telefono"]."'</label>";
$label_email="<label  style='color:white;'>'".$proveedores[$i]["email"]."'</label>";


$input_index="<input type='hidden' indexProveedor='".$proveedores[$i]["id"]."' value='".$i."'></input>";


$datosJson .= '[
"'.($i+1).$input_index.'",
"'.$proveedor.$label_proveedor.'",
"'.$contacto.$label_contacto.'",
"'.$telefono.$label_telefono.'",
"'.$email.$label_email.'",
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
$activarProveedores=new TablaProveedores();
$activarProveedores->mostrarTablaProveedores();