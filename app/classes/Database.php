<?php

namespace App\classes;
/**
* 
*/
class Database 
{
	
	protected function dbConnection(){
		$hostName = "localhost";
		$userName = "root";
		$password = "";
		$dbName="basicblog";
		$link = mysqli_connect($hostName,$userName,$password,$dbName);
		if(!$link){
			die("Connection Problem".mysqli_error($link));
		}

		return $link;
	}
}
