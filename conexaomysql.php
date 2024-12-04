<?php
// Definindo as configurações do banco de dados
$host = 'localhost:3306'; // Endereço do servidor MySQL
$dbname = 'odonto'; // Nome do banco de dados
$user = 'root'; // Nome de usuário do banco de dados
$pass = ''; // Senha do banco de dados

// Tentando estabelecer a conexão
try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    // Configurando o modo de erro do PDO para exceções
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Conexão bem-sucedida!";
} catch (PDOException $e) {
    //echo "Erro na conexão: " . $e->getMessage();
}
?>
