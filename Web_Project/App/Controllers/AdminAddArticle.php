<?php

namespace App\Controllers;


use App\Models\ArticlesModels;
use Core\View;

class AdminAddArticle{
    
      public function emptyInputs() {
          if(empty($title) || empty($file) || empty($content)) {
            echo "Tous les champs ne sont pas renseignés";
       exit();

     } 
          return false;
      }

public function filleAction() {
  
  $imgArr = array();

  if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_FILES["file"])) {
   
    // Configure upload directory and allowed file types

      $upload_dir ='ressources\photos'.DIRECTORY_SEPARATOR;
      $allowed_types = array('jpg', 'png', 'jpeg', 'gif' , 'webp');     

    // Define maxsize for files i.e 2MB

      $maxsize = 2 * 1024 * 1024;
     
    // Checks if user sent an empty form

          if(!empty($_FILES['file']['name'])) { 
          //  files uploading 	

                $file_tmpname = $_FILES['file']['tmp_name'];
                $file_name = $_FILES['file']['name'];
                $file_size = $_FILES['file']['size'];
                $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
                // Set upload file path
                $filepath = $upload_dir.$file_name;

            
            // Check file type is allowed or not

                if(in_array(strtolower($file_ext), $allowed_types)) {
              // Verify file size - 2MB max

                    if ($file_size > $maxsize){		
                        echo "Error: File size is larger than the allowed limit 2MB.";           
                        exit();}
                        // If file with name already exist then append time in
                        // front of name of the file to avoid overwriting of file

                            if(file_exists($filepath)) {

                                $name_used = time().$file_name;
                                $filepath = $upload_dir.$name_used;

                                if( move_uploaded_file($file_tmpname, $filepath)) {

                                    $file_name = $name_used;
                                    array_push($imgArr, $file_name);
                                    echo "images Successfully uploaded";   

                                }else {

                                    echo "Error uploading images";
                                    exit();				
                                }
                            }else {

                              if(move_uploaded_file($file_tmpname, $filepath)) {
                                  array_push($imgArr, $file_name);
                                }
                                  else {					
                                    echo "Error uploading images";
                                    exit();				
                                }
                            }
                            }
                              else {
                              echo "images file type is not allowed";
                              exit();
                            }  
          
          }
            else {
              echo "No files selected";
              exit();
            }
        }
}

 /**
  * added article
  *methode de d'envoie dans la base de donné
  *@return void
  */
  public function addedArticle($title,$file,$content) {

    $this->filleAction();    
    $this->articleModel = new ArticlesModels();
    $this->articleModel->insertArticle( $title,  $_FILES['file']['name'], $content);
  }
}