<?php
//testar conexao
if(isset($_POST['submit']))
{
       /* print_r('Nome: ' . $_POST['nome']);
        print_r('<br>');
        print_r('Email: ' . $_POST['email']);
        print_r('<br>');
       print_r('cpf: ' . $_POST['cpf']);
       print_r('<br>');
        print_r('cnpj: ' . $_POST['cnpj']);
       print_r('<br>');
       print_r('Data de nascimento: ' . $_POST['dataNasc']);
        print_r('<br>');
        print_r('Senha: ' . $_POST['senha']);
       print_r('<br>');                
        print_r('Cidade: ' . $_POST['cidade']);
        print_r('<br>');
        print_r('Estado: ' . $_POST['estado']);
        print_r('<br>');
        print_r('logradouro: ' . $_POST['logradouro']);
        print_r('<br>');
        print_r('Numero: ' . $_POST['numeroR']);
        print_r('<br>');
        print_r('Bairro: ' . $_POST['bairro']);
        print_r('<br>');
        print_r('Cep: ' . $_POST['cep']);*/

        include_once('conexao.php');

        $name = $_POST['name'];
        $email = $_POST['email'];
        $cpf = $_POST['cpf'];
        $cnpj = $_POST['cnpj'];
        $dataNasc = $_POST['dataNasc'];
        $senha = $_POST['senha'];
        $cidade = $_POST['cidade'];
        $estado = $_POST['estado'];
        $logradouro = $_POST['logradouro'];
        //$numeroR = $_POST['numeroR'];
        $bairro = $_POST['bairro'];
        $cep = $_POST['cep'];

        $result = mysqli_query($conexao, "INSERT INTO usuarios(name,email,cpf,cnpj,dataNasc,senha,cidade,estado,logradouro,bairro,cep) 
            VALUES ('$name','$email','$cpf','$cnpj','$dataNasc','$senha','$cidade','$estado','$logradouro','$bairro','$cep')");

        header('Location: login.php');
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cadastro</title>
        <style>
            body{
                font-family: Arial, Helvetica, sans-serif;
                background-image: linear-gradient(80deg, palegreen, LightGreen);
            }
            .box{
                color: white;
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%,-50%);
                background-color: rgba(0, 0, 0, 0.5);
                padding: 15px;
                border-radius: 15px;
                width: 20%;
            }
            fieldset{
                border: 3px solid #8bd54a;
            }
            legend{
                border: 1px solid dodgerblue;
                padding: 10px;
                text-align: center;
                background-color: #8dda18;
                border-radius: 8px;
            }
            .inputBox{
                position: relative;
            }
            .inputUser{
                background: none;
                border: none;
                border-bottom: 1px solid white;
                outline: none;
                color: white;
                font-size: 15px;
                width: 100%;
                letter-spacing: 2px;
            }
            .labelInput{
                position: absolute;
                top: 0px;
                left: 0px;
                pointer-events: none;
                transition: .5s;
            }
            .inputUser:focus ~ .labelInput,
            .inputUser:valid ~ .labelInput{
                top: -20px;
                font-size: 12px;
                color: dodgerblue;
            }
            #data_nascimento{
                border: none;
                padding: 8px;
                border-radius: 10px;
                outline: none;
                font-size: 15px;
            }
            #submit{
                background-image: linear-gradient(to right, green, rgb(128, 255, 20));
                width: 100%;
                border: none;
                padding: 15px;
                color: white;
                font-size: 20px;
                cursor: pointer;
                border-radius: 10px;
            }
            #submit:hover{
                background-image: linear-gradient(to right,rgb(90, 255, 172), rgb(15,255, 195));
            }
        </style>
    </head>
    <body>
        <a href="index.php">Voltar</a>
        <div class="box">
            <form action="formulario_cadastro.php" method="POST">
                <fieldset>
                    <legend><b>Cadastro Usuario</b></legend>
                    <br>
                    <div class="inputBox">
                        <input type="text" name="name" id="name" class="inputUser" required>
                        <label for="name" class="labelInput">Nome completo</label>
                    </div>
                    <br>
                    <div class="inputBox">
                        <input type="text" name="email" id="email" class="inputUser" required>
                        <label for="email" class="labelInput">Email</label>
                    </div>
                    <br>
                    <div class="inputBox">
                        <input type="text" name="cpf" id="cpf" class="inputUser" required>
                        <label for="cpf" class="labelInput">CPF</label>
                    </div>
                    <br>
                    <div class="inputBox">
                        <input type="text" name="cnpj" id="cnpj" class="inputUser" required>
                        <label for="cnpj" class="labelInput">CNPJ</label>
                    </div>
                    <br>
                    <label for="dataNasc"><b>Data de Nascimento:</b></label>
                    <input type="date" name="dataNasc" id="dataNasc" required>
                    <br><br>
                    <div class="inputBox">
                        <input type="password" name="senha" id="senha" class="inputUser" required>
                        <label for="senha" class="labelInput">Senha</label>
                    </div>
                    <br>
                    <h4>Endereço</h4>
                    <div class="inputBox">
                        <input type="text" name="cidade" id="cidade" class="inputUser" required>
                        <label for="cidade" class="labelInput">Cidade</label>
                    </div>
                    <br>              
                    <div class="inputBox">            
                        <input type="text" name="estado" id="estado" class="inputUser" required>
                        <label for="estado" class="labelInput"><b>Estado</b></label>
                    </div>
                    <br>
                    <div class="inputBox">
                       <input type="text" name="logradouro" id="logradouro" class="inputUser" required> 
                       <label for="logradouro" class="labelInput"><b>Logradouro</b></label> </div>
                       <br>
                      <!-- <div class="inputBox">                  
                        <input type="number" name="numeroR" id="numeroR" class="inputUser" required>   
                           <label for="numeroR" class="labelInput"><b>Numero</b></label>
                       </div>-->
                       <br>
                       <div class="inputBox">                   
                           <input type="text" name="bairro" id="bairro" class="inputUser" required>      
                           <label for="bairro" class="labelInput"><b>Bairro</b></label>  
                       </div>
                       <br>
                       <div class="inputBox">            
                        <input type="text" name="cep" id="cep" class="inputUser" required> 
                        <label for="cep" class="labelInput"><b>CEP</b></label>                      
                    </div>
                    <br><br>
                    <input type="submit" name="submit" id="submit">
                </fieldset>
            </form>
        </div>
    </body>
    </html>