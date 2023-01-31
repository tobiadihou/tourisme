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

    }
        
    

