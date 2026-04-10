<html>
<head>
<title>Alteração de Dados</title>
<?php include ('config.php'); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>
<form action="alunoup.php?botao=gravar" method="post" name="form1">
<table width="95%" border="1" align="center">
  <tr>
    <td colspan="5" align="center">Alteração de Dados</td>
  </tr>
  <tr>
    <td width="18%" align="right">matricula</td>
    <td width="26%"><input type="number" name="matricula" /></td>
    <td width="18%" align="right">Nome:</td>
    <td width="26%"><input type="text" name="nome" /></td>
    <td width="18%" align="right">mensalidade</td>
    <td width="26%"><input type="number" name="cpf" /></td>
    <td width="18%" align="right">Nota1</td>
    <td width="26%"><input type="number" name="nota_1" /></td>
    <td width="18%" align="right">Nota2</td>
    <td width="26%"><input type="number" name="nota_2" /></td>
    <td width="21%"><input type="submit" name="botao" value="Alterar" /></td>
  </tr>
</table>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['botao']) && $_POST['botao'] == "Alterar") {
    $matricula = intval($_POST['matricula']);
    $cpf = intval($_POST['mensalidade']);
    $nome = mysqli_real_escape_string($mysqli, $_POST['nome']);
    $nota_1 = intval ($_POST['nota1']);
    $nota_2 = intval ($_POST['nota2']);
    // Validação básica
    if ($matricula > 0) {
        // Atualiza a idade se for fornecida
        if ($mensalidade > 0) {
            mysqli_query($mysqli, "UPDATE RA2025106253 SET mensalidade='$mensalidade' WHERE matricula='$matricula'");
        }

        if ($nota_1 > 0) {
            mysqli_query($mysqli, "UPDATE RA2025106253 SET nota1='$nota1' WHERE matricula='$matricula'");
        }

        if ($nota_2 > 0) {
            mysqli_query($mysqli, "UPDATE RA225106253 SET nota2='$nota2' WHERE matricula='$matricula'");
        }

        // Atualiza o nome se for fornecido
        if (!empty($nome)) {
            mysqli_query($mysqli, "UPDATE RA225106253 SET nome='$nome' WHERE matricula='$matricula'");
        }

        

        // Fecha a conexão com o banco de dados
        mysqli_close($mysqli);
    } else {
        echo "ID inválido.";
    }
}
?>

<a href="index.html">Home</a>
</body>
</html>