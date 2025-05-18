<?php
session_start();
include("conexao.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM usuarios WHERE usuario='$usuario' AND senha='$senha'";
    $result = mysqli_query($conexao, $sql);

    if (mysqli_num_rows($result) == 1) {
        $_SESSION['usuario'] = $usuario;
        header("Location: painel.php");
        exit();
    } else {
        $erro = "Login inválido!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login - Controle de Estoque</title>
    <style>
        body { font-family: Arial; background:rgb(167, 185, 145); display: flex; height: 100vh; align-items: center; justify-content: center; }
        .login-box { background: white; padding: 50px; border-radius: 30px; box-shadow: 0 0 50px rgba(75, 7, 7, 0.2); width: 400px; }
        input[type=text], input[type=password] { width: 100%; padding: 10px; margin-top: 10px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 5px; }
        input[type=submit] { background-color:rgb(121, 171, 106); color: white; border: none; padding: 10px; width: 100%; border-radius: 5px; cursor: pointer; }
        input[type=submit]:hover { background-color:rgb(0, 179, 18); }
        .error { color: red; margin-bottom: 15px; }
    </style>
</head>
<body>
<div class="login-box">
    <h2>Login</h2>
    <?php if (!empty($erro)) echo "<div class='error'>$erro</div>"; ?>
    <form method="POST">
        <input type="text" name="usuario" placeholder="Usuário">
        <input type="password" name="senha" placeholder="Senha">
        <input type="submit" value="Entrar">
    </form>
</div>
</body>
</html>