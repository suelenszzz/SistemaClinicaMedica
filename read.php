<?php
include 'conexao.php';

$sql = "SELECT * FROM pacientes";
$result = $pdo->query($sql);
$pacientes = $result->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de Pacientes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container">
    <h1 class="mt-5">Lista de Pacientes Cadastrados</h1><br>
    <table class="table table-striped" style="text-align:center">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Data de Nascimento</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>Endereço</th>
                <th>Sexo</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pacientes as $paciente): ?>
                <tr>
                    <td><?= $paciente['nome'] ?></td>
                    <td><?= date('d/m/Y', strtotime($medicamento['dataNasc'])) ?></td>
                    <td><?= $paciente['email'] ?></td>
                    <td><?= $paciente['telefone'] ?></td>
                    <td><?= $paciente['endereco'] ?></td>
                    <td><?= $paciente['sexo'] ?></td>
                </tr>
                

            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="update.php?id=<?= $paciente['id']?>" class="btn btn-warning mt-3">Editar</a>
    <a href="delete.php?id=<?= $paciente['id']?>" class="btn btn-danger mt-3" onclick="return confirm('Tem certeza?');">Deletar</a>
    <a href="index.php" class="btn btn-secondary mt-3">Voltar</a>
</body>
</html>