<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apresentação</title>
</head>
<body>
    <h1>Apresente-se para nós:</h1>
    <form action="#" method="GET">
        <label for="nome">Nome:</label>
        <input type="text" name="nome">
        <label for="sobrenome">Sobrenome:</label>
        <input type="text" name="sobrenome">
        <br>
        <button type="submit">Enviar</button>
    </form>
    <?php 
        if ($_GET) {
            $nome = $_GET['nome'] ?? null;
            $sobrenome = $_GET['sobrenome'] ?? null;
            if ($nome)
            {
                echo "<p>Olá $nome $sobrenome, seja bem-vindo!</p>";
            }
        }
    ?>
</body>
</html>