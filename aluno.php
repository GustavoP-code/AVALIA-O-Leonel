<html>
<head>
    <title>Inserir na tabela</title>
    <?php include('config.php'); ?>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>
<form action="" method="post" name="inserir">
    <table width="300" border="1">
        <tr>
            <td colspan="2">Inserir na tabela</td>
        </tr>
        <tr>
            <td width="100">Matrícula</td>
            <td width="200"><input type="number" name="matricula" required></td>
        </tr>
        <tr>
            <td>Nome</td>
            <td><input type="text" name="nome" required></td>
        </tr>
        <tr>
            <td>Mensalidade</td>
            <td><input type="number" step="0.01" name="mensalidade" required></td>
        </tr>
        <tr>
            <td>Nota 1</td>
            <td><input type="number" step="0.01" name="nota1" required></td>
        </tr>
        <tr>
            <td>Nota 2</td>
            <td><input type="number" step="0.01" name="nota2" required></td>
        </tr>
        <tr>
            <td colspan="2" align="right">
                <input type="submit" value="Gravar" name="botao">
            </td>
        </tr>
    </table>
</form>

<?php
if (isset($_POST['botao']) && $_POST['botao'] == "Gravar") {

    $matricula = $_POST['matricula'];
    $nome = $_POST['nome'];
    $mensalidade = $_POST['mensalidade'];
    $nota1 = $_POST['nota1'];
    $nota2 = $_POST['nota2'];

    $insere = "INSERT INTO aluno (matricula, nome, mensalidade, nota1, nota2)
               VALUES ('$matricula', '$nome', '$mensalidade', '$nota1', '$nota2')";

    mysqli_query($mysqli, $insere) or die("Não foi possível inserir os dados");

    echo "<p>Dados inseridos com sucesso!</p>";
}
?>

<a href="index.html">Home</a>
</body>
</html>