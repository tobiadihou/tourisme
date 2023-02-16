<?php

namespace App\Controllers;

use App\Models\UsersModels;



class ValidationControllers  {
/**
 * validate input to register
 * verification et validation des champs
 * @return void
 */
   public $usermodel;
   public $fname;
   public $lname;
   public $username;
   public $email;
   public $password;
   public $confirm_password;
   public $contactNo;

   public function __construct($fname,$lname,$username, $email, $password,$confirm_password, $contactNo) {
      $this->fname = $fname;
      $this->lname = $lname;
      $this->username = $this->sanitaze($username);
      $this->email = $email;
      $this->password = $password;
      $this->confirm_password = $confirm_password;
      $this->contactNo=$contactNo;
      $this->usermodel = new UsersModels();

      }
   
   public function sanitaze($data) {
      $reg = preg_replace("/\s+/", " ", $data);
      $reg = preg_replace("/^\s*/", "", $reg);
      $data = $reg;
      return $data;

   }
   
   
   public function verifyControl() {
      
    $this->usermodel = new UsersModels();
    $resultFetchEmail = $this->usermodel->verifyEmail($this->email);
    $resultFetchUsername = $this->usermodel->verifyUsername($this->username);
    $resultFetchPhoneNumber = $this->usermodel->verifyPhoneNumber($this->contactNo);
     $countEmail = count($resultFetchEmail);
     $countUsername = count($resultFetchUsername);
     $countPhoneNumber = count( $resultFetchPhoneNumber);
     $count = $countEmail + $countUsername + $countPhoneNumber;
  
     if($count>0) {
      
        if($countEmail>0){
            echo "Votre addresse mail existe déja";
            exit();

         }else if($countUsername>0){
            echo "Votre nom d'utilisateur existe déja";
            exit();

         }else if( $countPhoneNumber>0){
            echo 'Votre numéro de téléphone existe déja';
            exit();

         } 
      } 
      else {
          $this->emptyInputs();
          $this->verifyPassword();
          $this->verifyEmail();
          $this->usermodel->insertUser( $this->fname, $this->lname ,$this->username, $this->email, $this->contactNo, $this->password );
      }
}

   public function emptyInputs() {
 
      if(empty($this->fname) ||
         empty($this->lname) ||
         empty($this->username) ||
         empty($this->email) ||
         empty($this->password) ||
         empty($this->confirm_password) || 
         empty($this->contactNo)

      ){

            echo "Tous les champs ne sont pas renseignés";
            exit(); 
         } 

      return false;
   }

   public function verifyPassword() {
      if ($this->password !== $this->confirm_password) {
        echo "Les mots de passe ne sont pas identiques";
     } 
     return false;
   }

   public function verifyEmail() {

      if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
           echo "Votre addresse mail n'est pas valid";
           exit();  
      }
      
      return false;      
   }
}

