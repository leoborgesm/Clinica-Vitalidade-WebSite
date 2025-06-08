<?php

require_once("../conexao.php");
$pdo = mysqlConnect();

$email = $_POST['email'] ?? '';
$senha = $_POST['senha'] ?? '';

$sql = <<<SQL
    SELECT Nome, Senhahash
    FROM Funcionario
    WHERE Email = ?
SQL;

try {
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$email]);
    $usuario = $stmt->fetch();
    
    

    if ($usuario && password_verify($senha, $usuario['Senhahash'])) {
        session_start();
        $_SESSION['usuario'] = $usuario['Nome'];
        header("Location: ../restrito/main.php");
        exit;
    } else {
        header("Location: login.html?erro=1");
        exit;
    }
} catch (Exception $e) {
    exit('Falha ao acessar o banco: ' . $e->getMessage());
}

?>
