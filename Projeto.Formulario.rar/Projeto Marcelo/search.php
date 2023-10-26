<?php
    try{
        $host = 'localhost';
        $user = 'root';
        $dbname = 'marcelo_db';
        $password = '';
        $conexão = new PDO('mysql:host='.$host.';dbname='.$dbname.'', $user,$password);
        $conexão->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Banco de Dados encontrado <br>";
    }catch(PDOException $error){
        return 'Error: ['.$error->getMessage().']';
    }
    echo "
    <form method='POST'>
        <input type='text' name='search' placeholder='Insira um nome, email ou senha que queira puxar diretamente do Banco de Dados'>
        <input type='submit' value='Pesquisar' name='Pesquisar'>
    </form>
    ";
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_POST['Pesquisar'])){
            $pesquisa = $_POST['search'];
            if($pesquisa == true){
                $sql_NOME = "SELECT * FROM usuario WHERE nome = :nome";
                $stmt_NOME = $conexão->prepare($sql_NOME);
                $stmt_NOME->bindParam(':nome',$pesquisa);
                if($stmt_NOME->execute()){
                    if($stmt_NOME->rowCount() > 0){
                        $sql_mostrar = "SELECT * FROM usuario WHERE nome = :nome";
                        $stmt_mostrar = $conexão->prepare($sql_mostrar);
                        $stmt_mostrar->bindParam(':nome',$pesquisa);
                        if($stmt_mostrar->execute()){
                            $row = $stmt_mostrar->fetch(PDO::FETCH_ASSOC);
                            echo "<table border='1px'>";
                                echo "<tr>";
                                foreach($row as $keys => $linhas){
                                    echo "<td>".htmlspecialchars($linhas)."</td>";
                                }
                                echo "</tr>";
                            echo "<table>";
                        }else{
                            echo "Error";
                        }
                    }else{
                        $sql_EMAIL = "SELECT * FROM usuario WHERE email = :email";
                        $stmt_EMAIL = $conexão->prepare($sql_EMAIL);
                        $stmt_EMAIL->bindParam(':email', $pesquisa);
                        if($stmt_EMAIL->execute()){
                            if($stmt_EMAIL->rowCount() > 0){
                                $sql_mostrar_Email = "SELECT * FROM usuario WHERE email = :email";
                                $stmt_mostrar_Email = $conexão->prepare($sql_mostrar_Email);
                                $stmt_mostrar_Email->bindParam(':email',$pesquisa);
                                if($stmt_mostrar_Email->execute()){
                                    $row_email = $stmt_mostrar_Email->fetch(PDO::FETCH_ASSOC);
                                    echo "<table border='1px'>";
                                        echo "<tr>";
                                        foreach($row_email as $keys_email => $linhas_email){
                                            echo "<td>".htmlspecialchars($linhas_email)."</td>";
                                        }
                                        echo "</tr>";
                                    
                                    echo "</table>";
                                }
                            }
                        }
                    }
                }
            }
        }
        else{
            echo "O botão não foi Digitado ";
        }
    }
    else{
        echo "Error o metodo esta incorreto !!!";
    }
?>