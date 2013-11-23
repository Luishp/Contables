<!DOCTYPE html>
<html lang="es">
<head>
	<title>INICIO DE SESSION</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
		 <style type="text/css">
			@import './estilos/estilos.css';
		</style>
</head>

<body>
</br>
</br>
<center>
	<div class="content">
		<div class="right_login">
			 <p>INICIAR SESSION</p>
			<center><form action='./paginas php/logeo.php' method='GET'>
				<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Usuario: <input type='text' name='usuario' value=''  class="login" /></p>
				<p>Contraseña: <input type='password' name='clave' value=''  class="login" /></p>
				<p><input id="boton1" type='submit' value='Iniciar' class="searchSubmit"/></p>
			</form></center>
		</div>
	</div>
	</center>
<?php
$lfail="";
$lfail=$_GET['lfail'];
if($lfail==1)
{
	echo "</br></br><center><p id='caja1'>Error el usuario o contraseña fue mal Escrito</p></center>";
}
?>			

</body>
</html>