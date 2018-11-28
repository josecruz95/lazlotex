<?php
require_once "../controladores/subcategorias.controlador.php";
require_once "../modelos/subcategorias.modelo.php";

class AjaxSubcategorias{

public function ajaxInsertarSubcategoria()
{
if(preg_match('/^[a-zA-Z-ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["subcategoria"] )&& 
 preg_match('/^[a-zA-Z-ñÑáéíóúÁÉÍÓÚ ]+$/' , $_POST["clave"]) ) {
		
$tabla ="subcategorias";
$datos=array("clave"=> $_POST["clave"], "descripcion"=> $_POST["subcategoria"]); 
echo($respuesta=ModeloSubcategorias::mdlIngresarSubcategoria($tabla,$datos));
}
else
{
echo ("error");	
}
}
public function ajaxEditarSubcategoria()
{
if(preg_match('/^[a-zA-Z-ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarsubcategoria"] )&& 
 preg_match('/^[a-zA-Z-ñÑáéíóúÁÉÍÓÚ ]+$/' , $_POST["editarclave"]) ) {
		
$tabla ="subcategorias";
$datos=array("clave"=> $_POST["editarclave"], "descripcion"=> $_POST["editarsubcategoria"], "id"=>$_POST["id"]); 
echo($respuesta=ModeloSubcategorias::mdlEditarSubcategoria($tabla,$datos));
}
else
{
echo ("error");	
}
}


public $idSubcategoria;

 public function ajaxObtenerSubcategoria(){
$item="id";
$valor=$this->idSubcategoria;
$respuesta=ControladorSubcategorias::ctrMostrarSubcategorias($item,$valor);
echo json_encode($respuesta);
}

//Activar o desactivar lineas
public $activarSubcategoria;
public $activarId;

public function ajaxActivarSubcategoria(){
$tabla="subcategorias";
$item1="activa";
$valor1=$this->activarSubcategoria;
$item2="id";
$valor2=$this->activarId;
echo($respuesta=ModeloSubcategorias::mdlActualizarSubcategoria($tabla,$item1,$valor1,$item2,$valor2));
}

/*Validar no repetir linea*/
public $validarSubcategoria;

public function ajaxValidarSubcategoria(){
$item="descripcion";
$valor= $this->validarSubcategoria;
$respuesta=ControladorSubcategorias::ctrMostrarSubcategorias($item,$valor);
echo json_encode($respuesta);
}

}
//Activar ingreso de subcategoria
if(isset($_POST["subcategoria"]))
{
$insSubcategoria=new AjaxSubcategorias();
$insSubcategoria->ajaxInsertarSubcategoria();
}
//Activar actualizacion de lineas
if(isset($_POST["editarsubcategoria"]))
{
$actSubcategoria=new AjaxSubcategorias();
$actSubcategoria->ajaxEditarSubcategoria();
}
//Activar obtener datos de linea
if(isset($_POST["idSubcategoria"]))
{
$editar=new AjaxSubcategorias();
$editar-> idSubcategoria = $_POST["idSubcategoria"];
$editar->ajaxObtenerSubcategoria();
}
//Activar o Desactivar linea
if(isset($_POST["activarSubcategoria"]))
{
$activarLinea=new AjaxSubcategorias();
$activarLinea-> activarSubcategoria = $_POST["activarSubcategoria"];
$activarLinea-> activarId = $_POST["activarId"];
$activarLinea->ajaxActivarSubcategoria();
}
//Activar validacion de linea
if(isset($_POST["validarSubcategoria"]))
{
$valLinea=new AjaxSubcategorias();
$valLinea-> validarSubcategoria = $_POST["validarSubcategoria"];
$valLinea->ajaxValidarSubcategoria();
}

