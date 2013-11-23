<?php
$idusuario=$_GET['idusuario'];
$accion=$_GET['accion'];
$idua=$_GET['idua'];
$nombres=$_GET['nombres'];
$apellidos=$_GET['apellidos'];
$telefono=$_GET['telefono'];
$idua=$_GET['idua'];
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
	<title>BIENVENIDO A NUESTRA PAGINA</title>
	<meta http-equiv='content-type' 
		content='text/html;charset=utf-8' />
		 <style type='text/css'>
			@import '../../estilos/estilos.css';
		</style>
</head>

<body><center><div id='caja4'>";

if($accion==1)
{
     echo "<p>Creacion de Cuenta de Usuario</p>";
}
if($accion==2)
{
     echo "<p>Edicion de Cuenta de Usuario</p>";
}
	echo "<form action='crearu.php' method='get'>
		<p><label> Nombres: <input type='text' name='nombres' value='$nombres' /></label></p>
		<p><label> Apellidos: <input type='text' name='apellidos' value='$apellidos' /></label></p>
		<p><label> Telefono: <input type='text' name='telefono' value='$telefono' /></label></p>
		<p><label>* Nombre de Usuario: <input type='text' name='nombreu' value='' /></label></p>";
		
		$result2=mysql_query("select * from tipousuario");
		echo "<p>Tipo de Usuario:<select name='tipousuario'>";
		while($row = mysql_fetch_array($result2))
		{
			echo "<option value='".$row['idTipoUsuario'] . "'>".$row['nombreTipo']."</option>";
			echo "<br>";
		}
		echo "</select></p>";
		desconectar();
		
		echo "<p><label>* Correo: <input type='text' name='correo' value='' /></label></p>
		<p><label>* Confirmacion de Correo: <input type='text' name='correoc' value='' /></label></p>
		<p><label>* Direccion: <input type='text' name='direccion' value='' /></label></p>
		<p><label>* Clave: <input type='password' name='clave' value='' /></label></p>
		<p><label>* Confirmacion de Clave: <input type='password' name='clavec' value='' /></label></p>";
		

if($accion==1)
{
     echo "<p><input type='submit' value='Crear Cuenta' /></p>";
}
if($accion==2)
{
     echo "<p><input type='submit' value='Editar Cuenta' /></p>
	 <p><input type='hidden' name=idua value='$fila2[idUsuario]' /></p>";
}
		
		echo "<p><input type='hidden' name=idusuario value='".$idusuario."' /></p>
		<p><input type='hidden' name=accion value='".$accion."' /></p>
	</form>
	<form action='paginap.php' method='get'>
		<p><input type='hidden' name=idusuario value='".$idusuario."' /></p>
		<p><input type='hidden' name=aviso value='0' /></p>
		<p><input type='submit' value='Regresar' /></p>
	</form></div></center>";

$error=$_GET['error'];
if($error==1)
{
	echo "<center><p id='caja1'>Error 1: Algun o algunos campos obligarios en blanco</p></center>";
}
if($error==2)
{
	echo "<center><p id='caja1'>Error 2: Correo y su confirmacion no coinciden</p></center>";
}
if($error==3)
{
	echo "<center><p id='caja1'>Error 3: Clave y su confirmacion no coinciden</p></center>";
}
if($error==4)
{
	echo "<center><p id='caja1'>Error 4: El Usuario ya existe</p></center>";
}
if($error==5)
{
	echo "<center><p id='caja1'>Error 5: El Correo ya existe</p></center>";
}

echo "</body>
</html>";

}
else
{
				/* Redirigir navegador */
				header("Location:../../index.php");
				/* Asegúrese de que el código que aparece a continuación no se ejecutará cuando redireccionamos.*/
				exit;
}
?>