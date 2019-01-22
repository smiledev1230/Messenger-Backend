<?php
error_reporting(0);
if($_SERVER['REQUEST_METHOD']=='GET'){
	$id  = $_GET['id'];
	require_once('db_config.php');
	$con = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE);
	$sql = "SELECT * FROM settings";
	$r = mysqli_query($con,$sql);
	$res = mysqli_fetch_array($r);
	$result = array();
	array_push($result,array(
		"bannerid"=>$res['bannerid_and'],
		"banneronoff"=>$res['banneron_and'],
		"interstitialonoff"=>$res['interstitialon_and'],
		"interstitialid"=>$res['interstitialid_and'],
		"nbottom"=>$res['app_navigation_and'],
		"slide"=>$res['slide_and']
		)
	);
	echo json_encode(array("result"=>$result));
	mysqli_close($con);
}