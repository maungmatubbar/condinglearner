<?php

namespace App\classes;
use App\classes\Database;

class Tag extends Database{

    public function validation($data)
    {
        $name = $data['tag_name'];
        if (!preg_match("/^[a-zA-Z0-9\s]+$/",$name)) {
            die("<p style='color:red'>Tag name Only letters are allowed</p>");
          }
          return $data;
         
    }
    public function save_tag_info($data){
        $this->validation($data);
        $sql="INSERT INTO tag(tag_name,publication_status)VALUES('$data[tag_name]','$data[publication_status]')";
        if(mysqli_query(Database::dbConnection(),$sql)){
            $message = "Tag info save successfully.";
            return $message;
        }else{
            die('Query Problem').mysqli_error(Database::dbConnection());
        }
    }
    public function select_tag_info(){
        $sql = "SELECT * FROM tag WHERE deletion_status=1";
        if(mysqli_query(Database::dbConnection(),$sql)){
            $query_result = mysqli_query(Database::dbConnection(),$sql);
            return $query_result;
        }else{
            die('Query Problem').mysqli_error(Database::dbConnection());
        }
    }
    public function unpublished_tag_info_by_id($tag_id){
        $sql = "UPDATE tag SET publication_status = 0 WHERE tag_id = $tag_id";
        if(mysqli_query(Database::dbConnection(),$sql)){
            $message = "Tag info unpublished successfully.";
            return $message;
        }else{
            die("Query Problem".mysqli_error(Database::dbConnection()));
        }
    }
    public function published_tag_info_by_id($tag_id){
        $sql = "UPDATE tag SET publication_status = 1 WHERE tag_id = $tag_id";
        if(mysqli_query(Database::dbConnection(),$sql)){
            $message = "Tag info published successfully.";
            return $message;
        }else{
            die("Query Problem".mysqli_error(Database::dbConnection()));
        }
    }
    public function delete_tag_info_by_id($tag_id){
        $sql = "UPDATE tag SET deletion_status = 0 WHERE tag_id = $tag_id";
        if(mysqli_query(Database::dbConnection(),$sql)){
            $message = "Tag info delete successfully.";
            return $message;
        }else{
            die("Query Problem".mysqli_error(Database::dbConnection()));
        }
    }
    public function select_tag_info_by_id($tag_id){
        $sql = "SELECT * FROM tag WHERE tag_id = $tag_id";
        if(mysqli_query(Database::dbConnection(),$sql)){
            $query_result = mysqli_query(Database::dbConnection(),$sql);
            return $query_result;
        }else{
            die("Query Problem".mysqli_error(Database::dbConnection()));
        }
    }
    public function update_tag_info_by_id($data){
        $sql = "UPDATE tag SET tag_name = '$data[tag_name]',publication_status = '$data[publication_status]'  WHERE tag_id = '$data[tag_id]'";
        if(mysqli_query(Database::dbConnection(),$sql)){
           $message = 'Tag info update info successfully.';
           $_SESSION['message'] = $message;
           header('Location:manage_tag.php');
        }else{
            die("Query Problem".mysqli_error(Database::dbConnection()));
        }
    }



}