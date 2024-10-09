<?php
session_start();
include('db.php');

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['create_profile'])) {
        // Lógica para crear perfil
    } elseif (isset($_POST['delete_profile'])) {
        echo "<script>
            if (confirm('¿Estás seguro de que deseas eliminar este perfil?')) {
                // Lógica para eliminar el perfil
            }
        </script>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Gestión de Perfiles</title>
    <script>
        function preguntarCrearPerfil() {
            if (confirm('No tienes perfiles. ¿Deseas crear uno ahora?')) {
                document.getElementById('create_profile').click();
            }
        }
    </script>
</head>
<body onload="preguntarCrearPerfil()">
    <h1>Bienvenido a la gestión de perfiles</h1>
    <form method="POST" action="profile.php">
        <button type="submit" name="create_profile" id="create_profile">Crear Perfil</button>
        <button type="submit" name="delete_profile">Eliminar Perfil</button>
    </form>
    <a href="logout.php">Cerrar sesión</a>
</body>
</html>
