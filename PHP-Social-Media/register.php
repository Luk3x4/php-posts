<?php
require_once 'database.php';
session_start();
$errors = [];

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $name = $_POST['username'] ?? null;
    $email = $_POST['email'] ?? null;
    $password = $_POST['password'] ?? null;

    if(!$name || strlen($name) < 6){
        $errors[] = 'Name Must Contain At Least 6 Characters';
    }
    if(!$email){
        $errors[] = 'Email Must Be Real';
    }
    if(!$password){
        $errors[] = 'Password Must Not Be Empty';
    }

    if(empty($errors)){
        $statement = $pdo->prepare('INSERT INTO users (username, email, password) VALUES(:name, :email, :password)');
        $statement->bindValue(':name', trim(ucwords($name)));
        $statement->bindValue(':email', $email);
        $statement->bindValue(':password', password_hash($password, PASSWORD_BCRYPT));
        $statement->execute();
        header('Location: index.php');
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="./css/style.css"> 
    <title>Register</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <script src="./js/showPassword.js" defer> </script>
</head>
<body>
    <div class="login">
        <h2> Register </h2>
        <?php if(!empty($errors)){ ?>
            <div class="errors">
                <?php foreach($errors as $err){
                    echo "<p> $err </p>";
                } ?>
            </div>
        <?php } ?>
        <div class="main"> 
            <div class="inputs">
                <form method="post">
                    <div class="username">
                        <input type="text" name="username" id="name" placeholder="Username">
                    </div>
                    <div class="email">
                        <input type="email" name="email" id="email" placeholder="E-mail">
                    </div>
                    <div class="password">
                        <input type="password" name="password" id="password" placeholder="Password">
                        <span class="material-symbols-outlined">visibility_off</span>
                    </div>
                    <input type="submit" value="Register">
                    <div class="new">
                        <a href="index.php"> Already Have An Account? Login </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>