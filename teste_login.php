   // print_r($_REQUEST);
<?php
session_start();
//require 'conexao.php';


if(isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['senha']))
{
        // Acessa o sistema
    include_once('conexao.php');
    $email = $_POST['email'];
    $senha = $_POST['senha'];

   // print_r('Email ' . $email);
   // print_r('Senha ' . $senha);

    $sql = "SELECT * FROM usuarios WHERE email = '$email' and senha = '$senha'";

    $result = $conexao->query($sql);

    //print_r($result);

   if(mysqli_num_rows($result) < 1)
    {
        unset($_SESSION['email']); //unset destruir dados caso nao exista
        unset($_SESSION['senha']);
        header('Location: login.php');
    }
    else
    {
        $_SESSION['email'] = $email;
        $_SESSION['senha'] = $senha;
        header('Location: sistema.php');
    }
}
else
{
        // retorna pro login 
    header('Location: login.php');
}
?>

