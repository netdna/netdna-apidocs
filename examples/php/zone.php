<?php

require_once('NetDNA.php');

$api = new NetDNA("alias","consumer_key","consumer_secret");

echo "Edit source code, uncomment the functions you want to see examples of.";

//ZONE API EXAMPLES: //not complete
//listZones();
//createZone();

	//Pull Zone API examples:
	//getPullZonesCount();
	//getPullZone();
	//updatePullZone();
	//deletePullZone();
	//enablePullZone();
	//disablePullZone();
	//purgeCache();
		
	//Pull Zone Custom Domains API examples:
	//listPullCustomDomains();
	//createPullCustomDomain();
	//getPullCustomDomain();
	//updatePullCustomDomain();
	//deletePullCustomDomain();

	//Push Zone API examples:
	//listPushZones();
	//createPushZone();
	//getPushZonesCount();
	//getPushZone();
	//updatePushZone();
	//deletePushZone();
	//enablePushZone();
	//disablePushZone();

	//Push Zone Custom Domains API examples:
	//listPushCustomDomain();
	//createPushCustomDomain();
	//getPushCustomDomain();
	//updatePushCustomDomain();
	//deletePushCustomDomain();

	//VOD Zone API examples:
	//listVODZones();
	//createVODZone();
	//getVODZonesCount();
	//getVODZone();
	//updateVODZone();
	//deleteVODZone();
	//enableVODZone();
	//disableVODZone();

	//VOD Zone Custom Domains API examples:
	//listVODCustomDomain();
	//createVODCustomDomain();
	//getVODCustomDomain();
	//updateVODCustomDomain();
	//deleteVODCustomDomain();

	//Live Zone API examples:
	//listLiveZones();
	//createLiveZone();
	//getLiveZonesCount();
	//getLiveZone();
	//updateLiveZone();
	//deleteLiveZone();
	//enableLiveZone();
	//disableLiveZone();

	//Zone SSL API examples:
	//getZoneSSL();
	//installSSL();
	//updateZoneSSL();
	//removeZoneSSL();

	//Zone Upstream API examples:
	//getUpstreamForZone();
	//enableUpstreamOnZone();
	//updateUpstreamOnZone();
	//removeUpstreamFromZone();