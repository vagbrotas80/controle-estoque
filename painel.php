<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit();
}
include("conexao.php");

$resultado = mysqli_query($conexao, "SELECT * FROM produtos");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Painel - Controle de Estoque</title>
    <style>
        body { font-family: Arial; background:rgb(214, 211, 161); padding: 70px; }
        .container { max-width: 700px; margin: auto; background: white; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px rgba(202, 4, 4, 0.1); }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        th { background:rgb(35, 87, 48); color: white; }
        a { text-decoration: none; color:rgb(16, 88, 72); }
        a:hover { text-decoration: underline; }
        h2 { margin-top: 0; }
        input, button { padding: 10px; margin: 5px 0; width: 100%; box-sizing: border-box; }
        input[type=submit] { background: #28a745; color: white; border: none; border-radius: 5px; }
        input[type=submit]:hover { background: #218838; }
        .logout { float: right; }
    </style>
</head>
<body>
<div class="container">
    <div class="logout"><a href="logout.php">Sair</a></div>
    <h2>Lista de Produtos</h2>
    <table>
        <tr><th>Nome</th><th>Quantidade</th><th>Preço</th><th>Ações</th></tr>
        <?php while ($row = mysqli_fetch_assoc($resultado)) { ?>
        <tr>
            <td><?= $row['nome'] ?></td>
            <td><?= $row['quantidade'] ?></td>
            <td>R$ <?= number_format($row['preco'], 2, ',', '.') ?></td>
            <td><a href="excluir.php?id=<?= $row['id'] ?>">Excluir</a></td>
        </tr>
        <?php } ?>
    </table>

    <h2>Adicionar Produto</h2>
    <form action="cadastro.php" method="POST">
        <input type="text" name="nome" placeholder="Nome do produto">
        <input type="number" name="quantidade" placeholder="Quantidade">
        <input type="text" name="preco" placeholder="Preço">
        <input type="submit" value="Cadastrar">
    </form>
</div>
</body>
</html>