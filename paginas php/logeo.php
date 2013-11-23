<?php
include 'usuario administrador/conexion.php';
conectar();
$usuario=$_GET['usuario'];
$clave=$_GET['clave'];
$result=mysql_query("select * from usuario where nombreU='".$usuario."' and clave='".$clave."'")or die(mysql_error());
session_start();

$fila=mysql_fetch_array($result);
echo $fila['nombreU'];

if($fila['nombreU']=="")
{
				desconectar();
				header("Location:../inicio.php?lfail=1");
				exit;
}

else
{
				mysql_query("update usuario set conectado=1  where nombreU='".$usuario."' and clave='".$clave."'");
				desconectar();
				$_SESSION['nombre']=$usuario;
				$_SESSION['clave']=$clave;
				header("Location:./usuario administrador/paginap.php?idusuario=".$fila['idUsuario']."&aviso=0");
				exit;
}
?>