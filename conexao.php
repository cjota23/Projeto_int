<?php
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "confeitaria"; 

// Criação da conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificação de conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
} else {
    echo "Conexão bem-sucedida!";
}

// Utilize essa conexão ($conn) para realizar consultas ao banco de dados
?>
