<?php

require_once("../conexao.php"); 

$pdo = mysqlConnect(); 

$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$mensagem = $_POST['mensagem'];

$sql = <<<SQL
        INSERT INTO Contato (Nome, Email, Telefone, Mensagem)
        VALUES (?,?,?,?)
        SQL;

try{
    $stmt = $pdo -> prepare($sql);
    $stmt -> execute([$nome, $email, $telefone, $mensagem]);
} catch(Exception $e) {
    exit('Falha: ' . $e->getMessage());
}

header("Location: contato.html"); 
exit();


?>