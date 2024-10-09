<?php
session_start();
include('db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            header("Location: dashboard.php");
        } else {
            echo "Contraseña incorrecta";
        }
    } else {
        echo "Usuario no encontrado";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Iniciar sesión</title>
    <script>
        function preguntarCuenta() {
            if (confirm("¿Ya tienes una cuenta?")) {
                // Si ya tiene una cuenta, permanece en la página de inicio de sesión.
            } else {
                // Si no tiene una cuenta, lo redirige a la página de registro.
                window.location.href = "register.php";
            }
        }
    </script>
</head>
<body onload="preguntarCuenta()">
    <form method="POST" action="index.php">
        <input type="text" name="username" placeholder="Usuario" required><br>
        <input type="password" name="password" placeholder="Contraseña" required><br>
        <button type="submit">Iniciar sesión</button>
    </form>
</body>
</html>
