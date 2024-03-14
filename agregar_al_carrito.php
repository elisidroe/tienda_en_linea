<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

// Verificar si el producto_id se ha enviado por POST
if(isset($_POST['producto_id'])) {
    $producto_id = $_POST['producto_id'];

    // Agregar el producto al carrito (esto puede variar dependiendo de tu lógica)
    if(!isset($_SESSION['carrito'])) {
        $_SESSION['carrito'] = [];
    }

    // Agregar el producto al carrito
    $_SESSION['carrito'][] = $producto_id;

    // Redireccionar de nuevo a la página del producto
    header('Location: index.php');
    exit();
} else {
    echo 'Error: Producto no especificado.';
}
?>

