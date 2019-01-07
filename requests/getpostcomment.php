<?php
require_once(__DIR__ .'/../includes/autoload.php');
if(isset($_SESSION['token_id']) == false) {
    return false;
}

if(!empty($_POST['postid'])) {
	if($user['username']) {
		$feed = new feed();
		$feed->db = $db;
		$feed->url = $CONF['url'];
		$feed->user = $user;
		$feed->id = $user['idu'];
		$feed->username = $user['username'];
		$feed->per_page = $settings['perpage'];
		$feed->censor = $settings['censor'];
		$feed->smiles = $settings['smiles'];
		$feed->c_per_page = $settings['cperpage'];
		$feed->c_start = 0;
		$feed->time = $settings['time'];
		$feed->plugins = loadPlugins($db);
		
		
		
		$getFeed = $feed->getFeedSide($_POST['postid']);
		echo $getFeed[0];
	}
}

mysqli_close($db);