#! /usr/bin/env python

from netdnarws import NetDNA

api = NetDNA("alias","consumerkey","consumersecret")

#VOD ZONE API#

def listvodZones():
	print api.get('/zones/vod.json')

def createvodZone():
	params = {"name":"newvodZone7","password":"password"}
	print api.post('/zones/vod.json',data=params)

def getvodZonesCount():
	print api.get('/zones/vod.json/count')

def getvodZone():
	id = '96187'
	print api.get('/zones/vod.json/'+id)

def updatevodZone():
	id = '96187'
	params = {"label":"Some other description"}
	print api.put('/zones/vod.json/'+id,params=params)

def deletevodZone():
	id = '96187'
	api.delete('/zones/vod.json/'+id)

def enablevodZone():
	id = '96187'
	api.enable('/zones/vod.json/'+id)

def disablevodZone():
	id = '96187'
	api.disable('/zones/vod.json/'+id)

#VOD ZONE CUSTOM DOMAINS API##

def listvodCustomDomains():
	id = '96187'
	print api.get('/zones/vod/'+id+'/customdomains.json')

def createvodCustomDomain():
	id = '96187'
	params = {"custom_domain":"cdn.somedomain16.com","type":"vod-rtmp"}
	print api.post('/zones/vod/'+id+'/customdomains.json', params)
	
def getvodCustomDomain():
	zoneId = '96187'
	domainId = '79321'
	print api.get('/zones/vod/'+zoneId+'/customdomains.json/'+domainId)

def updatevodCustomDomain():
	zoneId = '96187'
	domainId = '79321'
	params = {"custom_domain":"cdn.somenewdomain401.com"}
	print api.put('/zones/vod/'+zoneId+'/customdomains.json/'+domainId,params=params)
	
def deletevodCustomDomain():
	zoneId = '96187'
	domainId = '79321'
	api.delete('/zones/vod/'+zoneId+'/customdomains.json/'+domainId)

#vod Zone API examples:
#listvodZones()
#createvodZone()
#getvodZonesCount()
#getvodZone()
#updatevodZone()
#deletevodZone()
#enablevodZone()	#not functional
#disablevodZone()	#not functional
	
#vod Zone Custom Domains API examples:
#listvodCustomDomains()
#createvodCustomDomain()
#getvodCustomDomain()
#updatevodCustomDomain()
#deletevodCustomDomain()