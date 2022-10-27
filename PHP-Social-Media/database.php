<?php
require_once './config.php';
$dsn = 'pgsql:host=localhost;port=5432;dbname=phpposts';
$pdo = new PDO($dsn, 'postgres', 'luka1234');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>