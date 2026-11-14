<?php
require_once 'config/conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $dia = trim($_POST['dia']);
    $platillo_id = intval($_POST['platillo_id']);

    if (!empty($dia) && $platillo_id > 0) {
        $stmt_cat = $conn->prepare("SELECT nombre, categoria, ingredientes, calorias, imagen FROM catalogo_platillos WHERE id = ?");
        $stmt_cat->bind_param("i", $platillo_id);
        $stmt_cat->execute();
        $res = $stmt_cat->get_result();

        if ($platillo = $res->fetch_assoc()) {
            $nombre = $platillo['nombre'];
            $categoria = $platillo['categoria'];
            $ingredientes = $platillo['ingredientes'];
            $calorias = $platillo['calorias'];
            $imagen = $platillo['imagen'];

            $stmt = $conn->prepare("INSERT INTO menu (dia, categoria, platillo, ingredientes, calorias, imagen) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssis", $dia, $categoria, $nombre, $ingredientes, $calorias, $imagen);
            $stmt->execute();
        }
    }
}

header("Location: index.php");
exit;
?>