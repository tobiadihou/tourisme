<?php

namespace App\Controllers;

use \Core\View;

/**
 * Home controller
 * 
 * PHP version 5.4
 */
class AdminDashboard extends \Core\Controller {
  
  public function dashboardAction() {

    View::render("Admin/Dashboard/adminDashboard.phtml");
    // echo "<p>Query string parameters: <pre>" . 

  }

  /********end method sendAction******/
  public function addImage(){

    View::render("Admin/ContainerSite/adminAjoutImg.phtml");
  
  }
    /********end method sendAction******/
  
    public function addArticle(){
  
      View::render("Admin/ContainerSite/adminAjoutArticle.phtml");
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
