<?php

require_once('NetDNA.php');

$api = new NetDNA("alias","consumer_key","consumer_secret");

echo "Edit source code, uncomment the functions you want to see examples of.";

//ZONE API EXAMPLES:
//listZones();
//getZoneSummary();
//getZoneCount();

//Zone SSL API examples: (all untested)
//getZoneSSL();
//installSSL();
//updateZoneSSL();
//removeZoneSSL();

//Zone Upstream API examples: (all untested)
//getUpstreamForZone();
//enableUpstreamOnZone();
//updateUpstreamOnZone();
//removeUpstreamFromZone();

//////////////ZONE API////////////////////

function listZones(){
	echo "<h3>Get Zone List:</h3>";
	global $api;

	//Get account information from the API
	try {
		$response =  $api->get('/zones.json');
	} catch(CurlException $e) {
		print_r($e->getMessage());
		print_r($e->getHeaders());
	}

	//raw response can be viewed with:
	echo "Raw get response: <br />";
	echo $response."<br />";

	//for an easier time, decode the json file and access the part you want.
	//(consider automating this step in future api updates?)
	$obj = json_decode($response,true);
	$zones = $obj["data"]["zones"];

	//Now you have access to any of the array keys listed in the API
	//keep in mind that the array is an array of arrays, since this is a list of all zones

	//To view a single key/value:
	echo "1st Zone ['id'] value: <br />";
	echo $zones[0]["id"]."<br />";

	//To view all values passed back by the API:
	echo "View all fields passed back by the API: <br /><br />";
	foreach ($zones as $i){
		echo "Zone ".$i['id']."<br />";
		foreach ($i as $k=>$v){
			echo $k." : ".$v."<br />";
		}
		echo "<br />";
	}

	echo "<hr>";
}

function getZoneSummary(){
	echo "<h3>Get Zone Summary:</h3>";
	global $api;

	//Get account information from the API
	try {
		$response =  $api->get('/zones.json/summary');
	} catch(CurlException $e) {
		print_r($e->getMessage());
		print_r($e->getHeaders());
	}

	//raw response can be viewed with:
	echo "Raw get response: <br />";
	echo $response."<br />";

	//for an easier time, decode the json file and access the part you want.
	//(consider automating this step in future api updates?)
	$obj = json_decode($response,true);
	$zoneSum = $obj["data"]["summary"];

	//Now you have access to any of the array keys listed in the API
	//keep in mind that the array is an array of arrays, since this is a list of all zones

	//To view all values passed back by the API:
	echo "View all fields passed back by the API: <br /><br />";

	foreach ($zoneSum as $k=>$v){
		echo $k." : ".$v."<br />";
	}
	echo "<br />";

	echo "<hr>";
}

function getZoneCount(){
	echo "<h3>Get Zone Summary:</h3>";
	global $api;

	//Get account information from the API
	try {
		$response =  $api->get('/zones.json/count');
	} catch(CurlException $e) {
		print_r($e->getMessage());
		print_r($e->getHeaders());
	}

	//raw response can be viewed with:
	echo "Raw get response: <br />";
	echo $response."<br />";

	//for an easier time, decode the json file and access the part you want.
	//(consider automating this step in future api updates?)
	$obj = json_decode($response,true);
	$zoneCount = $obj["data"]["count"];

	echo "Zone count: ".$zoneCount;
	
	echo "<br />";

	echo "<hr>";
}


////////////////Zone SSL API examples//////////////////

function getZoneSSL(){
	echo "<h3>Get Zone SSL:</h3>";
	global $api;

	//Must select zone type (pull, push, vod, live) and select id to match
	$id = '96061';
	$type = 'pull';
	//Get account information from the API
	try {
		$response =  $api->get('/zones/'.$type.'/'.$id.'/ssl.json');
	} catch(CurlException $e) {
		print_r($e->getMessage());
		print_r($e->getHeaders());
	}

	//raw response can be viewed with:
	echo "Raw get response: <br />";
	echo $response."<br />";

	//for an easier time, decode the json file and access the part you want.
	//(consider automating this step in future api updates?)
	$obj = json_decode($response,true);
	$zoneCount = $obj["data"]["ssl"];

	
}
function installSSL(){
	echo "<h3>Install Zone SSL:</h3>";
	global $api;

	//Must select zone type (pull, push, vod, live) and select id to match
	$id = '96061';
	$type = 'pull';
	//Required parameters: ssl_crt, ssl_key
	//ssl_crt should be filled in
	$ssl_crt = "";
	$params = array("ssl_crt"=>$ssl_crt,"ssl_key"=>"somesslkey");
	//Post account information from the API
	try {
		$response =  $api->post('/zones/'.$type.'/'.$id.'/ssl.json',$params);
	} catch(CurlException $e) {
		print_r($e->getMessage());
		print_r($e->getHeaders());
	}

	//raw response can be viewed with:
	echo "Raw get response: <br />";
	echo $response."<br />";

	//for an easier time, decode the json file and access the part you want.
	//(consider automating this step in future api updates?)
	$obj = json_decode($response,true);
	$zoneCount = $obj["data"]["ssl"];
}
function updateZoneSSL(){
	echo "<h3>Update Zone SSL:</h3>";
	global $api;

	//Must select zone type (pull, push, vod, live) and select id to match
	$id = '96061';
	$type = 'pull';
	//Required parameters: ssl_crt, ssl_key
	//ssl_crt should be filled in
	$ssl_crt = "";
	$params = array("ssl_crt"=>$ssl_crt,"ssl_key"=>"somesslkey");
	//Post account information from the API
	try {
		$response =  $api->put('/zones/'.$type.'/'.$id.'/ssl.json',$params);
	} catch(CurlException $e) {
		print_r($e->getMessage());
		print_r($e->getHeaders());
	}

	//raw response can be viewed with:
	echo "Raw get response: <br />";
	echo $response."<br />";

	//for an easier time, decode the json file and access the part you want.
	//(consider automating this step in future api updates?)
	$obj = json_decode($response,true);
	$zoneCount = $obj["data"]["ssl"];
}
function removeZoneSSL(){
	echo "<h3>Delete Zone SSL:</h3>";
	global $api;

	//Must select zone type (pull, push, vod, live) and select id to match
	$id = '96061';
	$type = 'pull';
	//Post account information from the API
	try {
		$response =  $api->post('/zones/'.$type.'/'.$id.'/ssl.json');
		echo "SSL for ".$id." deleted. <br />";
	} catch(CurlException $e) {
		print_r($e->getMessage());
		print_r($e->getHeaders());
	}
}

////////////////Zone Upstream API examples://////////////

function getUpstreamForZone(){
	echo "<h3>Get Zone Upstream:</h3>";
	global $api;

	//Must select zone type (pull, push, vod, live) and select id to match
	$type = 'pull';
	$id = '96061';
	//Post account information from the API
	try {
		$response =  $api->post('/zones/'.$type.'/'.$id.'/upstream.json');
	} catch(CurlException $e) {
		print_r($e->getMessage());
		print_r($e->getHeaders());
	}

	//raw response can be viewed with:
	echo "Raw get response: <br />";
	echo $response."<br />";

	//for an easier time, decode the json file and access the part you want.
	//(consider automating this step in future api updates?)
	$obj = json_decode($response,true);
	$zoneCount = $obj["data"]["upstream"];
}

function enableUpstreamOnZone(){
	echo "<h3>Enable Zone Upstream:</h3>";
	global $api;

	//Must select zone type (pull, push, vod, live) and select id to match
	$type = 'pull';
	$id = '96061';
	//set Params, required: server_url, port (also required according to error messages: server)
	$params = array("server_url"=>"http://cdn.bconklin.com","server"=>"http://cdn.bconklin.com","port"=>"80");
	//Post account information from the API
	try {
		$response =  $api->post('/zones/'.$type.'/'.$id.'/upstream.json');
	} catch(CurlException $e) {
		print_r($e->getMessage());
		print_r($e->getHeaders());
	}

	//raw response can be viewed with:
	echo "Raw get response: <br />";
	echo $response."<br />";

	//for an easier time, decode the json file and access the part you want.
	//(consider automating this step in future api updates?)
	$obj = json_decode($response,true);
	$zoneCount = $obj["data"]["upstream"];
}
function updateUpstreamOnZone(){
	echo "<h3>Update Zone Upstream:</h3>";
	global $api;

	//Must select zone type (pull, push, vod, live) and select id to match
	$type = 'pull';
	$id = '96061';
	//set Params, required: upstream_id, server_url, port
	$params = array("upsream_id"=>"93013","server_url"=>"http://bconklin.net","port"=>"80");
	//Post account information from the API
	try {
		$response =  $api->put('/zones/'.$type.'/'.$id.'/upstream.json');
	} catch(CurlException $e) {
		print_r($e->getMessage());
		print_r($e->getHeaders());
	}

	//raw response can be viewed with:
	echo "Raw get response: <br />";
	echo $response."<br />";

	//for an easier time, decode the json file and access the part you want.
	//(consider automating this step in future api updates?)
	$obj = json_decode($response,true);
	$zoneCount = $obj["data"]["upstream"];
}
function removeUpstreamFromZone(){
	echo "<h3>Remove Zone Upstream:</h3>";
	global $api;

	//Must select zone type (pull, push, vod, live) and select id to match
	$type = 'pull';
	$id = '96061';
	//Delete information from the API
	try {
		$response =  $api->delete('/zones/'.$type.'/'.$id.'/upstream.json');
		echo $type." zone ".$id." was deleted.<br />";
	} catch(CurlException $e) {
		print_r($e->getMessage());
		print_r($e->getHeaders());
	}
}