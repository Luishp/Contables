<?php

$check=$_GET['selec'];
$idusuario=$_GET['idusuario'];
if($check!="")
{
	include 'conexion.php';
	conectar();
	$result=mysql_query("select * from cuenta where idCuenta=$check");
	$fila2=mysql_fetch_array($result);
	echo "<html>
	<head>
		<head><title></title>

		 <style type='text/css'>
			@import '../css/main.css';
			@import '../../estilos/estilos.css';
		</style>
		<title></title></head>
	<body>
		<center><div id='caja3'>
		<form action='actualizarc.php' method='get'>
		<p>Editar Cuenta</p>
		<p><label>* Clave Cuenta: <input type='text' name='ccuenta' value='".$fila2['idCuenta']."' /></label></p>
		<p><label>* Nombre Cuenta: <input type='text' name='ncuenta' value='".utf8_encode($fila2['nombreC'])."' /></label></p>
		<p><input type='hidden' name=cacuenta value='".$fila2['idCuenta']."' /></p>
		<p><input type='submit' value='Actualizar' /></p>
		</form>";
		
		echo "<div><form action='paginap.php' method='get'>
		<p><input type='submit' value='Regresar' /></p>
		<p><input type='hidden' name=aviso value='0' /></p>
		<p><input type='hidden' name=idusuario value='".$idusuario."' /></p>
		</form></div></div></center>";
	echo "</body>
	</html>";
}
else
{				
					/* Redirigir navegador */
					header("Location:./veru.php?error=1&idusuario=$idusuario");
					/* Asegúrese de que el código que aparece a continuación no se ejecutará cuando redireccionamos.*/
					exit;
}
?>