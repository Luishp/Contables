<?php
$error=$_GET['error'];
$exito=$_GET['exito'];
$idusuario=$_GET['idusuario'];
include 'conexion.php';
conectar();
echo "<html>
		<head><title></title>
            <style type='text/css'>
                @import '../css/main.css';
                @import '../../estilos/estilos.css';
            </style>
        </head>
		<body>
            <center>
                <div id='caja2'>
                    <form action='editu.php' method='get'>";
?>
                        <p id='caja1'>
                            <input type='submit' onclick = "this.form.action = 'eliminart.php'" value='Eliminar' />
                            <input type='submit' onclick = "this.form.action = 'transac.php'" value='Agregar' />
                        </p>
<?php
                        echo "<br />
                        <br />
                        <br />
                        <br />
                        <table id='tablae1'>
                            <thead>
                                <tr>
                                    <td id='tde'>Seleccionar</td>
                                    <td id='tde'>Id Transaccion</td>
                                    <td id='tde'>Fecha </td>
                                    <td id='tde'>Detalle</td>
                                    <td id='tde'>Monto</td>
                                </tr>
                            </thead>
                        <tbody>";
                        $result=mysql_query("select *from transaccion where 1 order by id_transac asc");
                        $cont=0;
                        while($fila=mysql_fetch_array($result)) 
                        {
                            echo "<tr>";
                            echo "<td><input type='radio' name='selec' value='".$fila['id_transac']."'>";
                            echo "<td>".$fila['id_transac']."</td>";
                            echo "<td>".$fila['fecha']."</td>";
                            echo "<td>".$fila['detalle_t']."</td>";
                            echo "<td>".$fila['monto']."</td>";
                            echo "</tr>";
                            $cont++;
                        }
                        desconectar();

                        echo "</tbody>
                        </table>
                        <p><input type='hidden' name=idusuario value='".$idusuario."' /></p>
                        <p><input type='hidden' name=adv value='0' /></p>
                    </form>";
                    echo "<form action='paginap.php' method='get'>
                        <p><input type='hidden' name=aviso value='0' /></p>
                        <p><input type='hidden' name=idusuario value='".$idusuario."' /></p>
                        <p><input type='submit' value='Regresar' /></p>
                    </form>
                </div>
            </center>
        </body>
    </html>";
     if($error==1) {
        echo "<center><p id='caja1'>Error edicion de cuenta 1:No selecciono ninguna Transaccion</p></center>";
    } else if($exito==1) {
        echo "<center><p id='caja1'>Transaccion Eliminada Exitosamente</p></center>";
    }
?>