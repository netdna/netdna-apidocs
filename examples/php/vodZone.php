<?php

require_once('NetDNA.php');

$api = new NetDNA("alias","consumer_key","consumer_secret");

echo "Edit source code, uncomment the functions you want to see examples of.";

//VOD Zone API examples:
//listVODZones();
//createVODZone();
//getVODZonesCount();
//getVODZone();
//updateVODZone();
//deleteVODZone();
//enableVODZone();	//not functional
//disableVODZone();	//not functional
//purgeCache();
	
//VOD Zone Custom Domains API examples:
//listVODCustomDomains();
//createVODCustomDomain();
//getVODCustomDomain();
//updateVODCustomDomain();
//deleteVODCustomDomain();


/////////////////////VOD ZONE API//////////////////////////


function listVODZones(){
	echo "<h3>Get VOD Zone List:</h3>";
	global $api;

	//Get account information from the API
	try {
		$response =  $api->get('/zones/vod.json');
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
	$zones = $obj["data"]["vodzones"];

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

function createVODZone(){
	echo "<h3>Create new VOD Zone</h3>";
	global $api;
	
	//use Post to create a new entry
	//required parameters: name, password
	try {
		$response =  $api->post('/zones/vod.json', array("name"=>"newVODZone","password"=>"password"));
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
	$zone = $obj["data"]["vodzone"];

	//Now you have access to any of the array keys listed in the API
	//keep in mind that the array is an array of arrays, since this is a list of all zones

	//To view a single key/value:
	echo "vodzone['id'] value: <br />";
	echo $zone["id"]."<br />";

	//To view all values passed back by the API:
	echo "View all fields passed back by the API: <br /><br />";
	foreach ($zone as $k=>$v){
		echo $k." : ".$v."<br />";
	}

	echo "<hr>";
}

function getVODZonesCount(){
	echo "<h3>Get VOD Zones Count:</h3>";
	global $api;

	//Get account information from the API
	try {
		$response =  $api->get('/zones/vod.json/count');
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

function getVODZone(){
	echo "<h3>Get Specific VOD zone:</h3>";
	global $api;

	//Get account information from the API
	//Must have zone ID to get specific VODZone
	$id = '96189';
	try {
		$response =  $api->get('/zones/vod.json/'.$id);
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
	$zone = $obj["data"]["vodzone"];

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

function updateVODZone(){
	echo "<h3>Update Specific VOD Zone:</h3>";
	global $api;

	//use Post to create a new entry
	//for updating, all parameters are optional
	$id = '96189';
	try {
		//fill array with any key, value pair in the API
		$response =  $api->put('/zones/vod.json/'.$id, array("label"=>"Some other description"));
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
	$zone = $obj["data"]["vodzone"];

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

function deleteVODZone(){
echo "<h3>Delete Specific VOD Zone:</h3>";
	global $api;

	//use Post to create a new entry
	//for updating, all parameters are optional
	$id = '96189';
	
	//no response from this, just good old fashion killing.
	try {
		$api->delete('/zones/vod.json/'.$id);
		echo $id." has been deleted. <br />";
	} catch(CurlException $e) {
		print_r($e->getMessage());
		print_r($e->getHeaders());
	}
}

function enableVODZone(){
echo "<h3>Enable a VOD zone:</h3>";
	global $api;

	//use Post to create a new entry
	//for updating, all parameters are optional
	$id = '96187';
	
	//no response from this, just good old fashion killing.
	try {
		$api->enable('/zones/vod.json/'.$id);
		echo $id." has been enabled. <br />";
	} catch(CurlException $e) {
		print_r($e->getMessage());
		print_r($e->getHeaders());
	}
}

function disableVODZone(){
echo "<h3>Disable a VOD zone:</h3>";
	global $api;

	//use Post to create a new entry
	//for updating, all parameters are optional
	$id = '96187';
	
	//no response from this, just good old fashion killing.
	try {
		$api->disable('/zones/vod.json/'.$id);
		echo $id." has been disabled. <br />";
	} catch(CurlException $e) {
		print_r($e->getMessage());
		print_r($e->getHeaders());
	}
}

function purgeCache(){
echo "<h3>Purge Specific VOD Zone:</h3>";
	global $api;

	//use Post to create a new entry
	//for updating, all parameters are optional
	$id = '96189';
	//you can list specific files to purge with an array of parameters
	$params = array("file"=>"/robots.txt");
	//no response from this, just good old fashion killing.
	try {
		$api->delete('/zones/vod.json/'.$id.'/cache',$params);
		echo $id." has been purged. <br />";
	} catch(CurlException $e) {
		print_r($e->getMessage());
		print_r($e->getHeaders());
	}
}

//////////////////VOD ZONE CUSTOM DOMAINS API/////////////////////

function listVODCustomDomains(){
	echo "<h3>Get VOD Zone List:</h3>";
	global $api;
	
	//$id required
	$id = '96187';

	//Get account information from the API
	try {
		$response =  $api->get('/zones/vod/'.$id.'/customdomains.json');
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
	$domains = $obj["data"]["customdomains"];

	//Now you have access to any of the array keys listed in the API
	//keep in mind that the array is an array of arrays, since this is a list of all domains

	//To view a single key/value:
	echo "1st Domain ['id'] value: <br />";
	echo $domains[0]["id"]."<br />";

	//To view all values passed back by the API:
	echo "View all fields passed back by the API: <br /><br />";
	foreach ($domains as $i){
		echo "Zone ".$i['id']."<br />";
		foreach ($i as $k=>$v){
			echo $k." : ".$v."<br />";
		}
		echo "<br />";
	}

	echo "<hr>";
}

function createVODCustomDomain(){
	echo "<h3>Create new VOD Zone Custom Domain</h3>";
	global $api;
	
	//requires $id for a specific vod zone
	$id = '96187';
	//use Post to create a new entry
	//required parameters: custom_domain, type
	//	(type not defined as required on http://netdna.github.io/netdna-apidocs/#zones-api, but not including returns an error)
	$params = array("custom_domain"=>"cdn.somedomain.com","type"=>"vod-rtmp");
	try {
		$response =  $api->post('/zones/vod/'.$id.'/customdomains.json', $params);
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
	$domain = $obj["data"]["customdomain"];

	//Now you have access to any of the array keys listed in the API
	//keep in mind that the array is an array of arrays, since this is a list of all zones

	//To view a single key/value:
	echo "domain['id'] value: <br />";
	echo $domain["id"]."<br />";

	//To view all values passed back by the API:
	echo "View all fields passed back by the API: <br /><br />";
	foreach ($domain as $k=>$v){
		echo $k." : ".$v."<br />";
	}

	echo "<hr>";
}

function getVODCustomDomain(){
	echo "<h3>Get Specific VOD Custom Domain:</h3>";
	global $api;

	//Get account information from the API
	//Must have zone ID to get specific VODZone
	//Must have domain ID to get specific Domain
	$zoneId = '96187';
	$domainId = '78360';
	try {
		$response =  $api->get('/zones/vod/'.$zoneId.'/customdomains.json/'.$domainId);
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
	$domain = $obj["data"]["customdomain"];

	//Now you have access to any of the array keys listed in the API
	//keep in mind that the array is an array of arrays, since this is a list of all zones

	//To view a single key/value:
	echo "Domain ['id'] value: ";
	echo $domain["id"]."<br />";

	//To view all values passed back by the API:
	echo "View all fields passed back by the API: <br /><br />";
	foreach ($domain as $k=>$v){
		echo $k." : ".$v."<br />";
	}

	echo "<hr>";
}

function updateVODCustomDomain(){
	echo "<h3>Update VOD Zone Custom Domain:</h3>";
	global $api;

	//use Post to create a new entry
	//for updating, all parameters are optional
	$zoneId = '96187';
	$domainId = '78360';
	//params to update will be passed in as an array
	//required custom_domain
	$params = array("custom_domain"=>"cdn.somenewdomain.com");
	try {
		//fill array with any key, value pair in the API
		$response =  $api->put('/zones/vod/'.$zoneId.'/customdomains.json/'.$domainId, $params);
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
	$domain = $obj["data"]["customdomain"];

	//Now you have access to any of the array keys listed in the API
	//keep in mind that the array is an array of arrays, since this is a list of all zones

	//To view a single key/value:
	echo "Domain ['id'] value: <br />";
	echo $domain["id"]."<br />";

	//To view all values passed back by the API:
	echo "View all fields passed back by the API: <br /><br />";
	foreach ($domain as $k=>$v){
		echo $k." : ".$v."<br />";
	}

	echo "<hr>";
}

function deleteVODCustomDomain(){
echo "<h3>Delete Specific VOD Zone Custom Domain:</h3>";
	global $api;

	//use Post to create a new entry
	//for updating, all parameters are optional
	$zoneId = '96187';
	$domainId = '78360';
	
	//no response from this, just good old fashion killing.
	try {
		$api->delete('/zones/vod/'.$zoneId.'/customdomains.json/'.$domainId);
		echo $zoneId.".".$domainId." has been deleted. <br />";
	} catch(CurlException $e) {
		print_r($e->getMessage());
		print_r($e->getHeaders());
	}
}
