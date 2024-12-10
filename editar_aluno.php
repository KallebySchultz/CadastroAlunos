<?php
$databaseHost = 'localhost';
$databaseUsuario = 'root';
$databaseSenha = '';
$databaseNome = 'aluno';

$conexao = mysqli_connect($databaseHost, $databaseUsuario, $databaseSenha, $databaseNome);

if (!$conexao) {
    die("Problemas para conectar no banco de dados.");
}

$id = $_GET['id'];
$query = "SELECT * FROM aluno WHERE pk_codigo_aluno = $id";
$resultado = mysqli_query($conexao, $query);
$aluno = mysqli_fetch_assoc($resultado);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $idade = $_POST['idade'];

    $query = "UPDATE aluno SET nome = '$nome', sobrenome = '$sobrenome', idade = $idade WHERE pk_codigo_aluno = $id";
    if (mysqli_query($conexao, $query)) {
        header("Location: lista_aluno.php");
    } else {
        echo "Erro ao atualizar aluno: " . mysqli_error($conexao);
    }
}

mysqli_close($conexao);
?>

<!DOCTY
PE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Aluno</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <form action="" method="post">
        <h2>Editar Aluno</h2>
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" value="<?php echo $aluno['nome']; ?>" required><br><br>

        <label for="sobrenome">Sobrenome:</label>
        <input type="text" id="sobrenome" name="sobrenome" value="<?php echo $aluno['sobrenome']; ?>" required><br><br>

        <label for="idade">Idade:</label>
        <input type="number" id="idade" name="idade" value="<?php echo $aluno['idade']; ?>" required><br><br>

        <input type="submit" value="Atualizar">
    </form>
</body>
</html>
