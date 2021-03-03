<?php

namespace App\classes;

class Post extends Database {
    public function select_all_published_category(){
        $sql = "SELECT * FROM category WHERE publication_status = 1";
        if(mysqli_query(Database::dbConnection(),$sql)){
            $query_result = mysqli_query(Database::dbConnection(),$sql);
            return $query_result;
        }else{
            die("Query Proble".mysqli_error(Database::dbConnection(),$sql));
        }
    }
    public function select_all_published_tag(){
        $sql = "SELECT * FROM tag WHERE publication_status = 1";
        if(mysqli_query(Database::dbConnection(),$sql)){
            $query_result = mysqli_query(Database::dbConnection(),$sql);
            return $query_result;
        }else{
            die("Query Proble".mysqli_error(Database::dbConnection(),$sql));
        }
    }
    //Post Information start
    public function save_post_info($data){
        //echo '<pre>';
      //  print_r($data);
     //   exit();
        $directory = '../assets/post_images/';
		$file_size=$_FILES['post_image']['size'];
		$target_file = $directory.$_FILES['post_image']['name'];
		$file_type = pathinfo($target_file,PATHINFO_EXTENSION);
		$check = getimagesize($_FILES['post_image']['tmp_name']);
		if($check){
			if(file_exists($target_file)){
				die('this image already exists');
			}
			else
			{
				if($file_type!='jpg' && $file_type!='png'){
					die('Sorry the file type is not valid');
				}
				else
				{
					if($file_size>50000){
						die('your file size is too large.please use with in 5mb');
					}
					else
					{
						move_uploaded_file($_FILES['post_image']['tmp_name'],$target_file);
                        $sql = "INSERT INTO post(post_title,category_id,tag_id,post_description,post_image,admin_id,publication_status)VALUES('$data[post_title]','$data[category_id]','$data[tag_id]','$data[post_description]','$target_file','$data[admin_id]','$data[publication_status]')";
                        if(mysqli_query(Database::dbConnection(),$sql)){
                            $message = "Post info save successfully.";
                            return $message;
                        }else{
                            die("Query Problem".mysqli_error(Database::dbConnection(),$sql));
                        }
					}
				}

			}
		}
		else
		{
			die('Please select a valid image file.use jpg or png');
		}
    }
    public function select_all_post_info(){
        $sql = "SELECT p.post_id,p.post_title,p.publication_status,c.category_name,t.tag_name,u.name FROM post as p,category as c,tag as t,users as u WHERE p.category_id = c.category_id AND p.tag_id = t.tag_id AND p.admin_id = u.id AND p.deletion_status = 1";
        if(mysqli_query(Database::dbConnection(),$sql)){
            $query_result = mysqli_query(Database::dbConnection(),$sql);
            return $query_result;
        }else{
            die("Query Problem".mysqli_error(Database::dbConnection(),$sql));
        }
    }
    public function unpublished_post_info_by_id($post_id){
        $sql = "UPDATE post SET publication_status = 0 WHERE post_id = $post_id";
        if(mysqli_query(Database::dbConnection(),$sql)){
            $message="Unpubshiled post info successfully.";
            return $message;
        }else{
            die("Query Problem".mysqli_error(Database::dbConnection(),$sql));
        }
    }
    public function published_post_info_by_id($post_id){
        $sql ="UPDATE post SET publication_status = 1 WHERE post_id = $post_id";
        if(mysqli_query(Database::dbConnection(),$sql)){
            $message ="Pubshiled post info successfully.";
            return $message;
        }else{
            die("Query Problem".mysqli_error(Database::dbConnection(),$sql));
        }
    }
    public function delete_post_info_by_id($post_id){
        $sql ="UPDATE post SET deletion_status = 1 WHERE post_id = $post_id";
        if(mysqli_query(Database::dbConnection(),$sql)){
            $message ="Delete post info successfully.";
            return $message;
        }else{
            die("Query Problem".mysqli_error(Database::dbConnection(),$sql));
        }
    }
    public function selete_post_info_by_id($post_id){
        $sql = "SELECT p.*,c.category_name,t.tag_name,u.name FROM post as p,category as c,tag as t,users as u WHERE p.category_id = c.category_id AND p.tag_id = t.tag_id AND p.admin_id = u.id AND p.post_id = $post_id";
        if(mysqli_query(Database::dbConnection(),$sql)){
            $query_result = mysqli_query(Database::dbConnection(),$sql);
            return $query_result;
        }else{
            die("Query Problem".mysqli_error(Database::dbConnection(),$sql));
        }
    }
    public function update_post_info($data){
        $new_image = $_FILES['post_image']['name'];
        if($new_image){
            $directory = '../assets/post_images/';
            $file_size=$_FILES['post_image']['size'];
            $target_file = $directory.$_FILES['post_image']['name'];
            $file_type = pathinfo($target_file,PATHINFO_EXTENSION);
            $check = getimagesize($_FILES['post_image']['tmp_name']);
            if($check){
                if(file_exists($target_file)){
                    die('this image already exists');
                }
                else
                {
                    if($file_type!='jpg' && $file_type!='png'){
                        die('Sorry the file type is not valid');
                    }
                    else
                    {
                        if($file_size>50000){
                            die('your file size is too large.please use with in 5mb');
                        }
                        else
                        {
                            $old_image_sql = "SELECT post_image FROM post WHERE post_id = '$data[post_id]'";
                            $query_result = mysqli_query(Database::dbConnection(),$old_image_sql);
                            $old_image = mysqli_fetch_assoc($query_result);
                            unlink($old_image['post_image']);
                            move_uploaded_file($_FILES['post_image']['tmp_name'],$target_file);
                            $sql = "UPDATE post SET post_title = '$data[post_title]',category_id = '$data[category_id]',tag_id = '$data[tag_id]',post_description =  '$data[post_description]',post_image = '$target_file',publication_status = '$data[publication_status]' WHERE post_id = '$data[post_id]'";
                            if(mysqli_query(Database::dbConnection(),$sql)){
                                $_SESSION['message'] = "Post info update successfully.";
                                header('Location:manage_post.php');
                            }else{
                                die("Query Problem".mysqli_error(Database::dbConnection(),$sql));
                            }
                        }
                    }
    
                }
            }
            else
            {
                die('Please select a valid image file.use jpg or png');
            }
        }
        else{
            $sql = "UPDATE post SET post_title = '$data[post_title]',category_id = '$data[category_id]',tag_id = '$data[tag_id]',post_description =  '$data[post_description]',publication_status = '$data[publication_status]' WHERE post_id = '$data[post_id]'";
            if(mysqli_query(Database::dbConnection(),$sql)){
                $_SESSION['message'] = "Post info update successfully.";
                header('Location:manage_post.php');
            }else{
                die("Query Problem".mysqli_error(Database::dbConnection(),$sql));
            }
        }
    }
}
