<?php
    include('conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Vendas</title>
    <script>
        function limpa_formulário_cep() {
            document.getElementById('rua').value = ("");
            document.getElementById('bairro').value = ("");
            document.getElementById('cidade').value = ("");
            document.getElementById('uf').value = ("");
        }

        function meu_callback(conteudo) {
            if (!("erro" in conteudo)) {
                document.getElementById('rua').value = (conteudo.logradouro);
                document.getElementById('bairro').value = (conteudo.bairro);
                document.getElementById('cidade').value = (conteudo.localidade);
                document.getElementById('uf').value = (conteudo.uf);

            } else {
                limpa_formulário_cep();
                alert("CEP não encontrado.");
            }
        }

        function pesquisacep(valor) {

            var cep = valor.replace(/\D/g, '');

            if (cep != "") {

                var validacep = /^[0-9]{8}$/;

                if (validacep.test(cep)) {

                    document.getElementById('rua').value = "...";
                    document.getElementById('bairro').value = "...";
                    document.getElementById('cidade').value = "...";
                    document.getElementById('uf').value = "...";

                    var script = document.createElement('script');

                    script.src = 'https://viacep.com.br/ws/' + cep + '/json/?callback=meu_callback';

                    document.body.appendChild(script);

                } else {

                    limpa_formulário_cep();
                    alert("Formato de CEP inválido.");
                }
            } else {
                limpa_formulário_cep();
            }
        };
    </script>
</head>

<body>

    <div class="cadastrar">
        <form action="cadastro.php" method="POST">
            <b><u>Cadastro Funcionário (s)</u></b>
            <br/>
            <label for="">Nome completo: </label>
            <input type="text" name="nome" required>
            <br />
            <label for="">CPF </label>
            <input type="text" name="cpf" maxlength="11" size="11" pattern="[0-9]{11}">
            <br />
            <label for="">Data de Nascimento </label>
            <input type="date" name="nascimento">
            <br />
            <label for="">Sexo </label>
            <select id="sel" name="sexo" required>
                <option value="poupança">Feminino</option>
                <option value="corrente">Masculino</option>
            </select>
            <br />
            <label for="">Titulo de eleitor: </label>
            <input type="text" name="titulo_eleitor" required>
            <br />
            <label for="">Carteira de trabalho: </label>
            <input type="text" name="carteira_trabalho" required>
            <br />
            <label for="">CEP:</label>
            <input name="cep" type="text" id="cep" value="" onblur="pesquisacep(this.value);">
            <br />
            <label for="">Rua:</label>
            <input type="text" name="rua" id="rua" required>
            <br />
            <label for="">N°:</label>
            <input type="text" name="numero" required>
            <br />
            <label for="">Bairro:</label>
            <input type="text" name="bairro" id="bairro" required>
            <br />
            <label for="">Cidade:</label>
            <input type="text" name="cidade" id="cidade" required>
            <br />
            <label for="">Estado:</label>
            <input type="text" name="uf" id="uf" required>
            <br />
            <label for="">Telefone:</label>
            <input type="text" name="telefone" required>
            <br />
            <label for="">E-mail:</label>
            <input type="email" name="email" required>
            <br />
            <label for="">Banco:</label>
            <input type="text" name="banco" required>
            <br />
            <label for="">Agência:</label>
            <input type="number" name="agencia" required>
            <br />
            <label for="">Conta:</label>
            <input type="number" name="conta" required>
            <br />
            <label for="">Tipo de Conta:</label>
            <select id="sel" name="tipo_conta" required>
                <option value="poupança">Poupança</option>
                <option value="corrente">Corrente</option>
            </select>
            <br />
            <label for="">Salário:</label>
            <input type="text" name="salario" required>
            <br />
            <label for="">Data de admissão</label>
            <input type="date" name="ingresso" required>
            <br/>
            <input type='submit' name='vazio' value='Cadastrar Funcionário'>
        </form>
    </div>
       


    <div class="cadastrados" id="tabela">   

        <?php

            echo "<table border=1>";
            echo "<tr>";
            echo "<th> Nome </th>";
            echo "<th> CPF </th>";
            echo "<th> Data Nasc. </th>";
            echo "<th> Sexo </th>";
            echo "<th> Titulo Eleitor </th>";
            echo "<th> Carteira de trabalho </th>";
            echo "<th> CEP </th>";
            echo "<th> Rua </th>";
            echo "<th> Nº </th>";
            echo "<th> Bairro </th>";
            echo "<th> Cidade </th>";
            echo "<th> UF </th>";
            echo "<th> Telefone </th>";
            echo "<th> E-mail </th>";
            echo "<th> Banco </th>";
            echo "<th> Agência </th>";
            echo "<th> Conta </th>";
            echo "<th> Tipo </th>";
            echo "<th> Salário </th>";
            echo "<th> Data de Admissão </th>";
            echo "</tr>";

            $sql="SELECT * FROM funcionarios WHERE status='ativo'";
            $resultado= mysqli_query($conexao, $sql) or die ("Erro ao tentar acessar registro");
            while ($registro = mysqli_fetch_array($resultado)){
                $id_funcionario=$registro['id_funcionario'];
                $nome=$registro['nome']; 
                $cpf=$registro['cpf'];
                $nascimento=$registro['nascimento'];
                $nascimento = date_create($nascimento);
                $nascimento = date_format($nascimento, 'd-m-Y');
                $sexo=$registro['sexo'];
                $titulo_eleitor=$registro['titulo_eleitor'];
                $carteira_trabalho=$registro['carteira_trabalho'];
                $cep=$registro['cep'];
                $rua=$registro['rua'];
                $numero=$registro['numero'];
                $bairro=$registro['bairro'];
                $cidade=$registro['cidade'];
                $uf=$registro['uf'];
                $telefone=$registro['telefone'];
                $email=$registro['email'];
                $banco=$registro['banco'];
                $agencia=$registro['agencia'];
                $conta=$registro['conta'];
                $tipo_conta=$registro['tipo_conta'];
                $salario=$registro['salario'];
                $ingresso=$registro['ingresso'];
                $ingresso = date_create($ingresso);
                $ingresso = date_format($ingresso, 'd-m-Y');
                echo"<tr>";
                echo "<td>".$nome."</td>";
                echo "<td>".$cpf."</td>";
                echo "<td>".$nascimento."</td>";
                echo "<td>".$sexo."</td>";
                echo "<td>".$titulo_eleitor."</td>";
                echo "<td>".$carteira_trabalho."</td>";
                echo "<td>".$cep."</td>";
                echo "<td>".$rua."</td>";
                echo "<td>".$numero."</td>";
                echo "<td>".$bairro."</td>";
                echo "<td>".$cidade."</td>";
                echo "<td>".$uf."</td>";
                echo "<td>".$telefone."</td>";
                echo "<td>".$email."</td>";
                echo "<td>".$banco."</td>";
                echo "<td>".$agencia."</td>";
                echo "<td>".$conta."</td>";
                echo "<td>".$tipo_conta."</td>";
                echo "<td>".$salario."</td>";
                echo "<td>".$ingresso."</td>";
                echo "<td>"."<form action='confirma_apagar.php' method='GET'> 
                <button>Apagar<input type='hidden' name='opcao' value='$id_funcionario'></buttom> </form>"."</td>";
                echo "</tr>";
            }

        ?>

    </div>

    <div class="fora" id="fora">
        <hr/>
        <center>
            <?php
            echo "<form action='#' method='post'><input type=button name=imprime value='Imprimir' onclick='javascript:DoPrinting();'></form>";
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