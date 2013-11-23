<?php
$idusuario=$_GET['idusuario'];
$adv=$_GET['adv'];
include 'conexion.php';
include 'consulta.php';
include 'ftabla.php';
conectar();
$result=mysql_query("select * from usuario where idusuario='".$idusuario."'");

$fila=mysql_fetch_array($result);
if($fila['idUsuario']==$idusuario)
{
	echo "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Strict//ES' 
	'http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml' xml:lang='es' lang='es'>

<head>
	<title>BIENVENIDO A NUESTRA PAGINA</title>
	<meta http-equiv='content-type' 
		content='text/html;charset=utf-8' />
		 <style type='text/css'>
			@import '../../estilos/estilos.css';
		</style>
			<meta http-equiv='content-language' content='es' />
	<meta http-equiv='content-type' content='text/html;charset=utf-8' />
	<meta name='robots' content='index, follow' />
	<meta name='author' content='Chali' />
	<meta name='copyright' content='Chali. Todos los derechos reservados .' />
	

	<link rel='stylesheet' type='text/css' href='calendario/css/page.css' media='screen' />
	<link rel='stylesheet' type='text/css' href='calendario/css/calendar-eightysix-v1.1-default.css' media='screen' />
	<link rel='stylesheet' type='text/css' href='calendario/css/calendar-eightysix-v1.1-vista.css' media='screen' />
	<link rel='stylesheet' type='text/css' href='calendario/css/calendar-eightysix-v1.1-osx-dashboard.css' media='screen' />
	
	<script type='text/javascript' src='calendario/js/mootools-1.2.4-core.js'></script>
	<script type='text/javascript' src='calendario/js/mootools-1.2.4.4-more.js'></script>
	<script type='text/javascript' src='calendario/js/calendar-eightysix-v1.1.js'></script>
	
	<script type='text/javascript'>
		window.addEvent('domready', function() {

			new CalendarEightysix('fecha', { 'startMonday': true, 'format': '%Y-%m-%d', 'toggler': 'exampleIII-picker', 'offsetY': -4 });
	
		
		});	
	</script>
	<script> 
function alertaChecked()
{ 
	document.f1.select1.disabled=false;
	document.f1.ivacuenta.disabled=false;
		var table = document.getElementById('tabla3');
		var rowCount = table.rows.length;
		for(var i=0; i<rowCount; i++)
		{
			document.f1.radio1[i].disabled = true;
		}
} 
function desactivarIVA()
{ 
	document.f1.select1.disabled=false;
	document.f1.ivacuenta.disabled=true;
		var table = document.getElementById('tabla3');
		var rowCount = table.rows.length;
		for(var i=0; i<rowCount; i++)
		{
			document.f1.radio1[i].disabled = false;
		}
} 

	</script>
	<script language='javascript'> 
function seleccionSI()
{ 
	try 
	{
		document.f1.select1.disabled=true;
		document.f1.ivacuenta.disabled=true;
		var table = document.getElementById('tabla3');
		var rowCount = table.rows.length;
		for(var i=0; i<rowCount; i++)
		{
			document.f1.radio1[i].disabled = true;
		}
	}
	catch(e) 
	{
		//alert(e);
	}
} 
</script>";

echo agregarfila()
."</head>

<body>

	 <center><div id='caja2'>
     <p>Realizar Transacción</p>

	<form name='f1' action='inserT.php' method='get'>
		<p><label> Monto de transaccion: <input type='text' name='monto' value='' /></label></p>
		<p><label> Descripción: <input type='text' name='descripcion' value='' /></label></p>";
?>	
	<table id='tabla2'  width="350px" cellpadding="0">
	
		<tr>			
		<th><p id='caja5'>Fecha:</p></th>
			<td id='td2'>
			<input id='fecha' name='fecha1' type='text' maxlength='10' style='padding-right: 22px;' />
			<div class='picker inElement' id='exampleIII-picker'></div>
		</td>
		</tr>	
	</table>
	<br />
	<p>Sin IVA<input name="prefiere" type="radio" value="1" checked onclick="seleccionSI();" /></p>
	<p>IVA Manual<input name="prefiere" type="radio" value="2" onclick="alertaChecked();" /></p>
	<p>Relacionar IVA<input name="prefiere" type="radio" value="3" onclick="desactivarIVA();" /></p>
	 <p>Tipo de IVA
		<select name="select1" disabled="disabled">
		<option value='0'>Seleccione cuenta IVA</option>
		<option value='1'>IVA ACREDITABLE</option>
		<option value='2'>IVA POR PAGAR</option>
</select></p>
<?php		
		$result2=mysql_query("select * from cuenta");
		echo "<p>Cuenta Afectada:<select name='ivacuenta'  disabled='disabled'>
		<option value='0'>Seleccione cuenta afectada</option>";
		while($row = mysql_fetch_array($result2))
		{
			echo utf8_encode("<option value='".$row['idCuenta'] . "'>".$row['nombreC']."</option>");
			echo "<br>";
		}
		echo "</select></p>";
?>
</p>
     <INPUT type="button" value="Agregar Fila" onclick="addRow('tabla3');" />
     <INPUT type="button" value="Borrar Fila" onclick="deleteRow('tabla3');" />
	
     <TABLE name="t3" id="tabla3" width="350px" border="1">
			<thead>
			<tr>
			<td id='tde'>Relacionar IVA</td>
			<td id='tde'>Nombre</td>
			<td id='tde'>Debe</td>
			<td id='tde'>Haber</td>
			</tr>
			</thead>
     </TABLE>

<?php
		echo "<p><input type='submit' value='Realizar Transacción' /></p>
		<p><input type='hidden' name=idusuario value='".$idusuario."' /></p>
		<p><input type='hidden' name=contador value='0' /></p>
	</form>
	<form action='paginap.php' method='get'>
		<p><input type='hidden' name=idusuario value='".$idusuario."' /></p>
		<p><input type='hidden' name=aviso value='0' /></p>
		<p><input type='submit' value='Regresar' /></p></form></div></center>

";
if($adv==1)
{
	echo "</br></br><center><p id='caja1'>No ha agregado cuentas</p></center>";
}
if($adv==2)
{
	echo "</br></br><center><p id='caja1'>Hay campos vacios o no a seleccionado cuentas</p></center>";
}
if($adv==3)
{
	echo "</br></br><center><p id='caja1'>La transacción no cuadra</p></center>";
}
if($adv==4)
{
	echo "</br></br><center><p id='caja1'>La transacción Fue Efectuada con exito</p></center>";
}
if($adv==5)
{
	echo "</br></br><center><p id='caja1'>No selecciono una cuenta de IVA</p></center>";
}
if($adv==6)
{
	echo "</br></br><center><p id='caja1'>No selecciono una cuenta de IVA o no la Relaciono</p></center>";
}
	echo "</body>
		</html>";
	desconectar();
}
else
{
				desconectar();
				header("Location:../../index.php");
				exit;
}
?>