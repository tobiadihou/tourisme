<?php

namespace App\Controllers;
use App\Models\ReservationModel;
use \Core\View;


/**
 * send to reservation in the database
 * envoie des reservation dans la base des donné
 * @return void
 */
class ReservationControllers {
    public $id;
    public $guests;
    public $debut;
    public $fin;
    public $model;

    public function validationReservation() {
        if($this->emptyInput()=== "succes") {
          $controllers = new  ReservationModel;
          $controllers->insertReservation($this->id, $this->guests, $this->debut, $this->fin);
          header("Location:/");
          exit();
        }else{
            return "reservation non enregistrer";
        }
  }

  //verify input to reservation page forms
    public function emptyInput(){
        if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["submit"])) {
      
            $this->id = $_POST["id"];
            $this->guests = $_POST["guests"];
            $this->debut = $_POST["dateStart"];
            $this->fin = $_POST["dateEnd"];
            if(empty($this->guests) || empty($this->debut) || empty($this->fin)){
                echo "tous les chant ne sont pas remplir";
                exit;
              }else{
                  return  "succes";
              }
              return false;
            }
    }

    
    // Affichage de toutes les réservations enregistrées

    public function showReservation() {
      $controllers = new ReservationModel();
      $resultatReservation= $controllers->showReservation();
      $tabCount = $controllers->countReservation();
      $nbrReservation = $tabCount["countR"]; 
      require_once('../App/Views/Admin/reservation.php');
  }



  // Affichage de toutes les réservations enregistrées par l'utilisateur

  public function afficheReservation() {
      session_start();
      $controllers = new ReservationModel();
      $userID = $_SESSION["users_id"];
      
      $resultatReservation = $controllers->afficheReservation($userID);
      $tabCount = $controllers->countReservationUser($userID);
      $nbrReservation = $tabCount["countR"]; 
      require_once('../App/Views/Users/afficheReservation.php');
  }
  

}
