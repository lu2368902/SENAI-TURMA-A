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
        require_once 'php/connection.php';
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
   
?>
</body>
</html>