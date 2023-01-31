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

        public function reservation(){
            $sql = "SELECT date_arrive,	date_retour,users_id FROM `reservation` ";
            
            $conn = $this->connect();
            $reservation->execute();

            $stmt=$reservation->fetchAll();
                
        }
    }