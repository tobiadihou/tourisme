<?php

namespace App\Controllers;

// require "../App/Controllers/RegisterControllers.php";
use App\Models\UsersModels;


use \Core\View;
/**
 * recever the input content
 * recuperation des information des input
 * @return void
 */
class RegisterControllers extends \Core\Controller {
  
  public function validationAction() {

      if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["submit"])) {
          $fname = $this->test_input( $_POST["fname"]);
          $lname = $this->test_input($_POST["lname"]);
          $username = $this->test_input($_POST["username"]);
          $email = $this->test_input($_POST["email"]);
          $contactNo = $this->test_input($_POST["contactNo"]);
          $password = $this->test_input($_POST["password"]);
          $confirm = $this->test_input($_POST["confirm"]);
        
          //validate input to validation controllers
          $controller = new ValidationControllers ($fname,$lname,$username, $email, $password, $confirm, $contactNo);
          
          $controller->verifyControl();
              header("location:/singIn");
      }
  }
  
  // we check whether the forms input
  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
}
