<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Folha de Pagamento</title>
</head>
<body>
    <h1>Calcular folha de pagamento</h1>
    <form action="#" method="GET">
        <label for="valor">Valor por hora:</label>
        <input type="number" name="valor">
        <br>
        <label for="horas">Horas trabalhadas:</label>
        <input type="number" name="horas">
        <br>
        <button type="submit">Enviar</button>
    </form>

    <?php
        if ($_GET) 
        {
            $valorHora = $_GET['valor'] ?? null;
            $horasTrabalhadas = $_GET['horas'] ?? null;
            if ($valorHora && $horasTrabalhadas)
            {
                $salarioBruto = ($valorHora * $horasTrabalhadas);
                $impostoRenda = $salarioBruto * (5/100);
                $inss = $salarioBruto * (10/100);
                $fgts = $salarioBruto * (11/100);
                $descontos = $inss + $impostoRenda;
            }
        }
    ?>
    <?php 
        if (isset($salarioBruto))
        {
            $itens = [
                'Salário Bruto' => 'R$ ' . $salarioBruto,
                'IR' => 'R$ ' . $impostoRenda,
                'INSS' => 'R$ ' . $inss,
                'FGTS' => 'R$ ' . $fgts,
                'Total de descontos' => 'R$ ' . $descontos,
                'Salário Líquido' => 'R$ ' . $salarioBruto - $descontos
            ];
        } else {
            $itens = [
                'Salário Bruto' => '-',
                'IR' => '5%',
                'INSS' => '10%',
                'FGTS' => '11%',
                'Total de descontos' => '-',
                'Salário Líquido' => '-'
            ];
        }
    ?>
    <table border="1">
        <tr>
            <th></th>
            <th>Valor</th>
        </tr>
        <?php foreach ($itens as $key => $value): ?>
        <tr>
            <td> <?= $key ?></td>
            <td> <?= $value ?></td>
        </tr>
        <?php endforeach; ?>
    </table>

</body>
</html>