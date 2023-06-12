<!-- Atualiza a senha caso o usuario 'Esqueceu senha' -->
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

    echo '<script>
        alert("Senha atualizada com sucesso!");
        window.location.href = "login.php";
    </script>';
} else {
    $mensagem = 'O email fornecido não está registrado. Por favor, verifique e tente novamente.';

    echo '<script>
        alert("O email fornecido não está registrado. Por favor, verifique e tente novamente.");
        window.location.href = "recuperar_senha.php";
    </script>';
}

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login reCiclo </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="login/css/style.css">
</head>

<body>
    <section class="ftco-section">
        <div class="container" >
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-10" >
                    <div class="wrap d-md-flex">
                        <div class="text-wrap p-4 p-lg-5 text-center d-flex align-items-center order-md-last" style="background: linear-gradient(45deg, #004225, #008000);">
                            <div class="text w-100" >
                                <h1 ><img src="images/reCiclo-1.png" alt="" /><span></span></h1>
                                <p>Já possui uma conta? Acesse</p>
                                <a href="login.php" class="btn btn-white btn-outline-white">Entrar</a>
                            </div>
                        </div>
                        <div class="login-wrap p-4 p-lg-5">
                            <div class="d-flex">
                                <div class="w-100">
                                    <h3 class="mb-4">Recuperar Senha </h3>
                                </div>
                            </div>
                              <form action="" method="POST">
                                <div class="form-group mb-3">
                                    <label class="label" for="email">Email</label>
                                    <input type="email" class="form-control" name="email" placeholder="Email" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="label" for="senha">Nova Senha</label>
                                    <input type="password" class="form-control" name="novaSenha" placeholder="Insira sua nova senha"required>
                                </div>
                                <div class="form-group">
                                    <button type="submit" name="submit" class="form-control btn btn-primary submit px-3" style="background: linear-gradient(45deg, #004225, #008000);">Alterar</button>
                                </div>

                                <div class="form-group d-md-flex">
                                    <div class="w-50 text-md-right">
                                        <a href="index.php">Sair</a>
                                    </div>
                                </div>           
                               
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>

</body>
</html>

