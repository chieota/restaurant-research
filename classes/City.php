<?php
    require_once "Config.php";
    class City extends Config{

        public function selectAll(){
            $sql="SELECT * FROM cities";
            $result = $this->conn->query($sql);
            $rows = array();
            if($result->num_rows > 0){
                while($row =$result->fetch_assoc()){
                    $rows[] = $row;
                }return $rows;
            }else{
                return false;
            }
        }
        public function selectOne($id){
            $sql = "SELECT * FROM cities WHERE city_id=$id";
            $result = $this->conn->query($sql);
            if($result){
                return $result->fetch_assoc();
            }elseif($this->conn->error){
                echo "Error".$this->conn->error;
            }
        }

        public function save($city_name){
            $sql = "INSERT INTO cities(city_name) VALUES('$city_name')";
            $result = $this->conn->query($sql);
            if($result){
                return true;
            }else{
                echo "Error.".$this->conn->error;
            }
        }

        public function update($id, $city_name){
            $sql = "UPDATE cities SET city_name='$city_name' WHERE city_id=$id";
            //execute or run the query
            $result = $this->conn->query($sql);
            if($result){
                return true;
            }else{
                echo "Error:".$this->conn->error;
            }
        }

        public function delete($id){
            $sql = "DELETE FROM cities WHERE city_id=$id";
            //execute or run the query
            $result = $this->conn->query($sql);

            if($result){
                return true;
        }else{
            echo "Error:".$this->conn->error;
        }
    }
    }

?>