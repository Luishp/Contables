<?php
$idusuario=$_GET['idusuario'];

include 'conexion.php';
conectar();
$result=mysql_query("select * from usuario where idusuario='".$idusuario."'");
$fila=mysql_fetch_array($result);
if($fila['idUsuario']==$idusuario)
{
	$ccuenta=$_GET['ccuenta'];
	$ncuenta=$_GET['ncuenta'];
	$tipocuenta=$_GET['tipocuenta'];
	$result=mysql_query("select * from cuenta where idCuenta='".$ccuenta."'");

	$fila=mysql_fetch_array($result);
	if($fila['idCuenta']==$ccuenta)
	{
		desconectar();
		header("Location:agregarC.php?idusuario=".$idusuario."&adv=1&ccuenta=''&ncuenta=''");
		/* Asegúrese de que el código que aparece a continuación no se ejecutará cuando redireccionamos.*/
		exit;
	}
	else
	{
		$consulta="INSERT INTO cuenta (idCuenta,nombreC,idTC) 
		values ('".$ccuenta."','".utf8_decode($ncuenta)."','".$tipocuenta."');";
		echo $ccuenta;
		echo $ncuenta;
		echo $tipocuenta;
		$result=mysql_query($consulta);
		desconectar();
		header("Location:./paginap.php?idusuario=".$idusuario."&aviso=5");
		/* Asegúrese de que el código que aparece a continuación no se ejecutará cuando redireccionamos.*/
		exit;
	}
}