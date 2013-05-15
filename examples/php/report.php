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

//Reports by Filename API examples:
//listStatsByFileName();
//listStatsByFileNameAndZoneId();

//Reports by Custom Domains API examples:
//listCustomDomainStatsByDirectory();
//listStatsByCustomDomainAndZoneId();

//Reports for Live Zones API examples:
//listConnectionStats();