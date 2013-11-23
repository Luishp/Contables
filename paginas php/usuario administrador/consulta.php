<?php
function stabla($tabla)
{		
		$cad2="";
		$i=1;
		$result2=mysql_query("select * from $tabla");	
		$cad2.="var cell5 = row.insertCell(1); 
		oSelect = document.createElement('SELECT');
		oSelect.id = 'combo';
		op = document.createElement('OPTION');
			  oSelect.name = 'cuentas';
			  op.value = '0';
			  op.text = 'Selecione Cuenta';
			  oSelect .options[0] = op;
			  cell5.appendChild(oSelect);";	
		while($row = mysql_fetch_array($result2))
		{
			$cad2.=utf8_encode("op = document.createElement('OPTION');
			  oSelect.name = 'cuenta'+rowCount+'';
			  op.value = '".$row['idCuenta']."';
			  op.text = '".$row['nombreC']."';
			  oSelect .options[$i] = op;
			  cell5.appendChild(oSelect);");
			  $i++;
		}
		
	return $cad2;
}
?>
