<?php
	function koneksi_db() {
		$server="127.0.0.1";
		$username="root";
		$password="";
		$database="puslitbang";
		
		//koneksi
		$link=mysqli_connect($server,$username,$password,$database);
		if (!$link) {
			die('Could not connect : '. mysqli_error());
		}
	return $link;
	}
?>