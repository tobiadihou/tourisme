<?php 

    namespace App\Models;
    use App\Models\ConnexionsModels;

    /**
     * insert aarticle in database
     * class qui envoie les article dans la base de donner
     */
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
        //insertion du premier article de la page blog
        public function insertArticleHomePage(){

            $conn = $this->connect();

            $select_home_article = $conn->prepare("SELECT * FROM `article` LIMIT 1");

            $select_home_article->execute();

            $stmt=$select_home_article->fetchAll();
                
            return $stmt;
        }

}
        
   