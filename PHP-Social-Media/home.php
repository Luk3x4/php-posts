<?php session_start();
if(!isset($_SESSION['username'])){
    header('Location: index.php');
}

$query = $_GET['query']?? null;
require_once './database.php';
$statement = $pdo->prepare('SELECT * FROM posts WHERE title like :title ORDER BY create_date');
$statement->bindValue(':title', "%$query%");
$statement->execute();
$posts = $statement->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="./css/home.css">
    <script src="./js/navBar.js" defer> </script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>
<body>
    <div class="container">
        <nav>
            <h2> PHP Posts </h2>
            <div class="mid">
                <a href="home.php"> Posts </a>
                <a href="createPost.php"> Add Post </a>
            </div>
            <div class="links">
                <div class="account">
                    <?php echo '<p>'.$_SESSION['username'].'</p>'?>
                </div>
                <form method="get" action="logout.php">
                    <input type="submit" value="Log Out">
                </form>
                <span class="material-symbols-outlined">menu</span>
            </div>
        </nav>
        <div class="second">
            <div class="main-content">
                <div class="upper">
                    <button class="addpost"><a href="createPost.php"> Add Post </a></button>
                    <form method="get">
                        <input type="text" name="query" placeholder="Search...">
                        <input type="submit" value="Search">
                    </form>
                </div>
            </div>
                <?php if(empty($posts)){
                    echo '<h2 class="empty"> Posts Not Found </h2>';
                } ?>
            <div class="posts">
                <?php foreach($posts as $post){ ?>
                    <div class="post">
                        <div class="flex" style="display: flex; justify-content:space-between">
                            <p>By: <?php echo $post['author'] ?></p>
                            <p>On: <?php echo $post['create_date']?></p>
                        </div>
                        <hr style="height: 1">
                        <p> <?php echo $post['title'] ?></p>
                        <img src="<?php echo $post['image'] ?>" alt="">
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</body>
</html>