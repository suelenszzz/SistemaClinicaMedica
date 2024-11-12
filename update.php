<?php 
include 'conexao.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];

    $sql = "SELECT * FROM pacientes WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':id' => $id]);
    $paciente = $stmt->fetch(PDO::FETCH_ASSOC);

    if(!$paciente){
        echo "Paciente não encontrado";
        exit;
    }
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $dataNasc = $_POST['data'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $endereco = $_POST['endereco'];
    $sexo = $_POST['sexo'];

    $sql = "UPDATE pacientes SET nome = :nome, dataNasc = :dataNasc, email = :email, telefone = :telefone, endereco = :endereco, sexo = :sexo WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ":nome" => $nome,
        ":dataNasc" => $dataNasc,
        ":email" => $email,
        ":telefone" => $telefone,
        ":endereco" => $endereco,
        ":sexo" => $sexo,
        ":id" => $id
    ] );
    echo "Dados do paciente atualizado com sucesso";
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Dados do Paciente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container">
    <h1 class="mt-5">Editar Dados do Paciente</h1>
    <?php if (isset($mensagem)): ?>
        <div class="alert alert-success"><?= $mensagem ?></div>
    <?php endif; ?>
    <form method="POST" class="mt-3">
    <div class="form-group">
                <label for="nome">Nome completo:</label>
                <input type="text" class="form-control" id="nome" name="nome" required>
            </div>
            <div class="form-group">
                <label for="data_nascimento">Data de Nascimento:</label>
                <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" required>
            </div>
            <div class="form-group">
                <label for="email">E-mail:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="telefone">Telefone:</label>
                <input type="text" class="form-control" id="telefone" name="telefone" required>
            </div>
            <div class="form-group">
                <label for="endereco">Endereço:</label>
                <input type="text" class="form-control" id="endereco" name="endereco">
            </div>
            <div class="form-group">
                <label for="sexo">Sexo:</label>
                <select class="form-control" id="sexo" name="sexo" required>
                    <option value="masculino">Masculino</option>
                    <option value="feminino">Feminino</option>
                    <option value="outro">Outro</option>
                </select>
            </div>

        <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>
    <a href="index.php" class="btn btn-secondary mt-3">Voltar</a>
</body>
</html>