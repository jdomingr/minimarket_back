<?php
//se recibe variable que viene del controller...
//esa variable se llama 'clientes'
?>
    <h2>Compras Realizadas</h2>
<br>
<table border="1">
    <tr>
    <th>Nombre Proveedor</th>
    <th>Fecha</th>
    <th>Vendedor</th>
    
    </tr>
<?php
    foreach($compras as $data){
        echo "<tr>";
        echo "<td>".$data['NombreProveedor']."</td>";
        echo "<td>".$data['Fecha']."</td>";
        echo "<td>".$data['Vendedor_Rut']."</td>";
         echo "</tr>";
    }
?>
    </table>