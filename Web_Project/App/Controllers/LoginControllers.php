<?php

namespace App\Controllers;
use App\Models\UserConnexion;
use App\Models\UsersModels;


class LoginControllers  {
/**
 * $usermodel
 */
    public $usermodel;
    public $email;
    public $password;
    public $usermodell;

/**
 * connect user for your session
 * connexion de user ou admin et creation d'une session
 * @return void
 */
    public function __construct($email, $password) {

        $this->email = $email;
        $this->password = $password;
        $this->usermodel = new UserConnexion();
        $this->usermodell ;

    }

    //verifie methode
    public function verifyControl() {

        $resultFetchEmail = $this->usermodel->verifyEmailConnexion($this->email);
        $countEmail = count($resultFetchEmail);  

        if($countEmail>0) {
              $pwd = password_verify($this->password, $resultFetchEmail[0]["userspassword"]);
              if($pwd === true && $resultFetchEmail[0]["user_role"] === "admin") {
                $adminId=$resultFetchEmail[0]["user_id"];
                $_SESSION["admin"]=$adminId;
                  $_SESSION["name"]=$resultFetchEmail[0]["users_username"];
                  $_SESSION["fname"]=$resultFetchEmail[0]["users_fname"] ;
                  $_SESSION["lname"]=$resultFetchEmail[0]["users_lname"];
                  $_SESSION["email"]=$resultFetchEmail[0]["users_email"];
                  $_SESSION["phone"]=$resultFetchEmail[0]["users_contactNumber"];
                  header("Location:/dashboard");
                  exit();
              } elseif($pwd === true && $resultFetchEmail[0]["user_role"] !== "admin") {

                    $this->usermodel->verifyEmailConn($this->email);
                    $userid=$resultFetchEmail[0]["users_id"];
                    //profil for user
                  $_SESSION["user"]=$userid;
                  $_SESSION["name"]=$resultFetchEmail[0]["users_username"];
                  $_SESSION["fname"]=$resultFetchEmail[0]["users_fname"] ;
                  $_SESSION["lname"]=$resultFetchEmail[0]["users_lname"];
                  $_SESSION["email"]=$resultFetchEmail[0]["users_email"];
                  $_SESSION["phone"]=$resultFetchEmail[0]["users_contactNumber"];
                
              header("Location:/");
              exit;
              }else {
                echo "Mot de passe incorrect";
              exit();
          }
        }else {
          echo "Address non existant";
          exit();
        }
    }

    public function emptyInputs() {
        if(empty($this->email) || empty($this->password)){
          echo "Tous les champs ne sont pas renseignés";
        exit();

        } 
        return false;
        
    }

    public function verifyEmail() {
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
          echo "Votre addresse mail n'est pas valid";
            exit();   }
        return false;      
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

