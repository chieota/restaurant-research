<?php
    require_once "Config.php";
    class Genre extends Config{

        public function selectAll(){
            $sql = "SELECT * FROM genres";
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
            $sql = "SELECT * FROM genres WHERE genre_id=$id";
            $result = $this->conn->query($sql);

            if($result){
                return $result->fetch_assoc();                
            }elseif($this->conn->error){
                echo "Error:".$this->conn->error;
            }
        }
        
        public function save($genre_name){

            $sql = "INSERT INTO genres(genre_name)
                    VALUES('$genre_name')";

                    $result = $this->conn->query($sql);
                    if($result){
                        return true;
                    }else{
                        echo "Error:".$this->conn->error;
                    }
        }
        public function update($id, $genre_name){
            $sql = "UPDATE genres SET genre_name='$genre_name' WHERE genre_id=$id";
            
            $result = $this->conn->query($sql);
            if($result){
                return true;
            }else{
                echo "Error:".$this->conn->error;
            }
        }
        public function delete($id){
            $sql = "DELETE FROM genres WHERE genre_id=$id";
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