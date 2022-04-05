<?php  
    include_once(__DIR__ . "/classes/Picture.php");

    $test = new Picture();
    $picture = $test->getAll();

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css"> 
    <title>NASA's Picture of the day</title>
</head>
<body>
    <div class="grid">
        <?php foreach($picture as $p): ?>
            <div>
                <a href="details.php?date=<?php echo $p["date"]; ?>">
                    <h2><?php echo $p["title"]; ?></h2>
                    <img src="<?php echo $p["url"];?>" alt="picture of the day">
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>