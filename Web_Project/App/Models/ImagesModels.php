<?php 

    namespace App\Models;

    use App\Models\ConnexionsModels;

    class ImagesModels extends ConnexionsModels{
        public $category;
        public $articleModel;
        public $imageModel;
        public $cid;
        public function insertImages($files) {
        
            $conn = $this->connect();
            /**
             * $sql
             */

            $sql = "INSERT INTO site_touristique.galleries(galleries_name,gallerie_figcation,galleries_img) 
            VALUES(:n,:info,:images)";
            /**
             * $stmt
             */

            $stmt = $conn->prepare($sql);

            try {
                //code...
                $stmt->execute(
                    [
                        ':n' => $_POST['images_titre'],
                        ':info' => $_POST['images_name'],
                        ':images' =>$files
                    ]);
                echo "Product Added Successfully";
                exit();
            } catch(PDOException $e){
                echo "Some Internal Error Occured";
            }
            
        }

        public function insertImageFoodPage(){

            $conn = $this->connect();

            $select_food_products = $conn->prepare("SELECT * FROM `galleries` LIMIT 8");

            $select_food_products->execute();

            $stmt=$select_food_products->fetchAll();

            return $stmt;

        }
        
        public function insertImageGalleriePage(){

            $conn = $this->connect();

            $select_galleries_products = $conn->prepare("SELECT * FROM `galleries` Orders LIMIT 8,37");

            $select_galleries_products->execute();

            $stmt=$select_galleries_products->fetchAll();

            return $stmt;
        }

}
        
   