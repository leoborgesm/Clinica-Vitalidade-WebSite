<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: ../login.html?erro=2");
    exit;
}
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Área Restrita - Clínica Vitalidade</title>
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
    header h2 {
      text-align: center;
      font-size: 1.2rem;
      color: #555;
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
    main, footer{
            padding: 20px;
            border-radius: 10px;
            box-shadow:0px 4px 8px #333;
        }
    .dashboard-option {
      margin-bottom: 20px;
    }
  </style>
</head>
<body>
  <header>
    <h1>Área Restrita</h1>
    <h2>Bem-vindo, <?= htmlspecialchars($_SESSION['usuario']) ?></h2>
  </header>

  <nav>
    <ul>
      <li><a href="#dashboard">Dashboard</a></li>
      <li><a href="../publico/home.html" class="btn btn-danger">Logout</a></li>
    </ul>
  </nav>
  
  <br>
  
  <main>
    <h2 class="mb-4 text-center">Painel de Controle</h2>
    <div class="container">
      <div class="row g-4">
        
        <!-- Cadastro de Funcionários -->
        <div class="col-md-4">
          <div class="card dashboard-option">
            <div class="card-body text-center">
              <h5 class="card-title">Cadastro de Funcionários</h5>
              <p class="card-text">Cadastrar novos funcionários da clínica.</p>
              <a href="cadastro_funcionarios.html" class="btn btn-primary">Cadastrar</a>
            </div>
          </div>
        </div>
        
        <!-- Cadastro de Médicos -->
        <div class="col-md-4">
          <div class="card dashboard-option">
            <div class="card-body text-center">
              <h5 class="card-title">Cadastro de Médicos</h5>
              <p class="card-text">Cadastrar médicos da clínica.</p>
              <a href="cadastro_medicos.html" class="btn btn-primary">Cadastrar</a>
            </div>
          </div>
        </div>
        
        <!-- Listagem de Funcionários -->
        <div class="col-md-4">
          <div class="card dashboard-option">
            <div class="card-body text-center">
              <h5 class="card-title">Listagem de Funcionários</h5>
              <p class="card-text">Visualizar funcionários cadastrados.</p>
              <a href="listagem_funcionarios.html" class="btn btn-primary">Visualizar</a>
            </div>
          </div>
        </div>
        
        <!-- Listagem de Médicos -->
        <div class="col-md-4">
          <div class="card dashboard-option">
            <div class="card-body text-center">
              <h5 class="card-title">Listagem de Médicos</h5>
              <p class="card-text">Visualizar médicos cadastrados.</p>
              <a href="listagem_medicos.html" class="btn btn-primary">Visualizar</a>
            </div>
          </div>
        </div>
        
        <!-- Listagem de Agendamentos -->
        <div class="col-md-4">
          <div class="card dashboard-option">
            <div class="card-body text-center">
              <h5 class="card-title">Listagem de Agendamentos</h5>
              <p class="card-text">Visualizar agendamentos de consultas.</p>
              <a href="listagem_agendamentos.html" class="btn btn-primary">Visualizar</a>
            </div>
          </div>
        </div>
        
        <!-- Listagem de Mensagens de Contato -->
        <div class="col-md-4">
          <div class="card dashboard-option">
            <div class="card-body text-center">
              <h5 class="card-title">Listagem de Mensagens</h5>
              <p class="card-text">Visualizar mensagens enviadas pelos usuários.</p>
              <a href="listagem_contatos.php" class="btn btn-primary">Visualizar</a>
            </div>
          </div>
        </div>
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
