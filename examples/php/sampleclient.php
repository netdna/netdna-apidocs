<?php

require_once('NetDNA.php');


$api = new NetDNA("alias","consumer_key","consumer_secret");

//PHP examples:
echo "<h1>PHP examples:</h1><br /><hr />";

//uncomment function calls to test the codesample

//ACCOUNT API EXAMPLES:
//getAccount();
//updateAccountName(); 
//getAccountAddress();
//updateAccountAddress();

//USER API EXAMPLES:
//listUsers();
//createUser();
//getUser();
//updateUser();
//deleteUser();

//ZONE API EXAMPLES: //not complete
listZones();
createZone();
//Pull Zone API examples:
getPullZonesCount();
getPullZone();
updatePullZone();
deletePullZone();
enablePullZone();
disablePullZone();
purgeCache();
//Pull Zone Custom Domains API examples:
listPullCustomDomains();
createPullCustomDomain();
getPullCustomDomain();
updatePullCustomDomain();
deletePullCustomDomain();
//Push Zone API examples:
listPushZones();
createPushZone();
getPushZonesCount();
getPushZone();
updatePushZone();
deletePushZone();
enablePushZone();
disablePushZone();
//Push Zone Custom Domains API examples:
listPushCustomDomain();
createPushCustomDomain();
getPushCustomDomain();
updatePushCustomDomain();
deletePushCustomDomain();
//VOD Zone API examples:
listVODZones();
createVODZone();
getVODZonesCount();
getVODZone();
updateVODZone();
deleteVODZone();
enableVODZone();
disableVODZone();
//VOD Zone Custom Domains API examples:
listVODCustomDomain();
createVODCustomDomain();
getVODCustomDomain();
updateVODCustomDomain();
deleteVODCustomDomain();
//Live Zone API examples:
listLiveZones();
createLiveZone();
getLiveZonesCount();
getLiveZone();
updateLiveZone();
deleteLiveZone();
enableLiveZone();
disableLiveZone();
//Zone SSL API examples:
getZoneSSL();
installSSL();
updateZoneSSL();
removeZoneSSL();
//Zone Upstream API examples:
getUpstreamForZone();
enableUpstreamOnZone();
updateUpstreamOnZone();
removeUpstreamFromZone();

//REPORTS API EXAMPLES:
listZoneStats();
listStatsPerZone();
//Reports by Location API examples:
listNodes();
listNodesByZone();
listZoneNodeStatsByReportType();
listNodeStatsbyZoneAndReportType();
getZoneNode();
getNodeByZone();
getZoneNodeStatsByReportType();
getNodeStatsByZoneAndReportType();
//Reports by Popular Files API examples:
listPopularFiles();
listPopularFilesByZoneType();
//Reports by Status Codes API examples:
listStatusCodeResponses();
listStatusCodeResponsesByZoneId();
listStatusCodesByZoneType();
listStatusCodesByZoneId();
//Reports by File Types API examples:
listFileTypes();
listFileTypesByZoneId();
listFileTypesByZoneType();
listFileTypesByZoneTypeAndId();
//Reports by File Size Ranges examples:
listFileSizes();
listFileSizesByZoneId();
listFileSizesByZoneType();
listFileSizesByZoneIdAndType();
//Reports by Directory API examples:
listStatsByDirectory();
listStatsByDirectoryAndZoneId();
//Reports by Filename API examples:
listStatsByFileName();
listStatsByFileNameAndZoneId();
//Reports by Custom Domains API examples:
listCustomDomainStatsByDirectory();
listStatsByCustomDomainAndZoneId();
//Reports for Live Zones API examples:
listConnectionStats();


function getAccount(){
	echo "<h3>Get Account information:</h3>";
	global $api;

	//Get account information from the API
	try {
		$response =  $api->get('/account.json');
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
	$account = $obj["data"]["account"];

	//Now you have access to any of the array keys listed in the API

	//To view a single key/value:
	echo "Account ['id'] value: <br />";
	echo $account["id"]."<br />";

	//To view all values passed back by the API:
	echo "View all fields passed back by the API: <br />";
	foreach ($account as $k=>$v){
		echo $k." : ".$v."<br />";
	}

	echo "<hr>";
}

function updateAccountName(){
	global $api;
	echo "<h3>Update account name</h3>";
	//Update account name using the API

	// 'put' to https://rws.netdna.com/{companyalias}/account.json with parameter {newname}
	try {
		$response =  $api->put('/account.json',array("name"=>"newName"));
	} catch(CurlException $e) {
		print_r($e->getMessage());
		print_r($e->getHeaders());
	}

	echo $response."<br />";

	//to verify, decode the response, view the account array
	$obj = json_decode($response,true);
	$account = $obj["data"]["account"];

	//Now you have access to any of the array keys listed in the API

	//To view a single key/value:
	echo "Account update success! new name: <br />";
	echo $account["name"]."<br />";
}


function getAccountAddress(){
	echo "<h3>Get Account Address:</h3>";
	global $api;

	//Get account information from the API
	try {
		$response =  $api->get('/account.json/address');
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
	$address = $obj["data"]["address"];

	//Now you have access to any of the array keys listed in the API

	//To view a single key/value:
	echo "Address ['id'] value: <br />";
	echo $address["id"]."<br />";

	//To view all values passed back by the API:
	echo "View all fields passed back by the API: <br />";
	foreach ($address as $k=>$v){
		echo $k." : ".$v."<br />";
	}

	echo "<hr>";
}

function updateAccountAddress(){
	global $api;
	echo "<h3>Update account address</h3>";
	//Update account address using the API

	try {
		//use put('/account.json/address',array( {key1}=>{value1}, ... ,{keyN}=>{valueN} );
		$response =  $api->put('/account.json/address',array("street1"=>"123 Main Street", "street2"=>"apt 42", "state"=>"CA"));
	} catch(CurlException $e) {
		print_r($e->getMessage());
		print_r($e->getHeaders());
	}

	echo $response."<br />";

	//to verify, decode the response, view the account array
	$obj = json_decode($response,true);
	$address = $obj["data"]["address"];

	//Now you have access to any of the array keys listed in the API

	//To view a single key/value:
	echo "New address details: <br />";
	foreach ($address as $k=>$v){
		echo $k." : ".$v."<br />";
	}
}

function listUsers(){
	echo "<h3>Get User List:</h3>";
	global $api;

	//Get account information from the API
	try {
		$response =  $api->get('/users.json');
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
	$users = $obj["data"]["users"];

	//Now you have access to any of the array keys listed in the API
	//keep in mind that the array is an array of arrays, since this is a list of all users

	//To view a single key/value:
	echo "User ['id'] value: <br />";
	echo $users[0]["id"]."<br />";

	//To view all values passed back by the API:
	echo "View all fields passed back by the API: <br /><br />";
	foreach ($users as $i){
		echo "User ".$i['id']."<br />";
		foreach ($i as $k=>$v){
			echo $k." : ".$v."<br />";
		}
		echo "<br />";
	}

	echo "<hr>";
}

function createUser(){
	echo "<h3>Create new User</h3>";
	global $api;
	
	//use Post to create a new entry
	//required parameters: email, password, firstname, lastname
	//optional parameters: phone, timezone
		try {
		$response =  $api->post('/users.json', array("email"=>"drhorrible3@ele.net","password"=>"badhorse","firstname"=>"Doctor","lastname"=>"Horrible"));
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
	$user = $obj["data"]["user"];

	//Now you have access to any of the array keys listed in the API
	//keep in mind that the array is an array of arrays, since this is a list of all users

	//To view a single key/value:
	echo "User ['id'] value: <br />";
	echo $user["id"]."<br />";

	//To view all values passed back by the API:
	echo "View all fields passed back by the API: <br /><br />";
	foreach ($user as $k=>$v){
		echo $k." : ".$v."<br />";
	}

	echo "<hr>";
}

function getUser(){
	echo "<h3>Get Specific User:</h3>";
	global $api;

	//Get account information from the API
	//Must have user ID to get specific user
	$id = '33716';
	try {
		$response =  $api->get('/users.json/'.$id);
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
	$user = $obj["data"]["user"];

	//Now you have access to any of the array keys listed in the API
	//keep in mind that the array is an array of arrays, since this is a list of all users

	//To view a single key/value:
	echo "User ['id'] value: <br />";
	echo $user["id"]."<br />";

	//To view all values passed back by the API:
	echo "View all fields passed back by the API: <br /><br />";
	foreach ($user as $k=>$v){
		echo $k." : ".$v."<br />";
	}

	echo "<hr>";
}

function updateUser(){
	echo "<h3>Update Specific User:</h3>";
	global $api;

	//use Post to create a new entry
	//for updating, all parameters are optional
	$id = '33716';
	try {
		$response =  $api->put('/users.json/'.$id, array("firstname"=>"Billy"));
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
	$user = $obj["data"]["user"];

	//Now you have access to any of the array keys listed in the API
	//keep in mind that the array is an array of arrays, since this is a list of all users

	//To view a single key/value:
	echo "User ['id'] value: <br />";
	echo $user["id"]."<br />";

	//To view all values passed back by the API:
	echo "View all fields passed back by the API: <br /><br />";
	foreach ($user as $k=>$v){
		echo $k." : ".$v."<br />";
	}

	echo "<hr>";
}

function deleteUser(){
echo "<h3>Delete Specific User:</h3>";
	global $api;

	//use Post to create a new entry
	//for updating, all parameters are optional
	$id = '33715';
	
	//no response from this, just good old fashion killing.
	try {
		$api->delete('/users.json/'.$id);
	} catch(CurlException $e) {
		print_r($e->getMessage());
		print_r($e->getHeaders());
	}
}

