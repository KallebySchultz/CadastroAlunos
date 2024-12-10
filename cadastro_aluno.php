<?php
$databaseHost = 'localhost';
$databaseUsuario = 'root';
$databaseSenha = '';
$databaseNome = 'aluno';

$conexao = mysqli_connect($databaseHost, $databaseUsuario, $databaseSenha, $databaseNome);

if (!$conexao) {
    die("Problemas para conectar no banco de dados.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $idade = $_POST['idade'];

    $query = "INSERT INTO aluno (nome, sobrenome, idade) VALUES ('$nome', '$sobrenome', $idade)";
    if (mysqli_query($conexao, $query)) {
        header("Location: lista_aluno.php");
    } else {
        echo "Erro ao cadastrar aluno: " . mysqli_error($conexao);
    }
}

mysqli_close($conexao);
?>
