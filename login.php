<?php
session_start();
require 'conexao.php';
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
        body{
            font-family: Arial, Helvetica, sans-serif;
            background-image: linear-gradient(45deg, palegreen, LightGreen);
        }

    </style>
</head>
<body>
    <a href="index.php">Voltar</a>
    <div>
        <h1>Login</h1>
        <form action="teste_login.php" method="POST">
            <input type="text" name="email" placeholder="Email">
            <br><br>
            <input type="password" name="senha" placeholder="Senha">
            <br><br>
                <button class="inputSubmit" type="submit" name="submit" value="Enviar"> Enviar </button>
                <br><br>
                <button class="btn"><a href="index.php" style="color: white;">Cancelar</a></button>
        </form>
    </div>
</body>
</html>