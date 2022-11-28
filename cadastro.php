<?php
    if(isset($_POST ['vazio'])&& !empty($_POST['vazio'])){

        include("conexao.php");

        $vazio=$_POST['vazio'];

        if($vazio=='Cadastrar Funcionário'){

            $nome=$_POST['nome'];
            $cpf=$_POST ['cpf'];
            $nascimento=$_POST['nascimento'];
            $sexo=$_POST['sexo'];
            $titulo_eleitor=$_POST['titulo_eleitor'];
            $carteira_trabalho=$_POST['carteira_trabalho'];
            $cep=$_POST['cep'];
            $rua=$_POST['rua'];
            $bairro=$_POST['bairro'];
            $cidade=$_POST['cidade'];
            $rua=$_POST['rua'];
            $numero=$_POST['numero'];
            $uf=$_POST['uf'];
            $telefone=$_POST['telefone'];
            $email=$_POST['email'];
            $banco=$_POST['banco'];
            $agencia=$_POST['agencia'];
            $conta=$_POST['conta'];
            $tipo_conta=$_POST['tipo_conta'];
            $salario=$_POST['salario'];
            $ingresso=$_POST['ingresso'];
            $status='ativo';

            
            $validador="SELECT * FROM funcionarios where cpf='$cpf' && status='ativo' ";
            $resposta_validador=mysqli_query($conexao, $validador) or die ("Erro");
            $array_resposta_validador= mysqli_fetch_array($resposta_validador);

            
            if(($array_resposta_validador)!= null && count($array_resposta_validador)>0){
                echo "<script> alert('Erro: CPF/CNPJ já cadastrado');location.href='index.php';</script>";

            }

            else{
                $sql="INSERT INTO funcionarios (nome, cpf, nascimento,sexo,titulo_eleitor,carteira_trabalho, cep, rua,numero,bairro,cidade,uf,telefone, email, banco, agencia, conta, tipo_conta, salario, ingresso, status) 
                    VALUES ('$nome', '$cpf','$nascimento','$sexo','$titulo_eleitor','$carteira_trabalho', '$cep','$rua','$numero','$bairro','$cidade','$uf', '$telefone' ,
                        '$email','$banco', '$agencia' , '$conta', '$tipo_conta','$salario','$ingresso','$status')";

                if(mysqli_query($conexao, $sql)){
                    echo "<html> <head></head><body>
                        <script> alert('Funcionário cadastrado com sucesso!'); location.href='index.php';</script>
                        </body>
                        </html>";

                }
                else{
                    echo "Erro".mysqli_connect_error($conexao);
                }
            }

        }


        if($vazio=='Cadastrar Venda'){

            $descricao=$_POST['descricao'];
            $valor=$_POST ['valor'];
            $id_funcionario_fk=$_POST['id_funcionario_fk'];
            $status_venda='ativo';


            $sql="INSERT INTO vendas(descricao, valor, id_funcionario_fk, status_venda) VALUES ('$descricao', '$valor','$id_funcionario_fk','$status_venda')";

            if(mysqli_query($conexao, $sql)){
                echo "<html> <head></head><body>
                    <script> alert('Venda cadastrada com sucesso!'); location.href='index.php';</script>
                    </body>
                    </html>";

            }
            else{
                echo "Erro".mysqli_connect_error($conexao);
            }
            
        }


        if($vazio=='Editar Venda'){

            $edit=$_POST['id_vendas'];
            $descricao=$_POST['descricao'];
            $valor=$_POST ['valor'];
            $id_funcionario_fk=$_POST['id_funcionario_fk'];
            $status_venda='ativo';

            $comandoeditar= "UPDATE vendas SET descricao='$descricao', valor='$valor',id_funcionario_fk='$id_funcionario_fk' WHERE id_vendas='$edit'";
            $resultado= mysqli_query($conexao, $comandoeditar);

            if($resultado==false){
                echo"falhou";
            }

            else{
                echo"<html> <head></head><body>
                    <script> alert('Edição realizada com sucesso!'); location.href='index.php';</script>
                    </body>
                    </html>";
            }
        }    

        
        mysqli_close($conexao);
        }
        else{
            echo"Acesso negado.";
    }

?>
