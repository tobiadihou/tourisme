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
             * 
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
    
            /**
             * 
             * 
             */
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

        public function connexionUser(){
       
            $conn = $this->connect();
         
                $sql="SELECT  users_id, users_name, users_email, users_contactNumber FROM site_touristique.users ";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $row=$stmt->fetch();
                echo "<pre>";
                var_dump($row);
                echo "</pre>";
        }  


        public function user(){
            $conn = $this->connect();

            $sql = "SELECT * FROM user";
            $sql="SELECT count(*) countUser FROM user";
        }     
      
} 
