<?php
require './src/db.php';
include './src/auth/auth.php';

$author = $_SESSION['email'];

$stmt = $pdo -> query("SELECT * FROM `short_urls` WHERE `author` = '$author'");

$rows = $stmt -> rowCount();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Url Shortener</title>
    <link rel="stylesheet" href="./assets/css/style.css">
</head>
<body>
    <div class="dropdown">
        <div class="drop-btn">
            <?php echo $author; ?>
        </div>
        <div class="dropdown-content">
            <a href="./src/auth/logout.php">Log Out</a>
        </div>
    </div>
    <div class="container">
        <h1 class="title">Url Shortener</h1>
        <form method="post" action="./src/config.php" class="input-form">
            <input type="url" name="main_url" value="https://" placeholder="https://" class="value">
            <button class="send" name="send">Shorten it!</button>
        </form>
        <form action="./src/config.php" method="post" class="urls">
            <?php while($urls = $stmt -> fetch(PDO::FETCH_ASSOC)) {?>
                <div class="row">
                    <div class="row-item">
                        <a href="<?php echo $urls['main_url']?>" class="short_url">localhost/r?id=<?php echo $urls['id']?></a>
                    </div>
                    <div class="row-item">
                        <p class="main">
                            <?php echo $urls['main_url']; ?>
                        </p>
                    </div>
                </div>
                <div class="line"></div>
            <?php }?>
            <?php if($rows != 0) {?>
                <button class="clear" name="clear">Clear All</button>
            <?php }?>
        </form>
    </div>
</body>
</html>