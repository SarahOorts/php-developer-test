<?php

    class Like{
        private $imageId;

        /**
         * Get the value of imageId
         */ 
        public function getimageId()
        {
                return $this->imageId;
        }

        /**
         * Set the value of imageId
         *
         * @return  self
         */ 
        public function setimageId($imageId)
        {
                $this->imageId = $imageId;

                return $this;
        }

        public function getLikes(){
            $conn = DB::getInstance();
            $statement = $conn->prepare("select likes from pictureoftheday where id = :id");
            $statement->bindValue(":id", $this->getImageId());
            $statement->execute();
            $response = $statement->fetch();
            return $response;
        }

        public function save($like){
            $conn = Db::getInstance();
            $statement = $conn->prepare("insert into pictureoftheday likes = :likes where id = :id");
            $statement->bindValue(":id", $this->getImageId());
            $likes = intval($this->getLikes()) + $like;
            var_dump($likes);
            $statement->bindValue(":likes", $likes);
            return $statement->execute();
        }
    }