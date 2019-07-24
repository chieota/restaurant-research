<?php
    require_once "Config.php";
    class Restaurant extends Config{

        public function selectAll(){
            $sql = "SELECT * FROM restaurants INNER JOIN
                    users ON restaurants.user_id=users.user_id";
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

        public function selectOne($id){
            $sql = "SELECT * FROM restaurants WHERE restaurant_id=$id";
            $result = $this->conn->query($sql);

            if($result){
                return $result->fetch_assoc();                
            }elseif($this->conn->error){
                echo "Error:".$this->conn->error;
            }
        }
        
        public function save($restaurant_name,$genre,$city,$address,$bussinessday,$budget,$user_id){

            $sql = "INSERT INTO restaurants(restaurant_name,user_id,genre,city,address,bussinessday,budget)
                    VALUES('$restaurant_name','$user_id','$genre','$city','$address','$bussinessday','$budget')";

                    $result = $this->conn->query($sql);
                    if($result){
                        return true;
                    }else{
                        echo "Error:".$this->conn->error;
                    }
        }
        public function update($id, $restaurant_name, $genre,$country,$city,$address,$bussinessday,$budget){
            $sql = "UPDATE restaurants SET restaurant_name='$restaurant_name', genre='$genre', country='$country',
                    city='$city', address='$address' ,bussinessday='$bussinessday',budget='$budget'
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
            $sql = "DELETE FROM restaurants WHERE restaurant_id=$id";
            //execute or run the query
            $result = $this->conn->query($sql);

            if($result){
                return true;
        }else{
            echo "Error:".$this->conn->error;
        }
    }

        public function searchResult($city_id,$genre_id){
            $sql = "SELECT * FROM restaurants WHERE city='$city_id' AND genre='$genre_id'";
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
    }

?>