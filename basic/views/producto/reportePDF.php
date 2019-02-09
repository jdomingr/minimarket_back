<?php
//se recibe variable que viene del controller...
//esa variable se llama 'clientes'
?>
    <h2>PRODUCTOS DISPONIBLES</h2>
<br>
<table border="1">
    <tr>
    <th>Nombre</th>
    <th>Tipo</th>
    <th>Precio</th>
    <th>Stock</th>
    </tr>
<?php
    foreach($productos as $data){
        echo "<tr>";
        echo "<td>".$data['Nombre']."</td>";
        echo "<td>".$data['TipoProducto']."</td>";
        echo "<td>".$data['Precio']."</td>";
        echo "<td>".$data['Stock']."</td>";
         echo "</tr>";
    }
?>
    </table>