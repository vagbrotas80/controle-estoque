<?php
include("conexao.php");
$nome = $_POST['nome'];
$quantidade = $_POST['quantidade'];
$preco = $_POST['preco'];

$sql = "INSERT INTO produtos (nome, quantidade, preco) VALUES ('$nome', '$quantidade', '$preco')";
mysqli_query($conexao, $sql);

header("Location: painel.php");
?>