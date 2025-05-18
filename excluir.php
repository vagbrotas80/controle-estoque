<?php
include("conexao.php");
$id = $_GET['id'];
mysqli_query($conexao, "DELETE FROM produtos WHERE id=$id");
header("Location: painel.php");
?>