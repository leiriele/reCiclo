<?php

    if(!empty($_GET['id_usuario']))
    {
        include_once('conexao.php');

        $id_usuarios = $_GET['id_usuarios'];

        $sqlSelect = "SELECT *  FROM usuarios WHERE id_usuarios=$id_usuarios";

        $result = $conexao->query($sqlSelect);

        if($result->num_rows > 0)
        {
            $sqlDelete = "DELETE FROM usuarios WHERE id_usuarios=$id_usuarios";
            $resultDelete = $conexao->query($sqlDelete);
        }
    }
    header('Location: sistema.php');
   
?>