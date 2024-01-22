<?php
    $nome = '';
    $email ='root';
    $senha = '';
    $database = 'acodemy';
    $host = 'localhost';

    $mysqli = new mysqli($host, $email, $senha, $database);

    if ($mysqli->error){
        die("erro ao conectar ao banco de dados". $mysqli->error);
    }
?>