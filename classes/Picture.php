<?php
    include_once(__DIR__ . "/DB.php");

    class Picture{
        public function getAll(){
            $conn = DB::getInstance();
            $statement = $conn->prepare("select * from pictureoftheday");
            $statement->execute();
            $response = $statement->fetchAll();
            return $response;
        }

        public function getPicture($date){
            $conn = DB::getInstance();
            $statement = $conn->prepare("select * from pictureoftheday where date = :date");
            $statement->bindValue("date", $date);
            $statement->execute();
            $response = $statement->fetch();
            return $response;
        }

        public function postToDB(){
            $now = date("Y-m-d");
            $past = date("Y-m-d", strtotime('-29 days'));

            $response = file_get_contents("https://api.nasa.gov/planetary/apod?api_key=DEMO_KEY&start_date=$past&end_date=$now");
            $response = json_decode($response, true);
            
            foreach($response as $r){
                $date = $r["date"];
                $title = $r["title"];
                $description = $r["explanation"];
                $image = $r["url"];
                // var_dump($title);

                $conn = DB::getInstance();
                $statement = $conn->prepare("insert into pictureoftheday (date, title, description, image) values (:date, :title, :description, :image)");
                $statement->bindValue("date", $date);
                $statement->bindValue("title", $title);
                $statement->bindValue("description", $description);
                $statement->bindValue("image", $image);
                $statement->execute();
            }
        }
    }