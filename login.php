<?php
session_start();

// Verificar si ya está autenticado
if (isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit();
}

// Manejo del formulario de login
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    // Credenciales válidas
    $usuario_valido = "admin";
    $password_valido = "admin123"; // Cambiar a una contraseña más segura

    if ($usuario === $usuario_valido && $password === $password_valido) {
        $_SESSION['usuario'] = $usuario;
        header("Location: index.php");
        exit();
    } else {
        $error = "Usuario o contraseña incorrectos.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="css/estilos.css"> -->
    <title>Login</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f6f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .login-container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .form-group input {
            width: 95%;
            padding: 10px;
            font-size: 1em;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form-group button.login {
            width: 100%;
            padding: 15px 30px;
            font-size: 1em;
            color: white;
            background: #000080;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-family: 'Poppins', sans-serif;
        }

        .form-group button.login:hover {
            background: #000030;
        }

        .error {
            color: red;
            font-size: 0.9em;
            margin-bottom: 15px;
            border: red 1px solid;
            background-color: rgba(255, 0, 0, 0.1);
            padding: 10px 15px;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h1>Iniciar Sesión</h1>
        <?php if (isset($error)): ?>
            <p class="error"><?= $error ?></p>
        <?php endif; ?>
        <form method="POST" action="login.php">
            <div class="form-group">
                <label for="usuario">Usuario:</label>
                <input type="text" id="usuario" name="usuario" required>
            </div>
            <div class="form-group">
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <button class="login" type="submit">Entrar</button>
            </div>
        </form>
    </div>
</body>
</html>