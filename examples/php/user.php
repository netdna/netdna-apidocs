<?php

require_once('NetDNA.php');


$api = new NetDNA("alias","consumer_key","consumer_secret");

//PHP examples:
echo "Edit Source Code. Uncomment functions you want to see examples of run.";


//USER API EXAMPLES:
//listUsers();
//createUser();
//getUser();
//updateUser();
//deleteUser();

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

