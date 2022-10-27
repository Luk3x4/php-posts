<?php session_start();
if(!isset($_SESSION['username'])){
    header('Location: index.php');
}

require_once './database.php';
$errors = [];

if($_SERVER['REQUEST_METHOD'] === "POST"){
    $title = $_POST['title'];
    $image = $_FILES['image']?? null;

    $imagePath = "";

    if(!is_dir('images')){
        mkdir('images');
    }

    if($image){
        $imagePath = './images/'.$image['name'];
        move_uploaded_file($image['tmp_name'], $imagePath);
    }

    if(!$title){
        $errors[] = 'Title Is Required';
    }

    if(empty($errors)){
        $statement = $pdo->prepare('INSERT INTO posts (author,title, image, create_date) VALUES(:author, :title, :image, :time)');
        $statement->bindValue(':title', $title);
        $statement->bindValue(':image', $imagePath);
        $statement->bindValue(':author', $_SESSION['username']);
        $statement->bindValue(':time', date('Y-m-d H:i:s'));
        $statement->execute();
        header('Location: home.php');
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Post</title>
    <link rel="stylesheet" href="./css/home.css">
    <script src="./js/navBar.js" defer> </script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>
<body>
    <div class="cont">
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

        <form method="post" enctype="multipart/form-data">
            <div class="inner">
                <!-- <h2> Create Post </h2> -->
                <div class="err">
                    <?php if(!empty($errors)){ ?>
                        <div class="errors">
                            <p> Title Is Required </p>
                        </div>
                    <?php } ?>
                </div>
                <input type="file" name="image" size="30">
                <input type="text" name="title" id="" placeholder="Title">
                <input type="submit" value="Add Post">
            </div>
        </form>
    </div>
</body>
</html>