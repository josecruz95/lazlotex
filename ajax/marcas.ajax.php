<?php
require_once "../controladores/marcas.controlador.php";
require_once "../modelos/marcas.modelo.php";

class AjaxMarcas{

public $idMarca;

public function ajaxEditarMarca(){
$item="id";
$valor=$this->idMarca;
$respuesta= ControladorMarcas::ctrMostrarMarcas($item,$valor);
echo json_encode($respuesta);
}

//Activar o desactivar marcas
public $activarMarca;
public $activarId;

public function ajaxActivarMarca(){
$tabla="marcas";
$item1="activa";
$valor1=$this->activarMarca;
$item2="id";
$valor2=$this->activarId;
$respuesta=ModeloMarcas::mdlActualizarMarca($tabla,$item1,$valor1,$item2,$valor2);
}

/*Validar no repetir usuario*/
public $validarMarca;


public function ajaxValidarMarca(){
$item="descripcion";
$valor= $this->validarMarca;
$respuesta=ControladorMarcas::ctrMostrarMarcas($item,$valor);
echo json_encode($respuesta);
}


}
if(isset($_POST["idMarca"]))
{
$editar=new AjaxMarcas();
$editar-> idMarca = $_POST["idMarca"];
$editar->ajaxEditarMarca();

}
if(isset($_POST["activarMarca"]))
{
$activarMarca=new AjaxMarcas();
$activarMarca-> activarMarca = $_POST["activarMarca"];
$activarMarca-> activarId = $_POST["activarId"];
$activarMarca->ajaxActivarMarca();
}
if(isset($_POST["validarMarca"]))
{
$valMarca=new AjaxMarcas();
$valMarca-> validarMarca = $_POST["validarMarca"];
$valMarca->ajaxValidarMarca();
}
