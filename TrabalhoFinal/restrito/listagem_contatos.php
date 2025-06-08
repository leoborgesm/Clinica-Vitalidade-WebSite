<?php
require_once("../conexao.php");
$pdo = mysqlConnect();

$sql = "SELECT Codigo, Nome, Email, Telefone, Mensagem, DataHora FROM Contato ORDER BY DataHora DESC";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Listagem de Mensagens - Clínica Vitalidade</title>
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
    main {
      background-color: white;
      padding: 7%;
      width: 80%;
      margin: auto;
      border-radius: 10px;
      box-shadow: 0px 4px 8px #333;
    }
    footer {
      background-color: white;
      padding: 7%;
      width: 80%;
      margin: auto;
      text-align: center;
      border-radius: 10px;
      box-shadow: 0px 4px 8px #333;
    }
    main, footer {
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0px 4px 8px #333;
    }
  </style>
</head>
<body>
  <header>
    <h1>Listagem de Mensagens</h1>
  </header>

  <nav>
    <ul>
      <li><a href="main.php">Dashboard</a></li>
    </ul>
  </nav>

  <br>

  <main>
    <h2 class="mb-4 text-center">Mensagens Recebidas</h2>
    <div class="container">
      <div class="table-responsive">
        <table class="table table-striped table-bordered">
          <thead class="table-dark">
            <tr>
              <th>Código</th>
              <th>Nome</th>
              <th>Email</th>
              <th>Telefone</th>
              <th>Mensagem</th>
              <th>Data/Hora</th>
            </tr>
          </thead>
          <tbody>
            <?php
            try {
              $stmt = $pdo->query($sql);
              while ($row = $stmt->fetch()) {
                $codigo = htmlspecialchars($row['Codigo']);
                $nome = htmlspecialchars($row['Nome']);
                $email = htmlspecialchars($row['Email']);
                $telefone = htmlspecialchars($row['Telefone']);
                $mensagem = htmlspecialchars($row['Mensagem']);
                $dataHora = date('d/m/Y H:i', strtotime($row['DataHora']));

                echo <<<HTML
                  <tr>
                    <td>$codigo</td>
                    <td>$nome</td>
                    <td>$email</td>
                    <td>$telefone</td>
                    <td>$mensagem</td>
                    <td>$dataHora</td>
                  </tr>
                HTML;
              }
            } catch (Exception $e) {
              echo "<tr><td colspan='6'>Erro ao buscar dados: {$e->getMessage()}</td></tr>";
            }
            ?>
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
