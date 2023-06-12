<!-- Responsavel por cadastrar os usuarios em "Receba noticias" -->
<?php
require 'conexao.php';
session_start(); 

if (isset($_POST['submit'])) {
	$nome = $_POST["nome"];
	$email = $_POST["email"];

	$stmt = $conexao->prepare("INSERT INTO noticias (nome, email) VALUES (?, ?)");
	$stmt->bind_param("ss", $nome, $email);
	
if ($stmt->execute()) {
    echo "<script>alert('Cadastrado com sucesso!'); history.go(-1);</script>";
    exit;
} else {
    echo "Erro ao registrar email: " . $stmt->error;
}


	$stmt->close();
	$conexao->close();
}
?>



