<?php

namespace App\Controllers;

require "../App/Controllers/RegisterControllers.php";

use \Core\View;



class SingInControllers extends \Core\Controller {
  /**
   * connet user befort register
   * 
   * @return void
   * 
   */
    public function connexionAction() {
        if( $_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["login"])) {
            $email = $_POST["email"];
            $password = $_POST["password"];
            $controller = new LoginControllers ( $email, $password);
            $controller->verifyControl();
            // echo "Connexion réussi";
        }   
    }

    

    /**
   * Before filter
   * 
   * @return void
   */
  protected function before() {
    // echo "(before)";
  }

  /**
   * After filter
   * 
   * @return void
   */
  protected function after() {
    // echo "(after)";
  }
}
