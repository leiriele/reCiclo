<!-- Verificar sessao do usuario -->
<?php
session_start();
include_once('conexao.php');

//clicou no link "Sair"
if (isset($_GET['logout'])) {
    session_destroy();
    //Redireciona index
    header("Location: index.php");
    exit;
}

if (!isset($_SESSION['idusuarios']) || empty($_SESSION['idusuarios'])) {
    header('Location: login.php'); 
    exit; 
}

$sql = "SELECT * FROM pedidos";
$result = $conexao->query($sql);

if (isset($_SESSION['idusuarios'])) {
  $idusuarios = $_SESSION['idusuarios'];

  $stmt = $conexao->prepare("SELECT * FROM usuarios WHERE idusuarios = ?");
  $stmt->bind_param("i", $idusuarios);
  $stmt->execute();
  $result = $stmt->get_result();


if ($result->num_rows > 0) {
    $usuarios = $result->fetch_assoc();
    
    if ($usuarios !== null) {
        $idusuarios = $usuarios['idusuarios'];
        $name = $usuarios['name'];
        $email = $usuarios['email'];
        $cpf = $usuarios['cpf'];
        $dataNasc = $usuarios['dataNasc'];
        $cidade = $usuarios['cidade'];
        $estado = $usuarios['estado'];
        $logradouro = $usuarios['logradouro'];
        $numeroN = $usuarios['numeroN'];
        $bairro = $usuarios['bairro'];
        $cep = $usuarios['cep'];
    } else {
        echo "Dados do usuário não encontrados.";
        exit;
    }
} else {
    echo "Usuário não encontrado.";
    exit;
}
}
?>