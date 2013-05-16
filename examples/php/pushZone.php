<?php

require_once('NetDNA.php');

$api = new NetDNA("alias","consumer_key","consumer_secret");

echo "Edit source code, uncomment the functions you want to see examples of.";

//Push Zone API examples:
//listPushZones();
//createPushZone();
//getPushZonesCount();
//getPushZone();
//updatePushZone();
//deletePushZone();
//enablePushZone();	//not functional
//disablePushZone();	//not functional
//purgeCache();
	
//Push Zone Custom Domains API examples:
//listPushCustomDomains();
//createPushCustomDomain();
//getPushCustomDomain();
//updatePushCustomDomain();
//deletePushCustomDomain();
	
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

/////////////////////PULL ZONE API//////////////////////////


function listPushZones(){
	echo "<h3>Get Push Zone List:</h3>";
	global $api;

	//Get account information from the API
	try {
		$response =  $api->get('/zones/push.json');
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
	$zones = $obj["data"]["pushzones"];

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

function createPushZone(){
	echo "<h3>Create new Push Zone</h3>";
	global $api;
	
	//use Post to create a new entry
	//required parameters: name, password
	$params = array("name"=>"newPushZone","password"=>"password");
	try {
		$response =  $api->post('/zones/push.json', $params);
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
	$zone = $obj["data"]["pushzone"];

	//Now you have access to any of the array keys listed in the API
	//keep in mind that the array is an array of arrays, since this is a list of all zones

	//To view a single key/value:
	echo "pushzone['id'] value: <br />";
	echo $zone["id"]."<br />";

	//To view all values passed back by the API:
	echo "View all fields passed back by the API: <br /><br />";
	foreach ($zone as $k=>$v){
		echo $k." : ".$v."<br />";
	}

	echo "<hr>";
}

function getPushZonesCount(){
	echo "<h3>Get Push Zones Count:</h3>";
	global $api;

	//Get account information from the API
	try {
		$response =  $api->get('/zones/push.json/count');
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

function getPushZone(){
	echo "<h3>Get Specific Push zone:</h3>";
	global $api;

	//Get account information from the API
	//Must have zone ID to get specific PushZone
	$id = '96180';
	try {
		$response =  $api->get('/zones/push.json/'.$id);
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
	$zone = $obj["data"]["pushzone"];

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

function updatePushZone(){
	echo "<h3>Update Specific Push Zone:</h3>";
	global $api;

	//use Post to create a new entry
	//for updating, all parameters are optional
	$id = '96180';
	try {
		//fill array with any key, value pair in the API
		$response =  $api->put('/zones/push.json/'.$id, array("label"=>"Some other description"));
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
	$zone = $obj["data"]["pushzone"];

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

function deletePushZone(){
echo "<h3>Delete Specific Push Zone:</h3>";
	global $api;

	//use Post to create a new entry
	//for updating, all parameters are optional
	$id = '96180';
	
	//no response from this, just good old fashion killing.
	try {
		$api->delete('/zones/push.json/'.$id);
		echo $id." has been deleted. <br />";
	} catch(CurlException $e) {
		print_r($e->getMessage());
		print_r($e->getHeaders());
	}
}

function enablePushZone(){
echo "<h3>Enable a Push zone:</h3>";
	global $api;

	//use Post to create a new entry
	//for updating, all parameters are optional
	$id = '96180';
	
	//no response from this, just good old fashion killing.
	try {
		$api->enable('/zones/push.json/'.$id);
		echo $id." has been enabled. <br />";
	} catch(CurlException $e) {
		print_r($e->getMessage());
		print_r($e->getHeaders());
	}
}

function disablePushZone(){
echo "<h3>Disable a Push zone:</h3>";
	global $api;

	//use Post to create a new entry
	//for updating, all parameters are optional
	$id = '96180';
	
	//no response from this, just good old fashion killing.
	try {
		$api->disable('/zones/push.json/'.$id);
		echo $id." has been disabled. <br />";
	} catch(CurlException $e) {
		print_r($e->getMessage());
		print_r($e->getHeaders());
	}
}

function purgeCache(){
echo "<h3>Purge Specific Push Zone:</h3>";
	global $api;

	//use Post to create a new entry
	//for updating, all parameters are optional
	$id = '96180';
	//you can list specific files to purge with an array of parameters
	$params = array("file"=>"/robots.txt");
	//no response from this, just good old fashion killing.
	try {
		$api->delete('/zones/push.json/'.$id.'/cache',$params);
		echo $id." has been purged. <br />";
	} catch(CurlException $e) {
		print_r($e->getMessage());
		print_r($e->getHeaders());
	}
}

//////////////////PULL ZONE CUSTOM DOMAINS API/////////////////////

function listPushCustomDomains(){
	echo "<h3>Get Push Zone List:</h3>";
	global $api;
	
	//$id required
	$id = '96061';

	//Get account information from the API
	try {
		$response =  $api->get('/zones/push/'.$id.'/customdomains.json');
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

function createPushCustomDomain(){
	echo "<h3>Create new Push Zone Custom Domain</h3>";
	global $api;
	
	//requires $id for a specific push zone
	$id = '96182';
	//use Post to create a new entry
	//required parameters: custom_domain
	$params = array("custom_domain"=>"cdn.somedomain2.net");
	try {
		$response =  $api->post('/zones/push/'.$id.'/customdomains.json', $params);
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

function getPushCustomDomain(){
	echo "<h3>Get Specific Push Custom Domain:</h3>";
	global $api;

	//Get account information from the API
	//Must have zone ID to get specific PushZone
	//Must have domain ID to get specific Domain
	$zoneId = '96182';
	$domainId = '78331';
	try {
		$response =  $api->get('/zones/push/'.$zoneId.'/customdomains.json/'.$domainId);
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

function updatePushCustomDomain(){
	echo "<h3>Update Push Zone Custom Domain:</h3>";
	global $api;

	//use Post to create a new entry
	//for updating, all parameters are optional
	$zoneId = '96182';
	$domainId = '78331';
	//params to update will be passed in as an array
	//required custom_domain
	$params = array("custom_domain"=>"cdn.somenewdomain2.com");
	try {
		//fill array with any key, value pair in the API
		$response =  $api->put('/zones/push/'.$zoneId.'/customdomains.json/'.$domainId, $params);
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

function deletePushCustomDomain(){
echo "<h3>Delete Specific Push Zone Custom Domain:</h3>";
	global $api;

	//use Post to create a new entry
	//for updating, all parameters are optional
	$zoneId = '96182';
	$domainId = '78331';
	
	//no response from this, just good old fashion killing.
	try {
		$api->delete('/zones/push/'.$zoneId.'/customdomains.json/'.$domainId);
		echo $zoneId.".".$domainId." has been deleted. <br />";
	} catch(CurlException $e) {
		print_r($e->getMessage());
		print_r($e->getHeaders());
	}
}
