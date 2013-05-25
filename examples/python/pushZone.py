#! /usr/bin/env python

from netdnarws import NetDNA

api = NetDNA("alias","consumerkey","consumersecret")

#PUSH ZONE API#

def listPushZones():
	print api.get('/zones/push.json')

def createPushZone():
	params = {"name":"newPushZone6","password":"password"}
	print api.post('/zones/push.json',data=params)

def getPushZonesCount():
	print api.get('/zones/push.json/count')

def getPushZone():
	id = '96182'
	print api.get('/zones/push.json/'+id)

def updatePushZone():
	id = '96182'
	params = {"label":"Some other description"}
	print api.put('/zones/push.json/'+id,params=params)

def deletePushZone():
	id = '96182'
	api.delete('/zones/push.json/'+id)

def enablePushZone():
	id = '96182'
	api.enable('/zones/push.json/'+id)

def disablePushZone():
	id = '96182'
	api.disable('/zones/push.json/'+id)

def purgeCache():
	id = '96182'
	params = {"file":"/robots.txt"}
	print api.delete('/zones/push.json/'+id+'/cache',data=params)

#PUSH ZONE CUSTOM DOMAINS API##

def listPushCustomDomains():
	id = '96182'
	print api.get('/zones/push/'+id+'/customdomains.json')

def createPushCustomDomain():
	id = '96182'
	params = {"custom_domain":"cdn.somedomain15.com"}
	print api.post('/zones/push/'+id+'/customdomains.json', params)
	
def getPushCustomDomain():
	zoneId = '96182'
	domainId = '79320'
	print api.get('/zones/push/'+zoneId+'/customdomains.json/'+domainId)

def updatePushCustomDomain():
	zoneId = '96182'
	domainId = '79320'
	params = {"custom_domain":"cdn.somenewdomain40.com"}
	print api.put('/zones/push/'+zoneId+'/customdomains.json/'+domainId,params=params)
	
def deletePushCustomDomain():
	zoneId = '96182'
	domainId = '79320'
	api.delete('/zones/push/'+zoneId+'/customdomains.json/'+domainId)

#Push Zone API examples:
#listPushZones()
#createPushZone()
#getPushZonesCount()
#getPushZone()
#updatePushZone()
#deletePushZone()
#enablePushZone()	#not functional
#disablePushZone()	#not functional
#purgeCache()
	
#Push Zone Custom Domains API examples:
#listPushCustomDomains()
#createPushCustomDomain()
#getPushCustomDomain()
#updatePushCustomDomain()
#deletePushCustomDomain()