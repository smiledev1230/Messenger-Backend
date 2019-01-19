<?php
	require "src/Facebook/autoload.php";
	session_start();
	$fb = new Facebook\Facebook([
	  'app_id'                => 'YOUR_FB_ID',
	  'app_secret'            => 'YOUR_FB_SECRET',
	  'default_graph_version' => 'v2.5',
	]);
	$siteurl    = 'http://yourdomain.com';
	$conn = mysqli_connect("YOURDBHOST", "YOURDBUSER", "YOURDBPASS" );
	mysqli_select_db($conn, "YOURDBNAME");
?>