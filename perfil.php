<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit();
}

$host = 'localhost';
$db   = 'sistema_login';
$user = 'root';
$pass = '';
$conn = new mysqli($host, $user, $pass, $db);

$username = $_SESSION['username'];

$sql = "SELECT created_at FROM usuarios WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $usuario_id);
$stmt->execute();

$resultado = $stmt->get_result();
$datos_usuario = $resultado->fetch_assoc();
$fecha_registro = $datos_usuario['created_at'] ?? 'No disponible';
$fecha_formateada = date("d/m/Y", strtotime($fecha_registro));
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mi Perfil - To Do List</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="todo">
        <div class="avatar">
        </div>
        <br><br><br>
        <h2>User Profile</h2>
        <p><strong>Username</strong>: <?php echo htmlspecialchars($username); ?></p>
        <p><strong>Create Date</strong>: <?php echo htmlspecialchars($fecha_formateada);?></p> <br>
        <a href="Todo.php" class="boton">Regresar</a>
    </div>
</body>
</html>
