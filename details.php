<?php
    include_once(__DIR__ . "/classes/Picture.php");

    $date = $_GET["date"];

    $picture = new Picture();
    $p = $picture->getPicture($date);
    // var_dump($p);

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css"> 
    <title>Document</title>
</head>
<body>
    <div>
        <h2><?php echo $p["title"]; ?></h2>
        <h5><?php echo $date; ?></h5>
        <img src="<?php echo $p["image"];?>" alt="picture of the day">
        <p><?php echo $p["description"]; ?></p>
    </div>
    <div class="likes">
        <a href="#" class="like" data-id="<?php echo $p["id"]; ?>">❤ Like</a>
        <span class="likes__counter"><?php echo $p["likes"]; ?></span> people like this
    </div>
</body>
<script src="index.js"></script>
</html>