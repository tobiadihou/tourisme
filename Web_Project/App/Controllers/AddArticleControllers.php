<?php

namespace App\Controllers;

use App\Models\ArticlesModels;


use \Core\View;
/**
 * add article and link in database
 * ajout des articles,leur image dans la base de donné
 *  @return void
 */
class AddArticleControllers extends \Core\Controller {
  
  // send article in data base
  public function articleDb() {

    if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["submit"])) {

        $title = $_POST["title"];
        $file = $_FILES["file"];
        $content = $_POST["content"];
        $controller = new  AdminAddArticle();
        $controller->addedArticle($title,$file,$content); 
        
        }
    }
    
    //send link in database
  public function linkDb() {

    if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["submit"])) {

      $NavLink = $_POST["navLin"];
      var_dump($NavLink);
      $pageLink = $_POST["pageLink"];
      $model = new ArticlesModels();
      $model->insertlink($NavLink,$model);

    }
  }
}