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
            $email = $this->test_input($_POST["email"]);
            $password = $this->test_input($_POST["password"]);
            $controller = new LoginControllers ( $email, $password);
            $controller->verifyControl();
            // echo "Connexion réussi";
        }   
    }

    function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
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
