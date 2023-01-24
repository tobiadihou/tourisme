<?php

namespace App\Controllers;

// require "../App/Controllers/RegisterControllers.php";
use App\Models\UsersModels;


use \Core\View;

class RegisterControllers extends \Core\Controller {
  
  public function validationAction() {

      if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["submit"])) {
          $fname = $_POST["fname"];
          $lname = $_POST["lname"];
          $username = $_POST["username"];
          $email = $_POST["email"];
          $contactNo = $_POST["contactNo"];
          $password = $_POST["password"];
          $confirm = $_POST["confirm"];
        
          $controller = new ValidationControllers ($fname,$lname,$username, $email, $password, $confirm, $contactNo);
          
          $controller->verifyControl();
              header("location:/singIn");
          echo "Inscription réussi";
      }
  }

}
