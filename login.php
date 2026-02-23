<?php
session_start();

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $password = $_POST['password'];

    // CONTRASEÑA DEL SISTEMA (cambiá esta)
    $password_correcta = "1234";

    if ($password === $password_correcta) {
        $_SESSION['logueado'] = true;
        header("Location: camaras.php");
        exit;
    } else {
        $error = "Contraseña incorrecta";
    }
}
?>

<h2>Acceso al sistema de cámaras</h2>

<form method="POST">
    <input type="password" name="password" placeholder="Contraseña" required>
    <br><br>
    <button type="submit">Ingresar</button>
</form>

<p style="color:red;"><?php echo $error; ?></p>
