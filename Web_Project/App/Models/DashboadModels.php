<?php 

    namespace App\Models;

    use App\Models\ConnexionsModels;

    class DashboadModels extends ConnexionsModels{
        public function countUser(){
            $conn = $this -> connect();
            $count = $conn->prepare("SELECT count(*) countUser FROM users");
            $count->execute();
            $stmt = $count->fetchAll();
            return $stmt;
        }
        public function User(){
            $conn = $this -> connect();
            $count = $conn->prepare("SELECT * FROM `users`");
            $count->execute();
            $stmt = $count->fetchAll();
            return $stmt;
        }

        
        
        public function role(){
            $conn = $this->connect();

            $role = $conn ->prepare("UPDATE `user` SET  users_role = :users_role WHERE id =Users_id");
            $role -> execute();
            $stmt = $role ->fetch();
            return $stmt; 
        }

        //insertion des  article  similaire de la page blog

        public function insertArticleHomePageE(){

            $conn = $this->connect();

            $select_home_article = $conn->prepare("SELECT * FROM `article` LIMIT ");

            $select_home_article->execute();

            $stmt=$select_home_article->fetchAll();
                
            return $stmt;
        }

}
        
   