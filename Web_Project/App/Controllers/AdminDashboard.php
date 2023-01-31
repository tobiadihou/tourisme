<?php

namespace App\Controllers;

use \Core\View;
use \App\Models\DashboadModels;

/**
 * Home controller
 * 
 * PHP version 5.4
 */
class AdminDashboard extends \Core\Controller {
  
 
    public function dashboardAction() {

      View::render("Admin/Dashboard/adminDashboard.phtml");

    }

    /********end method sendAction******/
    public function addImage(){

      View::render("Admin/ContainerSite/adminAjoutImg.phtml");
    
    }
      /********end method sendAction******/
    
      public function addArticle(){
    
        View::render("Admin/ContainerSite/adminAjoutArticle.phtml");
    }
      public function modifRole(){
    
        View::render("Admin/ContainerSite/modifRole.phtml");
    }
    
    public function showUser(){
      $dashboadModels = new DashboadModels();
      $userCount = $dashboadModels -> countUser();
      $user = $dashboadModels -> User();
      require_once('../App/Views/Admin/Dashboard/adminDashboard.phtml');
  }

  //modification du role de l'utilisateur
    public function changeRole(){
      
      if( $_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["submit"])){
      $id = $_POST["id"];
      $role = $_POST["role"];
      $model = new  DashboadModels();
      $model ->role($id, $role);
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
