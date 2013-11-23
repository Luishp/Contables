<?php
$error=$_GET['error'];
$idusuario=$_GET['idusuario'];
include 'conexion.php';
conectar();
echo "<html>
		<head><title></title>

		 <style type='text/css'>
			@import '../css/main.css';
			@import '../../estilos/estilos.css';
		</style>
		
</head>
		<body>
		<center><div id='caja2'>
			<form  name='form1' method='get'>
			
			<br />
			<br />
			<br />
			<br />";
?>

		<p id='caja1'><input type='submit' onclick = "this.form.action = 'editu.php'" value='Editar' />
		<input type='submit' onclick = "this.form.action = 'eliminaru.php'" value='Eliminar' />
		<input type='submit' onclick = "this.form.action = 'crearc.php'" value='Agregar' /></p>
		<p><input type='hidden' name=idua value='0' /></p>
		<p><input type='hidden' name=nombres value='' /></p>
		<p><input type='hidden' name=apellidos value='' /></p>
		<p><input type='hidden' name=telefono value='' /></p>
		<p><input type='hidden' name=error value='' /></p>
		<p><input type='hidden' name=accion value='1' /></p>
		<p><input type='hidden' name=ca value='' /></p>
			<br />
			<table id='tablae1'>
			<thead>
			<tr>
			<td id='tde'>Seleccionado</td>
			<td id='tde'>Usuario</td>
			<td id='tde'>Tipo Usuario</td>
			<td id='tde'>Conectado</td>
			<td id='tde'>Correo</td></tr>
<?php			
			echo "</thead>";
 

$result=mysql_query("select *  from usuario");
$cont=0;
while($fila=mysql_fetch_array($result)) 
{
	$tipo='';
	if($fila['tipoU']==1)
	{
		$tipo='Administrador';
	}
	else
	{
		$tipo='Usuario';
	}
	echo "<tr>";
	echo "<td><input type='radio' name='selec' value='".$fila['idUsuario']."'>
			<br></td>";
	echo "<td>".$fila['nombreU']."</td>";
	echo "<td>".$tipo."</td>";
	$conectado='No';
	if($fila['conectado']==1)
		$conectado='Si';
	echo "<td>".$conectado."</td>";
	echo "<td>".$fila['correo']."</td>";
	echo "</tr>";
	$cont++;
}
desconectar();

echo "</table>
		<p><input type='hidden' name=idusuario value='".$idusuario."' /></p></form>";
	echo "<form action='paginap.php' method='get'>
		<p><input type='hidden' name=idusuario value='".$idusuario."' /></p>
		<p><input type='hidden' name=aviso value='0' /></p>
		<p><input type='submit' value='Regresar' /></p>
	</form></div></center></body></html>";
	if($error==1)
	{
		echo "<center><p id='caja1'>Error edicion de usuario 1:No selecciono ninguno a editar</p></center>";
	}
	if($error==2)
	{
		echo "<center><p id='caja1'>Error eliminacion de usuario 1:No selecciono ninguno a eliminar</p></center>";
	}
?>