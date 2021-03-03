<?php
namespace App\classes;
use App\classes\Database;
class Admin extends Database{
    public function select_all_admin_info(){
        $sql = "SELECT * FROM users WHERE deletion_status = 1";
        if(mysqli_query(Database::dbConnection(),$sql)){
            $query_result = mysqli_query(Database::dbConnection(),$sql);
            return $query_result;
        }
        else{
            die("Query Problem".mysqli_error(Database::dbConnection(),$sql));
        }
    }
}