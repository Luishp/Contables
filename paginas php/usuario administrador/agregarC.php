<?php
$idusuario=$_GET['idusuario'];

$ccuenta=$_GET['ccuenta'];
$ncuenta=$_GET['ncuenta'];
$adv=$_GET['adv'];
include 'conexion.php';
conectar();
$result=mysql_query("select * from usuario where idusuario='".$idusuario."'");

$fila=mysql_fetch_array($result);
if($fila['idUsuario']==$idusuario)
{
	echo "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Strict//EN'
        'http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>

<head>
	<title>Creacion de Cuenta</title>
	<meta http-equiv='content-type' 
		content='text/html;charset=utf-8' />
		 <style type='text/css'>
			@import '../../estilos/estilos.css';
		</style>
</head>

<body>";
	echo "<center><div id='caja3'><form action='insertC.php' method='get'>
		<p><label> Codigo de Cuenta: <input type='text' name='ccuenta' value='$ccuenta' /></label></p>
		<p><label> Nombre de Cuenta: <input type='text' name='ncuenta' value='$ncuenta' /></label></p>";
		$result=mysql_query("select * from tipocuenta");
		echo "<p>Tipo de Cuenta:<select name='tipocuenta'>";
while($fila=mysql_fetch_array($result)) 
{

			echo "<option value='".$fila['idTC'] . "'>".$fila['nombreTC']."</option>";
			echo "<br>";
}
		echo "</select></p>";
     echo "<p><input type='submit' value='Agregar Cuenta' /></p>";
		echo "<p><input type='hidden' name=idusuario value='".$idusuario."' /></p>
	</form>";

	echo "<form action='paginap.php' method='get'>
		<p><input type='hidden' name=idusuario value='".$idusuario."' /></p>
		<p><input type='hidden' name=aviso value='0' /></p>
		<p><input type='submit' value='Regresar' /></p>
	</form></div></center>";
	
	echo "</body>
		</html>";

if($adv==1)
{
	echo "</br></br><center><p id='caja1'>Ya Existe esa cuenta o datos erroneos</p></center>";
}
if($adv==2)
{
	echo utf8_encode("</br></br><center><p id='caja1'>Inserción Exitosa</p></center>");
}
	desconectar();
}
else
{
				/* Redirigir navegador */
				desconectar();
				header("Location:../../index.php");
				/* Asegúrese de que el código que aparece a continuación no se ejecutará cuando redireccionamos.*/
				exit;
}
?>