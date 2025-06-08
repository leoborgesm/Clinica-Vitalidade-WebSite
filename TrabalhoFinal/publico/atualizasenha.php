<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once("../conexao.php");

$pdo = mysqlConnect();

$emailAtual = htmlspecialchars(trim($_POST['emailAtual'])) ?? "";
$novaSenha = htmlspecialchars(trim($_POST['novaSenha'])) ?? "";

if(empty($emailAtual) || empty ($novaSenha)) {
    echo "Preencha todos os campos.";
    exit;
}

try {
    $sql = "SELECT Codigo FROM Funcionario WHERE Email = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$emailAtual]);

    if ($stmt ->rowCount() === 0){
        echo "Funcionário não encontrado com esse e-mail.";
        exit;
    }

    $hash = password_hash($novaSenha, PASSWORD_DEFAULT);

    $sql = "UPDATE Funcionario SET Senhahash = ? WHERE Email = ?";
    $stmt = $pdo ->prepare($sql);
    $stmt->execute([$hash, $emailAtual]);

    echo "Senha atualizada com sucesso!";


} catch (Exception $e) {
    exit("Erro ao atualizar senha: " . $e->getMessage());
}

?>