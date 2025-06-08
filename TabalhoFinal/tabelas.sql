CREATE TABLE Funcionario (
    Codigo  INT auto_increment PRIMARY KEY,
    Nome varchar(100) NOT NULL,
    Email VARCHAR(100) NOT NULL,
    Senhahash VARCHAR(255) NOT NULL
    EstadoCivil VARCHAR(20),
    DataNascimento DATE,
    Funcao VARCHAR(50)
)

CREATE TABLE Medico (
    Codigo int auto_increment PRIMARY KEY,
    Nome varchar(100) NOT NULL,
    Especialidade varchar(100) NOT NULL,
    CRM VARCHAR(20)
)

CREATE TABLE Contato(
    Codigo INT AUTO_INCREMENT PRIMARY KEY,
    Nome VARCHAR(100) NOT NULL,
    Email VARCHAR(100) NOT NULL,
    Telefone VARCHAR(20),
    Mensagem TEXT,
    Datahora DATETIME DEFAULT CURRENT_TIMESTAMP
)

CREATE TABLE Agendamento(
    Codigo INT AUTO_INCREMENT PRIMARY KEY,
    Datahora DATETIME DEFAULT CURRENT_TIMESTAMP
    FOREIGN KEY (CodigoMedico) REFERENCES Medico(Codigo),
    FOREIGN KEY (CodigoPaciente) REFERENCES Paciente(Codigo)
)
CREATE TABLE Paciente(
    Codigo INT AUTO_INCREMENT PRIMARY KEY,
    Nome VARCHAR(100),
    Sexo VARCHAR(100),
    Email VARCHAR(100),
    Telefone VARCHAR(20)
)