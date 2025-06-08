<?php
require_once("../conexao.php");
$pdo = mysqlConnect();

try {
  $sql = "SELECT Codigo, Nome FROM Medico";
  $stmt = $pdo->query($sql);
  $medicos = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
  exit("Erro ao buscar médicos: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Clínica Vitalidade Nutrição & Bem-Estar-Agendamento</title>
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
      width: 70%;
      margin: auto;
      border-radius: 10px;
      box-shadow: 0px 4px 8px #333;
    }
    footer {
      background-color: white;
      padding: 7%;
      width: 70%;
      margin: auto;
      text-align: center;
      border-radius: 10px;
      box-shadow: 0px 4px 8px #333;
    }

    main,footer{
        padding: 20px;

    }
  </style>
</head>
<body>
  <header>
    <h1>Agendamento de Consulta</h1>
  </header>
  
  <nav>
    <ul>
      <li><a href="home.html">Home</a></li>
      <li><a href="galeria.html">Galeria</a></li>
      <li><a href="contato.html">Contato</a></li>
      <li><a href="login.html">Login</a></li>
      <li><a href="agendamento.php">Agendamento</a></li>
    </ul>
  </nav>
  
  <br>
  
  <main>
    <h2 class="mb-4 text-center">Preencha o formulário para agendar sua consulta</h2>
    <div class="container">
      <form action="processa_agendamento.php" method="post">
        
        <div class="mb-3">
          <label for="especialidade" class="form-label">Especialidade Médica</label>
          <select class="form-select" id="especialidade" name="especialidade" required>
            <option value="" disabled selected>Selecione a especialidade</option>
            <option value="nutricao">Nutrição</option>
            <option value="dermatologia">Dermatologia</option>
            <option value="cardiologia">Cardiologia</option>
            <option value="ortopedia">Ortopedia</option>
          </select>
        </div>
        
        <div class="mb-3">
          <label for="medico" class="form-label">Médico</label>
          <select class="form-select" id="medico" name="codigoMedico" required>
            <option value="">Selecione o médico</option>
            <?php foreach ($medicos as $medico): ?>
              <option value="<?= htmlspecialchars($medico['Codigo']) ?>">
                <?= htmlspecialchars($medico['Nome']) ?>
              </option>
            <?php endforeach; ?>
          </select>
        </div>
        
        <div class="mb-3">
          <label for="datahora" class="form-label">Data e Hora da Consulta</label>
          <input type="datetime-local" class="form-control" id="datahora" name="datahora" required>
        </div>
        
        <hr>
        <h3 class="mb-3">Dados do Paciente</h3>
        
        <div class="mb-3">
          <label for="nomePaciente" class="form-label">Nome do Paciente</label>
          <input type="text" class="form-control" id="nomePaciente" name="nome" required>
        </div>
        
        <div class="mb-3">
          <label for="sexo" class="form-label">Sexo</label>
          <select class="form-select" id="sexo" name="sexo" required>
            <option value="" disabled selected>Selecione</option>
            <option value="feminino">Feminino</option>
            <option value="masculino">Masculino</option>
            <option value="outro">Outro</option>
          </select>
        </div>
        
        <div class="mb-3">
          <label for="emailPaciente" class="form-label">E-mail</label>
          <input type="email" class="form-control" id="emailPaciente" name="email" required>
        </div>
        
        <div class="mb-3">
          <label for="telefonePaciente" class="form-label">Telefone</label>
          <input type="text" class="form-control" id="telefonePaciente" name="telefone" required>
        </div>
        
        <div class="mb-3 text-center">
          <button type="submit" class="btn btn-primary">Agendar Consulta</button>
        </div>
      </form>
    </div>
  </main>
  
  <br>
  
  <footer>
    <div><strong>&copy; Clínica Vitalidade. Todos os direitos reservados</strong></div>
  </footer>
  <br>
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>