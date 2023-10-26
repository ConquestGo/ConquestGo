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
    $id = 1;
    $sql_LImpar = "DELETE FROM usuario WHERE id >= :id";
    $stmt_LImpar = $conexão->prepare($sql_LImpar);
    $stmt_LImpar->bindParam(':id',$id);
    if($stmt_LImpar->execute()){
        header('Location: index.php');
    }
    else{
        echo "Error";
    }
?>