<?php
$databaseHost = 'localhost';
$databaseUsuario = 'root';
$databaseSenha = '';
$databaseNome = 'aluno';

$conexao = mysqli_connect($databaseHost, $databaseUsuario, $databaseSenha, $databaseNome);

if (!$conexao) {
    die("Problemas para conectar no banco de dados.");
}

$query = "SELECT * FROM aluno";
$resultado = mysqli_query($conexao, $query);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Alunos</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h2>Lista de Alunos</h2>
        
        <!-- Botão Voltar -->
        <button onclick="window.location.href='index.php'" class="btn-voltar">Voltar para Cadastro</button>

        <table>
            <tr>
                <th>Nome</th>
                <th>Sobrenome</th>
                <th>Idade</th>
                <th>Ações</th>
            </tr>
            <?php while ($aluno = mysqli_fetch_assoc($resultado)): ?>
                <tr>
                    <td><?php echo $aluno['nome']; ?></td>
                    <td><?php echo $aluno['sobrenome']; ?></td>
                    <td><?php echo $aluno['idade']; ?></td>
                    <td>
                        <a href="editar_aluno.php?id=<?php echo $aluno['pk_codigo_aluno']; ?>">Editar</a> |
                        <a href="excluir_aluno.php?id=<?php echo $aluno['pk_codigo_aluno']; ?>" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
    </div>
</body>
</html>

<?php mysqli_close($conexao); ?>
