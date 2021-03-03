<?php 
namespace App\classes;
use App\classes\Database;

class Application extends Database{

    public function select_all_published_categories(){
        $sql = "SELECT * FROM category WHERE publication_status = 1";
        if(mysqli_query(Database::dbConnection(),$sql)){
            $query_result = mysqli_query(Database::dbConnection(),$sql);
            return $query_result;
        }else {
            die('Query Problem'.mysqli_error(Database::dbConnection()));
        }
    }
    public function select_new_published_post_info(){
        $sql = "SELECT p.post_id,p.post_title,p.post_description,p.post_image,p.post_date,c.category_id,t.tag_id,tag_name,u.name FROM post as p,category as c,tag as t,users as u WHERE p.publication_status = 1 AND p.deletion_status = 1 AND p.category_id = c.category_id AND p.tag_id = t.tag_id AND p.admin_id = u.id ORDER BY p.post_id DESC LIMIT 0,8";
        if(mysqli_query(Database::dbConnection(),$sql)){
            $query_result = mysqli_query(Database::dbConnection(),$sql);
            return $query_result;
        }else {
            die('Query Problem'.mysqli_error(Database::dbConnection()));
        }
    }
    //recent post info
    public function select_recent_post_info(){
        $sql = "SELECT post_id,post_title,category_id FROM post WHERE publication_status = 1 AND deletion_status = 1 ORDER BY post_id DESC LIMIT 0,4";
        if(mysqli_query(Database::dbConnection(),$sql)){
            $query_result = mysqli_query(Database::dbConnection(),$sql);
            return $query_result;
        }else {
            die('Query Problem'.mysqli_error(Database::dbConnection()));
        }
    }
    //tag info
    public function select_all_published_tag(){
        $sql ="SELECT tag_id,tag_name FROM tag WHERE publication_status = 1 and deletion_status = 1 ";
        if(mysqli_query(Database::dbConnection(),$sql)){
            $query_result = mysqli_query(Database::dbConnection(),$sql);
            return $query_result;
        }else {
            die('Query Problem'.mysqli_error(Database::dbConnection()));
        }
    }
    // Home Content

    //sigle post
    public function select_post_info_by_id($post_id){
        $sql ="SELECT post_title,post_description,post_date FROM post WHERE post_id = $post_id";
        if(mysqli_query(Database::dbConnection(),$sql)){
            $query_result = mysqli_query(Database::dbConnection(),$sql);
            return $query_result;
        }else {
            die('Query Problem'.mysqli_error(Database::dbConnection()));
        }
    }
    public function select_post_title_by_category_id($category_id){
        $sql ="SELECT post_id ,post_title FROM post WHERE publication_status=1 AND category_id = $category_id ORDER BY post_id ASC";
        if(mysqli_query(Database::dbConnection(),$sql)){
            $query_result = mysqli_query(Database::dbConnection(),$sql);
            return $query_result;
        }else {
            die('Query Problem'.mysqli_error(Database::dbConnection()));
        } 
    }
    //category
   public function select_post_info_by_category_id($category_id){
        $sql ="SELECT p.post_id,p.post_title,p.post_description,p.post_image,p.post_date,u.name FROM post as p,users as u WHERE p.admin_id = u.id AND category_id = $category_id";
        if(mysqli_query(Database::dbConnection(),$sql)){
            $query_result = mysqli_query(Database::dbConnection(),$sql);
            return $query_result;
        }else {
            die('Query Problem'.mysqli_error(Database::dbConnection()));
        } 
   }
   //contact
   public function send_message($data){
        $to = 'maungmatubbar@gmail.com';
        $subject = 'Conding Learner';
        $message = $data['message'];
        $headers= array(
            'From'=>$data['guest_email'],
            'X-Mailer' => 'PHP/' . phpversion()
        );
        $send = mail($to, $subject, $message, $headers);
        if($send==true){
            $message = 'Send Successfully.';
        }else{
            $message = 'Failed';
        }
        return $message;
   }
}
