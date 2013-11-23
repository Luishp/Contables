<?php
$idusuario=$_GET['idusuario'];
$accion=$_GET['accion'];
$idua=$_GET['idua'];
$ca=$_GET['ca'];
$tipousuario=$_GET['tipousuario'];

include 'conexion.php';
conectar();
$result=mysql_query("select * from usuario where idusuario='".$idusuario."'");

$fila=mysql_fetch_array($result);
if($fila['idUsuario']==$idusuario)
{
	$nombres=$_GET['nombres'];
	$apellidos=$_GET['apellidos'];
	$telefono=$_GET['telefono'];
	$nombreu=$_GET['nombreu'];
	$correo=$_GET['correo'];
	$correoc=$_GET['correoc'];
	$direccion=$_GET['direccion'];
	$clave=$_GET['clave'];
	$clavec=$_GET['clavec'];
	if($nombreu==""||$correo==""||$correoc==""||$direccion==""
	||$clave==""||$clavec=="")
	{
				if($accion==1)
				{
					/* Redirigir navegador */
					desconectar();
					header("Location:crearc.php?idusuario=".$idusuario."&error=1&accion=$accion&idua=''&nombres=''&apellidos=''&telefono=''");
					/* Asegúrese de que el código que aparece a continuación no se ejecutará cuando redireccionamos.*/
					exit;
				}
				if($accion==2)
				{
					/* Redirigir navegador */
					desconectar();
					header("Location:editu.php?idusuario=".$idusuario."&error=1&accion=$accion&ca=$ca&c=1");
					/* Asegúrese de que el código que aparece a continuación no se ejecutará cuando redireccionamos.*/
					exit;
				}
	}
	else
	{
		if($correo==$correoc)
		{
			if($clave==$clavec)
			{
				if($accion==1)
				{
					$result=mysql_query("select * from usuario where nombreU='".$nombreu."'");

					$fila=mysql_fetch_array($result);
					if($fila['nombreU']==$nombreu)
					{
						/* Redirigir navegador */
						desconectar();
						header("Location:crearc.php?idusuario=".$idusuario."&error=4&accion=$accion&idua=''&nombres=''&apellidos=''&telefono=''");
						/* Asegúrese de que el código que aparece a continuación no se ejecutará cuando redireccionamos.*/
						exit;
					}
					else
					{
						$result=mysql_query("select * from usuario where correo='".$correo."'");

						$fila=mysql_fetch_array($result);
						if($fila['correo']==$correo)
						{
							desconectar();
							/* Redirigir navegador */
							header("Location:crearc.php?idusuario=".$idusuario."&error=5&accion=$accion&idua=''&nombres=''&apellidos=''&telefono=''");
							/* Asegúrese de que el código que aparece a continuación no se ejecutará cuando redireccionamos.*/
							exit;
						}
						else
						{
							$result=mysql_query("select max(idUsuario) as idUsuario from usuario");
							$fila=mysql_fetch_array($result);
							$consulta="INSERT INTO usuario (idUsuario,nombres,apellidos
							,correo,direccion,telefono,nombreU,clave,conectado,nAleatorio,tipoU) 
							values ('".($fila['idUsuario']+1)."','".$nombres."','".$apellidos."','".$correo."','".$direccion."','"
							.$telefono."','".$nombreu."','".$clave."','0','0','".$tipousuario."')";
							$result=mysql_query($consulta);
							/* Redirigir navegador */
							desconectar();
							header("Location:paginap.php?idusuario=".$idusuario."&aviso=1");
							/* Asegúrese de que el código que aparece a continuación no se ejecutará cuando redireccionamos.*/
							exit;
						}
					}
				}
				if($accion==2)
				{
							$consulta="update usuario set conectado=0,nombres='$nombres',apellidos='$apellidos',
										correo='$correo',direccion='$direccion',nombreU='$nombreu',clave='$clave',tipoU='$tipousuario'
							where idUsuario='".$idua."'";
							$result=mysql_query($consulta);
							/* Redirigir navegador */
							desconectar();
							header("Location:paginap.php?idusuario=".$idusuario."&aviso=2");
							/* Asegúrese de que el código que aparece a continuación no se ejecutará cuando redireccionamos.*/
							exit;
				}
			}
			else
			{
				if($accion==1)
				{
					/* Redirigir navegador */
					desconectar();
					header("Location:crearc.php?idusuario=".$idusuario."&error=3&accion=$accion&idua=''&nombres=''&apellidos=''&telefono=''");
					/* Asegúrese de que el código que aparece a continuación no se ejecutará cuando redireccionamos.*/
					exit;
				}
				if($accion==2)
				{
					/* Redirigir navegador */
					desconectar();
					header("Location:editu.php?idusuario=".$idusuario."&error=3&accion=$accion&ca=$ca&c=1");
					/* Asegúrese de que el código que aparece a continuación no se ejecutará cuando redireccionamos.*/
					exit;
				}
			}
		}
		else
		{
				if($accion==1)
				{
					/* Redirigir navegador */
					desconectar();
					header("Location:crearc.php?idusuario=".$idusuario."&error=2&accion=$accion&idua=''&nombres=''&apellidos=''&telefono=''");
					/* Asegúrese de que el código que aparece a continuación no se ejecutará cuando redireccionamos.*/
					exit;
				}
				if($accion==2)
				{
					/* Redirigir navegador */
					desconectar();
					header("Location:editu.php?idusuario=".$idusuario."&error=2&accion=$accion&ca=$ca&c=1");
					/* Asegúrese de que el código que aparece a continuación no se ejecutará cuando redireccionamos.*/
					exit;
				}
		}
	}
}
else
{
				/* Redirigir navegador */
				desconectar();
				header("Location:../../index.php");
				/* Asegúrese de que el código que aparece a continuación no se ejecutará cuando redireccionamos.*/
				exit;
}
?>