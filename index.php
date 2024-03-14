<?php
include 'config.php';

// Consulta para obtener información del producto y sus comentarios
$producto_id = 1; // Aquí debes reemplazarlo con el ID real del producto que estás mostrando
$query = "SELECT * FROM productos WHERE producto_id = $producto_id ";
$resultado = $conexion->query($query);

// Verificar si se obtuvieron resultados
if ($resultado->num_rows > 0) {
    // Obtener datos del producto
    $producto = $resultado->fetch_assoc();

    // Consulta para obtener comentarios del producto
    $query_comentarios = "SELECT * FROM comentarios WHERE producto_id = $producto_id";
    $resultado_comentarios = $conexion->query($query_comentarios);

    // Crear un array para almacenar los comentarios
    $comentarios = [];
    while ($comentario = $resultado_comentarios->fetch_assoc()) {
        $comentarios[] = $comentario['comentario'];
    }
} else {
    echo "No se encontró el producto.";
}

// Cerrar la conexión a la base de datos
$conexion->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda en Linea</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
        <h1>Tienda en Linea</h1>
    </header>

    <nav>
        <ul>
            <li><a href="#">Inicio</a></li>
            <li><a href="#">Productos</a></li>
        </ul>
    </nav>

    <div class="producto">
    
        <img src="img/01.png" alt="" srcset="">
        <h2><p><?php echo $producto['nombre']; ?></p></h2>
        <p>Precio: $<?php echo $producto['precio']; ?></p>
        <p>Descripción: <?php echo $producto['descripcion']; ?></p>
        <p>Comentarios:
        <!-- Modifica esta sección del código PHP para usar una lista desordenada (ul) y list items (li) -->
<?php
if (!empty($comentarios)) {
    echo '<ul class="comentarios-lista">'; // Agrega la clase comentarios-lista
    foreach ($comentarios as $comentario) {
        echo '<li class="comentario-item">' . $comentario . '</li>'; // Corregido usando comillas simples
    }
    echo '</ul>';
} else {
    echo 'No hay comentarios.';
}
?>
</p>

         <!-- Formulario para agregar al carrito -->
         <form method="post" action="agregar_al_carrito.php">
            <input type="hidden" name="producto_id" value="<?php echo $producto_id; ?>">
            <input type="submit" value="Agregar al carrito" class="button">
        </form>

    </div>
</body>
</html>

