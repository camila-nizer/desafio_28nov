<?php
	include("conexao.php");

    $resposta=$_GET['apagar'];



    date_default_timezone_set('America/Sao_Paulo');
    $datalocal = date('Y/m/d H:i:s');


    $comandodeletar= "UPDATE vendas SET status_venda='inativo', exclusao_venda='$datalocal' WHERE id_vendas=$resposta";
    $resultado= mysqli_query($conexao, $comandodeletar);

    if($resultado==false){
        echo"falhou";

    }
    else{
        header("Refresh: 0; url=index.php");
    }


    mysqli_close($conexao);
?>