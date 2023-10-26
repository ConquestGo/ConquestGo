<?php
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $cpf = $_POST['cpf'];
    $telefone = $_POST['telefone'];
    $cep = $_POST['cep'];
    $senha = $_POST['senha'];
    echo '<form method="POST" action="editar.php">
        <input type="hidden" name="id" value="'.$id.'">
        <input type="text" placeholder="insira o Novo Nome" name="novo_nome" value="'.$nome.'">
        <input type="email" placeholder="insira o novo E-mail" name="novo_email" value="'.$email.'">
        <input type="number" placeholder="insira o Novo cpf" name="novo_cpf" value="'.$cpf.'">
        <input type="number" placeholder="insira o novo Telefone" name="novo_telefone" value="'.$telefone.'">
        <input type="number" placeholder="insira a sua novo Cep" name="novo_cep" value="'.$cep.'">
        <input type="text" placeholder="insira a sua nova senha" name="nova_senha" value="'.$senha.'">
        <input type="submit" value="Atualizar">
    </form>';

