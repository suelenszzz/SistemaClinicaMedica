<?php
require 'config.php';
$id = $_GET['id'];
$sql = "SELECT * FROM pacientes WHERE id=$id";
$result = $conn->query($sql);
$paciente = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Paciente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Editar Paciente</h2>
        <form action="process.php" method="POST">
            <input type="hidden" name="action" value="update">
            <input type="hidden" name="id" value="<?= $paciente['id'] ?>">
            <div class="mb-3">
                <label for="nome" class="form-label">Nome Completo</label>
                <input type="text
