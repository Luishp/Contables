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
			<form action='editu.php' method='get'>";
			
			
?>

		<p id='caja1'><input type='submit' onclick = "this.form.action = 'editc.php'" value='Editar' />
		<input type='submit' onclick = "this.form.action = 'eliminarc.php'" value='Eliminar' />
		<input type='submit' onclick = "this.form.action = 'agregarC.php'" value='Agregar' /></p>
<?php	
			
			echo "<br />
			<br />
			<br />
			<br />
			<table id='tablae1'>
			<thead>
			<tr>
			<td id='tde'>Seleccionar</td>
			<td id='tde'>Codigo de Cuenta</td>
			<td id='tde'>Nombre de cuenta</td>
			<td id='tde'>Tipo de cuenta</td>
			</tr>
			</thead>";
 

$result=mysql_query("select idCuenta,nombreC,nombreTC  from cuenta as c,tipocuenta as t where c.idTC=t.idTC");
$cont=0;
while($fila=mysql_fetch_array($result)) 
{
	echo "<tr>";
	echo "<td><input type='radio' name='selec' value='".$fila['idCuenta']."'>";
	echo "<td>".$fila['idCuenta']."</td>";
	echo "<td>".$fila['nombreC']."</td>";
	echo "<td>".$fila['nombreTC']."</td>";
	echo "</tr>";
	$cont++;
}
desconectar();

echo "</table>
		<p><input type='hidden' name=idusuario value='".$idusuario."' /></p>
		
		<p><input type='hidden' name=ccuenta value='' /></p>
		<p><input type='hidden' name=ncuenta value='' /></p>
		<p><input type='hidden' name=adv value='0' /></p>
		<p><input type='hidden' name=accion value='1' /></p>
		</form>";
	echo "<form action='paginap.php' method='get'>
		<p><input type='hidden' name=aviso value='0' /></p>
		<p><input type='hidden' name=idusuario value='".$idusuario."' /></p>
		<p><input type='submit' value='Regresar' /></p>
	</form></div></center></body></html>";
	if($error==1)
	{
		echo "<center><p id='caja1'>Error edicion de cuenta 1:No selecciono ninguno a editar</p></center>";
	}
?>