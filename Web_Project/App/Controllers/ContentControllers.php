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


    /**
     * send image to page food the image
     * methode d'envoie des image sur la page food 
     * @return array
     */
    public function imagePageFood() {

        $imageModel = new ImagesModels();
        $result  = $imageModel->insertImageFoodPage();
        return $result;

    }

    /**
     * send image to page galerie the image
     * methode d'envoie des image sur la page gallerie 
     * @return array
     */
    public function imagePageGallerie() {

        $imageModel = new ImagesModels();
        $result = $imageModel->insertImageGalleriePage();
        return $result;

    }

 
}

