<!-- Alteração de senha que é processado quando o método HTTP da requisição é POST -->
<?php
require 'conexao.php';
$mensagem = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $novaSenha = $_POST['novaSenha'];

    // Verifique se o email existe na tabela de usuários
    $sql = "SELECT * FROM usuarios WHERE email = '$email'";
    $result = mysqli_query($conexao, $sql);

    if (mysqli_num_rows($result) > 0) {
        // Atualize a senha na tabela de usuários
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