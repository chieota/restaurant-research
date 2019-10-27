<?php
    require_once "Config.php";
    class Review extends Config{

    public function selectAll(){
    
        $sql = "SELECT * FROM review INNER JOIN
                restaurants ON review.restaurant_id=restaurants.restaurant_id";  
        $result = $this->conn->query($sql);
        $rows = array();
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $rows[] = $row;
        }
            return $rows;

        }else{
            return false;
        }

    }       
    public function selectOne($id){
        $sql = "SELECT * FROM review INNER JOIN 
               restaurants ON review.restaurant_id=restaurants.restaurant_id
               WHERE review_id=$id";
        $result = $this->conn->query($sql);

        if($result){
            return $result->fetch_assoc();                
        }elseif($this->conn->error){
            echo "Error:".$this->conn->error;
        }
    }
    

        public function update($id,$restaurant_id,$score,$price,$comment){
        $sql = "UPDATE review SET restaurant_id='$restaurant_id', score='$score',
                price='$price', comment='$comment'
                WHERE review_id=$id";
        //execute or run the query
        $result = $this->conn->query($sql);
        if($result){
            return true;
        }else{
            echo "Error:".$this->conn->error;
        }
    }



        public function save($restauant_id,$score,$price,$comment){
            $sql = "INSERT INTO review(restaurant_id,score,price,comment)
                    VALUE('$restauant_id','$score', '$price', '$comment')";

            $result = $this->conn->query($sql);
            if($result){
                return true;
            }else{
                echo "Error;".$this->conn->error;
            }
        }

        public function delete($id){
            $sql = "DELETE FROM review WHERE 
            review_id=$id";
            $result = $this->conn->query($sql);

            if($result){
                return true;
        }else{
            echo "Error:".$this->conn->error;
        }
    }

    public function selectReviewsByRestaurant($id){
        $sql = "SELECT * FROM review 
               WHERE restaurant_id=$id";
        $result = $this->conn->query($sql);

        if($result){
            $rows = array();
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $rows[] = $row;
        }}
            return $rows;               
        }elseif($this->conn->error){
            echo "Error:".$this->conn->error;
        }
    }
}
    
?>