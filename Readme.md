
# NetDNA API Docs

[NetDNA](http://www.netdna.com) is a content delivery network ("CDN") provider.

## Index

* [Overview](#overview)
* [Support](#support)
* [Account API](#account-api)
* [Users API](#users-api)
* [Zones API](#zones-api)
* [Reports API](#reports-api)
* [Clients API](#clients-api)



## Overview

1. Sign up for a free NetDNA [developer account](http://www.netdna.com/netdna-free-trial/).

2. Create a [new application](https://cp.netdna.com/account/api/create).

3. Integrate with our RESTful API using your DSL wrapper:
  - Node (NPM) <https://github.com/niftylettuce/node-netdna>
  - .NET <https://github.com/netdna/netdnarws-net>
  - Ruby <https://github.com/netdna/netdnarws-ruby>
  - Python <https://github.com/netdna/netdnarws>
  - PHP <https://github.com/netdna/netdnarws-php>
  - Perl <https://github.com/netdna/netdnarws-perl>

See [Resources](#resources) and your DSL wrapper for a list of our API endpoints.



## Support

Have a question? Check out our [Knowledge base](http://support.netdna.com/) to see if your question has already been answered.

Still need help?  Visit our [Contact](http://www.netdna.com/contact/) page to get in touch.

Feel free to tweet and follow us [@netdna](https://twitter.com/netdna) and [@netdnasupport](https://twitter.com/netdnasupport).



## Resources

Prefix all paths with your company alias (e.g. `/{companyAlias}/account.json`).

### Account API

| Path                  | Method | Description                         |
| --------------------- |:------:| ----------------------------------- |
| /account.json         | GET    | Gets account information            |
| /account.json         | PUT    | Updates account information         |
| /account.json/address | GET    | Get account address information     |
| /account.json/address | PUT    | Updates account address information |


### Users API

| Path                 | Method | Description                                          |
| -------------------- |:------:| ---------------------------------------------------- |
| /users.json          | GET    | Returns a list of all users on the specified account |
| /users.json          | POST   | Creates a new user on the specified account          |
| /users.json/{userId} | GET    | Gets a user by the specified {userId} parameter      |
| /users.json/{userId} | GET    | Updates a user by the specified {userId} parameter   |
| /users.json/{userId} | DELETE | Deletes a user by the specified {userId} parameter   |


### Zones API

| Path                | Method | Description                                                        |
| ------------------- |:------:| ------------------------------------------------------------------ |
| /zones.json         | GET    | Returns a list of all zones on the specified account               |
| /zones.json/summary | GET    | Gets a summarized count of all zone types on the specified account |
| /zones.json/count   | GET    | Counts all zones on the specified account                          |

#### Pull Zone

| Path                            | Method  | Description                                               |
| ------------------------------- |:-------:| --------------------------------------------------------- |
| /zones/pull.json                | GET     | Returns a list of all pull zones on the specified account |
| /zones/pull.json                | POST    | Creates a new pull zone                                   |
| /zones/pull.json/count          | GET     | Counts all pull zones on the specified account            |
| /zones/pull.json/{zoneId}       | GET     | Gets a pull zone specified by the {zoneId} parameter      |
| /zones/pull.json/{zoneId}       | PUT     | Updates a pull zone specified by the {zoneId} parameter   |
| /zones/pull.json/{zoneId}       | DELETE  | Deletes a pull zone specified by the {zoneId} parameter   |
| /zones/pull.json/{zoneId}       | ENABLE  | Enables a pull zone specified by the {zoneId} parameter   |
| /zones/pull.json/{zoneId}       | DISABLE | Disables a pull zone specified by the {zoneId} parameter  |
| /zones/pull.json/{zoneId}/cache | DELETE  | Purges pull zone cache                                    |

#### Pull Zone Custom Domains

| Path                                                     | Method | Description                                                                       |
| -------------------------------------------------------- |:------:| --------------------------------------------------------------------------------- |
| /zones/pull/{zoneId}/customdomains.json                  | GET    | Returns a list of all custom domains on the zone specified by {zoneId}            |
| /zones/pull/{zoneId}/customdomains.json                  | POST   | Adds a new custom domain to {zoneId}                                              |
| /zones/pull/{zoneId}/customdomains.json/{customDomainId} | GET    | Gets a custom domain specified by the {zoneId} and {customDomainId} parameters    |
| /zones/pull/{zoneId}/customdomains.json/{customDomainId} | PUT    | Updates a custom domain specified by the {zoneId} and {customDomainId} parameters |
| /zones/pull/{zoneId}/customdomains.json/{customDomainId} | DELETE | Deletes a custom domain specified by the {zoneId} and {customDomainId} parameters |

#### Push Zone

| Path                            | Method  | Description                                               |
| ------------------------------- |:-------:| --------------------------------------------------------- |
| /zones/push.json                | GET     | Returns a list of all push zones on the specified account |
| /zones/push.json                | POST    | Creates a new push zone                                   |
| /zones/push.json/count          | GET     | Counts all push zones on the specified account            |
| /zones/push.json/{zoneId}       | GET     | Gets a push zone specified by the {zoneId} parameter      |
| /zones/push.json/{zoneId}       | PUT     | Updates a push zone specified by the {zoneId} parameter   |
| /zones/push.json/{zoneId}       | DELETE  | Deletes a push zone specified by the {zoneId} parameter   |
| /zones/push.json/{zoneId}       | ENABLE  | Enables a push zone specified by the {zoneId} parameter   |
| /zones/push.json/{zoneId}       | DISABLE | Disables a push zone specified by the {zoneId} parameter  |

#### Push Zone Custom Domains

| Path                                                     | Method | Description                                                                       |
| -------------------------------------------------------- |:------:| --------------------------------------------------------------------------------- |
| /zones/push/{zoneId}/customdomains.json                  | GET    | Returns a list of all custom domains on the zone specified by {zoneId}            |
| /zones/push/{zoneId}/customdomains.json                  | POST   | Adds a new custom domain to {zoneId}                                              |
| /zones/push/{zoneId}/customdomains.json/{customDomainId} | GET    | Gets a custom domain specified by the {zoneId} and {customDomainId} parameters    |
| /zones/push/{zoneId}/customdomains.json/{customDomainId} | PUT    | Updates a custom domain specified by the {zoneId} and {customDomainId} parameters |
| /zones/push/{zoneId}/customdomains.json/{customDomainId} | DELETE | Deletes a custom domain specified by the {zoneId} and {customDomainId} parameters |

#### VOD Zone

| Path                     | Method | Description                                               |
| ------------------------ |:------:| --------------------------------------------------------- |
| /zones/vod.json          | GET     | Returns a list of all VOD zones on the specified account |
| /zones/vod.json          | POST    | Creates a new VOD zone                                   |
| /zones/vod.json/count    | GET     | Counts all vod zones on the specified account            |
| /zones/vod.json/{zoneId} | GET     | Gets a VOD zone specified by the {zoneId} parameter      |
| /zones/vod.json/{zoneId} | PUT     | Updates a VOD zone specified by the {zoneId} parameter   |
| /zones/vod.json/{zoneId} | DELETE  | Deletes a VOD zone specified by the {zoneId} parameter   |
| /zones/vod.json/{zoneId} | ENABLE  | Enables a VOD zone specified by the {zoneId} parameter   |
| /zones/vod.json/{zoneId} | DISABLE | Enables a VOD zone specified by the {zoneId} parameter   |

#### VOD Zone Custom Domains

| Path                                                    | Method | Description                                                                       |
| ------------------------------------------------------- |:------:| --------------------------------------------------------------------------------- |
| /zones/vod/{zoneId}/customdomains.json                  | GET    | Returns a list of all custom domains on the zone specified by {zoneId}            |
| /zones/vod/{zoneId}/customdomains.json                  | POST   | Adds a new custom domain to {zoneId}                                              |
| /zones/vod/{zoneId}/customdomains.json/{customDomainId} | GET    | Gets a custom domain specified by the {zoneId} and {customDomainId} parameters    |
| /zones/vod/{zoneId}/customdomains.json/{customDomainId} | PUT    | Updates a custom domain specified by the {zoneId} and {customDomainId} parameters |
| /zones/vod/{zoneId}/customdomains.json/{customDomainId} | DELETE | Deletes a custom domain specified by the {zoneId} and {customDomainId} parameters |

#### Live Zone

| Path                            | Method  | Description                                               |
| ------------------------------- |:-------:| --------------------------------------------------------- |
| /zones/live.json                | GET     | Returns a list of all live zones on the specified account |
| /zones/live.json                | POST    | Creates a new live zone                                   |
| /zones/live.json/count          | GET     | Counts all live zones on the specified account            |
| /zones/live.json/{zoneId}       | GET     | Gets a live zone specified by the {zoneId} parameter      |
| /zones/live.json/{zoneId}       | PUT     | Updates a live zone specified by the {zoneId} parameter   |
| /zones/live.json/{zoneId}       | DELETE  | Deletes a live zone specified by the {zoneId} parameter   |
| /zones/live.json/{zoneId}       | ENABLE  | Enables a live zone specified by the {zoneId} parameter   |
| /zones/live.json/{zoneId}       | DISABLE | Disables a live zone specified by the {zoneId} parameter  |

#### Zones SSL

| Path                                | Method  | Description                                                          |
| ----------------------------------- |:-------:| -------------------------------------------------------------------- |
| /zones/{zoneType}/{zoneId}/ssl.json | GET     | Get the SSL certificate for the specified {zoneType} and {zoneId}    |
| /zones/{zoneType}/{zoneId}/ssl.json | POST    | Upload an SSL certificate for the specified {zoneType} and {zoneId}  |
| /zones/{zoneType}/{zoneId}/ssl.json | PUT     | Update the SSL certificate for the specified {zoneType} and {zoneId} |
| /zones/{zoneType}/{zoneId}/ssl.json | DELETE  | Remove the SSL certificate for the specified {zoneType} and {zoneId} |


### Reports API

#### Stats

| Path                                      | Method  | Description                                                                                                                                                |
| ----------------------------------------- |:-------:| ---------------------------------------------------------------------------------------------------------------------------------------------------------- |
| /reports/stats.json/{reportType}          | GET     | Gets all zone usage statistics optionally broken up by {reportType}. If no {reportType} is given the request will return the total usage for the zones     |
| /reports/{zoneId}/stats.json/{reportType} | GET     | Gets the {zoneId} usage statistics optionally broken up by {reportType}. If no {reportType} is given the request will return the total usage for the zones |

#### Nodes

| Path                                                     | Method  | Description |
| -------------------------------------------------------- |:-------:| ----------- |
| /reports/nodes.json/{reportType}                         | GET     | Gets a list of all active nodes (locations) |
| /reports/{zoneId}/nodes.json/{reportType}                | GET     | Gets a list of all active nodes (locations) specified by the {zoneId} parameter |
| /reports/nodes.json/stats/{reportType}                   | GET     | Get usage statistics broken up by nodes and optionally {reportType}. If no {reportType} is given the request will return the total usage broken up by node |
| /reports/{zoneId}/nodes.json/stats/{reportType}          | GET     | Get usage statistics for a particular {zoneId} broken up by nodes and optionally {reportType}. If no {reportType} is given the request will return the total usage broken up by node |
| /reports/nodes.json/{nodeId}                             | GET     | Gets the node information for the specified {nodeId} |
| /reports/{zoneId}/nodes.json/{nodeId}                    | GET     | Gets the node information for the specified {nodeId} and {zoneId} |
| /reports/nodes.json/{nodeId}/stats/{reportType}          | GET     | Get usage statistics for a particular {nodeId} optionally broken up by {reportType}. If no {reportType} is given the request will return the total usage for the node |
| /reports/{zoneId}/nodes.json/{nodeId}/stats/{reportType} | GET     | Get usage statistics for a particular {nodeId} and {zoneId}, optionally broken up by {reportType}. If no {reportType} is given the request will return the total usage for the node |

#### Popular Files



#### Status Codes

#### File Types

#### File Sizes

#### Stats By Directory

#### Live


### Clients API

#### Reports

##### Stats By File Name

##### Stats By Custom Domain


