<?php
$selec=$_GET['selec'];
$idusuario=$_GET['idusuario'];
include 'conexion.php';
conectar();
if($selec!="")
{
	$consulta="DELETE d, t FROM detalle_c AS d JOIN transaccion AS t ON d.id_transac_fk = t.id_transac WHERE t.id_transac ='$selec'";
	
	mysql_query($consulta);
	desconectar();
	/* Redirigir navegador */
	header("Location:./paginap.php?idusuario=".$idusuario."&aviso=6");
	/* Asegúrese de que el código que aparece a continuación no se ejecutará cuando redireccionamos.*/
	exit;
}
else
{
	desconectar();
	/* Redirigir navegador */
	header("Location:./vertransaccion.php?error=1&exito=0&idusuario=$idusuario");
	/* Asegúrese de que el código que aparece a continuación no se ejecutará cuando redireccionamos.*/
	exit;
}
?>