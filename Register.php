<?php
session_start();

// 1. Configuración de la Base de Datos
$host = 'localhost';
$db   = 'sistema_login';
$user = 'root';
$pass = '';

$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conexión
    $conn = new mysqli($host, $user, $pass, $db);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Recogemos los datos del formulario
    $userx = $_POST['user'];
    $password_input = $_POST['password'];

    // 2. Verificar si el usuario ya existe para no duplicarlo
    $checkUser = "SELECT * FROM usuarios WHERE username = '$userx'";
    $result = $conn->query($checkUser);

    if ($result->num_rows > 0) {
        $mensaje = "Error: The username is alredy used";
    } else {
        // 3. Insertar el nuevo usuario (Guardando en texto plano como pediste)
        $sql = "INSERT INTO usuarios (username, password) VALUES ('$userx', '$password_input')";

        if ($conn->query($sql) === TRUE) {
            $mensaje = "Regster was succesfull now you can <a href='index.php'>login</a>";
        } else {
            $mensaje = "Error to register: " . $conn->error;
        }
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class='log'>
        <h1>Register</h1>
        <?php if ($mensaje != ""): ?>
        <p style="color: blue; font-weight: bold;">
            <?php echo $mensaje; ?>
        </p>
    <?php endif; ?>
        <form action="register.php" method="post"> 
            <label>User</label><br>
            <input type="text" name="user" placeholder="Username" required><br><br>
            
            <label>Password</label><br>
            <input type="password" name="password" placeholder="Password" required>

            <div class="re">
            <a href="index.php">Login</a>
            <button type="submit">Register</button>
            </div>
        </form>
    </div>
</body>
</html>