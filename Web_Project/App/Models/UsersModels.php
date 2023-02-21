<?php 

namespace App\Models;

    

    class UsersModels extends ConnexionsModels{
      
    /**
     * $conn
     */
        public $fname;
        public $lname;
        public $conn;
        public $username;
        public $email;
        public $password;
        public $phoneNumber;
        public $emailConnexion;
        public $sessionPhoneNumber;
        public $sessionName;
        public $sessionEmail;
        /**
         * verify()
         */
        public function verifyEmail($email) {
        /**
         * verify()
         */
    
            $this->email = $email;

            /**
             * 
             */
            $conn = $this->connect();
            /**
             * $sql
             */
            $sql = "SELECT * FROM `site_touristique`.users WHERE users_email = ?;";
            /**
             * $stmt
             */
            $stmt = $conn->prepare($sql);
            $stmt->execute([$this->email]);
            $result = $stmt->fetchAll();
            return $result;
        }

        public function verifyUsername($username) {
            /**
         * verify()
         */
        
            $this->username = $username;
    
            /**
             * connet bd
             */
            $conn = $this->connect();
            /**
             * $sql
             */
            $sql = "SELECT * FROM `site_touristique`.users WHERE users_username = ?;";
            /**
             * $stmt
             */
            $stmt = $conn->prepare($sql);
            $stmt->execute([$this->username]);
            $result = $stmt->fetchAll();
            return $result;
        }


        public function verifyPhoneNumber($phoneNumber) {
            /**
         * verify()
         */
        
            $this->phoneNumber = $phoneNumber;
    
            $conn = $this->connect();
            /**
             * $sql
             */
            $sql = "SELECT * FROM `site_touristique`.users WHERE users_contactNumber = ?;";
            /**
             * $stmt
             */
            $stmt = $conn->prepare($sql);
            $stmt->execute([$this->phoneNumber]);
            $result = $stmt->fetchAll();
            
            return $result;
        }
        
        public function vreifypassord($password) {
            $this->password = $password;
            $conn = $this->connect();
    
            $sql = "SELECT * FROM `site_touristique`.users WHERE users_password = ?;";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$this->password]);
            $result = $stmt->fetchAll();
            
            return $result;
        }
        
        public function verifyEmailConnexion($emailConnexion){

            $this->emailConnexion=$emailConnexion;

            $conn = $this->connect();

            $sql = "SELECT * FROM `site_touristique`.users WHERE users_email = ?;";
            /**
             * $stmt
             */
            $stmt = $conn->prepare($sql);
            $stmt->execute([$this->emailConnexion]);
            $result = $stmt->fetchAll();
        
            return  $result;
        }

        public function verifyEmailConn($emailConnexion){

            $this->emailConnexion=$emailConnexion;

            $conn = $this->connect();
            /**
             * $stmt
             */
            $sql="SELECT  FROM site_touristique.users where user_email='$this->email';";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $row=$stmt->fetch();
                
        }
        public static function getUser(){
            $conn = $this->connect();
            $user_email = $_SESSION ['user_email'];
            $select_profile = $conn->prepare("SELECT * FROM `user` WHERE email = ?");
            $select_profile->execute([$user_email]);
            if($select_profile->rowCount() > 0){
            $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
                return $fetch_profile;
            }
            return false;
        }

        /**
         * insertUser()
         */
        public function insertUser($fname,$lname,$username,$email,$phoneNumber,$password) {
    
            $conn = $this->connect();
            $this->fname = $fname;
            $this->lname = $lname;
            $this->username = $username;
            $this->email = $email;
            $this->phoneNumber=$phoneNumber;
            $this->password = $password;

            /**
             * $sql
             */
            try {
                //code...
                $sql = "INSERT INTO `site_touristique`.users (users_id, users_fname, users_lname, users_username, users_email, users_contactNumber, userspassword) VALUES (NULL,:fn, :ln, :un, :useremail, :contactNumber, :userpassword)";
                $stmt = $conn->prepare($sql);
            
                $stmt->execute([
                    ":fn" => $this->fname,
                    ":ln" => $this->lname,
                    ":un" => $this->username,
                    ":useremail" => $this->email,    
                    ":contactNumber" => $this->phoneNumber,
                    ":userpassword" => password_hash($this->password, PASSWORD_DEFAULT)
                    
                ]);

            } catch (\PDOException $e) {
                echo $e->getMessage();
                //throw $th;
                exit;
            }
        }

        /**
         * take the information  to uses in connect
         * recuperation des identifiant de l'utilisateur a la connexion
         * @return void
         */
        public function connexionUser(){
       
            $conn = $this->connect();
         
                $sql="SELECT  users_id, users_name, users_email, users_contactNumber FROM site_touristique.users ";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $row=$stmt->fetch();
               
        }  

     
} 
