#! /usr/bin/env python

from netdnarws import NetDNA

api = NetDNA("alias","consumerkey","consumersecret")

#PULL ZONE API#


def listPullZones():
	print api.get('/zones/pull.json')

def createPullZone():
	params = {"name":"newPullZone5","url":"http://somedomain.net"}
	print api.post('/zones/pull.json',data=params)

def getPullZonesCount():
	print api.get('/zones/pull.json/count')

def getPullZone():
	id = '97167'
	print api.get('/zones/pull.json/'+id)

def updatePullZone():
	id = '97167'
	params = {"label":"Some other description"}
	print api.put('/zones/pull.json/'+id,params=params)

def deletePullZone():
	id = '97167'
	api.delete('/zones/pull.json/'+id)

def enablePullZone():
	id = '97167'
	api.enable('/zones/pull.json/'+id)

def disablePullZone():
	id = '97167'
	api.disable('/zones/pull.json/'+id)

def purgeCache():
	id = '97167'
	params = {"file":"/robots.txt"}
	print api.delete('/zones/pull.json/'+id+'/cache',data=params)

#PULL ZONE CUSTOM DOMAINS API##

def listPullCustomDomains():
	id = '97167'
	print api.get('/zones/pull/'+id+'/customdomains.json')

def createPullCustomDomain():
	id = '97167'
	params = {"custom_domain":"cdn.somedomain13.com"}
	print api.post('/zones/pull/'+id+'/customdomains.json', params)
	
def getPullCustomDomain():
	zoneId = '97167'
	domainId = '79182'
	print api.get('/zones/pull/'+zoneId+'/customdomains.json/'+domainId)

def updatePullCustomDomain():
	zoneId = '97167'
	domainId = '79182'
	params = {"custom_domain":"cdn.somenewdomain41.com"}
	print api.put('/zones/pull/'+zoneId+'/customdomains.json/'+domainId,params=params)
	
def deletePullCustomDomain():
	zoneId = '97167'
	domainId = '79182'
	api.delete('/zones/pull/'+zoneId+'/customdomains.json/'+domainId)

#Pull Zone API examples:
#listPullZones()
#createPullZone()
#getPullZonesCount()
#getPullZone()
#updatePullZone()
#deletePullZone()
#enablePullZone()	#not functional
#disablePullZone()	#not functional
#purgeCache()
	
#Pull Zone Custom Domains API examples:
#listPullCustomDomains()
#createPullCustomDomain()
#getPullCustomDomain()
#updatePullCustomDomain()
#deletePullCustomDomain()