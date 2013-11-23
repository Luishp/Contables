<?php
include 'conexion.php';
conectar();
$idusuario=$_GET['idusuario'];

				/* Redirigir navegador */
				mysql_query("update usuario set conectado=0  where idUsuario='".$idusuario."'");
				desconectar();
				header("Location:../../index.php?lfail=0");
				/* Asegúrese de que el código que aparece a continuación no se ejecutará cuando redireccionamos.*/
				exit;

?>