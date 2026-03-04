<?php
session_start();

$host = 'localhost';
$db   = 'sistema_login';
$user = 'root';
$pass = '';

$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['tarea'])) {
    $conn = new mysqli($host, $user, $pass, $db);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $texto = $_POST['text'];
    $sql = "INSERT INTO todo (text) VALUES ('$texto')";
    
    if ($conn->query($sql) === TRUE) {
        $mensaje = "Save successfully";
    } else {
        $mensaje = "Error: " . $conn->error;
    }
    $conn->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To Do List</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class='perfil'> <a href="perfil.php"></a>
    </div>
    <div class='container'>
        <div class="todo">
            <h1>To Do List</h1>
            <form class='row' action="todo.php" method='post'>
                <input name='text' class="list" type="text" id="Input-box" placeholder="Add your text here">
                <button onclick="addTask()" name='tarea' type='Submit'>Add</button>
            </form>
            <ul id="list-container">
                <!--<li class="si">Task 1</li>
                <li>Task 2</li>
                <li>Task 3</li>-->
            </ul>
        </div>
    </div>
    <script src="js/scrip.js"></script>
</body>
</html>