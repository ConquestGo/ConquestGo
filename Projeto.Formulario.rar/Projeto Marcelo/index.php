<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="CSS/styles.css">
    <link rel="stylesheet" href="CSS/overlay-modal.css">
    <script src="https://kit.fontawesome.com/7bcc76ecaf.js" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <section>
            <article>
                <a href="#" class="modal-link"> Formulario Aqui !!! </a>
                <div class="overlay"></div>
                <div class="modal">
                    <div class="container-Login_Singin">
                        <div class="container-Login">
                            <form method="POST" action="#" class="form">
                                <div class="title">
                                    <b>Login</b>
                                </div>
                                <div class="inputs-Login">
                                    <div class="inputs"><i class="fa-solid fa-envelope"></i><input type="email" class="info" name="email-Login" placeholder=" Insira seu E-mail" id="email_login" required></div>
                                    <div class="inputs"><i class="fa-solid fa-lock"></i><input type="password" class="info" name="password-Login" placeholder="Insira sua Senha" id="password" required><i class="fa-solid fa-eye-slash" id="slash"></i><i class="fa-solid fa-eye" id="eye"></i></div>
                                    <p id="MessageError" class="mensagem">
                                    </p>
                                    <div><input type="submit" name="Entrar" value="Entrar" class="submit"></div>
                                </div>
                                <div class="link-container">
                                    <a href="#" class="link-Login"> Não tem Conta ? </a>
                                </div>
                            </form>
                        </div>
                        <div class="container-Singin">
                            <form method="POST" class="form">
                                <div class="title">
                                    <b>Cadastramento</b>
                                </div>
                                <div class="inputs-Login">
                                    <div class="inputs"><i class="fa-solid fa-user"></i><input type="text" class="info" name="nome-Sing" placeholder="Insira seu Nome de Usuarios" id="nome" required></div>
                                    <div class="inputs"><i class="fa-solid fa-envelope"></i><input type="email" class="info" name="email-Sing" placeholder=" Insira seu E-mail" id="email" required></div>
                                    <div class="inputs"><i class="fa-solid fa-file"></i><input type="text" class="info" name="cpf-Sing" placeholder="Insira seu CPF" id="cpf" required></div><p id="MessageError_singing_cpf" class="mensagem"></p>
                                    <div class="inputs"><i class="fa-solid fa-phone"></i><input type="text" class="info" name="telefone-Sing" placeholder=" Insira seu Telefone" id="telefone" required></div><p id="MessageError_singing_telefone" class="mensagem"></p>
                                    <div class="inputs"><i class="fa-solid fa-location-dot"></i><input type="text" class="info" name="cep-Sing" placeholder="Insira seu CEP" id="cep" required></div><p id="MessageError_singing_cep" class="mensagem"></p>
                                    <div class="inputs"><i class="fa-solid fa-lock"></i><input type="password" class="info" name="password-Sing" placeholder="Insira sua Senha" id="password_singin" required><i class="fa-solid fa-eye-slash" id="slash_singin"></i><i class="fa-solid fa-eye" id="eye_singin"></i></div>
                                    <p id="MessageError_singing" class="mensagem">
                                    </p>
                                    <div class="submit"><input type="submit" name="cadastrar" value="Entrar" class="submit"></div>
                                </div>
                                <div class="link-container">
                                    <a href="#" class="link-Singin"> Ja tem conta ?  </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </article>
        </section>
    </header>
</body>
<script src="JS/segurity.js"></script>
<script src="JS/eye-link.js"></script>
<script src="JS/login-singin.js"></script>
<script src="JS/Pop-Up.js"></script>
<script src="JS/cpf.js"></script>
<script src="JS/telefone.js"></script>
<script src="JS/cep.js"></script>
</html>
<?php
    echo "<form method='POST' action='search.php'>
        <input type='submit' value='Pesquisar no Banco !!'>
    </form>";
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(isset($_POST['cadastrar'])){
           $nome = $_POST['nome-Sing'];
           $email = $_POST['email-Sing'];
           $cpf = $_POST['cpf-Sing'];
           $telefone = $_POST['telefone-Sing'];
           $cep = $_POST['cep-Sing'];
           $password_form = $_POST['password-Sing'];
           try{
            $host = 'localhost';
            $user = 'root';
            $dbname = 'marcelo_db';
            $password = '';
            $conexão = new PDO('mysql:host='.$host.';dbname='.$dbname.'', $user,$password);
            $conexão->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Banco de Dados encontrado <br>";
            $sql_SELECT_FROM = "SELECT * FROM usuario WHERE nome = :nome AND email = :email AND senha = :senha AND cpf = :cpf AND cep = :cep AND telefone = :telefone ";
            $stmt_SELECT_FROM = $conexão->prepare($sql_SELECT_FROM);
            $stmt_SELECT_FROM->bindParam(':nome',$nome);
            $stmt_SELECT_FROM->bindParam(':email',$email);
            $stmt_SELECT_FROM->bindParam(':senha',$password_form);
            $stmt_SELECT_FROM->bindParam(':cpf',$cpf);
            $stmt_SELECT_FROM->bindParam(':cep',$cep);
            $stmt_SELECT_FROM->bindParam(':telefone',$telefone);
            if($stmt_SELECT_FROM->execute()){
                $stmt_SELECT_FROM->fetchAll(PDO::FETCH_ASSOC);
                if($stmt_SELECT_FROM->rowCount() > 0){
                    echo "Os Dados Ja Existem no Banco de Dados, e Não Podem ser Repetidos no Banco de Dados";
                }
                else{
                    $sql_INSERT_INTO = "INSERT INTO usuario (nome,email,senha,cpf,cep,telefone) VALUES (:nome,:email,:senha,:cpf,:cep,:telefone)";
                    $stmt_INSERT_INTO = $conexão->prepare($sql_INSERT_INTO);
                    $stmt_INSERT_INTO->bindParam(':nome',$nome);
                    $stmt_INSERT_INTO->bindParam(':email',$email);
                    $stmt_INSERT_INTO->bindParam(':senha',$password_form);
                    $stmt_INSERT_INTO->bindParam(':cpf',$cpf);
                    $stmt_INSERT_INTO->bindParam(':cep',$cep);
                    $stmt_INSERT_INTO->bindParam(':telefone',$telefone);
                    if($stmt_INSERT_INTO->execute()){
                        echo "Os Dados Foram Inseridos Com Sucesso, no Banco de Dados <br>";
                    }
                    else{
                        echo "Error ao Tentar Inserir os Dados no Banco de Dados";
                    }
                }
            }
            $mostrar_tabela_sql = "SELECT * FROM usuario";
            $mostrar_tabela_stmt = $conexão->prepare($mostrar_tabela_sql);
            if($mostrar_tabela_stmt->execute()){
                $row = $mostrar_tabela_stmt->fetchAll(PDO::FETCH_ASSOC);
                echo "<table border='1px'>";
                echo "<tr>"."<th>"."Id:"."</th>";
                echo "<th>"."Nome:"."</th>";
                echo "<th>"."E-mail:"."</th>";
                echo "<th>"."Senha:"."</th>";
                echo "<th>"."Telefone:"."</th>";
                echo "<th>"."CEP"."</th>";
                echo "<th>"."CPF:"."</th>";
                echo "<th>"."Editar:"."</th>";
                echo "<th>"."Excluir"."</th>"."</tr>";
                foreach($row as $dados){
                    echo "<tr>";
                    foreach($dados as $keys => $linhas){
                        echo "<td>".htmlspecialchars($linhas)."</td>";
                    }
                    echo "<td>"."<form method='POST' action='Form_editar.php'><input type='hidden' name='id' value='".$dados['id']."'><input type='hidden' name='nome' value='".$dados['nome']."'><input type='hidden' name='email' value='".$dados['email']."'><input type='hidden' name='cpf' value='".$dados['cpf']."'><input type='hidden' name='telefone' value='".$dados['telefone']."'><input type='hidden' name='cep' value='".$dados['cep']."'><input type='hidden' name='senha' value='".$dados['senha']."'><input type='submit' name='Editar' value='Editar'></form>"."</td>";
                    echo "<td>"."<form method='POST' action='excluir.php'><input type='hidden' name='id' value='".$dados['id']."'><input type='submit' name='Excluir' value='Excluir'></form>"."</td>";
                    echo "</tr>";
                }
                    echo "<tr>";
                    echo "<td colspan='10'>"."<form method='POST' action='limpar.php'><input type='submit' value='Limpar Tabela !!'></form>"."</td>";
                    echo "</tr>";
                echo "</table>";
            }
            else{
                echo "Error ao Puxar Informações";
            }
           }catch(PDOException $error){
            echo 'Error: ['.$error->getMessage().']';
           }
        }
        else 
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if(isset($_POST['Entrar'])){
                $email_Login = $_POST['email-Login'];
                $senha_Login = $_POST['password-Login'];
                try{
                    $host = 'localhost';
                    $user = 'root';
                    $dbname = 'marcelo_db';
                    $password = '';
                    $conexão = new PDO('mysql:host='.$host.';dbname='.$dbname.'', $user,$password);
                    $conexão->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $sql_Login_select_from = "SELECT * FROM usuario WHERE email = :email AND senha = :senha";
                    $stmt_Login_select_from = $conexão->prepare($sql_Login_select_from);
                    $stmt_Login_select_from->bindParam(':email',$email_Login);
                    $stmt_Login_select_from->bindParam(':senha',$senha_Login);
                    if($stmt_Login_select_from->execute()){
                        $stmt_Login_select_from->fetch(PDO::FETCH_ASSOC);
                        if($stmt_Login_select_from->rowCount() > 0){
                            echo "Usuario encontrado Ja esta Cadastrado no Banco de Dados";
                        }
                        else{
                            echo "Usuario Não esta Cadastrado no Banco de Dados";
                        }
                    }
                }catch(PDOException $error){
                    echo 'Error: ['.$error->getMessage().']';
                }

            }
        }
    }
?>
