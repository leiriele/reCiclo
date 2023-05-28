<?php
session_start();
include_once('conexao.php');

    if(!empty($_GET['idusuarios'])) {
        $idusuarios = $_GET['idusuarios'];
        $sqlSelect = "SELECT * FROM usuarios WHERE idusuarios=$idusuarios";
        $result = $conexao->query($sqlSelect);
        if($result->num_rows > 0) {
            $sqlDelete = "DELETE FROM usuarios WHERE idusuarios=$idusuarios";
            $resultDelete = $conexao->query($sqlDelete);
        }
    }
    header('Location: sistema.php');
?>
