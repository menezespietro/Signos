<?php

try {
    $pdo = new PDO("sqlite:" . __DIR__ . "/signos.db");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    die("Erro ao conectar com o banco de dados: " . $e->getMessage());
}