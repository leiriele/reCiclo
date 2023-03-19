<?php
	$conexao = mysqli_connect("localhost","root","","reciclo") or die("Error " .mysqli_error($conexao));
//teste conexao
	if($conexao->errno){
		echo "ERRO";
	}
	else
	{
		echo "Conexao ok";
	}
?>