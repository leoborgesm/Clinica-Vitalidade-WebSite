<?php
require_once("../conexao.php");
$pdo = mysqlConnect();

try {
  $sql = <<<SQL
    SELECT 
      Agendamento.Codigo AS CodigoAgendamento,
      Agendamento.DataHora,
      Medico.Nome AS NomeMedico,
      Medico.Especialidade,
      Paciente.Nome AS NomePaciente,
      Paciente.Email,
      Paciente.Telefone
    FROM Agendamento
    INNER JOIN Medico ON Agendamento.CodigoMedico = Medico.Codigo
    INNER JOIN Paciente ON Agendamento.CodigoPaciente = Paciente.Codigo
    ORDER BY Agendamento.DataHora
  SQL;

  $stmt = $pdo->query($sql);
  $agendamentos = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
  die("Erro ao buscar agendamentos: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Listagem de Agendamentos - Clínica Vitalidade</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8e9bf;
      font-family: Arial, sans-serif;
    }
    header h1 {
      margin-top: 50px;
      text-align: center;
    }
    nav {
      padding: 10px 0;
      background-color: #84c786;
      border-radius: 10px;
      position: sticky;
      top: 0;
      z-index: 1000;
    }
    nav ul {
      list-style-type: none;
      text-align: center;
      padding: 0;
      margin: 0;
    }
    nav ul li {
      display: inline-block;
      margin: 0 15px;
    }
    nav a {
      text-decoration: none;
      color: white;
      font-size: 1.1rem;
    }
    main, footer {
      background-color: white;
      padding: 7%;
      width: 80%;
      margin: auto;
      border-radius: 10px;
      box-shadow: 0px 4px 8px #333;
    }
    main, footer{
            padding: 20px;
            border-radius: 10px;
            box-shadow:0px 4px 8px #333;
        }
  </style>
</head>
<body>
  <header>
    <h1>Listagem de Agendamentos</h1>
  </header>

  <nav>
    <ul>
      <li><a href="main.php">Dashboard</a></li>
    </ul>
  </nav>

  <br>

  <main>
    <h2 class="mb-4 text-center">Consultas Agendadas</h2>
    <div class="container">
      <div class="table-responsive">
        <table class="table table-striped table-bordered">
          <thead class="table-dark">
            <tr>
              <th>Código</th>
              <th>Data/Hora</th>
              <th>Especialidade</th>
              <th>Médico</th>
              <th>Paciente</th>
              <th>Contato</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($agendamentos as $ag): ?>
              <tr>
                <td><?= htmlspecialchars($ag['CodigoAgendamento']) ?></td>
                <td><?= date("d/m/Y H:i", strtotime($ag['DataHora'])) ?></td>
                <td><?= htmlspecialchars($ag['Especialidade']) ?></td>
                <td><?= htmlspecialchars($ag['NomeMedico']) ?></td>
                <td><?= htmlspecialchars($ag['NomePaciente']) ?></td>
                <td><?= htmlspecialchars($ag['Email']) ?> | <?= htmlspecialchars($ag['Telefone']) ?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </main>

  <br>

  <footer>
    <div><strong>&copy; Clínica Vitalidade. Todos os direitos reservados</strong></div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
