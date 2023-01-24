<?php

namespace App\Controllers;

// require "../App/Controllers/RegisterControllers.php";
use App\Models\ReservationModel;


use \Core\View;

class ReservationControllers {
    public $id;
    public $guests;
    public $debut;
    public $fin;

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

}
