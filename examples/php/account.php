<?php

require_once('NetDNA.php');

$api = new NetDNA("alias","consumer_key","consumer_secret");

echo "Edit source code, uncomment the functions you want to see examples of.";

//uncomment function calls to test the codesample

//ACCOUNT API EXAMPLES:
//getAccount();
//updateAccountName(); 
//getAccountAddress();
//updateAccountAddress();

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