<?php

$check=$_GET['selec'];
$idusuario=$_GET['idusuario'];
$error=$_GET['error'];
$ca=$_GET['ca'];
if($check!="")
{
	include 'conexion.php';
	conectar();
	echo "<html>
	<head>
		<head><title></title>

		 <style type='text/css'>
			@import '../css/main.css';
			@import '../../estilos/estilos.css';
		</style>
		<title></title></head>
	<body>
	";
	if($check=="")
	{
		//echo "nada";
	}
	else
	{
		if($error==1)
		{
			echo "<p>Error de edicion 2: Un campo obligatorio vacio</p> ";
			$result=mysql_query("select * from usuario where idUsuario=$ca");
		}
		else
		{
			$result=mysql_query("select * from usuario where idUsuario=$check");
		}
		$fila2=mysql_fetch_array($result);
		echo "<center><div id='caja3'><br />Actualizacion de datos del usuario: ".$fila2['nombreU'];
		echo "<br />Con Nombres: ".$fila2['nombres'];
		echo "
		<div>
		<form action='crearu.php' method='get'>
		<p><label> Nombres: <input type='text' name='nombres' value='$fila2[nombres]' /></label></p>
		<p><label> Apellidos: <input type='text' name='apellidos' value='$fila2[apellidos]' /></label></p>
		<p><label> Telefono: <input type='text' name='telefono' value='$fila2[telefono]' /></label></p>
		<p><label>* Nombre de Usuario: <input type='text' name='nombreu' value='$fila2[nombreU]' /></label></p>";
		$result2=mysql_query("select * from tipousuario");
		echo "<p>Tipo de Usuario:<select name='tipousuario'>";
		while($row = mysql_fetch_array($result2))
		{
			echo "<option value='".$row['idTipoUsuario'] . "'>".$row['nombreTipo']."</option>";
			echo "<br>";
		}
		echo "</select></p>";

		echo "<p><label>* Correo: <input type='text' name='correo' value='$fila2[correo]' /></label></p>
		<p><label>* Confirmacion de Correo: <input type='text' name='correoc' value='$fila2[correo]' /></label></p>
		<p><label>* Direccion: <input type='text' name='direccion' value='$fila2[direccion]' /></label></p>
		<p><label>* Clave: <input type='password' name='clave' value='$fila2[clave]' /></label></p>
		<p><label>* Confirmacion de Clave: <input type='password' name='clavec' value='$fila2[clave]' /></label></p>
		<p><input type='submit' value='Actualizar' /></p>
		<p><input type='hidden' name=idusuario value='".$idusuario."' /></p>
		<p><input type='hidden' name=idua value='$fila2[idUsuario]' /></p>
		<p><input type='hidden' name=ca value=$check /></p>
		<p><input type='hidden' name=accion value='2' /></p>
		</form>
		</div>
		";
		echo "<div><form action='paginap.php' method='get'>
		<p><input type='submit' value='Regresar' /></p>
		<p><input type='hidden' name=aviso value='0' /></p>
		<p><input type='hidden' name=idusuario value='".$idusuario."' /></p>
		</form></div></div></center>";
	}
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