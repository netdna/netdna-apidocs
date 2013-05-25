#! /usr/bin/env python

from netdnarws import NetDNA

api = NetDNA("alias","consumerkey","consumersecret")

#ZONE API#

def listZones():
	print api.get('/zones.json')

def getZoneSummary():
	print api.get('/zones.json/summary')

def getZoneCount():
	print api.get('/zones.json/count')


#Zone SSL API examples#

def getZoneSSL():
	id = '96061'
	type = 'pull'
	print api.get('/zones/'+type+'/'+id+'/ssl.json')
	
def installSSL():
	id = '96061'
	type = 'pull'
	ssl_crt = ""
	params = {"ssl_crt": ssl_crt,"ssl_key": "somesslkey"}
	print api.post('/zones/'+type+'/'+id+'/ssl.json',params)

def updateZoneSSL():
	id = '96061'
	type = 'pull'
	ssl_crt = ""
	params = {"ssl_crt": ssl_crt,"ssl_key": "somesslkey"}
	print api.put('/zones/'+type+'/'+id+'/ssl.json',params)

def removeZoneSSL():
	id = '96061'
	type = 'pull'
	print api.post('/zones/'+type+'/'+id+'/ssl.json')

#Zone Upstream API examples:#

def getUpstreamForZone():
	type = 'pull'
	id = '96061'
	print api.post('/zones/'+type+'/'+id+'/upstream.json')

def enableUpstreamOnZone():
	type = 'pull'
	id = '96061'
	params = {"server_url": "http://cdn.somedomain.com","server": "http://cdn.somedomain.com","port": "80"}
	print api.post('/zones/'+type+'/'+id+'/upstream.json')

def updateUpstreamOnZone():
	type = 'pull'
	id = '96061'
	params = {"upsream_id": "93013","server_url": "http://somedomain.net","port": "80"}
	print api.put('/zones/'+type+'/'+id+'/upstream.json')

def removeUpstreamFromZone():
	type = 'pull'
	id = '96061'
	print api.delete('/zones/'+type+'/'+id+'/upstream.json')

#ZONE API EXAMPLES:
#listZones()
#getZoneSummary()
#getZoneCount()

#Zone SSL API examples: (all untested)
#getZoneSSL()
#installSSL()
#updateZoneSSL()
#removeZoneSSL()

#Zone Upstream API examples: (all untested)
#getUpstreamForZone()
#enableUpstreamOnZone()
#updateUpstreamOnZone()
#removeUpstreamFromZone()