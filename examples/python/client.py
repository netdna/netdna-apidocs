#! /usr/bin/env python

from netdnarws import NetDNA

api = NetDNA("alias","consumerkey","consumersecret")

#Reports by Filename API#
def listStatsByFileName():
	reportType = ''
	clientId = '50'	
	print api.get('/clients/'+clientId+'/reports/statsbyfilename.json'+reportType)
	
def listStatsByFileNameAndZoneId():
	reportType = ''
	id = '16888'
	clientId = '50'
	print api.get('/clients/'+clientId+'/reports/'+id+'/statsbyfilename.json'+reportType)

#Reports by Custom Domains API#
def listCustomDomainStatsByDirectory():
	reportType = ''
	clientId = '50'
	print api.get('/clients/'+clientId+'/reports/statsbycustomdomain.json'+reportType)

def listStatsByCustomDomainAndZoneId():
	reportType = ''
	zoneId = '84199'
	clientId = '1'
	print api.get('/clients/'+clientId+'/reports/'+zoneId+'/statsbycustomdomain.json'+reportType)

#Reports by Filename API examples:
#listStatsByFileName()
#listStatsByFileNameAndZoneId()

#Reports by Custom Domains API examples:
#listCustomDomainStatsByDirectory()
#listStatsByCustomDomainAndZoneId()