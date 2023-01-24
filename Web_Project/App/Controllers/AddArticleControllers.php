<?php

namespace App\Controllers;

// require "../App/Controllers/RegisterControllers.php";
use App\Models\ArticlesModels;


use \Core\View;
/**
 * Home controller
 * 
 * PHP version 5.4
 */
class AddArticleControllers extends \Core\Controller {
  /**
   * Show the index page
   * 
   * @return void
   */
  public function articleDb() {
    // echo "Hello from the index action in the Home controller";
    if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["submit"])) {

        $title = $_POST["title"];
        $file = $_FILES["file"];
        $content = $_POST["content"];
        $controller = new  AdminAddArticle();
        $controller->addedArticle($title,$file,$content); 
        
        }
    }
    
  public function linkDb() {

    if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["submit"])) {
      $NavLink = $_POST["navLin"];
      var_dump($NavLink);
      $pageLink = $_POST["pageLink"];
      $model = new ArticlesModels();
      $model->insertlink($NavLink,$model);
      // header("location:adminAjoutArticle.phtml");
  }
  }
}