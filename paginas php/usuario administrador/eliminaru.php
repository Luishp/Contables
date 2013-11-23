<?php
$selec=$_GET['selec'];
$idusuario=$_GET['idusuario'];
include 'conexion.php';
conectar();
if($selec!="")
{
	$consulta="DELETE FROM usuario WHERE idUsuario='$selec'";
	mysql_query($consulta);
	desconectar();
	/* Redirigir navegador */
	header("Location:./paginap.php?idusuario=".$idusuario."&aviso=3");
	/* Asegúrese de que el código que aparece a continuación no se ejecutará cuando redireccionamos.*/
	exit;
}
else
{
	desconectar();
	/* Redirigir navegador */
	header("Location:./veru.php?error=2&idusuario=$idusuario");
	/* Asegúrese de que el código que aparece a continuación no se ejecutará cuando redireccionamos.*/
	exit;
}
?>