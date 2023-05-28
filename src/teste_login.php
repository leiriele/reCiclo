<?php
session_start();
require 'conexao.php';

define('MSG_ERRO_EMAIL', 'E-mail inválido');
define('MSG_ERRO_SENHA', 'Senha inválida');
define('MSG_ERRO_INVALIDO', 'E-mail ou senha inválidos');

if(isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['senha']))
{
    // Acessa o sistema
    $email = $_POST['email'];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Email inválido, exibir uma mensagem de erro ou redirecionar para a página de login
        echo "<script>alert('".MSG_ERRO_EMAIL."');window.location='login.php';</script>";
        exit;
    }  

    $senha = ($_POST['senha']);
   
    $stmt = $conexao->prepare("SELECT idusuarios, senha FROM usuarios WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if(mysqli_num_rows($result) < 1)
    {
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        echo "<script>alert('".MSG_ERRO_INVALIDO."');window.location='login.php';</script>";
        exit;
    }
    else
    {
        $row = mysqli_fetch_assoc($result);
        if($senha !== $row['senha'])
        {
            echo "<script>alert('".MSG_ERRO_INVALIDO."');window.location='login.php';</script>";
            exit;
        }
        else
        {
            $idusuarios = $row['idusuarios'];
            $_SESSION['idusuarios'] = $idusuarios;
            header('Location: perfil_cliente.php');
        }
    }
}
?>

<div id="error-message" style="display: none;"></div>
<script>
    <?php if(isset($_GET['erro'])): ?>
        <?php if($_GET['erro'] === 'email'): ?>
            var errorMessage = "<?php echo MSG_ERRO_EMAIL ?>";
        <?php elseif($_GET['erro'] === 'senha'): ?>
            var errorMessage = "<?php echo MSG_ERRO_SENHA ?>";
        <?php elseif($_GET['erro'] === 'invalido'): ?>
            var errorMessage = "<?php echo MSG_ERRO_INVALIDO ?>";
        <?php endif; ?>

        if(errorMessage) {
            document.getElementById('error-message').innerHTML = errorMessage;
            alert(errorMessage);
            document.getElementById('error-message').style.display = 'block';
        }
    <?php endif; ?>
</script>
