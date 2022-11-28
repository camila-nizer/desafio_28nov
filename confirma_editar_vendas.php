<?php
    include('conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Vendas</title>
  
</head>
<body>
    <?php

    echo "<button><a href='index.php'>Página Inicial</a></button>";
    ?>
    <hr/>
    <div class="cadastrados" id="tabela">


        <form action="cadastro.php" method="POST">
        <?php

            $edit=$_GET['opcao'];

            echo "<table border=1>";
            echo "<tr>";
            echo "<th> Descrição </th>";
            echo "<th> Valor </th>";
            echo "<th> Funcionário </th>";
            echo "</tr>";

            $sql="SELECT * FROM vendas inner join funcionarios on id_funcionario_fk = id_funcionario WHERE id_vendas=$edit ";
            $resultado= mysqli_query($conexao, $sql) or die ("Erro ao tentar acessar registro");
            while ($registro = mysqli_fetch_array($resultado)){
                $id_vendas=$registro['id_vendas'];
                $nome=$registro['nome'];
                $descricao=$registro['descricao']; 
                $valor=$registro['valor'];
                echo"<tr>";
                echo "<td>".$descricao."</td>";
                echo "<td>".$valor."</td>";
                echo "<td>".$nome."</td>";
                echo "</tr>";
            }
            echo"<hr/>";
        ?>

            <b><u>Edição Venda
                <?php
                echo "<input type='hidden' name= id_vendas value=$id_vendas/>";
                ?>
            </u></b>

            <br/>
            <label for="">Descrição: </label>
            <input type="text" name="descricao" required>
            <br />
            <label for="">Valor </label>
            <input type="text" step=".01" name="valor" required>
            <br />
            <label for="">Funcionário </label>
            <select id="sel" name="id_funcionario_fk">
                <?php
                include('conexao.php');

                $sql = "SELECT * FROM funcionarios where status='ativo'";
                $resultado = mysqli_query($conexao, $sql) or die("Erro ao tentar acessar registro");
                while ($registro = mysqli_fetch_array($resultado)) {
                    $id_funcionario = $registro['id_funcionario'];
                    $nome=$registro['nome'];
                    echo "<option value='$id_funcionario'> $nome </option>";
                }
                ?>
            </select>
            <br/>
            <input type='submit' name='vazio' value='Editar Venda'>
        </form>
    </div>
    <hr/>

</body>
</html>