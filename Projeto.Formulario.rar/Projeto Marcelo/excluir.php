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
    $sql_DELETE = "DELETE FROM usuario WHERE id = :id";
    $stmt_DELETE = $conexão->prepare($sql_DELETE);
    $stmt_DELETE->bindParam(':id',$id);
    if($stmt_DELETE->execute()){
        header('Location: index.php');
    }
    else{
        echo "Error";
    }
?>