<?php

namespace App\Controllers;

use \Core\View;



class UsersControllers extends \Core\Controller {
  public $controller;
  
 /**
   * Show the index page
   * 
   * @return void
   */

  public function indexAction() {
   
   
    View::render("User/Home/index.phtml");
    
  }

 /**
   * Show the blog page
   * 
   * @return void
   */

  public function blogAction() {
   
   
    View::render("User/blog/blog.phtml");
    
  }

 /**
   * Show the register page
   * 
   * @return void
   */

  public function registerAction() {
   
   
    View::render("User/register/register.phtml");
  }

 /**
   * Show the register signIn page
   * 
   * @return void
   */

  public function connetAction() {

   
   
   
    View::render("User/register/singIn.phtml");

  }

  public function deconnetAction() {
   
   
    View::render("User/register/deconnexion.phtml");

  }

 /**
   * Show the contact page
   * 
   * @return void
   */

  public function contactAction() {
   
   
    View::render("User/contact/contact.phtml");
    
  }

 /**
   * Show the gites page
   * 
   * @return void
   */

  public function gitesAction() {
   
   
    // echo "Hello from the index action in the Home controller";
    View::render("User/gites/gites.phtml");
  }

 /**
   * Show the activites page
   * 
   * @return void
   */

  public function activiteAction() {
   
   

    // echo "Hello from the index action in the Home controller";

    View::render("User/activité/activites.phtml");
  }

 /**
   * Show the reservation page
   * 
   * @return void
   */

  public function reservationAction() {
    // echo "Hello from the index action in the Home controller";
    View::render("User/reservation/reservation.phtml");
  }
  public function afficheReservationAction() {
    echo "Hello from the index action in the Home controller";
    View::render("User/reservation/afficheReservation.phtml");
  }
  public function notificationAction() {
    // echo "Hello from the index action in the Home controller";
    View::render("User/reservation/notification.phtml");
  }

  public function profilAction() {

    View::render("user/Profil/profil.phtml");
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
