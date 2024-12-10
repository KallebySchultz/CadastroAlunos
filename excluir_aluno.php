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
$query = "DELETE FROM aluno WHERE pk_codigo_aluno = $id";

if (mysqli_query($conexao, $query)) {
    header("Location: lista_aluno.php");
} else {
    echo "Erro ao excluir aluno: " . mysqli_error($conexao);
}

mysqli_close($conexao);
?>
