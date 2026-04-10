<html>
<head>
<title>Relatório Tabela</title>
<?php include ('config.php');  ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>
<form action="alunolst.php?botao=gravar" method="post" name="form1">
<table width="95%" border="1" align="center">
  <tr>
    <td colspan=5 align="center">Relatório de Dados</td>
  </tr>
  <tr>
    <td width="18%" align="right">Nome:</td>
    <td width="26%"><input type="text" name="nome"  /></td>
    <td width="17%" align="right">matricula:</td>
    <td width="18%"><input type="text" name="cpf" size="11" /></td>
    <td width="21%"><input type="submit" name="botao" value="Gerar" /></td>
  </tr>
</table>
</form>

<?php if (@$_POST['botao'] == "Gerar") { ?>

<table width="95%" border="1" align="center">
  <tr bgcolor="#9999FF">
    <th width="5%">matricula</th>
    <th width="30%">Nome</th>
    <th width="15%">mensalidade</th>
    <th width="12%">nota1</th>
    <th width="12%">nota2</th>
  
  </tr>

<?php

	$nome = $_POST['nome'];
	$matricula = $_POST['matricula'];
	
	$query = "SELECT matricula, mesnsalidade, nome, nota1, nota2, (nota1+nota2)/2 AS media
			  FROM RA2025106253
			  WHERE matricula > 0 ";
	$query .= ($nome ? " AND nome LIKE '%$nome%' " : "");
	$query .= ($mensalidade ? " AND cpf = '$mensalidade' " : "");
	$query .= " ORDER by matricula";
        $result = mysqli_query($mysqli, $query);

	while ($coluna=mysqli_fetch_array($result)) 
	{
		
	?>
    
    <tr>
      <th width="5%"><?php echo $coluna['matricula']; ?></th>
      <th width="30%"><?php echo $coluna['nome']; ?></th>
      <th width="15%"><?php echo $coluna['mensalidade']; ?></th>
      
      <th width="12%"><?php echo $coluna['nota1']; ?></th>
      <th width="12%"><?php echo $coluna['nota2']; ?></th>
      
  	</tr>

    <?php
	
	} // fim while
?>
</table>
<?php	
}
?>

<a href="index.html" >Home </a>

</body>