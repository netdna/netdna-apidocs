<?php

require_once('NetDNA.php');

$api = new NetDNA("alias","consumer_key","consumer_secret");\

echo "Edit source code, uncomment the functions you want to see examples of.";

//Reports by Filename API examples:
//listStatsByFileName();
//listStatsByFileNameAndZoneId();

//Reports by Custom Domains API examples:
//listCustomDomainStatsByDirectory();
//listStatsByCustomDomainAndZoneId();

//////////////////////Reports by Filename API///////////////////////
function listStatsByFileName(){
	echo "<h3>List Stats by File Name:</h3>";
	global $api;

	//if you want a specific report type, must include, ie $reportType='/{type}';
	$reportType = '';
	//Requires Client ID
	$clientId = '';
	//Get information from the API
	try {
		$response =  $api->get('/clients/'.$clientId.'/reports/statsbyfilename.json'.$reportType);
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
	$report = $obj["data"]["statsbyfilename"];

	//Now you have access to any of the array keys listed in the API

	//To view a single key/value:
	echo "report ['total'] value: <br />";
	echo $report["total"]."<br />";

	//To view all values passed back by the API:
	echo "View all fields passed back by the API: <br />";;
	foreach ($j as $k=>$v){
		echo $k." : ".$v."<br />";
	}
	echo "<hr>";
}
function listStatsByFileNameAndZoneId(){
	echo "<h3>List Stats by File Name and Zone ID:</h3>";
	global $api;

	//if you want a specific report type, must include, ie $reportType='/{type}';
	$reportType = '';
	//Requires Zone ID and Client ID
	$id = '96061';
	$clientId = '';
	//Get information from the API
	try {
		$response =  $api->get('/clients/'.$clientId.'/reports/'.$id.'/statsbyfilename.json'.$reportType);
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
	$report = $obj["data"]["statsbyfilename"];

	//Now you have access to any of the array keys listed in the API

	//To view a single key/value:
	echo "report ['total'] value: <br />";
	echo $report["total"]."<br />";

	//To view all values passed back by the API:
	echo "View all fields passed back by the API: <br />";;
	foreach ($j as $k=>$v){
		echo $k." : ".$v."<br />";
	}
	echo "<hr>";
}

//////////////////////Reports by Custom Domains API///////////////////////
function listCustomDomainStatsByDirectory(){
	echo "<h3>List Stats by Custom Domain:</h3>";
	global $api;

	//if you want a specific report type, must include, ie $reportType='/{type}';
	$reportType = '';
	//Requires client ID 
	$clientId = '';
	//Get information from the API
	try {
		$response =  $api->get('clients/'.$clientId.'/reports/statsbycustomdomain.json'.$reportType);
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
	$report = $obj["data"]["statsbycustomdomain"];

	//Now you have access to any of the array keys listed in the API

	//To view a single key/value:
	echo "report ['total'] value: <br />";
	echo $report["total"]."<br />";

	//To view all values passed back by the API:
	echo "View all fields passed back by the API: <br />";
	foreach ($j as $k=>$v){
		echo $k." : ".$v."<br />";
	}
	echo "<hr>";
}
function listStatsByCustomDomainAndZoneId(){
	echo "<h3>List Stats by Custom Domain and Zone ID:</h3>";
	global $api;

	//if you want a specific report type, must include, ie $reportType='/{type}';
	$reportType = '';
	//Requires client ID and Zone ID
	$zoneId = '';
	$clientId = '';
	//Get information from the API
	try {
		$response =  $api->get('clients/'.$clientId.'/reports/'.$zoneId.'/statsbycustomdomain.json'.$reportType);
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
	$report = $obj["data"]["statsbycustomdomain"];

	//Now you have access to any of the array keys listed in the API

	//To view a single key/value:
	echo "report ['total'] value: <br />";
	echo $report["total"]."<br />";

	//To view all values passed back by the API:
	echo "View all fields passed back by the API: <br />";
	foreach ($j as $k=>$v){
		echo $k." : ".$v."<br />";
	}
	echo "<hr>";
}

