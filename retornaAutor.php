<?php
    $pdo = new PDO("mysql:host=localhost; dbname=bookbox; charset=utf8;", "root", "");
    $autores = $pdo->prepare("SELECT nome FROM autor");
    $autores->execute();
    echo json_encode($autores->fetchAll(PDO::FETCH_ASSOC));
?>