<?php
require_once("../conexao.php");
$pdo = mysqlConnect();

$dataHora = $_POST["dataHora"] ?? "";
$codigoMedico = $_POST["codigoMedico"] ?? "";
$nomePaciente = $_POST["nome"] ?? "";
$sexo = $_POST["sexo"] ?? "";
$email = $_POST["email"] ?? "";
$telefone = $_POST["telefone"] ?? "";

try {
  // 1. Insere paciente
  $sqlPaciente = "INSERT INTO Paciente (Nome, Sexo, Email, Telefone) VALUES (?, ?, ?, ?)";
  $stmtPaciente = $pdo->prepare($sqlPaciente);
  $stmtPaciente->execute([$nomePaciente, $sexo, $email, $telefone]);
  $codigoPaciente = $pdo->lastInsertId();

  // 2. Insere agendamento
  $sqlAgendamento = "INSERT INTO Agendamento (DataHora, CodigoMedico, CodigoPaciente) VALUES (?, ?, ?)";
  $stmtAgendamento = $pdo->prepare($sqlAgendamento);
  $stmtAgendamento->execute([$dataHora, $codigoMedico, $codigoPaciente]);

  header("Location: agendamento.php?sucesso=1");
  exit();
} catch (Exception $e) {
  exit("Erro: " . $e->getMessage());
}
?>

