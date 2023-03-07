<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nota Fiscal</title>
</head>
<body>
<?php
    // Verifica se recebeu argumentos.
    if ($_GET)
    {
        $tabelaValores = [
            "file_duplo" => ['Filé Duplo', 4.90, 5.80],
            "alcatra"    => ['Alcatra', 5.90, 6.80],
            "picanha"    => ['Picanha', 6.90, 7.80],
        ];
        $carne = $tabelaValores[$_GET['carne']];
        $quantidade = (int) $_GET['quantidade'];
        $pagamento = $_GET['forma_pag'];
        $index = $quantidade <= 5 ? 1 : 2;
        $precoTotal = $quantidade * $carne[$index];
    };
?>
    <h1>Nota fiscal</h1>
    <table border="1">
        <tr>
            <th>Item</th>
            <th>Preço/Kg</th>
            <th>Quantidade</th>
            <th>Preço</th>
        </tr>
        <tr>
            <td><?= $carne[0] ?></td>
            <td>R$<?= $carne[$index] ?></td>
            <td>Kg <?= $quantidade ?></td>
            <td>R$<?= $precoTotal ?></td>
        </tr>
        <tr>
            <th>Subtotal:</th>
            <td>R$ <?= $precoTotal ?></td>
        </tr>
        <tr>
            <th>Forma de <br> Pagamento:</th>
            <td><?= $pagamento ?></td>
        </tr>
        <tr>
            <th>Descontos:</th>
            <td>R$ <?php
            if ($pagamento == 'cartao_tabajara') 
            {
                $desconto = $precoTotal * 0.5;
            } 
            else 
            {
                $desconto = 0;
            };
            echo $desconto;
            ?></td>
        </tr>
        <tr>
            <th>Total:</th>
            <td>R$ <?= $precoTotal - $desconto ?></td>
        </tr>
</table>
</body>
</html>