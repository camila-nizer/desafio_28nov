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

    echo "<button><a href='funcionario.php'>CADASTRO FUNCIONÁRIO</a></button>";
    ?>
    <hr/>

    <div class="cadastrar">
        <form action="cadastro.php" method="POST">
            <b><u>Cadastro Venda</u></b>
            <br/>
            <label for="">Descrição: </label>
            <input type="text" name="descricao" required>
            <br />
            <label for="">Valor </label>
            <input type="text" step=".01" name="valor" required>
            <br />
            <label for="">Funcionário </label>
            <select id="sel" name="id_funcionario_fk" required>
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
            <input type='submit' name='vazio' value='Cadastrar Venda'>
        </form>
    </div>


    <div class="cadastrados" id="tabela">   

        <?php

            echo "<table border=1>";
            echo "<tr>";
            echo "<th> Descrição </th>";
            echo "<th> Valor </th>";
            echo "<th> Funcionário </th>";
            echo "</tr>";

            $sql="SELECT * FROM vendas inner join funcionarios on id_funcionario_fk = id_funcionario WHERE status_venda='ativo' ";
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
                echo "<td>"."<form action='confirma_apagar_vendas.php' method='GET'> 
                <button>Apagar<input type='hidden' name='opcao' value='$id_vendas'></buttom> </form>"."</td>";
                echo "<td>"."<form action='confirma_editar_vendas.php' method='GET'> 
                <button>Editar<input type='hidden' name='opcao' value='$id_vendas'></buttom> </form>"."</td>";

                echo "</tr>";
            }

        ?>

    </div>

    <div class="fora" id="fora">
        <hr/>
        <center>
            <?php
            echo "<form action='#' method='post'><input type=button name=imprime value='Imprimir Vendas' onclick='javascript:DoPrinting();'></form>";
            ?>
            <script>
            function DoPrinting()
            {
                var divContents = document.getElementById("tabela").innerHTML;
                var a = window.open('', '', 'height=500, width=500');
                a.document.write('<html>');
                a.document.write('<body >');
                a.document.write(divContents);
                a.document.write('</body></html>');
                a.document.close();
                a.print();
            }
            </script>
        </center>
        <hr/>
    </div>



   
    

</body>

</html>