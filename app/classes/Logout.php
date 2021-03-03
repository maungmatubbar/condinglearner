<?php 
namespace App\classes;

class Logout{
    public function adminLogout(){
		unset($_SESSION['id']);
        unset($_SESSION['name']);
		header('Location:index.php');
	}
}