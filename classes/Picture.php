<?php

    class Picture{
        public function getAll(){
            $now = date("Y-m-d");
            // var_dump($now);

            $past = date("Y-m-d", strtotime('-29 days'));
            // var_dump($past);

            $response = file_get_contents("https://api.nasa.gov/planetary/apod?api_key=DEMO_KEY&start_date=$past&end_date=$now");
            $response = json_decode($response, true);
            // var_dump($response);
            return $response;
        }

        public function getPicture($date){
            $response = file_get_contents("https://api.nasa.gov/planetary/apod?api_key=DEMO_KEY&date=$date");
            $response = json_decode($response, true);
            // var_dump($response);
            return $response;
        }
    }