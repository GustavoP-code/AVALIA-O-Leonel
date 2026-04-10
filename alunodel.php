<html>
<head>
<title>Excluir dados </title>
<?php include ('config.php');  ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>
<form action="alunodel.php?botao=gravar" method="post" name="form1">
<table width="95%" border="1" align="center">
  <tr>
    <td colspan=5 align="center">Exclusão de Dados</td>
  </tr>
  <tr>
    <td width="18%" align="right">matricula</td>
    <td width="26%"><input type="number" name="matricula"  /></td>
    <td width="18%" align="right">Nome:</td>
    <td width="26%"><input type="text" name="nome"  /></td>
    <td width="21%"><input type="submit" name="botao" value="Excluir" /></td>
  </tr>
</table>
</form>

<?php if (@$_POST['botao'] == "Excluir") { ?>

<?php
$matricula = $_POST['matricula'];
$nome = $_POST['nome'];

//DELETE
mysqli_query($mysqli, "DELETE FROM aluno WHERE matricula= '$matricula' OR nome='$nome'");
mysqli_close($mysqli);
}
?>

<a href="index.html" >Home </a>
</body>
</html>''