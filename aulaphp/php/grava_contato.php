<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php 
        $host = 'localhost';
        $db = 'senai_ta_aulaphp';
        $user = 'lucia';
        $pass = '123456';
        $port = 3307; // Porta MySQL correta
        // Inclui o arquivo da classe Database que criamos para conectar dentro da pasta php
        require_once 'connection.php';
        // Cria uma instância da classe Database
        $database = new Database($host, $db, $user, $pass, $port);
        // Chama o método connect para estabelecer a conexão
        $database->connect();
        // Obtém a instância PDO para realizar consultas
        $pdo = $database->getConnection();
    ?>
</head>
<body>
<?php
if(isset($_GET['nome']) && isset($_GET['email']) && isset($_GET['mensagem'])){
    $nome = htmlspecialchars($_GET['nome']);
    $email = htmlspecialchars($_GET['email']);
    $mensagem = htmlspecialchars($_GET['mensagem']);

    echo "<h2> Informações recebidas:</h2>";
    echo "<p><strong>Nome</strong>" . $nome. "</p>";
    echo "<p><strong>E-mail:</strong>" . $email. "</p>";
    echo "<p><strong>Mensagem</strong>" . $mensagem. "</p>";


    $stmt = $pdo->prepare("insert into senai_ta_aulaphp. mensagem (nome,email,mensagem)values('$nome', '$email', '$mensagem');");




    $stmt->execute();
}
   else{
    echo "Nenhum dado foi enviado .";
   }
?>
</body>
</html>