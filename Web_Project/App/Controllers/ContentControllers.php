<?php
 
namespace App\Controllers;

use App\Models\ArticlesModels;

use App\Models\ImagesModels;

class ContentControllers  {
/**
 * $usermodel
 */
    public $articleModel;
    public $imageModel;
    public $cid;

    /**
     * send image to page home the image
     * methode d'envoie des image sur la page home 
     * @return array
     */
    public function homeArticleControllers() {

        $articleModel = new ArticlesModels();
        $article = $articleModel->insertArticleHomePage();

        require_once "../App/Views/User/blog/blog.phtml";
   
    }


   
 
}

