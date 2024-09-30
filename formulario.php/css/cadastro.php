<?php
include('db.php'); // Certifique-se de que o arquivo db.php está no mesmo diretório

// Ativar exibição de erros para depuração
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém os dados do formulário e sanitiza a entrada
    $nome = $conn->real_escape_string(trim($_POST['nome']));
    $idade = intval($_POST['idade']); // Converte para inteiro
    $email = $conn->real_escape_string(trim($_POST['email']));
    $curso = $conn->real_escape_string(trim($_POST['curso']));

    // Preparação da instrução SQL
    $sql = "INSERT INTO alunos (nome, idade, email, curso) VALUES (?, ?, ?, ?)";

    // Usa prepared statements para evitar SQL Injection
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iiss", $idade, $nome, $email, $curso); // "iiss" significa que os parâmetros são: inteiro, string, string, string

    // Executa a instrução
    if ($stmt->execute()) {
        echo "<p>Aluno cadastrado com sucesso!</p>";
    } else {
        echo "Erro ao cadastrar: " . $stmt->error;
    }

    $stmt->close(); // Fecha a instrução
    $conn->close(); // Fecha a conexão

    // Redireciona para a página correta (ajuste conforme necessário)
    header("Location: cadastro.php"); // ou header("Location: cadastro.php");
    exit();
}
?> 
