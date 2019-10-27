<?php
    require_once "Config.php";
    class Reservation extends Config{
 
        public function selectAll(){
            $sql = "SELECT * FROM reservations INNER JOIN
                    users ON reservations.user_id=users.user_id
                    INNER JOIN restaurants ON restaurants.restaurant_id=reservations.restaurant_id";
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
            $sql = "SELECT * FROM reservations INNER JOIN
            restaurants ON reservations.restaurant_id=restaurants.restaurant_id
            WHERE reservation_id=$id";
            $result = $this->conn->query($sql);

            if($result){
                return $result->fetch_assoc();                
            }elseif($this->conn->error){
                echo "Error:".$this->conn->error;
            }
        }

        public function save($restaurant_id,$date,$number_of_people,$user_id){

            $sql = "INSERT INTO reservations(restaurant_id,date,number_of_people,user_id)
                    VALUES('$restaurant_id','$date','$number_of_people','$user_id')";

                    $result = $this->conn->query($sql);
                    if($result){
                        return true;
                    }else{
                        echo "Error:".$this->conn->error;
                    }
        
        }


        public function update($id, $date, $number_of_people){
            $sql = "UPDATE reservations SET date='$date',
                    number_of_people='$number_of_people' WHERE reservation_id=$id";
            $result = $this->conn->query($sql);
            if($result){
                return true;
            }else{
                echo "Error:".$this->conn->error;
            }
        }

        public function delete($id){
            $sql = "DELETE FROM reservations WHERE 
            reservation_id=$id";
            //execute or run the query
            $result = $this->conn->query($sql);

            if($result){
                return true;
        }else{
            echo "Error:".$this->conn->error;
        }
    }

    public function cancel($id){
        $sql = "DELETE FROM reservations WHERE 
        reservation_id=$id";
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
