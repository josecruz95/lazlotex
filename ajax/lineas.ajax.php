<?php
require_once "../controladores/lineas.controlador.php";
require_once "../modelos/lineas.modelo.php";

class AjaxLineas{

public function ajaxInsertarLinea()
{
if(preg_match('/^[a-zA-Z-ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["linea"] )&& 
 preg_match('/^[a-zA-Z-ñÑáéíóúÁÉÍÓÚ ]+$/' , $_POST["clave"]) ) {
		
$tabla ="lineas";
$datos=array("clave"=> $_POST["clave"], "descripcion"=> $_POST["linea"], "id_marca"=> $_POST["id_marca"]); 
echo($respuesta=ModeloLineas::mdlIngresarLinea($tabla,$datos));


}
else
{
echo ("error");	
}
}

public function ajaxEditarLinea()
{
if(preg_match('/^[a-zA-Z-ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarlinea"] )&& 
 preg_match('/^[a-zA-Z-ñÑáéíóúÁÉÍÓÚ ]+$/' , $_POST["editarclave"]) ) {
		
$tabla ="lineas";
$datos=array("clave"=> $_POST["editarclave"], "descripcion"=> $_POST["editarlinea"], "id_marca"=> $_POST["editarid_marca"], "id"=>$_POST["id"]); 
echo($respuesta=ModeloLineas::mdlEditarLinea($tabla,$datos));


}
else
{
echo ("error");	
}
}


public $idLinea;

public function ajaxObtenerLinea(){
$item="id";
$valor=$this->idLinea;
$respuesta= ControladorLineas::ctrMostrarLineas($item,$valor);
echo json_encode($respuesta);
}

//Activar o desactivar lineas
public $activarLinea;
public $activarId;

public function ajaxActivarLinea(){
$tabla="lineas";
$item1="activa";
$valor1=$this->activarLinea;
$item2="id";
$valor2=$this->activarId;
echo($respuesta=ModeloLineas::mdlActualizarLinea($tabla,$item1,$valor1,$item2,$valor2));
}

/*Validar no repetir linea*/
public $validarLinea;


public function ajaxValidarLinea(){
$item="descripcion";
$valor= $this->validarLinea;
$respuesta=ControladorLineas::ctrMostrarLineas($item,$valor);
echo json_encode($respuesta);
}



}


//Activar ingreso de lineas
if(isset($_POST["linea"]))
{
$insLinea=new AjaxLineas();
$insLinea->ajaxInsertarLinea();
}
//Activar actualizacion de lineas
if(isset($_POST["editarlinea"]))
{
$actLinea=new AjaxLineas();
$actLinea->ajaxEditarLinea();
}



//Activar obtener datos de linea
if(isset($_POST["idLinea"]))
{
$editar=new AjaxLineas();
$editar-> idLinea = $_POST["idLinea"];
$editar->ajaxObtenerLinea();
}
//Activar o Desactivar linea
if(isset($_POST["activarLinea"]))
{
$activarLinea=new AjaxLineas();
$activarLinea-> activarLinea = $_POST["activarLinea"];
$activarLinea-> activarId = $_POST["activarId"];
$activarLinea->ajaxActivarLinea();
}
//Activar validacion de linea
if(isset($_POST["validarLinea"]))
{
$valLinea=new AjaxLineas();
$valLinea-> validarLinea = $_POST["validarLinea"];
$valLinea->ajaxValidarLinea();
}

