<?php   
	function agregarfila()
	{
	$cad=stabla("cuenta");
   $cad="<SCRIPT language='javascript'>
          function addRow(tableID) 
		  {
				var table = document.getElementById(tableID);
				var rowCount = table.rows.length;

				var row = table.insertRow(rowCount);

				var cell1 = row.insertCell(0);
				var element1 = document.createElement('input');
				element1.type = 'radio';
				element1.name = 'radio1';
				element1.value = table.rows.length-1;
				cell1.appendChild(element1);
				";
				
				$cad.=stabla("cuenta");
				  
				
				$cad.="var cell3 = row.insertCell(2);
				var element3 = document.createElement('input');
				element3.type = 'text';
				cell3.appendChild(element3);
                cell3.innerHTML = '<input name=debe'+rowCount+' type=text value=0>';
				
				var cell4 = row.insertCell(3);
				var element4 = document.createElement('input');
				element4.type = 'text';
				cell4.appendChild(element4);
                cell4.innerHTML = '<input name=haber'+rowCount+' type=text value=0>';
			   
			   if(document.f1.prefiere[2].checked)
			   {
				document.f1.contador.value=rowCount;
				var table = document.getElementById('tabla3');
				var rowCount = table.rows.length;
				for(var i=0; i<rowCount; i++)
				{
					document.f1.radio1[i].disabled = false;
				}
				}
				else
				{
				document.f1.contador.value=rowCount;
				var table = document.getElementById('tabla3');
				var rowCount = table.rows.length;
				for(var i=0; i<rowCount; i++)
				{
					document.f1.radio1[i].disabled = true;
				}
				}
				
			}

          function deleteRow(tableID) 
		  {
				try 
				{
					var table = document.getElementById(tableID);
					var rowCount = table.rows.length;
					/*for(var i=0; i<rowCount; i++) 
					{
						var row = table.rows[i];
						var chkbox = row.cells[0].childNodes[0];
						if(null != chkbox && true == chkbox.checked) 
						{
							table.deleteRow(i);
							rowCount--;
							i--;
							document.f1.contador.value=rowCount-1;
						}
					}*/
					if(rowCount-1>=1)
					{
						table.deleteRow(rowCount-1);
						document.f1.contador.value=table.rows.length-1;
					}
					else
						alert('No se pueden quitar mas filas');
               }
			   catch(e) 
			   {
                    alert(e);
               }
          }
     </SCRIPT>";
	 return $cad;
	 }
?>