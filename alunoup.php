<html>
<head>
    <title>Alteração de Dados</title>
    <?php include('config.php'); ?>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>

<form action="" method="post" name="form1">
    <table width="95%" border="1" align="center">
        <tr>
            <td colspan="10" align="center">Alteração de Dados</td>
        </tr>
        <tr>
            <td align="right">Matrícula</td>
            <td><input type="number" name="matricula" required /></td>

            <td align="right">Nome</td>
            <td><input type="text" name="nome" /></td>

            <td align="right">Mensalidade</td>
            <td><input type="number" step="0.01" name="mensalidade" /></td>

            <td align="right">Nota 1</td>
            <td><input type="number" step="0.01" name="nota1" /></td>

            <td align="right">Nota 2</td>
            <td><input type="number" step="0.01" name="nota2" /></td>
        </tr>
        <tr>
            <td colspan="10" align="right">
                <input type="submit" name="botao" value="Alterar" />
            </td>
        </tr>
    </table>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['botao']) && $_POST['botao'] == "Alterar") {
    
    $matricula = intval($_POST['matricula']);
    $nome = mysqli_real_escape_string($mysqli, $_POST['nome']);
    $mensalidade = $_POST['mensalidade'];
    $nota1 = $_POST['nota1'];
    $nota2 = $_POST['nota2'];

    if ($matricula > 0) {
        
        if (!empty($nome)) {
            mysqli_query($mysqli, "UPDATE aluno SET nome='$nome' WHERE matricula='$matricula'");
        }

        if ($mensalidade !== "") {
            mysqli_query($mysqli, "UPDATE aluno SET mensalidade='$mensalidade' WHERE matricula='$matricula'");
        }

        if ($nota1 !== "") {
            mysqli_query($mysqli, "UPDATE aluno SET nota1='$nota1' WHERE matricula='$matricula'");
        }

        if ($nota2 !== "") {
            mysqli_query($mysqli, "UPDATE aluno SET nota2='$nota2' WHERE matricula='$matricula'");
        }

        echo "<p>Dados alterados com sucesso!</p>";

        mysqli_close($mysqli);
    } else {
        echo "<p>Matrícula inválida.</p>";
    }
}
?>

<a href="index.html">Home</a>
</body>
</html>