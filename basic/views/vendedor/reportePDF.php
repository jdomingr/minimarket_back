<?php
//se recibe variable que viene del controller...
//esa variable se llama 'clientes'
?>
    <h2>Vendedores Actuales</h2>
<br>
<table border="1">
    <tr>
    <th>Rut</th>
    <th>Nombre</th>
    <th>Apellido</th>
    </tr>
<?php
    foreach($vendedores as $data){
        echo "<tr>";
        echo "<td>".$data['Rut']."</td>";
        echo "<td>".$data['Nombre']."</td>";
        echo "<td>".$data['Apellido']."</td>";
         echo "</tr>";
    }
?>
    </table>