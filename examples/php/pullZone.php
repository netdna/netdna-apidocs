<?php

require_once('NetDNA.php');

$api = new NetDNA("alias","consumer_key","consumer_secret");

echo "Edit source code, uncomment the functions you want to see examples of.";

//Pull Zone API examples:
//listPullZones();
//createPullZone();
//getPullZonesCount();
//getPullZone();
//updatePullZone();
//deletePullZone();
//enablePullZone();	//not functional
//disablePullZone();	//not functional
//purgeCache();
	
//Pull Zone Custom Domains API examples:
//listPullCustomDomains();
//createPullCustomDomain();
//getPullCustomDomain();
//updatePullCustomDomain();
//deletePullCustomDomain();

	
/////////////////////PULL ZONE API//////////////////////////


function listPullZones(){
	echo "<h3>Get Pull Zone List:</h3>";
	global $api;

	//Get account information from the API
	try {
		$response =  $api->get('/zones/pull.json');
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
	$zones = $obj["data"]["pullzones"];

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

function createPullZone(){
	echo "<h3>Create new Pull Zone</h3>";
	global $api;
	
	//use Post to create a new entry
	//required parameters: name, url
	try {
		$response =  $api->post('/zones/pull.json', array("name"=>"newPullZone","url"=>"http://bconklin.net"));
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
	$zone = $obj["data"]["pullzone"];

	//Now you have access to any of the array keys listed in the API
	//keep in mind that the array is an array of arrays, since this is a list of all zones

	//To view a single key/value:
	echo "pullzone['id'] value: <br />";
	echo $zone["id"]."<br />";

	//To view all values passed back by the API:
	echo "View all fields passed back by the API: <br /><br />";
	foreach ($zone as $k=>$v){
		echo $k." : ".$v."<br />";
	}

	echo "<hr>";
}

function getPullZonesCount(){
	echo "<h3>Get Pull Zones Count:</h3>";
	global $api;

	//Get account information from the API
	try {
		$response =  $api->get('/zones/pull.json/count');
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

function getPullZone(){
	echo "<h3>Get Specific Pull zone:</h3>";
	global $api;

	//Get account information from the API
	//Must have zone ID to get specific PullZone
	$id = '96076';
	try {
		$response =  $api->get('/zones/pull.json/'.$id);
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
	$zone = $obj["data"]["pullzone"];

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

function updatePullZone(){
	echo "<h3>Update Specific Pull Zone:</h3>";
	global $api;

	//use Post to create a new entry
	//for updating, all parameters are optional
	$id = '96076';
	try {
		//fill array with any key, value pair in the API
		$response =  $api->put('/zones/pull.json/'.$id, array("label"=>"Some other description"));
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
	$zone = $obj["data"]["pullzone"];

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

function deletePullZone(){
echo "<h3>Delete Specific Pull Zone:</h3>";
	global $api;

	//use Post to create a new entry
	//for updating, all parameters are optional
	$id = '96076';
	
	//no response from this, just good old fashion killing.
	try {
		$api->delete('/zones/pull.json/'.$id);
		echo $id." has been deleted. <br />";
	} catch(CurlException $e) {
		print_r($e->getMessage());
		print_r($e->getHeaders());
	}
}

function enablePullZone(){
echo "<h3>Enable a Pull zone:</h3>";
	global $api;

	//use Post to create a new entry
	//for updating, all parameters are optional
	$id = '96061';
	
	//no response from this, just good old fashion killing.
	try {
		$api->enable('/zones/pull.json/'.$id);
		echo $id." has been enabled. <br />";
	} catch(CurlException $e) {
		print_r($e->getMessage());
		print_r($e->getHeaders());
	}
}

function disablePullZone(){
echo "<h3>Disable a Pull zone:</h3>";
	global $api;

	//use Post to create a new entry
	//for updating, all parameters are optional
	$id = '96061';
	
	//no response from this, just good old fashion killing.
	try {
		$api->disable('/zones/pull.json/'.$id);
		echo $id." has been disabled. <br />";
	} catch(CurlException $e) {
		print_r($e->getMessage());
		print_r($e->getHeaders());
	}
}

function purgeCache(){
echo "<h3>Purge Specific Pull Zone:</h3>";
	global $api;

	//use Post to create a new entry
	//for updating, all parameters are optional
	$id = '96076';
	//you can list specific files to purge with an array of parameters
	$params = array("file"=>"/robots.txt");
	//no response from this, just good old fashion killing.
	try {
		$api->delete('/zones/pull.json/'.$id.'/cache',$params);
		echo $id." has been purged. <br />";
	} catch(CurlException $e) {
		print_r($e->getMessage());
		print_r($e->getHeaders());
	}
}

//////////////////PULL ZONE CUSTOM DOMAINS API/////////////////////

function listPullCustomDomains(){
	echo "<h3>Get Pull Zone List:</h3>";
	global $api;
	
	//$id required
	$id = '96061';

	//Get account information from the API
	try {
		$response =  $api->get('/zones/pull/'.$id.'/customdomains.json');
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

function createPullCustomDomain(){
	echo "<h3>Create new Pull Zone Custom Domain</h3>";
	global $api;
	
	//requires $id for a specific pull zone
	$id = '96061';
	//use Post to create a new entry
	//required parameters: custom_domain
	$params = array("custom_domain"=>"cdn.somedomain.com");
	try {
		$response =  $api->post('/zones/pull/'.$id.'/customdomains.json', $params);
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

function getPullCustomDomain(){
	echo "<h3>Get Specific Pull Custom Domain:</h3>";
	global $api;

	//Get account information from the API
	//Must have zone ID to get specific PullZone
	//Must have domain ID to get specific Domain
	$zoneId = '96061';
	$domainId = '78332';
	try {
		$response =  $api->get('/zones/pull/'.$zoneId.'/customdomains.json/'.$domainId);
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

function updatePullCustomDomain(){
	echo "<h3>Update Pull Zone Custom Domain:</h3>";
	global $api;

	//use Post to create a new entry
	//for updating, all parameters are optional
	$zoneId = '96061';
	$domainId = '78332';
	//params to update will be passed in as an array
	//required custom_domain
	$params = array("custom_domain"=>"cdn.somenewdomain.com");
	try {
		//fill array with any key, value pair in the API
		$response =  $api->put('/zones/pull/'.$zoneId.'/customdomains.json/'.$domainId, $params);
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

function deletePullCustomDomain(){
echo "<h3>Delete Specific Pull Zone Custom Domain:</h3>";
	global $api;

	//use Post to create a new entry
	//for updating, all parameters are optional
	$zoneId = '96061';
	$domainId = '78332';
	
	//no response from this, just good old fashion killing.
	try {
		$api->delete('/zones/pull/'.$zoneId.'/customdomains.json/'.$domainId);
		echo $zoneId.".".$domainId." has been deleted. <br />";
	} catch(CurlException $e) {
		print_r($e->getMessage());
		print_r($e->getHeaders());
	}
}
