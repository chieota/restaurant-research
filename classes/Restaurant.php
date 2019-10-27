<?php
    require_once "Config.php";
    class Restaurant extends Config{

        public function selectAll(){
            $sql = "SELECT * FROM restaurants
                    INNER JOIN genres ON restaurants.genre=genres.genre_id
                    INNER JOIN cities ON restaurants.city=cities.city_id
                    ORDER BY restaurants.restaurant_id";
            $result = $this->conn->query($sql);
            $rows = array();
            if($result->num_rows>0){
                while($row = $result->fetch_assoc()){
                    $rows[] = $row;
                }return $rows;
            }else{
                return false;
            }
        }

        public function selectOne($id){
            $sql = "SELECT * FROM restaurants INNER JOIN 
            cities ON restaurants.city=cities.city_id
            INNER JOIN genres ON restaurants.genre=genres.genre_id
            WHERE restaurant_id=$id";
            $result = $this->conn->query($sql);

            if($result){
                return $result->fetch_assoc();                
            }elseif($this->conn->error){
                echo "Error:".$this->conn->error;
            }
        }
        
        public function save($restaurant_name,$genre,$city,$address,$tel,$url,$budget,$detail,$add_date){

            $saveResult = new SaveResult;
            $sql = "INSERT INTO restaurants(restaurant_name,genre,city,address,tel,url,budget,detail,add_date)
                    VALUES('$restaurant_name','$genre','$city','$address','$tel','$url','$budget','$detail','$add_date')";

                    $result = $this->conn->query($sql);

                    $saveResult->restaurant_id = $this->conn->insert_id;
                    $saveResult->result = $result;

                    if($result){
                        return $saveResult;
                    }else{
                        echo "Error:".$this->conn->error;
                    }
        }
        public function update($restaurant_name,$genre,$city,$address,$tel,$url,$budget,$detail,$id){
            $sql = "UPDATE restaurants SET restaurant_name='$restaurant_name', genre='$genre',
                    city='$city', address='$address', tel='$tel',url='$url',budget='$budget',detail='$detail'
                    WHERE restaurant_id=$id";
            //execute or run the query
            $result = $this->conn->query($sql);
            if($result){
                return true;
            }else{
                echo "Error:".$this->conn->error;
            }
        }


        public function delete($id){
            $sql = "DELETE FROM restaurants WHERE 
            restaurant_id=$id";
            //execute or run the query
            $result = $this->conn->query($sql);

            if($result){
                return true;
        }else{
            echo "Error:".$this->conn->error;
        }
        }

        public function searchResult($city_id,$genre_id){
            $sql = "SELECT * FROM restaurants 
            INNER JOIN restaurant_images ON restaurants.restaurant_id=restaurant_images.restaurant_id
            INNER JOIN genres ON restaurants.genre=genres.genre_id
            INNER JOIN cities ON restaurants.city=cities.city_id WHERE city='$city_id' AND genre='$genre_id'";
            $result = $this->conn->query($sql);
            $rows = array();
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    $rows[] = $row;
                }return $rows;
            }else{
                return false;
            }
        }
        public function countTokyo(){
            $sql = "SELECT COUNT(*) AS countTokyo FROM restaurants WHERE city=1 ";
            $result = $this->conn->query($sql);
            $row = $result->fetch_assoc();
            return $row;
            
        }

        public function countNewYork(){
            $sql = "SELECT COUNT(*) AS countNewYork FROM restaurants WHERE city=2 ";
            $result = $this->conn->query($sql);
            $row = $result->fetch_assoc();
            return $row;
            
        }

        public function countMadrid(){
            $sql = "SELECT COUNT(*) AS countMadrid FROM restaurants WHERE city=3 ";
            $result = $this->conn->query($sql);
            $row = $result->fetch_assoc();
            return $row;
            
        }

        public function countLondon(){
            $sql = "SELECT COUNT(*) AS countLondon FROM restaurants WHERE city=4 ";
            $result = $this->conn->query($sql);
            $row = $result->fetch_assoc();
            return $row;
            
        }
        public function countParis(){
            $sql = "SELECT COUNT(*) AS countParis FROM restaurants WHERE city=5 ";
            $result = $this->conn->query($sql);
            $row = $result->fetch_assoc();
            return $row;
            
        }

    }
        





        class SaveResult {

            public $restaurant_id = 0;
            public $result = false;
        }

    

?>