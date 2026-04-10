<html>
<head>
    <title>Relatório Tabela</title>
    <?php include('config.php'); ?>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>
<form action="" method="post" name="form1">
    <table width="95%" border="1" align="center">
        <tr>
            <td colspan="5" align="center">Relatório de Dados</td>
        </tr>
        <tr>
            <td width="18%" align="right">Nome:</td>
            <td width="26%"><input type="text" name="nome" /></td>
            <td width="17%" align="right">Matrícula:</td>
            <td width="18%"><input type="number" name="matricula" /></td>
            <td width="21%"><input type="submit" name="botao" value="Gerar" /></td>
        </tr>
    </table>
</form>

<?php
if (isset($_POST['botao']) && $_POST['botao'] == "Gerar") {
    
    $nome = $_POST['nome'];
    $matricula = $_POST['matricula'];

    $query = "SELECT 
                matricula,
                nome,
                mensalidade,
                nota1,
                nota2,
                (nota1 + nota2) / 2 AS media,

                CASE
                    WHEN ((nota1 + nota2) / 2) = 10 THEN 20
                    WHEN ((nota1 + nota2) / 2) >= 7 THEN 10
                    ELSE 5
                END AS percentual_desconto,

                mensalidade * (
                    CASE
                        WHEN ((nota1 + nota2) / 2) = 10 THEN 0.20
                        WHEN ((nota1 + nota2) / 2) >= 7 THEN 0.10
                        ELSE 0.05
                    END
                ) AS valor_desconto,

                mensalidade - (
                    mensalidade * (
                        CASE
                            WHEN ((nota1 + nota2) / 2) = 10 THEN 0.20
                            WHEN ((nota1 + nota2) / 2) >= 7 THEN 0.10
                            ELSE 0.05
                        END
                    )
                ) AS valor_liquido

              FROM aluno
              WHERE 1=1";

    if (!empty($nome)) {
        $query .= " AND nome LIKE '%$nome%'";
    }

    if (!empty($matricula)) {
        $query .= " AND matricula = '$matricula'";
    }

    $query .= " ORDER BY matricula";

    $result = mysqli_query($mysqli, $query);
?>

<table width="95%" border="1" align="center">
    <tr bgcolor="#9999FF">
        <th>Matrícula</th>
        <th>Nome</th>
        <th>Mensalidade</th>
        <th>Nota 1</th>
        <th>Nota 2</th>
        <th>Média</th>
        <th>% Desconto</th>
        <th>Valor do Desconto</th>
        <th>Valor Líquido</th>
    </tr>

<?php
    while ($coluna = mysqli_fetch_array($result)) {
?>
    <tr>
        <td><?php echo $coluna['matricula']; ?></td>
        <td><?php echo $coluna['nome']; ?></td>
        <td>R$ <?php echo number_format($coluna['mensalidade'], 2, ',', '.'); ?></td>
        <td><?php echo number_format($coluna['nota1'], 1, ',', '.'); ?></td>
        <td><?php echo number_format($coluna['nota2'], 1, ',', '.'); ?></td>
        <td><?php echo number_format($coluna['media'], 1, ',', '.'); ?></td>
        <td><?php echo $coluna['percentual_desconto']; ?>%</td>
        <td>R$ <?php echo number_format($coluna['valor_desconto'], 2, ',', '.'); ?></td>
        <td>R$ <?php echo number_format($coluna['valor_liquido'], 2, ',', '.'); ?></td>
    </tr>
<?php
    }
?>
</table>

<?php
}
?>

<a href="index.html">Home</a>
</body>
</html>