<?php
//se recibe variable que viene del controller...
//esa variable se llama 'clientes'
?>
    <h2>Ventas Realizadas</h2>
<br>
<table border="1">
    <tr>
    <th>Fecha</th>
    <th>Vendedor</th>
    
    </tr>
<?php
    foreach($ventas as $data){
        echo "<tr>";
        
        echo "<td>".$data['Fecha']."</td>";
        echo "<td>".$data['Vendedor_Rut']."</td>";
        
         echo "</tr>";
    }
?>
    </table>