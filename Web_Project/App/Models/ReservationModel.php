<?php 

    namespace App\Models;

    use App\Models\ConnexionsModels;

    /**
     * send reservation in database
     * @return void
     */
    class ReservationModel extends ConnexionsModels{
        public $id;
        public $guest;
        public $debut;
        public $fin;

        public function insertReservation($id, $guest, $debut, $fin) {
            
            $this->id = $id;
            $this->guest = $guest;
            $this->debut = $debut;
            $this->fin = $fin;
            $conn = $this->connect();
            /**
             * $sql
             */

            $sql = "INSERT INTO site_touristique.reservation VALUES(NULL,:i,:g,:da,:dr)";
            /**
             * $stmt
             */

            $stmt = $conn->prepare($sql);

            try {
                //code...
                $stmt->execute(
                    [
                        ':i' => $this->id,
                        ':g' => $this->guest,
                        ':da' => $this->debut,
                        ':dr' =>$this->fin
                    ]);
            } catch(PDOException $e){
                echo "Some Internal Error Occured";
            }
            
        }

        // public function reservation(){
        //     $sql = "SELECT date_arrive,	date_retour,users_id FROM `reservation` ";
            
        //     $conn = $this->connect();
        //     $reservation->execute();

        //     $stmt=$reservation->fetchAll();
                
        // }
        // Afficher toutes les réservations faites par un utilisateur dans sa section

    public function afficheReservation($userID)
    {
        $userID = $this->id;
        $conn = $this->connect();
        $sql =  "SELECT * FROM site_touristique.reservation WHERE user_id = ? ";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$this->id]);
        return $stmt;
    }
    
    
    // Compteur des réservations pour d'un utilisateur
    
    public function countReservationUser($userID){
        $conn = $this->connect();
        $this->id = $userID;

        $sql ="SELECT count(*) countR FROM reservation WHERE userID = ?";   
        $stmt=$conn->prepare($sql);
        $stmt->execute([$this->id]);
        $tabCount = $stmt->fetch(PDO::FETCH_ASSOC);
        return $tabCount;
    }

      // Affichage de toutes les réservations dans la base

      public function showReservation(){
        $conn = $this->connect();
        $sql =  "SELECT
        users.lname,
        users.fname,
        users.email, 
        reservation.guest,
        reservation.date_arrive, 
        reservation.date_retour,   
         FROM user INNER JOIN 
         reservation ON users.users_id = reservation.users_id";

        $stmt = $conn->query($sql);
        return $stmt;
    }

    
    // Compteur des réservations niveau administrateur

    public function countReservation(){
        $conn = $this->connect();

        $sql ="SELECT count(*) countR FROM reservation";   
        $stmt=$conn->query($sql);
        $tabCount = $stmt->fetch(PDO::FETCH_ASSOC);
        return $tabCount;
    }
    }