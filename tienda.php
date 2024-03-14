<?php
$sql = "SELECT * FROM direccion";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "ID: " . $row["direccion_id"]. " - Dirección: " . $row["nombre_direccion"]. "<br>";
    }
} else {
    echo "0 resultados";
}
?>
