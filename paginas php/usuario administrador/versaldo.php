<?php
$error=$_GET['error'];
$idusuario=$_GET['idusuario'];
include 'conexion.php';
conectar();
//validar si tiene iniciada session
session_start();
if(!isset($_SESSION['nombre']))
{
header("Location: ../../index.php");
exit;
}
?>

<html>
    <head>
        <title></title>
        <style type='text/css'>
            @import '../css/main.css';
            @import '../../estilos/estilos.css';
        </style>
</head>
    <body>
        <center>
            <div id='caja2'>
                <form action='editu.php' method='get'>
                    	<br />
			<br />
			<br />
			<br />
			<table id='tablae1'>
                            <thead>
                                <tr>
                                    <td id='tde'>Codigo de Cuenta</td>
                                    <td id='tde'>Nombre de cuenta</td>
                                    <td id='tde'>Tipo de cuenta</td>
                                    <td id='tde'>Debe</td>
                                    <td id='tde'>Haber</td>
                                </tr>
                            </thead>
<?php
$result=mysql_query("SELECT 
c.idCuenta as idCuenta,c.nombreC as nombreC,tc.nombreTC as nombreTC,sum(debe) as debe,sum(haber) as haber 
FROM cuenta as c,detalle_c as dc,tipocuenta as tc
WHERE dc.id_cuenta_fk=c.idCuenta and c.idTC=tc.idTC
GROUP BY c.idCuenta");
$cont=0;
while($fila=mysql_fetch_array($result))
{
	echo "<tr>";
	echo "<td>".$fila['idCuenta']."</td>";
	echo "<td>".utf8_encode($fila['nombreC'])."</td>";
	echo "<td>".$fila['nombreTC']."</td>";
	echo "<td>".$fila['debe']."</td>";
	echo "<td>".$fila['haber']."</td>";
	echo "</tr>";
	$cont++;
}
desconectar();
?>
                        </table>
                        <p><input type='hidden' name=idusuario value='".$idusuario."' /></p>
                </form>";
                <form action='paginap.php' method='get'>
                    <p><input type='hidden' name=aviso value='0' /></p>
                    <p><input type='hidden' name=idusuario value='".$idusuario."' /></p>
                    <p><input type='submit' value='Regresar' /></p>
                </form>
            </div>
        </center>
    </body>
</html>

<?php
	if($error==1)
	{
		echo "Error edicion de usuario 1:No selecciono ninguno a editar";
	}
	if($error==2)
	{
		echo "Error edicion de usuario 2:Selecciono mas de 1 a editar";
	}
?>