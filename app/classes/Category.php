<?php
namespace App\classes;
use App\classes\Database;

class Category extends Database{
    public function validation($data)
    {
        $name=$data['category_name'];
        if (!preg_match("/^[a-zA-Z0-9\s]+$/",$name)) {
            die("<p style='color:red'>Category name Only letters are allowed</p>");
          }
          return $data;
         
    }
    public function save_category_info($data){
         $this->validation($data);
        $sql ="INSERT INTO category(category_name,category_description,publication_status) VALUES ('$data[category_name]','$data[category_description]','$data[publication_status]')";
        if(mysqli_query(Database::dbConnection(),$sql)){
            $message = "Save category info successfully.";
            return $message;
        }else{
            die('Query Problem'.mysqli_error(Database::dbConnection()));
        }

    }
    public function select_category_info(){
        $sql="SELECT * FROM category WHERE deletion_status = 1";
        if(mysqli_query(Database::dbConnection(),$sql)){
            $query_result = mysqli_query(Database::dbConnection(),$sql);
            return $query_result;
        }else{
            die("Query Problem".mysqli_error(Database::dbConnection()));
        }
    }
    public function unpublished_category_info_by_id($category_id){
        $sql = "UPDATE category SET publication_status = 0 WHERE category_id = $category_id";
        if(mysqli_query(Database::dbConnection(),$sql)){
            $message = "Category info unpublished successfully.";
            return $message;
        }else{
            die("Query Problem".mysqli_error(Database::dbConnection()));
        }
    }
    public function published_category_info_by_id($category_id){
        $sql = "UPDATE category SET publication_status = 1 WHERE category_id = $category_id";
        if(mysqli_query(Database::dbConnection(),$sql)){
            $message = "Category info published successfully.";
            return $message;
        }else{
            die("Query Problem".mysqli_error(Database::dbConnection()));
        }
    }
    public function delete_category_info_by_id($category_id){
        $sql = "UPDATE category SET deletion_status = 0 WHERE category_id = $category_id";
        if(mysqli_query(Database::dbConnection(),$sql)){
            $message = "Category info delete successfully.";
            return $message;
        }else{
            die("Query Problem".mysqli_error(Database::dbConnection()));
        }
    }
    public function select_category_info_by_id($category_id){
        $sql = "SELECT * FROM category WHERE category_id=$category_id";
        if(mysqli_query(Database::dbConnection(),$sql)){
          $query_result = mysqli_query(Database::dbConnection(),$sql);
          return $query_result;
            
        }else{
            die("Query Problem".mysqli_error(Database::dbConnection()));
        }
    
    }
    public function update_category_info_by_id($data){
        $sql = "UPDATE category SET category_name = '$data[category_name]',category_description= '$data[category_description]',publication_status = '$data[publication_status]' WHERE category_id = '$data[category_id]'";
        if(mysqli_query(Database::dbConnection(),$sql)){
             $message = "Category info update successfully";
             $_SESSION['message'] = $message;
             header('Location:manage_category.php');
          }else{
              die("Query Problem".mysqli_error(Database::dbConnection()));
          }
    }
}