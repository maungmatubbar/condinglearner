<?php
 
namespace App\classes;
use App\classes\Database;
/**
*  login Class
*/
class Login extends Database
{
	public function adminLoginCheck($data){
		$email = $data['email'];
		$password = md5($data['password']);
		$sql="SELECT * FROM users WHERE email = '$email' AND password = '$password'";
		if(mysqli_query(Database::dbConnection(),$sql)){
			$query_result = mysqli_query(Database::dbConnection(),$sql);
			$user = mysqli_fetch_assoc($query_result);
			if($user){
				session_start();
				$_SESSION['id'] = $user['id'];
				$_SESSION['name'] = $user['name'];
				header('Location: dashboard.php');
			}
			else
			{
				$message = "Please use valid email address & password";
				return $message;
			}

		}
		else
		{
			die("Query Problem".mysqli_error(Database::dbConnection()));
		}
	

	}
	
}

