#! /usr/bin/env python

from netdnarws import NetDNA

api = NetDNA("alias","consumerkey","consumersecret")

def listZoneStats():
	reportType = ''
	print api.get('/reports/stats.json'+reportType)

def listStatsPerZone():
	id = '96061'
	reportType = ''
	print api.get('/reports/'+id+'/stats.json'+reportType)

#Reports by Location API#
def listNodes():
	print api.get('/reports/nodes.json')

def listNodesByZone():
	id = '96061'
	print api.get('/reports/'+id+'/nodes.json')

def listZoneNodeStatsByReportType():
	reportType = ''
	print api.get('/reports/nodes.json/stats'+reportType)

def listNodeStatsbyZoneAndReportType():
	id = '96061'
	reportType = ''
	print api.get('/reports/'+id+'/nodes.json/stats'+reportType)

def getZoneNode():
	id = '1'
	print api.get('/reports/nodes.json/'+id)

def getNodeByZone():
	zoneId = '96061'
	nodeId = '1'
	print api.get('/reports/'+zoneId+'/nodes.json/'+nodeId)

def getZoneNodeStatsByReportType():
	id = '1'
	reportType = ''
	print api.get('/reports/nodes.json/'+id+'/stats'+reportType)

def getNodeStatsByZoneAndReportType():
	zoneId='96061'
	nodeId='1'
	reportType = ''
	print api.get('/reports/'+zoneId+'/nodes.json/'+nodeId+'/stats'+reportType)

#Reports by Popular Files API#
def listPopularFiles():
	print api.get('/reports/popularfiles.json')

def listPopularFilesByZoneType():
	type='pull'
	print api.get('/reports/'+type+'/popularfiles.json')

#Reports by Status Codes API#
def listStatusCodeResponses():
	reportType = ''
	print api.get('/reports/statuscodes.json'+reportType)
	
def listStatusCodeResponsesByZoneId():
	reportType = ''
	id = '96061'
	print api.get('/reports/'+id+'/statuscodes.json'+reportType)

def listStatusCodesByZoneType():
	reportType = ''
	zoneType = 'pull'
	print api.get('/reports/'+zoneType+'/statuscodes.json'+reportType)

def listStatusCodesByZoneId():
	reportType = ''
	zoneType = 'pull'
	id = '96061'
	print api.get('/reports/'+zoneType+'/'+id+'/statuscodes.json'+reportType)

#Reports by File Types API#
def listFileTypes():
	reportType = ''
	print api.get('/reports/filetypes.json'+reportType)

def listFileTypesByZoneId():
	reportType = ''
	id = '96061'
	print api.get('/reports/'+id+'/filetypes.json'+reportType)

def listFileTypesByZoneType():
	reportType = ''
	zoneType = 'pull'
	print api.get('/reports/'+zoneType+'/filetypes.json'+reportType)

def listFileTypesByZoneTypeAndId():
	reportType = ''
	zoneType = 'pull'
	id = '96061'
	print api.get('/reports/'+zoneType+'/'+id+'/filetypes.json'+reportType)

#Reports by File Size Ranges#
def listFileSizes():
	reportType = ''
	print api.get('/reports/filesizes.json'+reportType)

def listFileSizesByZoneId():
	reportType = ''
	id = '96061'
	print api.get('/reports/'+id+'/filesizes.json'+reportType)

def listFileSizesByZoneType():
	reportType = ''
	zoneType = 'pull'
	print api.get('/reports/'+zoneType+'/filesizes.json'+reportType)

def listFileSizesByZoneIdAndType():
	reportType = ''
	zoneType = 'pull'
	id = '96061'
	print api.get('/reports/'+zoneType+'/'+id+'/filesizes.json'+reportType)

#Reports by Directory API#
def listStatsByDirectory():
	reportType = ''
	print api.get('/reports/statsbydir.json'+reportType)

def listStatsByDirectoryAndZoneId():
	reportType = ''
	id = '96061'
	print api.get('/reports/'+id+'/statsbydir.json'+reportType)

#Reports for Live Zones API#
def listConnectionStats():
	reportType = ''
	print api.get('/reports/live/connectionstats.json'+reportType)

#REPORTS API EXAMPLES:

#listZoneStats();
#listStatsPerZone();

#Reports by Location API examples:	print
#listNodes();
#listNodesByZone();
#listZoneNodeStatsByReportType();
#listNodeStatsbyZoneAndReportType();
#getZoneNode();
#getNodeByZone();
#getZoneNodeStatsByReportType();
#getNodeStatsByZoneAndReportType();

#Reports by Popular Files API examples:
#listPopularFiles();
#listPopularFilesByZoneType();

#Reports by Status Codes API examples:
#listStatusCodeResponses();
#listStatusCodeResponsesByZoneId();
#listStatusCodesByZoneType();
#listStatusCodesByZoneId();

#Reports by File Types API examples:
#listFileTypes();
#listFileTypesByZoneId();
#listFileTypesByZoneType();
#listFileTypesByZoneTypeAndId();

#Reports by File Size Ranges examples:
#listFileSizes();
#listFileSizesByZoneId();
#listFileSizesByZoneType();
#listFileSizesByZoneIdAndType();

#Reports by Directory API examples:
#listStatsByDirectory();
#listStatsByDirectoryAndZoneId();

#Reports for Live Zones API examples:
#listConnectionStats();