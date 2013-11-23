<?php
$idusuario=$_GET['idusuario'];
$ccuenta=$_GET['ccuenta'];
$ncuenta=$_GET['ncuenta'];
$cacuenta=$_GET['cacuenta'];

include 'conexion.php';
conectar();

$consulta="UPDATE  cuenta SET  idCuenta =  '".$ccuenta."',
nombreC =  '$ncuenta' WHERE  idCuenta =$cacuenta;";
mysql_query($consulta);
/* Redirigir navegador */
desconectar();
header("Location:paginap.php?idusuario=".$idusuario."&aviso=4");
/* Asegúrese de que el código que aparece a continuación no se ejecutará cuando redireccionamos.*/
exit;
?>