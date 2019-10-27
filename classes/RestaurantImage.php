<?php
    require_once "Config.php";
    class RestaurantImage extends Config{
        public function selectAll(){
            $sql = "SELECT * FROM restaurant_images";
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
                $sql = "SELECT * FROM restaurant_images WHERE restaurant_id=$id";
                $result = $this->conn->query($sql);
                if($result){
                    return $result->fetch_assoc();
                }elseif($this->conn->error){
                    echo "Error".$this->conn->error;
                }
            }
        
            public function save($restaurant_id,$image_type,$image_data){

                $sql = "INSERT INTO restaurant_images(restaurant_id,image_type,image_data)
                        VALUES('$restaurant_id','$image_type','$image_data')";
                $result = $this->conn->query($sql);
    
                if($result){
                    return true;
                }else{
                    echo "Error:" . $this->conn->error;
                }
             }   
            public function update($restaurant_id,$image_type,$image_data,$id){
                $sql = "UPDATE restaurant_images SET restaurant_id='$restaurant_id', image_type='$image_type',
                        image_data='$image_data'
                        WHERE restaurant_image_id=$id";
                //execute or run the query
                $result = $this->conn->query($sql);
                if($result){
                    return true;
                }else{
                    echo "Error:".$this->conn->error;
                }
            }    
            public function selectAllImage($restaurant_id){
                $sql = "SELECT * FROM restaurant_images WHERE restaurant_id=$restaurant_id";
                $result = $this->conn->query($sql);
                if($result){
                    $rows = array();
                    if($result->num_rows>0){
                        while($row = $result->fetch_assoc()){
                          $rows[] = $row;
                        }
                        return $rows;
                    }
                }else{
                    echo "Error:".$this->conn->error;
                }
            }
        }
?>