<?php
include 'conexion.php';
	$c=$_GET['contador'];
	$monto=$_GET['monto'];
	$descripcion=$_GET['descripcion'];
	$fecha1=$_GET['fecha1'];
	$prefiere=$_GET['prefiere'];
	$b1=1;
	$b2=0;	
	$b3=0;	
	$ad=0;
	$ah=0;	
	$b4=1;
	$b5=1;
  if ($prefiere==2)
  {
	$select1=$_GET['select1'];
	$ivacuenta=$_GET['ivacuenta'];
	if($select1==0)
		$b4=0;
	if($ivacuenta==0)
		$b4=0;
  }
  if ($prefiere==3)
  {
	$select1=$_GET['select1'];
	$ivacuenta=$_GET['cuenta'.$_GET['radio1'].''];
	if($select1==0)
		$b5=0;
	if($ivacuenta==0)
		$b5=0;
  }
	if($c>1)
		$b3=1;
	for($i=1;$i<=$c;$i++)
	{		
		$cuenta=$_GET['cuenta'.$i.''];
		$debe=$_GET['debe'.$i.''];
		$haber=$_GET['haber'.$i.''];
		if($cuenta==0||($debe==0&&$haber==0)||$monto==0)
		{
			$b1=0;
		}
		$ad=$ad+$debe;
		$ah=$ah+$haber;
	}
	if($ad==$ah&&$ad==$monto)
	{
		$b2=1;
	}
	if($b1&&$b2&&$b3&&$b4&&$b5)
	{
		conectar();

		$result=mysql_query("select max(id_transac) as idt from transaccion");
		$fila=mysql_fetch_array($result);
		$idtra=$fila['idt']+1;
		$consulta="INSERT INTO transaccion (id_transac,monto,fecha
		,detalle_t) 
		values ('".$idtra."','".$monto."','".$fecha1."','".$descripcion."')";
		$result=mysql_query($consulta);
		$ivacuenta="";
		  if ($prefiere==2)
		  {
				$ivacuenta=$_GET['ivacuenta'];
		  }
		  if ($prefiere==3)
		  {
				$ivacuenta=$_GET['cuenta'.$_GET['radio1'].''];
		  }
		  if($prefiere==3||$prefiere==2)
		  {
				$select1=$_GET['select1'];
				if($select1==1)
				{
					$result=mysql_query("select max(id_detalle) as cdetalle from detalle_c");
					$fila=mysql_fetch_array($result);
					$consulta="INSERT INTO detalle_c (id_detalle,debe,haber
					,id_cuenta_fk,id_transac_fk) 
					values ('".($fila['cdetalle']+1)."','".($monto*0.13)."','0','1134','".$idtra."')";
					$result=mysql_query($consulta);
					
					
					$result=mysql_query("select max(id_detalle) as cdetalle from detalle_c");
					$fila=mysql_fetch_array($result);
					$consulta="INSERT INTO detalle_c (id_detalle,debe,haber
					,id_cuenta_fk,id_transac_fk) 
					values ('".($fila['cdetalle']+1)."','0','".($monto*0.13)."','".$ivacuenta."','".$idtra."')";
					$result=mysql_query($consulta);
				}
				if($select1==2)
				{
					$result=mysql_query("select max(id_detalle) as cdetalle from detalle_c");
					$fila=mysql_fetch_array($result);
					$consulta="INSERT INTO detalle_c (id_detalle,debe,haber
					,id_cuenta_fk,id_transac_fk) 
					values ('".($fila['cdetalle']+1)."','0','".($monto*0.13)."','2228','".$idtra."')";
					$result=mysql_query($consulta);
					
					
					$result=mysql_query("select max(id_detalle) as cdetalle from detalle_c");
					$fila=mysql_fetch_array($result);
					$consulta="INSERT INTO detalle_c (id_detalle,debe,haber
					,id_cuenta_fk,id_transac_fk) 
					values ('".($fila['cdetalle']+1)."','".($monto*0.13)."','0','".$ivacuenta."','".$idtra."')";
					$result=mysql_query($consulta);
				}
			}
		for($i=1;$i<=$c;$i++)
		{		
			$cuenta=$_GET['cuenta'.$i.''];
			$debe=$_GET['debe'.$i.''];
			$haber=$_GET['haber'.$i.''];
			
			
			$result=mysql_query("select max(id_detalle) as cdetalle from detalle_c");
			$fila=mysql_fetch_array($result);
			$consulta="INSERT INTO detalle_c (id_detalle,debe,haber
			,id_cuenta_fk,id_transac_fk) 
			values ('".($fila['cdetalle']+1)."','".$debe."','".$haber."','".$cuenta."','".$idtra."')";
			$result=mysql_query($consulta);
		}
			/* Redirigir navegador */
			desconectar();
			header("Location:transac.php?idusuario=".$idusuario."&adv=4");
			/* Asegúrese de que el código que aparece a continuación no se ejecutará cuando redireccionamos.*/
			exit;
	}
	else
	{
			$adv=0;
			if(!$b3)
			{
				$adv=1;
			}
			if(!$b1)
			{
				$adv=2;
			}
			if(!$b2)
			{
				$adv=3;
			}
			if(!$b4)
			{
				$adv=5;
			}
			if(!$b5)
			{
				$adv=6;
			}
			/* Redirigir navegador */
			desconectar();
			header("Location:transac.php?idusuario=".$idusuario."&adv=$adv");
			/* Asegúrese de que el código que aparece a continuación no se ejecutará cuando redireccionamos.*/
			exit;
	}
?>