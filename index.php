<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Aluno</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <form action="cadastro_aluno.php" method="post">
        <h2>Cadastro de Aluno</h2>
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" maxlength="20" required><br><br>

        <label for="sobrenome">Sobrenome:</label>
        <input type="text" id="sobrenome" name="sobrenome" maxlength="20" required><br><br>

        <label for="idade">Idade:</label>
        <input type="number" id="idade" name="idade" min="1" required><br><br>

        <input type="submit" value="Cadastrar">
        <input type="reset" value="Limpar">
        <input type="button" value="Lista de Alunos" onclick="window.location.href='lista_aluno.php'">
    </form>
</body>
</html>
