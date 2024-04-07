<?php

function conectarBancoDados()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "equipamentos";

    // Criar a conexão
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar a conexão
    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }

    return $conn;
}


