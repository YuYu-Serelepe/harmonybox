<?php

$host = 'localhost';
$db_name = 'musiquinha';
$username = 'root';
$password = 'banguela';

$charset = 'utf8mb4';
$dsn = "mysql:host=$host;dbname=$db_name;charset=$charset";

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
     $pdo = new PDO($dsn, $username, $password, $options);
} catch (\PDOException $e) {
     // Correção do ->getMessage()
     throw new \PDOException($e->getMessage(), (int)$e->getCode());
}