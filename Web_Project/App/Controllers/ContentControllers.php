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

    public function homeArticleControllers() {

        $articleModel = new ArticlesModels();
        $article = $articleModel->insertArticleHomePage();

        require_once "../App/Views/User/blog/blog.phtml";
    //   return $article;

    }
    public function homeArticleControllersE() {

        $articleModel = new ArticlesModels();
        $result = $articleModel->insertArticleHomePageE();
        return $result;

    }
    public function imagePageFood() {

        $imageModel = new ImagesModels();
        $result  = $imageModel->insertImageFoodPage();
        return $result;

    }

    public function imagePageGallerie() {

        $imageModel = new ImagesModels();
        $result = $imageModel->insertImageGalleriePage();
        return $result;

    }

    public function takeUsere() {
   
     
    }

    // public function MatchUserNavBar(){

    //     $this->productsmodel=new UserModel();
    //     $result= $this->productsmodel->searchUserConnect();
    //     return $result;
    
    //   }

}

