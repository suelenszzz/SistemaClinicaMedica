<?php 
include 'conexao.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];

    $sql= "DELETE FROM pacientes WHERE id= :id";
    $sql = $pdo->prepare($sql);
    $sql->execute([':id' => $id]);
    echo "Paciente deletado! ";

   
}
?> 
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
    <br>
    <a href="index.php" class="btn btn-secondary mt-3">Voltar</a>
</body>