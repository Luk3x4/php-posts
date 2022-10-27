<?php 
session_start();
if(isset($_SESSION['username'])){
    header('Location: home.php?id='.$_SESSION['id'].'');
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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <title>Log In</title>
    <script src="./js/showPassword.js" defer> </script>
</head>
<body>
    <div class="login">
        <h2> Login </h2>
        <?php if(isset($_GET['error'])){ ?>
            <div class="errors">
                <?php echo "<p> Account Not Found In Database </p>" ?>
            </div>
        <?php } ?>
        <div class="main"> 
            <div class="inputs">
                <form method="post" action="validate.php">
                    <?php echo $_POST['alert'] ?? ''?>
                    <div class="email">
                        <input type="email" name="email" id="email" placeholder="E-mail">
                    </div>
                    <div class="password">
                        <input type="password" name="password" id="password" placeholder="Password">
                        <span class="material-symbols-outlined">visibility_off</span>
                    </div>
                    <input type="submit" value="Log In">
                    <div class="new">
                        <a href="register.php"> Create New Account </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>