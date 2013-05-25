#! /usr/bin/env python

from netdnarws import NetDNA

api = NetDNA("alias","consumerkey","consumersecret")

#LIVE ZONE API#


def listliveZones():
	print api.get('/zones/live.json')

def createliveZone():
	params = {"name":"newliveZone7","password":"password"}
	print api.post('/zones/live.json',data=params)

def getliveZonesCount():
	print api.get('/zones/live.json/count')

def getliveZone():
	id = '96193'
	print api.get('/zones/live.json/'+id)

def updateliveZone():
	id = '96193'
	params = {"label":"Some other description"}
	print api.put('/zones/live.json/'+id,params=params)

def deleteliveZone():
	id = '96193'
	api.delete('/zones/live.json/'+id)

def enableliveZone():
	id = '96193'
	api.enable('/zones/live.json/'+id)

def disableliveZone():
	id = '96193'
	api.disable('/zones/live.json/'+id)

#live Zone API examples:
#listliveZones()
#createliveZone()
#getliveZonesCount()
#getliveZone()
#updateliveZone()
#deleteliveZone()
#enableliveZone()	#not functional
#disableliveZone()	#not functional