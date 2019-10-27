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
                if($row['user_type'] == 'admin'){
                    echo "<script>window.location.replace('admin/index.php');</script>";
                }elseif($row['user_type'] == 'user'){
                    echo "<script>window.location.replace('user/index.php');</script>";
            }else{
                echo "Error.";
            }
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
            $sql ="SELECT * FROM users WHERE user_id='$id'";
            //execute or run the query
            $result = $this->conn->query($sql);
            
            if($result){
                return $result->fetch_assoc();
            }elseif($this->conn->error){
                echo "Error:".$this->conn->error;
            }
        }

       
        public function save($username,$email,$password,$user_type){

            $new_password = md5($password);
            $sql = "INSERT INTO users(username, email, password,user_type)
                    VALUES('$username','$email','$new_password','$user_type')";
            //execute or run the query
            $result = $this->conn->query($sql);

            if($result){
                return true;
            }else{
                echo "Error:" . $this->conn->error;
            }
         }
        

         public function update($id, $username, $email, $user_type){
            $sql = "UPDATE users SET username='$username', email='$email',
                    user_type='$user_type' WHERE user_id=$id";
            //execute or run the query
            $result = $this->conn->query($sql);
            if($result){
                return true;
            }else{
                echo "Error:".$this->conn->error;
            }
        }

        // public function updateProfle($username,$email,$nationality,$profile_image,$comment){
        //     $sql = "UPDATE users SET username='$username', email='$email', nationality='$nationality',
        //            profile_image='$profile_image', user_type='$user_type', comment='$comment' WHERE user_id='$id'";
        //     $result = $this->conn-<query($sql);
        //     if($result){
        //         return true;
        //     }else{
        //         echo "Error:".$this->conn->error;
        //     }
        // }
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
    public function login_required_admin()
    {
        if (!isset($_SESSION['login'])) {
            echo "<script>window.location.replace(admin.users.php)</script>";

        } else {
            $user_id = $_SESSION['user_id'];
            $sql = "SELECT * FROM login WHERE user_id = '$user_id'";
            $result = $this->conn->query($sql);
            if ($result->num_rows > 0) {

                $row = $result->fetch_assoc();

                if ($row['status'] == 'u') {
                    $this->redirect_js('javascript:history.go(-1)');
                }
            }

        }
    }   

    }

?>