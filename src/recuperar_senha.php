<?php
require 'conexao.php';
$mensagem = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $novaSenha = $_POST['novaSenha'];

    $sql = "SELECT * FROM usuarios WHERE email = '$email'";
    $result = mysqli_query($conexao, $sql);

    if (mysqli_num_rows($result) > 0) {
        
        $sql = "UPDATE usuarios SET senha = '$novaSenha' WHERE email = '$email'";
        mysqli_query($conexao, $sql);

        $mensagem = 'Senha atualizada com sucesso!';

        echo '<script>exibirMensagemSucesso();</script>';
    } else {
        $mensagem = 'O email fornecido não está registrado. Por favor, verifique e tente novamente.';

        echo '<script>exibirErro();</script>';
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/formularios.css">
    <script src="js/vendor/alterar_senha.js"></script>
    <title>Reciclo</title>
    <style>
    </style>
</head>
<body>
    <div>
        <h1>Alterar Senha</h1>
        <form action="" method="POST">
            <label for="email">Email:</label><br>
            <input type="email" name="email" placeholder="Insira seu email" required>
            <br><br>
            <label for="novaSenha">Nova Senha:</label><br>
            <input type="password" name="novaSenha" placeholder="Insira sua nova senha" required>
            <br><br>
            <input class="submit" type="submit" name="submit" value="Alterar Senha">

            <br><br>
            <button class="submit" type="button" onclick="window.location.href='index.php'">Cancelar</button>
        </form>
    </div>
</body>
</html>
