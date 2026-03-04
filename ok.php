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
?>