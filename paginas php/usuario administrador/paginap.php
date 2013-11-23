<?php
$idusuario=$_GET['idusuario'];
include 'conexion.php';
//validar si tiene iniciada session
session_start();
if(!isset($_SESSION['nombre']))
{
header("Location: ../../index.php");
exit;
}

conectar();
$result=mysql_query("select * from usuario where idusuario='".$idusuario."'");

$fila=mysql_fetch_array($result);
?>

<!DOCTYPE html>
<html lang='es'>

<head>
	<title>BIENVENIDO A NUESTRA PAGINA</title>
			<meta http-equiv='content-language' content='es' />
	<meta http-equiv='content-type' content='text/html;charset=utf-8' />
	<meta name='robots' content='index, follow' />
	<meta name='author' content='Chali' />
	<meta name='copyright' content='Chali. Todos los derechos reservados .' />
		 <style type='text/css'>
			@import '../../estilos/estilos.css';
		</style>
</head>

<body>

	 <center><div id='caja3'>
     <p>BIENVENIDO</p>
	<form action='cerrars.php' method='get'>
		<p><input type='submit' value='Cerrar Session' /></p>
		<p><input type='hidden' name=idusuario value='".$idusuario."' /></p>
	</form>
	<form action='vercuenta.php' method='get'>
		<p><input type='submit' value='Ver Cuenta' /></p>
		<p><input type='hidden' name=idusuario value='".$idusuario."' /></p>
		<p><input type='hidden' name=error value='0' /></p>
		<p><input type='hidden' name=accion value='1' /></p>
	</form>
	<form action='versaldo.php' method='get'>
		<p><input type='submit' value='Saldo de Cuentas' /></p>
		<p><input type='hidden' name=idusuario value='".$idusuario."' /></p>
		<p><input type='hidden' name=error value='0' /></p>
		<p><input type='hidden' name=accion value='1' /></p>
	</form>
	<form action='veru.php' method='get'>
		<p><input type='submit' value='Ver Todos los Usuarios' /></p>
		<p><input type='hidden' name=error value='0' /></p>
		<p><input type='hidden' name=idusuario value='".$idusuario."' /></p>
	</form>
    <form action='vertransaccion.php' method='get'>
		<p><input type='submit' value='Ver Transacciones' /></p>
		<p><input type='hidden' name=idusuario value='".$idusuario."' /></p>
		<p><input type='hidden' name=error value='0' /></p>
		<p><input type='hidden' name=exito value='0' /></p>
	</form>
	</div></center>
<?php
	$aviso=$_GET['aviso'];
	if($aviso==1)
	{
		echo "</br></br><center><p id='caja1'>Aviso 1: Fue exitosa la creacion del usuario </p></center>";
	}
	if($aviso==2)
	{
		echo "</br></br><center><p id='caja1'>Aviso 2: Modificacion exitosa del usuario </p></center>";
	}
	if($aviso==3)
	{
		echo "</br></br><center><p id='caja1'>Aviso 3: Eliminacion exitosa del usuario </p></center>";
	}
	if($aviso==4)
	{
		echo "</br></br><center><p id='caja1'>Aviso 4: Modificacion exitosa de la cuenta </p></center>";
	}
	if($aviso==5)
	{
		echo "</br></br><center><p id='caja1'>Aviso 5:Inserción de cuenta Exitosa</p></center>";
	}
	if($aviso==6)
	{
		echo "</br></br><center><p id='caja1'>Aviso 3: Eliminacion exitosa de transacción </p></center>";
	}
?>
</body>
</html>
