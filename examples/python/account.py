#! /usr/bin/env python

from netdnarws import NetDNA

api = NetDNA("alias","consumerkey","consumersecret")

def getAccount():
	print api.get("/account.json")
	print '\n'

def updateAccountName():
	params={"name": "Given"}
	print api.put('/account.json',params=params)
	print '\n'

def getAccountAddress():
		print api.get('/account.json/address')
		print '\n'

def updateAccountAddress():
	params = {"street1": "1234 Main Street", "street2": "apt 42", "state": "CA"}
	print api.put('/account.json/address',params=params)
	print '\n'
	
#uncomment def calls to test the codesample

#ACCOUNT API EXAMPLES:
#getAccount()
#updateAccountName() 
#getAccountAddress()
#updateAccountAddress()