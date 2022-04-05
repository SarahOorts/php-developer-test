<?php

    include_once(__DIR__ . "/../classes/Like.php");
    if (!empty($_POST)) {
        $imageId = $_POST['imageId'];

        $like = new Like();
        $like->setImageId($imageId);
        $like->save(1);
        $total = $like->getLikes();

        $response = [
            "status" => "success",
            "message" => "Like was successfull.",
            "totallikes" => $total
        ];

        echo json_encode($response);
    }