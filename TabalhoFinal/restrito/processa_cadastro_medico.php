<?php
require_once("../conexao.php");

$nome = $_POST['nome'];
$especialidade = $_POST['especialidade'];
$crm = $_POST['crm'];

$sql = <<<SQL
    INSERT INTO Medico 
        (Nome, Especialidade, CRM) 
        VALUES (?, ?, ?)
SQL;

try {  
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$nome, $especialidade, $crm]);
    header("Location: cadastro_medico.php?sucesso=1");
    exit;
    
} catch (Exception $e) {
    header("Location: cadastro_medico.php?erro=1");
    exit;
}
?>