<?php
require_once("../conexao.php");

// Recebe os dados do formulário
$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
$estadoCivil = $_POST['estadoCivil'];
$dataNascimento = $_POST['dataNascimento'];
$funcao = $_POST['funcao'];

$sql = <<<SQL
    INSERT INTO Funcionario 
        (Nome, Email, Senhahash, EstadoCivil, DataNascimento, Funcao) 
        VALUES (?, ?, ?, ?, ?, ?)
SQL;

try {  
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$nome, $email, $senha, $estadoCivil, $dataNascimento, $funcao]);
    header("Location: cadastro_funcionario.php?sucesso=1");
    exit;
    
} catch (Exception $e) {
    header("Location: cadastro_funcionario.php?erro=1");
    exit;
}
?>