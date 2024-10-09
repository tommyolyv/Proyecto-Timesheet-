<?php
include('db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
            if (confirm('Registro exitoso. ¿Deseas iniciar sesión ahora?')) {
                window.location.href = 'index.php';
            }
        </script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Registro</title>
</head>
<body>
    <form method="POST" action="register.php">
        <input type="text" name="username" placeholder="Usuario" required><br>
        <input type="password" name="password" placeholder="Contraseña" required><br>
        <button type="submit">Registrarse</button>
    </form>
</body>
</html>
