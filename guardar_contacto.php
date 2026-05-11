<?php
include "conexion.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $nombre = trim($_POST["nombre"]);
    $email = trim($_POST["email"]);
    $telefono = trim($_POST["telefono"]);
    $mensaje = trim($_POST["mensaje"]);

    $sql = "INSERT INTO contactos (nombre, email, telefono, mensaje) VALUES (?, ?, ?, ?)";

    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("ssss", $nombre, $email, $telefono, $mensaje);

    if ($stmt->execute()) {
        header("Location: index.php?enviado=ok");
        exit;
    } else {
        echo "Error al guardar el contacto.";
    }

    $stmt->close();
}

$conexion->close();
?>