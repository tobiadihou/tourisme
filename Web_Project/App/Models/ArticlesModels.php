<?php 

    namespace App\Models;

    use App\Models\ConnexionsModels;

    class ArticlesModels extends ConnexionsModels{
       

        public function insertArticle($title,$file,$content) {
           
            $conn = $this->connect();
            /**
             * $sql
             */
            $sql = "INSERT INTO site_touristique.article(article_title,article_img,article_content)VALUES(:t,:i,:c)";
            /**
             * $stmt
             */
            $stmt = $conn->prepare($sql);

                try {
                    //code...
                    $stmt->execute(
                        [
                            ':t' =>$title,
                            ':i' => $file,
                            ':c' =>$content
                        ]);
                        var_dump($file);
                    echo "article Added Successfully";
                    exit();
                } catch(PDOException $e){
                    echo "Some Internal Error Occured";
                }
                        
        }
        
        public function insertArticleHomePage(){

            $conn = $this->connect();

            $select_home_article = $conn->prepare("SELECT * FROM `article` LIMIT 1,4");

            $select_home_article->execute();

            $stmt=$select_home_article->fetchAll();
                
            return $stmt;
        }
        public function insertArticleHomePageE(){

            $conn = $this->connect();

            $select_home_article = $conn->prepare("SELECT * FROM `article` LIMIT 1");

            $select_home_article->execute();

            $stmt=$select_home_article->fetchAll();
                
            return $stmt;
        }


}
        
   