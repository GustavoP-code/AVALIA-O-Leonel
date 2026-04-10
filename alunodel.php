<html>
<head>
<title>Excluir dados</title>
<?php include('config.php'); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>

<form action="" method="post" name="form1">
<table width="95%" border="1" align="center">
  <tr>
    <td colspan="5" align="center">Exclusão de Dados</td>
  </tr>
  <tr>
    <td width="18%" align="right">Matrícula</td>
    <td width="26%"><input type="number" name="matricula" /></td>
    <td width="18%" align="right">Nome</td>
    <td width="26%"><input type="text" name="nome" /></td>
    <td width="21%"><input type="submit" name="botao" value="Excluir" /></td>
  </tr>
</table>
</form>

<?php
if (isset($_POST['botao']) && $_POST['botao'] == "Excluir") {

    $matricula = $_POST['matricula'];
    $nome = $_POST['nome'];

    // segurança: garantir que pelo menos um campo foi preenchido
    if (!empty($matricula)) {
        $sql = "DELETE FROM aluno WHERE matricula = '$matricula'";
    } elseif (!empty($nome)) {
        $sql = "DELETE FROM aluno WHERE nome = '$nome'";
    } else {
        echo "<p style='color:red;'>Informe matrícula ou nome para excluir.</p>";
        exit;
    }

    if (mysqli_query($mysqli, $sql)) {
        echo "<p>Registro excluído com sucesso!</p>";
    } else {
        echo "<p>Erro ao excluir.</p>";
    }

    mysqli_close($mysqli);
}
?>

<a href="index.html">Home</a>

</body>
</html>