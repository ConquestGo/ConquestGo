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
    $id = $_POST['id'];
    $nome_novo = $_POST['novo_nome'];
    $email_novo = $_POST['novo_email'];
    $password_novo = $_POST['nova_senha'];
    $cpf_novo = $_POST['novo_cpf'];
    $telefone_novo = $_POST['novo_telefone'];
    $cep_novo = $_POST['novo_cep'];
    $sql_Atualizar = "UPDATE usuario SET nome = :nome,email = :email,senha = :senha, cpf = :cpf, cep = :cep, telefone = :telefone WHERE id = :id";
    $stmt_Atualizar = $conexão->prepare($sql_Atualizar);
    $stmt_Atualizar->bindParam(':id', $id);
    $stmt_Atualizar->bindParam(':nome',$nome_novo);
    $stmt_Atualizar->bindParam(':email',$email_novo);
    $stmt_Atualizar->bindParam(':senha',$password_novo);
    $stmt_Atualizar->bindParam(':cpf',$cpf_novo);
    $stmt_Atualizar->bindParam(':telefone',$telefone_novo);
    $stmt_Atualizar->bindParam(':cep',$cep_novo);
    if($stmt_Atualizar->execute()){
        header('Location: index.php');
    }
    else{
        echo 'Error';
    }
?>