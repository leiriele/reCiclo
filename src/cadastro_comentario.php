<?php
require 'conexao.php';
session_start(); 
// Responsavel por cadastrar comentarios dos usuarios em "Deice comentarios"

if (isset($_POST['submit'])) {
	$nome = $_POST["nome"];
	$sobrenome = $_POST["sobrenome"];
	$telefone = $_POST["telefone"];
	$email = $_POST["email"];
	$comentario = $_POST["comentario"];

	$stmt = $conexao->prepare("INSERT INTO comentario (nome, sobrenome, telefone, email, comentario) VALUES (?, ?, ?, ?, ?)");
	$stmt->bind_param("sssss", $nome, $sobrenome, $telefone, $email, $comentario);


	if ($stmt->execute()) {
		echo "<script>alert('Comentário cadastrado com sucesso!'); window.location.href = 'contact.html';</script>";
		exit;
	} else {
		echo "Erro ao cadastrar o comentário: " . $stmt->error;
	}


	$stmt->close();
	$conexao->close();
}
?>



