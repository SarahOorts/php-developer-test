<?php

    class DB{
        private static $conn;

        public static function  getInstance(){
            include_once(__DIR__ . "/../config/config.php");

            if (self::$conn === null) {
                self::$conn = new PDO('mysql:host='. CONFIG['db']['host'].';dbname='.CONFIG['db']['dbname'], CONFIG['db']['user'], CONFIG['db']['password']);
                return self::$conn;
            } else {
                return self::$conn;
            }
        }
    }