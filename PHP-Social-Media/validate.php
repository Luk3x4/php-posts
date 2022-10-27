<?php 
require_once 'database.php';
session_start();
$email = $_POST['email'] ?? null;
$password = $_POST['password'] ?? null;

$statement = $pdo->prepare('SELECT * FROM users WHERE email = :email');
$statement->bindValue(':email', $email);
$statement->execute();
$data = $statement->fetch(PDO::FETCH_ASSOC);

if(!empty($data) && password_verify($password, $data['password'])){
    $_SESSION['username'] = $data['username'];
    $_SESSION['id'] = $data['id'];
    header("Location: home.php?id=".$data['id']."");
}else{
    header('Location: index.php?error=true');
}
?>