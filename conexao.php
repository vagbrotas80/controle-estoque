<?php
$host = "localhost";
$user = "root";
$senha = "";
$banco = "estoque_db";

$conexao = mysqli_connect($host, $user, $senha, $banco);
if (!$conexao) {
    die("Erro na conexão: " . mysqli_connect_error());
}
?>