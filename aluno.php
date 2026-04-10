<html>

<head>
<title>inserir na tabela</title>

<?php include ('config.php');  ?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>
<form action="inserir.php" method="post" name="inserir">
<table width="200" border="1">
  <tr>
    <td colspan="2">Inserir na tabela</td>
  </tr>
  <tr>
    <td width="53">matricula</td>
    <td width="131">&nbsp;
  </tr>
  <tr>
    <td>Nome:</td>
    <td><input type="text" name="nome" ></td>
  </tr>
  <tr>
    <td>Mensalidade</td>
    <td><input type="number" step="0.1" name="mensalidade" ></td>
  </tr>
  <tr>
    <td>Nota 1</td>
    <td><input type="number" step="0.1" name="nota_1" ></td>
  </tr>
  <tr>
    <td>Nota 2</td>
    <td><input type="number" step="0.1" name="nota_2" ></td>
  </tr>
  <tr>
    <td colspan="2" align="right"><input type="submit" value="Gravar" name="botao"></td>
    </tr>	
</table>
</form>

<?php
if (@$_POST['botao'] == "Gravar") 
	{
		
		$nome = $_POST['nome'];
		$matricula = $_POST['matricula'];
		$mensalidade = $_POST['mensalidade'];
    $nota1 = $_POST['nota1'];
    $nota2 = $_POST['nota2'];
		
		
		$insere = "INSERT into aluno (nome, matricula, mesalidade, nota1, nota2) 
    VALUES ('$nome', '$matricula', '$mensalidade', '$nota2', '$nota2')";
		mysqli_query($mysqli, $insere) or die ("Não foi possivel inserir os dados");
	}

?>

<a href="index.html" >Home </a>
</body>
</html>