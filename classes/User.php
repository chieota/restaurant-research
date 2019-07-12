<?php
    require_once "Config.php";

    class User extends Config{

        public function login($username,$password){
            $hashed_password = md5($password);
            $sql = "SELECT * FROM users WHERE username='$username' AND password='$hashed_password'";
            //execute or run the query
            $result = $this->conn->query($sql);
            if($result->num_rows == 1){
                $row = $result->fetch_assoc();
                $_SESSION['user_id'] = $row['user_id'];
                echo "<script>window.location.replace('users.php');</script>";
            }else{
                echo "<p class='text-danger'>Incalid Usernameor Password</p>";
            }
        }
        public function selectAll(){
            //query.bv 
            $sql = "SELECT * FROM users";
            //execute or run the query
            $result = $this->conn->query($sql);
            //create on empty array
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
            //query
            $sql ="SELECT * FROM users WHERE user_id=$id";
            //execute or run the query
            $result = $this->conn->query($sql);

            if($result){
                return $result->fetch_assoc();
            }elseif($this->conn->error){
                echo "Error:".$this->conn->error;
            }
        }

        public function save($username, $email, $password,$gender,$nationality,$comment){

            $new_password = md5($password);
            $sql = "INSERT INTO users(username, email, password,gender,nationality,comment)
                    VALUES('$username','$email','$new_password','$gender','$nationality','$comment')";
            //execute or run the query
            $result = $this->conn->query($sql);

            if($result){
                return true;
            }else{
                echo "Error:" . $this->conn->error;
            }
         }
        

        public function update($id, $username, $email,$gender,$nationality,$comment){
            $sql = "UPDATE users SET username='$username', email='$email',gender='$gender',nationality='$nationality',comment='comment' WHERE user_id=$id";
            //execute or run the query
            $result = $this->conn->query($sql);
            if($result){
                return true;
            }else{
                echo "Error:".$this->conn->error;
            }
        }
        public function delete($id){
            $sql = "DELETE FROM users WHERE user_id=$id";
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