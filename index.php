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
        <h1>Login</h1>
        <form action="php/Loginphp.php" method="post"> 
            <label>User</label><br>
            <input type="text" name="user" placeholder="Username" required><br><br>
            
            <label>Password</label><br>
            <input type="password" name="password" placeholder="Password" required>

            <div class="re">
            <a href="register.php">Register</a>
            <button type="submit">Login</button>
            </div>
        </form>
    </div>
</body>
</html>