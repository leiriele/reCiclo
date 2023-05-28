    <?php
   
    
    require 'conexao.php';
    require_once('teste_login.php');
  
    if(isset($_GET['erro']))
    {
        switch($_GET['erro'])
        {
            case 'email':
                echo '<p class="error">' . MSG_ERRO_EMAIL . '</p>';
                break;
            case 'senha':
                echo '<p class="error">' . MSG_ERRO_SENHA . '</p>';
                break;
            case 'invalido':
                echo '<p class="error">' . MSG_ERRO_INVALIDO . '</p>';
                break;
            default:
                break;
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
    <title>Reciclo</title>
   <style>

    </style>
</head>
<body>
    <div>
        <h1>Login</h1>
        <form action="teste_login.php" method="POST">
            <label for="email">Email:</label><br>
            <input type="email" name="email" placeholder="Insira seu email" required>
            <br><br>
            <label for="senha">Senha:</label><br>
            <input type="password" name="senha" placeholder="Insira sua senha" required>
            <br><br>
            <input class="inputSubmit" type="submit" name="submit" value="Enviar">
            <br>
            <button class="btn" type="button" onclick="window.location.href='index.php'">Cancelar</button>
            <br> <br>
            <a href="cadastro_pt1.html">Cadastre-se</a>
        </form>
    </div>
</body>

</html>