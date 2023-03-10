<?php 

    namespace App\Models;

    use App\Models\ConnexionsModels;
    
    /**
     * verify email and pass word to connexion in database
     * verification des email et du mots de passe dans la base de donne
     */
    class UserConnexion extends ConnexionsModels{  
        /**
         * $conn
         */
        public $conn;
        public $username;
        public $email;
        public $password;
        public $phoneNumber;
        public $emailConnexion;
        /**
         * verify()
         */

        public function verifyEmailConnexion($emailConnexion) {

            $this->emailConnexion=$emailConnexion;

            $conn = $this->connect();

            $sql = "SELECT * FROM `site_touristique`.users WHERE users_email = ?;";
            /**
             * $stmt
             */
            $stmt = $conn->prepare($sql);
            $stmt->execute([$this->emailConnexion]);
            $result = $stmt->fetchAll();
            return $result;

        }

        public function verifyEmailConn($emailConnexion){

            $this->emailConnexion=$emailConnexion;

            $conn = $this->connect();
            /**
             * $stmt
             */

            $sql="SELECT users_id FROM site_touristique.users where users_email='$this->email';";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $row=$stmt->fetch();
                
        }

        public function selectAllUserData(){
    $sql = "SELECT * FROM tbl_users ORDER BY id DESC";
    $stmt = $this->db->pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ);
  }


  // User login Autho Method
  public function userLoginAutho($email, $password){
    $password = SHA1($password);
    $sql = "SELECT * FROM tbl_users WHERE email = :email and password = :password LIMIT 1";
    $stmt = $this->db->pdo->prepare($sql);
    $stmt->bindValue(':email', $email);
    $stmt->bindValue(':password', $password);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_OBJ);
  }
  // Check User Account Satatus
  public function CheckActiveUser($email){
    $sql = "SELECT * FROM tbl_users WHERE email = :email and isActive = :isActive LIMIT 1";
    $stmt = $this->db->pdo->prepare($sql);
    $stmt->bindValue(':email', $email);
    $stmt->bindValue(':isActive', 1);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_OBJ);
  }


    }
        
    

