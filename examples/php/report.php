<?php

require_once('NetDNA.php');

$api = new NetDNA("alias","consumer_key","consumer_secret");

echo "Edit source code, uncomment the functions you want to see examples of.";

//REPORTS API EXAMPLES: //not complete

//listZoneStats();
//listStatsPerZone();

//Reports by Location API examples:
//listNodes();
//listNodesByZone();
//listZoneNodeStatsByReportType();
//listNodeStatsbyZoneAndReportType();
//getZoneNode();
//getNodeByZone();
//getZoneNodeStatsByReportType();
//getNodeStatsByZoneAndReportType();

//Reports by Popular Files API examples:
//listPopularFiles();
//listPopularFilesByZoneType();

//Reports by Status Codes API examples:
//listStatusCodeResponses();
//listStatusCodeResponsesByZoneId();
//listStatusCodesByZoneType();
//listStatusCodesByZoneId();

//Reports by File Types API examples:
//listFileTypes();
//listFileTypesByZoneId();
//listFileTypesByZoneType();
//listFileTypesByZoneTypeAndId();

//Reports by File Size Ranges examples:
//listFileSizes();
//listFileSizesByZoneId();
//listFileSizesByZoneType();
//listFileSizesByZoneIdAndType();

//Reports by Directory API examples:
//listStatsByDirectory();
//listStatsByDirectoryAndZoneId();

//Reports for Live Zones API examples:
listConnectionStats();

function listZoneStats(){
	echo "<h3>List Zone Stats:</h3>";
	global $api;

	//Get account information from the API
	//if you want a specific report type, must include, ie $reportType='/{type}';
	$reportType = '';
	try {
		$response =  $api->get('/reports/stats.json'.$reportType);
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
	$report = $obj["data"]["stats"];

	//Now you have access to any of the array keys listed in the API

	//To view a single key/value:
	echo "report ['size'] value: <br />";
	echo $report["size"]."<br />";

	//To view all values passed back by the API:
	echo "View all fields passed back by the API: <br />";
	foreach ($report as $k=>$v){
		echo $k." : ".$v."<br />";
	}
	echo "<hr>";
}
function listStatsPerZone(){
	echo "<h3>List Stats Per Zone:</h3>";
	global $api;

	//Get account information from the API
	
	//requires zone id
	$id = '96061';
	//if you want a specific report type, must include, ie $reportType='/{type}';
	$reportType = '';
	try {
		$response =  $api->get('/reports/'.$id.'/stats.json'.$reportType);
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
	$report = $obj["data"]["stats"];

	//Now you have access to any of the array keys listed in the API

	//To view a single key/value:
	echo "report ['size'] value: <br />";
	echo $report["size"]."<br />";

	//To view all values passed back by the API:
	echo "View all fields passed back by the API: <br />";
	foreach ($report as $k=>$v){
		echo $k." : ".$v."<br />";
	}
	echo "<hr>";
}

/////////Reports by Location API//////////
function listNodes(){
	echo "<h3>List All Active Nodes:</h3>";
	global $api;

	//Get account information from the API
	try {
		$response =  $api->get('/reports/nodes.json');
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
	$report = $obj["data"]["nodes"];

	//Now you have access to any of the array keys listed in the API

	//To view all values passed back by the API:
	echo "View all fields passed back by the API: <br />";
	foreach ($report as $i){
		echo "<br />";
		foreach ($i as $k=>$v){
			echo $k." : ".$v."<br />";
		}
	}
	echo "<hr>";
}
function listNodesByZone(){
	echo "<h3>List All Active Nodes By Zone:</h3>";
	global $api;

	//Get account information from the API
	//Requires zone id
	$id = '96061';
	try {
		$response =  $api->get('/reports/'.$id.'/nodes.json');
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
	$report = $obj["data"]["nodes"];

	//Now you have access to any of the array keys listed in the API

	//To view all values passed back by the API:
	echo "View all fields passed back by the API: <br />";
	foreach ($report as $i){
		echo "<br />";
		foreach ($i as $k=>$v){
			echo $k." : ".$v."<br />";
		}
	}
	echo "<hr>";
}
function listZoneNodeStatsByReportType(){
	echo "<h3>List All Active Nodes by Report Type:</h3>";
	global $api;

	//Get account information from the API
	//if you want a specific report type, must include, ie $reportType='/{type}';
	$reportType = '';
	try {
		$response =  $api->get('/reports/nodes.json/stats'.$reportType);
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
	$report = $obj["data"]["stats"];

	//Now you have access to any of the array keys listed in the API

	//To view a single key/value:
	echo "report ['total'] value: <br />";
	echo $report["total"]."<br />";

	//To view all values passed back by the API:
	echo "View all fields passed back by the API: <br />";
	foreach ($report as $i){
		echo "<br />";
		foreach ($i as $k=>$v){
			echo $k." : ".$v."<br />";
		}
	}
	echo "<hr>";
}
function listNodeStatsbyZoneAndReportType(){
	echo "<h3>List All Active Nodes by Zone and Report Type:</h3>";
	global $api;

	//Get account information from the API
	//Requires zone id
	$id = '96061';
	//if you want a specific report type, must include, ie $reportType='/{type}';
	$reportType = '';
	try {
		$response =  $api->get('/reports/'.$id.'/nodes.json/stats'.$reportType);
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
	$report = $obj["data"]["stats"];

	//Now you have access to any of the array keys listed in the API

	//To view a single key/value:
	echo "report ['total'] value: <br />";
	echo $report["total"]."<br />";

	//To view all values passed back by the API:
	echo "View all fields passed back by the API: <br />";
	foreach ($report as $i){
		echo "<br />";
		foreach ($i as $k=>$v){
			echo $k." : ".$v."<br />";
		}
	}
	echo "<hr>";
}
function getZoneNode(){
	echo "<h3>Get Zone Node:</h3>";
	global $api;

	//Get account information from the API
	//Requires Node ID
	$id = '1';
	try {
		$response =  $api->get('/reports/nodes.json/'.$id);
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
	$report = $obj["data"]["node"];

	//Now you have access to any of the array keys listed in the API

	//To view a single key/value:
	echo "report ['id'] value: <br />";
	echo $report["id"]."<br />";

	//To view all values passed back by the API:
	echo "View all fields passed back by the API: <br />";
	foreach ($report as $k=>$v){
		echo $k." : ".$v."<br />";
	}
	echo "<hr>";
}
function getNodeByZone(){
	echo "<h3>List All Active Nodes by Report Type:</h3>";
	global $api;

	//Get account information from the API
	//requires zone and node id
	$zoneId = '96061';
	$nodeId = '1';
	try {
		$response =  $api->get('/reports/'.$zoneId.'/nodes.json/'.$nodeId);
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
	$report = $obj["data"]["node"];

	//Now you have access to any of the array keys listed in the API

	//To view a single key/value:
	echo "report ['id'] value: <br />";
	echo $report["id"]."<br />";

	//To view all values passed back by the API:
	echo "View all fields passed back by the API: <br />";
	foreach ($report as $k=>$v){
		echo $k." : ".$v."<br />";
	}
	echo "<hr>";
}

function getZoneNodeStatsByReportType(){
	echo "<h3>Get Zone Node Stats by Report Type:</h3>";
	global $api;

	//Get account information from the API
	//Requires Zone id
	$id = '1';
	//if you want a specific report type, must include, ie $reportType='/{type}';
	$reportType = '';
	try {
		$response =  $api->get('/reports/nodes.json/'.$id.'/stats'.$reportType);
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
	$report = $obj["data"]["stats"];

	//Now you have access to any of the array keys listed in the API

	//To view a single key/value:
	echo "report ['total'] value: <br />";
	echo $report["total"]."<br />";

	//To view all values passed back by the API:
	echo "View all fields passed back by the API: <br />";
	foreach ($report as $i){
		echo "<br />";
		foreach ($i as $k=>$v){
			echo $k." : ".$v."<br />";
		}
	}
	echo "<hr>";
}
function getNodeStatsByZoneAndReportType(){
	echo "<h3>Get Node Stats By Zone and Report Type:</h3>";
	global $api;

	//Get account information from the API
	//Requires zone id and node id
	$zoneId='96061';
	$nodeId='1';
	//if you want a specific report type, must include, ie $reportType='/{type}';
	$reportType = '';
	try {
		$response =  $api->get('/reports/'.$zoneId.'/nodes.json/'.$nodeId.'/stats'.$reportType);
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
	$report = $obj["data"]["stats"];

	//Now you have access to any of the array keys listed in the API

	//To view a single key/value:
	echo "report ['total'] value: <br />";
	echo $report["total"]."<br />";

	//To view all values passed back by the API:
	echo "View all fields passed back by the API: <br />";
	foreach ($report as $i){
		echo "<br />";
		foreach ($i as $k=>$v){
			echo $k." : ".$v."<br />";
		}
	}
	echo "<hr>";
}

//////////////////Reports by Popular Files API/////////////////
function listPopularFiles(){
	echo "<h3>List Popular Files:</h3>";
	global $api;

	//Get information from the API
	try {
		$response =  $api->get('/reports/popularfiles.json');
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
	$report = $obj["data"];

	//Now you have access to any of the array keys listed in the API

	//To view a single key/value:
	echo "report ['total'] value: <br />";
	echo $report["total"]."<br />";

	//To view all values passed back by the API:
	echo "View all fields passed back by the API: <br />";
	foreach ($report as $i=>$j){
		echo "<br />";
		echo $i."<br />";
		foreach ($j as $k=>$v){
			echo $k." : ".$v."<br />";
		}
	}
	echo "<hr>";
}
function listPopularFilesByZoneType(){
	echo "<h3>List Popular Files By Zone Type:</h3>";
	global $api;

	//Requires Zone type
	$type='pull';
	//Get information from the API
	try {
		$response =  $api->get('/reports/'.$type.'/popularfiles.json');
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
	$report = $obj["data"];

	//Now you have access to any of the array keys listed in the API

	//To view a single key/value:
	echo "report ['total'] value: <br />";
	echo $report["total"]."<br />";

	//To view all values passed back by the API:
	echo "View all fields passed back by the API: <br />";
	foreach ($report as $i=>$j){
		echo "<br />";
		echo $i."<br />";
		foreach ($j as $k=>$v){
			echo $k." : ".$v."<br />";
		}
	}
	echo "<hr>";
}

//////////////////////Reports by Status Codes API///////////////////////
function listStatusCodeResponses(){
	echo "<h3>List Status Code Responses:</h3>";
	global $api;

	//if you want a specific report type, must include, ie $reportType='/{type}';
	$reportType = '';
	
	//Get information from the API
	try {
		$response =  $api->get('/reports/statuscodes.json'.$reportType);
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
	$report = $obj["data"];

	//Now you have access to any of the array keys listed in the API

	//To view a single key/value:
	echo "report ['total'] value: <br />";
	echo $report["total"]."<br />";

	//To view all values passed back by the API:
	echo "View all fields passed back by the API: <br />";
	foreach ($report as $i=>$j){
		echo "<br />";
		echo $i."<br />";
		foreach ($j as $k=>$v){
			echo $k." : ".$v."<br />";
		}
	}
	echo "<hr>";
}
function listStatusCodeResponsesByZoneId(){
	echo "<h3>List Status Code Responses By Zone ID:</h3>";
	global $api;

	//if you want a specific report type, must include, ie $reportType='/{type}';
	$reportType = '';
	//Requires Zone ID
	$id = '96061';
	//Get information from the API
	try {
		$response =  $api->get('/reports/'.$id.'/statuscodes.json'.$reportType);
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
	$report = $obj["data"];

	//Now you have access to any of the array keys listed in the API

	//To view a single key/value:
	echo "report ['total'] value: <br />";
	echo $report["total"]."<br />";

	//To view all values passed back by the API:
	echo "View all fields passed back by the API: <br />";
	foreach ($report as $i=>$j){
		echo "<br />";
		echo $i."<br />";
		foreach ($j as $k=>$v){
			echo $k." : ".$v."<br />";
		}
	}
	echo "<hr>";
}
function listStatusCodesByZoneType(){
	echo "<h3>List Status Code Responses By Zone Type:</h3>";
	global $api;

	//if you want a specific report type, must include, ie $reportType='/{type}';
	$reportType = '';
	//Requires Zone Type
	$zoneType = 'pull';
	//Get information from the API
	try {
		$response =  $api->get('/reports/'.$zoneType.'/statuscodes.json'.$reportType);
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
	$report = $obj["data"];

	//Now you have access to any of the array keys listed in the API

	//To view a single key/value:
	echo "report ['total'] value: <br />";
	echo $report["total"]."<br />";

	//To view all values passed back by the API:
	echo "View all fields passed back by the API: <br />";
	foreach ($report as $i=>$j){
		echo "<br />";
		echo $i."<br />";
		foreach ($j as $k=>$v){
			echo $k." : ".$v."<br />";
		}
	}
	echo "<hr>";
}
function listStatusCodesByZoneId(){
	echo "<h3>List Status Code Responses By Zone ID:</h3>";
	global $api;

	//if you want a specific report type, must include, ie $reportType='/{type}';
	$reportType = '';
	//Requires Zone ID and Zone Type
	$zoneType = 'pull';
	$id = '96061';
	//Get information from the API
	try {
		$response =  $api->get('/reports/'.$zoneType.'/'.$id.'/statuscodes.json'.$reportType);
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
	$report = $obj["data"];

	//Now you have access to any of the array keys listed in the API

	//To view a single key/value:
	echo "report ['total'] value: <br />";
	echo $report["total"]."<br />";

	//To view all values passed back by the API:
	echo "View all fields passed back by the API: <br />";
	foreach ($report as $i=>$j){
		echo "<br />";
		echo $i."<br />";
		foreach ($j as $k=>$v){
			echo $k." : ".$v."<br />";
		}
	}
	echo "<hr>";
}

//////////////////////Reports by File Types API///////////////////////
function listFileTypes(){
	echo "<h3>List File Types:</h3>";
	global $api;

	//if you want a specific report type, must include, ie $reportType='/{type}';
	$reportType = '';
	//Get information from the API
	try {
		$response =  $api->get('/reports/filetypes.json'.$reportType);
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
	$report = $obj["data"];

	//Now you have access to any of the array keys listed in the API

	//To view a single key/value:
	echo "report ['total'] value: <br />";
	echo $report["total"]."<br />";

	//To view all values passed back by the API:
	echo "View all fields passed back by the API: <br />";
	foreach ($report as $i=>$j){
		echo "<br />";
		echo $i."<br />";
		foreach ($j as $k=>$v){
			echo $k." : ".$v."<br />";
		}
	}
	echo "<hr>";
}
function listFileTypesByZoneId(){
	echo "<h3>List File Types by Zone ID:</h3>";
	global $api;

	//if you want a specific report type, must include, ie $reportType='/{type}';
	$reportType = '';
	//Requires Zone ID
	$id = '96061';
	//Get information from the API
	try {
		$response =  $api->get('/reports/'.$id.'/filetypes.json'.$reportType);
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
	$report = $obj["data"];

	//Now you have access to any of the array keys listed in the API

	//To view a single key/value:
	echo "report ['total'] value: <br />";
	echo $report["total"]."<br />";

	//To view all values passed back by the API:
	echo "View all fields passed back by the API: <br />";
	foreach ($report as $i=>$j){
		echo "<br />";
		echo $i."<br />";
		foreach ($j as $k=>$v){
			echo $k." : ".$v."<br />";
		}
	}
	echo "<hr>";
}
function listFileTypesByZoneType(){
	echo "<h3>List File Types by Zone Type:</h3>";
	global $api;

	//if you want a specific report type, must include, ie $reportType='/{type}';
	$reportType = '';
	//Requires Zone Type
	$zoneType = 'pull';
	//Get information from the API
	try {
		$response =  $api->get('/reports/'.$zoneType.'/filetypes.json'.$reportType);
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
	$report = $obj["data"];

	//Now you have access to any of the array keys listed in the API

	//To view a single key/value:
	echo "report ['total'] value: <br />";
	echo $report["total"]."<br />";

	//To view all values passed back by the API:
	echo "View all fields passed back by the API: <br />";
	foreach ($report as $i=>$j){
		echo "<br />";
		echo $i."<br />";
		foreach ($j as $k=>$v){
			echo $k." : ".$v."<br />";
		}
	}
	echo "<hr>";
}
function listFileTypesByZoneTypeAndId(){
	echo "<h3>List File Types by Zone Type and ID:</h3>";
	global $api;

	//if you want a specific report type, must include, ie $reportType='/{type}';
	$reportType = '';
	//Requires zone type and ID
	$zoneType = 'pull';
	$id = '96061';
	//Get information from the API
	try {
		$response =  $api->get('/reports/'.$zoneType.'/'.$id.'/filetypes.json'.$reportType);
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
	$report = $obj["data"];

	//Now you have access to any of the array keys listed in the API

	//To view a single key/value:
	echo "report ['total'] value: <br />";
	echo $report["total"]."<br />";

	//To view all values passed back by the API:
	echo "View all fields passed back by the API: <br />";
	foreach ($report as $i=>$j){
		echo "<br />";
		echo $i."<br />";
		foreach ($j as $k=>$v){
			echo $k." : ".$v."<br />";
		}
	}
	echo "<hr>";
}

//////////////////////Reports by File Size Ranges///////////////////////
function listFileSizes(){
	echo "<h3>List File Sizes:</h3>";
	global $api;

	//if you want a specific report type, must include, ie $reportType='/{type}';
	$reportType = '';
	
	//Get information from the API
	try {
		$response =  $api->get('/reports/filesizes.json'.$reportType);
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
	$report = $obj["data"]["filesizes"];

	//Now you have access to any of the array keys listed in the API

	//To view a single key/value:
	echo "report ['total'] value: <br />";
	echo $report["total"]."<br />";

	//To view all values passed back by the API:
	echo "View all fields passed back by the API: <br />";
	foreach ($report as $i=>$j){
		echo "<br />";
		echo $i."<br />";
		foreach ($j as $k=>$v){
			echo $k." : ".$v."<br />";
		}
	}
	echo "<hr>";
}
function listFileSizesByZoneId(){
	echo "<h3>List File Sizes by Zone ID:</h3>";
	global $api;

	//if you want a specific report type, must include, ie $reportType='/{type}';
	$reportType = '';
	//Requires Zone ID
	$id = '96061';
	//Get information from the API
	try {
		$response =  $api->get('/reports/'.$id.'/filesizes.json'.$reportType);
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
	$report = $obj["data"]["filesizes"];

	//Now you have access to any of the array keys listed in the API

	//To view a single key/value:
	echo "report ['total'] value: <br />";
	echo $report["total"]."<br />";

	//To view all values passed back by the API:
	echo "View all fields passed back by the API: <br />";
	foreach ($report as $i=>$j){
		echo "<br />";
		echo $i."<br />";
		foreach ($j as $k=>$v){
			echo $k." : ".$v."<br />";
		}
	}
	echo "<hr>";
}
function listFileSizesByZoneType(){
	echo "<h3>List File Sizes by Zone Type:</h3>";
	global $api;

	//if you want a specific report type, must include, ie $reportType='/{type}';
	$reportType = '';
	//Requires zone type
	$zoneType = 'pull';
	//Get information from the API
	try {
		$response =  $api->get('/reports/'.$zoneType.'/filesizes.json'.$reportType);
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
	$report = $obj["data"]["filesizes"];

	//Now you have access to any of the array keys listed in the API

	//To view a single key/value:
	echo "report ['total'] value: <br />";
	echo $report["total"]."<br />";

	//To view all values passed back by the API:
	echo "View all fields passed back by the API: <br />";
	foreach ($report as $i=>$j){
		echo "<br />";
		echo $i."<br />";
		foreach ($j as $k=>$v){
			echo $k." : ".$v."<br />";
		}
	}
	echo "<hr>";
}
function listFileSizesByZoneIdAndType(){
	echo "<h3>List File Sizes by Zone ID and Type:</h3>";
	global $api;

	//if you want a specific report type, must include, ie $reportType='/{type}';
	$reportType = '';
	//Requiers Zone ID and type
	$zoneType = 'pull';
	$id = '96061';
	//Get information from the API
	try {
		$response =  $api->get('/reports/'.$zoneType.'/'.$id.'/filesizes.json'.$reportType);
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
	$report = $obj["data"]["filesizes"];

	//Now you have access to any of the array keys listed in the API

	//To view a single key/value:
	echo "report ['total'] value: <br />";
	echo $report["total"]."<br />";

	//To view all values passed back by the API:
	echo "View all fields passed back by the API: <br />";
	foreach ($report as $i=>$j){
		echo "<br />";
		echo $i."<br />";
		foreach ($j as $k=>$v){
			echo $k." : ".$v."<br />";
		}
	}
	echo "<hr>";
}

//////////////////////Reports by Directory API///////////////////////
function listStatsByDirectory(){
	echo "<h3>List Stats by Directory:</h3>";
	global $api;

	//if you want a specific report type, must include, ie $reportType='/{type}';
	$reportType = '';
	
	//Get information from the API
	try {
		$response =  $api->get('/reports/statsbydir.json'.$reportType);
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
	$report = $obj["data"];

	//Now you have access to any of the array keys listed in the API

	//To view a single key/value:
	echo "report ['total'] value: <br />";
	echo $report["total"]."<br />";

	//To view all values passed back by the API:
	echo "View all fields passed back by the API: <br />";
	foreach ($report as $i=>$j){
		echo "<br />";
		echo $i."<br />";
		foreach ($j as $k=>$v){
			echo $k." : ".$v."<br />";
		}
	}
	echo "<hr>";
}
function listStatsByDirectoryAndZoneId(){
	echo "<h3>List Stats by Directory and Zone ID :</h3>";
	global $api;

	//if you want a specific report type, must include, ie $reportType='/{type}';
	$reportType = '';
	//Require zone ID
	$id = '96061';
	//Get information from the API
	try {
		$response =  $api->get('/reports/'.$id.'/statsbydir.json'.$reportType);
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
	$report = $obj["data"]["statsbydir"];

	//Now you have access to any of the array keys listed in the API

	//To view a single key/value:
	echo "report ['total'] value: <br />";
	echo $report["total"]."<br />";

	//To view all values passed back by the API:
	echo "View all fields passed back by the API: <br />";
	foreach ($report as $k=>$v){
		echo $k." : ".$v."<br />";
	}
	echo "<hr>";
}

//////////////////////Reports for Live Zones API///////////////////////
function listConnectionStats(){
	echo "<h3>List Live Connection Stats</h3>";
	global $api;

	//Select a reportType with $reportType = '{type}';
	$reportType = '';
	//Get account information from the API
	try {
		$response =  $api->get('/reports/live/connectionstats.json'.$reportType);
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
	$report = $obj["data"]["stats"];

	//Now you have access to any of the array keys listed in the API

	//To view all values passed back by the API:
	echo "View all fields passed back by the API: <br />";
	foreach ($i as $k=>$v){
		echo $k." : ".$v."<br />";
	}
	echo "<hr>";
}