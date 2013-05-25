#! /usr/bin/env python

from netdnarws import NetDNA

api = NetDNA("alias","consumerkey","consumersecret")

def listUsers():
	print api.get('/users.json')
	print '\n'


def createUser():
	params={'email':'name@domain.com','password':'password','firstname':'Given','lastname':'Family'}
	print api.post('/users.json',data=params )

def getUser():
	id = '33706'
	print api.get('/users.json/'+id)

def updateUser():
	id = '33706'
	#params={'firstname': 'Verran'}
	print api.put('/users.json/'+id,params={'firstname': 'Given'})

def deleteUser():
	id = '33706'
	api.delete('/users.json/'+id)

#USER API EXAMPLES:
#listUsers()
#createUser()
#getUser()
#updateUser()
#deleteUser()