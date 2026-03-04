<?php 

session_start();

//1. Configuración de la Base de Datos
$host = 'localhost';
$db   = 'sistema_login';
$user = 'root';
$pass = '';


$userx = $_POST['user'];
$password_input = $_POST['password'];

// Create connection
$conn = new mysqli($host, $user, $pass, $db);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM usuarios where username='".$userx."'";
// Execute the SQL query
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    
    if ($password_input === $row['password']) {
        
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['username'] = $row['username'];
        
        header("Location: todo.php");
        exit();
        
    } else {
        echo "<script>
                alert('Invalid password. Please try again.');
                window.history.back();
              </script>";
    }
} else {
    echo "<script>
            alert('The username does not exist.');
            window.history.back();
          </script>";
}
$conn->close();



/*
session_start();

// 1. Configuración
$host = 'localhost';
$db   = 'sistema_login';
$user = 'root';
$pass = '';

// Recibimos los datos del formulario
$userx = $_POST['user']; // Asegúrate de que en el HTML el name sea 'User'
$password_input = $_POST['password'];

// 2. Conexión
$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// 3. Consulta SEGURA (Sentencia preparada)
// El "?" evita que hackeen tu base de datos
$stmt = $conn->prepare("SELECT id, username, password FROM usuarios WHERE username = ?");
$stmt->bind_param("s", $userx); // "s" significa que es un string
$stmt->execute();
$result = $stmt->get_result();

// 4. Verificación
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    
    // Comparamos la contraseña escrita con la de la base de datos
    if ($password_input === $row['password']) {
        
        // ¡LOGIN CORRECTO!
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['username'] = $row['username'];
        
        // REDIRECCIÓN a todo.php
        header("Location: todo.php");
        exit(); // Detiene el script para asegurar la redirección
        
    } else {
        echo "Contraseña incorrecta.";
    }
} else {
    echo "El usuario no existe.";
}

$conn->close();
*/