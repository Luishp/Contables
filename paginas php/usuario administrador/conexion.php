<?php
function conectar()
{	
	//$conexion = mysql_connect("localhost", "camiones", "camiones");
	//mysql_select_db("camiones", $conexion);
	$conexion = mysql_connect("localhost", "scontable", "scontable");
	mysql_select_db("scontable", $conexion);
}

function desconectar()
{
	mysql_close();
}
?>