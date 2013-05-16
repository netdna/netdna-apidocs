<?php

require_once('NetDNA.php');

$api = new NetDNA("alias","consumer_key","consumer_secret");

echo "Edit source code, uncomment the functions you want to see examples of.";

//Live Zone API examples:
//listLiveZones();
//createLiveZone();
//getLiveZonesCount();
//getLiveZone();
//updateLiveZone();
//deleteLiveZone();
//enableLiveZone();	//not functional
//disableLiveZone();	//not functional
//purgeCache();
	
/////////////////////LIVE ZONE API//////////////////////////


function listLiveZones(){
	echo "<h3>Get Live Zone List:</h3>";
	global $api;

	//Get account information from the API
	try {
		$response =  $api->get('/zones/live.json');
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
	$zones = $obj["data"]["livezones"];

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

function createLiveZone(){
	echo "<h3>Create new Live Zone</h3>";
	global $api;
	
	//use Post to create a new entry
	//required parameters: name, password
	try {
		$response =  $api->post('/zones/live.json', array("name"=>"newLiveZone2","password"=>"password"));
	} catch(CurlException $e) {
		print_r($e->getMessage());
		print_r($e->getHeaders());
	}
	
	//raw response can be viewed with:
	echo "Raw post response: <br />";
	echo $response."<br />";

	//for an easier time, decode the json file and access the part you want.
	//(consider automating this step in future api updates?)
	$obj = json_decode($response,true);
	$zone = $obj["data"]["livezone"];

	//Now you have access to any of the array keys listed in the API
	//keep in mind that the array is an array of arrays, since this is a list of all zones

	//To view a single key/value:
	echo "livezone['id'] value: <br />";
	echo $zone["id"]."<br />";

	//To view all values passed back by the API:
	echo "View all fields passed back by the API: <br /><br />";
	foreach ($zone as $k=>$v){
		echo $k." : ".$v."<br />";
	}

	echo "<hr>";
}

function getLiveZonesCount(){
	echo "<h3>Get Live Zones Count:</h3>";
	global $api;

	//Get account information from the API
	try {
		$response =  $api->get('/zones/live.json/count');
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

function getLiveZone(){
	echo "<h3>Get Specific Live zone:</h3>";
	global $api;

	//Get account information from the API
	//Must have zone ID to get specific LiveZone
	$id = '96194';
	try {
		$response =  $api->get('/zones/live.json/'.$id);
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
	$zone = $obj["data"]["livezone"];

	//Now you have access to any of the array keys listed in the API
	//keep in mind that the array is an array of arrays, since this is a list of all zones

	//To view a single key/value:
	echo "Zone ['id'] value: ";
	echo $zone["id"]."<br />";

	//To view all values passed back by the API:
	echo "View all fields passed back by the API: <br /><br />";
	foreach ($zone as $k=>$v){
		echo $k." : ".$v."<br />";
	}

	echo "<hr>";
}

function updateLiveZone(){
	echo "<h3>Update Specific Live Zone:</h3>";
	global $api;

	//use Post to create a new entry
	//for updating, all parameters are optional
	$id = '96194';
	try {
		//fill array with any key, value pair in the API
		$response =  $api->put('/zones/live.json/'.$id, array("label"=>"Some other description"));
	} catch(CurlException $e) {
		print_r($e->getMessage());
		print_r($e->getHeaders());
	}
	
	//raw response can be viewed with:
	echo "Raw post response: <br />";
	echo $response."<br />";

	//for an easier time, decode the json file and access the part you want.
	//(consider automating this step in future api updates?)
	$obj = json_decode($response,true);
	$zone = $obj["data"]["livezone"];

	//Now you have access to any of the array keys listed in the API
	//keep in mind that the array is an array of arrays, since this is a list of all zones

	//To view a single key/value:
	echo "Zone ['id'] value: <br />";
	echo $zone["id"]."<br />";

	//To view all values passed back by the API:
	echo "View all fields passed back by the API: <br /><br />";
	foreach ($zone as $k=>$v){
		echo $k." : ".$v."<br />";
	}

	echo "<hr>";
}

function deleteLiveZone(){
echo "<h3>Delete Specific Live Zone:</h3>";
	global $api;

	//use Post to create a new entry
	//for updating, all parameters are optional
	$id = '96194';
	
	//no response from this, just good old fashion killing.
	try {
		$api->delete('/zones/live.json/'.$id);
		echo $id." has been deleted. <br />";
	} catch(CurlException $e) {
		print_r($e->getMessage());
		print_r($e->getHeaders());
	}
}

function enableLiveZone(){
echo "<h3>Enable a Live zone:</h3>";
	global $api;

	//use Post to create a new entry
	//for updating, all parameters are optional
	$id = '96061';
	
	//no response from this, just good old fashion killing.
	try {
		$api->enable('/zones/live.json/'.$id);
		echo $id." has been enabled. <br />";
	} catch(CurlException $e) {
		print_r($e->getMessage());
		print_r($e->getHeaders());
	}
}

function disableLiveZone(){
echo "<h3>Disable a Live zone:</h3>";
	global $api;

	//use Post to create a new entry
	//for updating, all parameters are optional
	$id = '96061';
	
	//no response from this, just good old fashion killing.
	try {
		$api->disable('/zones/live.json/'.$id);
		echo $id." has been disabled. <br />";
	} catch(CurlException $e) {
		print_r($e->getMessage());
		print_r($e->getHeaders());
	}
}

function purgeCache(){
echo "<h3>Purge Specific Live Zone:</h3>";
	global $api;

	//use Post to create a new entry
	//for updating, all parameters are optional
	$id = '96194';
	//you can list specific files to purge with an array of parameters
	$params = array("file"=>"/robots.txt");
	//no response from this, just good old fashion killing.
	try {
		$api->delete('/zones/live.json/'.$id.'/cache',$params);
		echo $id." has been purged. <br />";
	} catch(CurlException $e) {
		print_r($e->getMessage());
		print_r($e->getHeaders());
	}
}
