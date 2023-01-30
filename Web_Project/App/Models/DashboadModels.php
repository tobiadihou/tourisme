<?php 

    namespace App\Models;

    use App\Models\ConnexionsModels;

    class DashboadModels extends ConnexionsModels{
        public $role;
        public $id;

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

        
        
        public function role($role, $id){
            $conn = $this->connect();

            $role = $conn ->prepare("UPDATE `users` SET  users_role = :role WHERE Users_id = :id ");
            
            $role -> execute([
                ":role" => $role,
                ":id" => $id,
            ]);
            $stmt = $role ->fetchAll();
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
        
   