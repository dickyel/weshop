<?php
	$server = "localhost";
	$username = "root";
	$password = "";
	$database = "weshop1";
	
	$koneksi = mysqli_connect($server, $username, $password, $database) or die("koneksi ke database gagal");
	