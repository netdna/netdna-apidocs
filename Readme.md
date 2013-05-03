
# NetDNA API Docs

[NetDNA](http://www.netdna.com) is a content delivery network ("CDN") provider.

## Index

* [Overview](#overview)
* [Support](#support)
* [Account API](#account-api)
* [Users API](#users-api)
* [Zones API](#zones-api)
* [Reports API](#reports-by-zone-api)
* [Clients API](#reports-by-file-name-api)


## Overview

1. Sign up for a free NetDNA [developer account](http://www.netdna.com/netdna-free-trial/).

2. Create a [new application](https://cp.netdna.com/account/api/create).

3. Integrate with our RESTful API using your language wrapper:
  - Node (NPM) <https://github.com/niftylettuce/node-netdna>
  - .NET <https://github.com/netdna/netdnarws-net>
  - Ruby <https://github.com/netdna/netdnarws-ruby>
  - Python <https://github.com/netdna/netdnarws>
  - PHP <https://github.com/netdna/netdnarws-php>
  - Perl <https://github.com/netdna/netdnarws-perl>

Follow the documentation for our API below!


## Support

Have a question? Check out our [Knowledge base](http://support.netdna.com/) to see if your question has already been answered.

Still need help?  Visit our [Contact](http://www.netdna.com/contact/) page to get in touch.

Feel free to tweet and follow us [@netdna](https://twitter.com/netdna) and [@netdnasupport](https://twitter.com/netdnasupport).

---

# Key: Path Parameters

Parameter | Description |
--- | ---
{companyalias} | The alias you used when creating your account |
{zone_type} | The type of zone you are making a request on - one of push,pull, vod, or live |
{report_type} | The format you want the reports summarized by - one of hourly,daily, or monthly. This value can be left blank to receive thetotals ungrouped. |

---

# Account API

## Get Account

Gets account information

<div class="heading">
<div class="url GET"><span class="http_method">GET</span>
<span class="path">https://rws.netdna.com/{companyalias}/account.json</span></div>
</div>

### Response Parameters

Parameter | Description | Since |
--- | --- | ---
`id` | Account ID | 1.0 |
`name` | The name of your account | 1.0 |
`address_id` | Address ID | 1.0 |
`alias` | Company Alias | 1.0 |
`ssl_credits` | SSL Credits | 1.0 |
`flex_credits` | Flex Location Credits | 1.0 |
`date_created` | Date Created | 1.0 |
`date_updated` | Date Updated | 1.0 |


## Update Account

Updates account information

<div class="heading">
<div class="url PUT"><span class="http_method">PUT</span>
<span class="path">https://rws.netdna.com/{companyalias}/account.json</span></div>
</div>

### Accepted Request Parameters

Parameter | Default Value | Validation | Description | Since |
--- | --- | --- | --- | ---
`name` | - | <span class="label important">required</span><br />length: 1-30 chars | The name of your account | 1.0 |


### Response Parameters

Parameter | Description | Since |
--- | --- | ---
`id` | Account ID | 1.0 |
`name` | The name of your account | 1.0 |
`address_id` | Address ID | 1.0 |
`alias` | Company Alias | 1.0 |
`ssl_credits` | SSL Credits | 1.0 |
`flex_credits` | Flex Location Credits | 1.0 |
`date_created` | Date Created | 1.0 |
`date_updated` | Date Updated | 1.0 |


## Get Account Address

Gets account address information

<div class="heading">
<div class="url GET"><span class="http_method">GET</span>
<span class="path">https://rws.netdna.com/{companyalias}/account.json/address</span></div>
</div>

### Response Parameters

Parameter | Description | Since |
--- | --- | ---
`id` | Address ID | 1.0 |
`street1` | Street Address Line 1 | 1.0 |
`street2` | Street Address Line 2 | 1.0 |
`city` | City | 1.0 |
`state` | State | 1.0 |
`zip` | ZIP | 1.0 |
`country` | Country Code | 1.0 |
`date_created` | Date Created | 1.0 |
`date_updated` | Date Updated | 1.0 |


## Update Account Address

Updates account address information

<div class="heading">
<div class="url PUT"><span class="http_method">PUT</span>
<span class="path">https://rws.netdna.com/{companyalias}/account.json/address</span></div>
</div>

### Accepted Request Parameters

Parameter | Default Value | Validation | Description | Since |
--- | --- | --- | --- | ---
`street1` | - | length: 1-200 chars | Street Address Line 1 | 1.0 |
`street2` | - | length: 1-200 chars | Street Address Line 2 | 1.0 |
`city` | - | length: 1-50 chars | City | 1.0 |
`state` | - | length: 1-50 chars | State | 1.0 |
`zip` | - | length: 3-5 chars; only digits accepted | ZIP | 1.0 |
`country` | - | length: 2 chars | Country Code | 1.0 |


### Response Parameters

Parameter | Description | Since |
--- | --- | ---
`id` | Address ID | 1.0 |
`street1` | Street Address Line 1 | 1.0 |
`street2` | Street Address Line 2 | 1.0 |
`city` | City | 1.0 |
`state` | State | 1.0 |
`zip` | ZIP | 1.0 |
`country` | Country Code | 1.0 |
`date_created` | Date Created | 1.0 |
`date_updated` | Date Updated | 1.0 |




---

# Users API

## List Users

Returns a list of all users on the specified account

<div class="heading">
<div class="url GET"><span class="http_method">GET</span>
<span class="path">https://rws.netdna.com/{companyalias}/users.json</span></div>
</div>

### Response Parameters

Parameter | Description | Since |
--- | --- | ---
`id` | User ID | 1.0 |
`email` | Email Address | 1.0 |
`firstname` | First Name | 1.0 |
`lastname` | Last Name | 1.0 |
`phone` | Phone Number | 1.0 |
`timezone` | User's Timezone | 1.0 |
`date_last_login` | The date and time the user last logged into the system | 1.0 |
`ip_last_login` | The IP for the user at the last login | 1.0 |
`date_created` | Date Created | 1.0 |
`date_updated` | Date Updated | 1.0 |
`roles` | An array of roles for the given user | 1.0 |


## Create User

Creates a new user on the specified account

<div class="heading">
<div class="url POST"><span class="http_method">POST</span>
<span class="path">https://rws.netdna.com/{companyalias}/users.json</span></div>
</div>

### Accepted Request Parameters

Parameter | Default Value | Validation | Description | Since |
--- | --- | --- | --- | ---
`email` | - | <span class="label important">required</span><br />length: 6-200 chars; valid email address | Email Address | 1.0 |
`password` | - | <span class="label important">required</span><br />length: 5-30 chars | Password | 1.0 |
`firstname` | - | <span class="label important">required</span><br />length: 1-32 chars | First Name | 1.0 |
`lastname` | - | <span class="label important">required</span><br />length: 1-32 chars | Last Name | 1.0 |
`phone` | - | length: 7, 10, 11, or 14 chars; only digits considered | Phone Number | 1.0 |
`timezone` | - | valid::timezone | Valid timezone (see [List ofSupported Timezones](http://php.net/manual/en/timezones.php)) | 1.0 |


### Response Parameters

Parameter | Description | Since |
--- | --- | ---
`id` | User ID | 1.0 |
`email` | Email Address | 1.0 |
`firstname` | First Name | 1.0 |
`lastname` | Last Name | 1.0 |
`phone` | Phone Number | 1.0 |
`timezone` | User's Timezone | 1.0 |
`date_last_login` | The date and time the user last logged into the system | 1.0 |
`ip_last_login` | The IP for the user at the last login | 1.0 |
`date_created` | Date Created | 1.0 |
`date_updated` | Date Updated | 1.0 |
`roles` | An array of roles for the given user | 1.0 |


## Get User

Gets a user specified by the {user_id} parameter

<div class="heading">
<div class="url GET"><span class="http_method">GET</span>
<span class="path">https://rws.netdna.com/{companyalias}/users.json/{user_id}</span></div>
</div>

### Response Parameters

Parameter | Description | Since |
--- | --- | ---
`id` | User ID | 1.0 |
`email` | Email Address | 1.0 |
`firstname` | First Name | 1.0 |
`lastname` | Last Name | 1.0 |
`phone` | Phone Number | 1.0 |
`timezone` | User's Timezone | 1.0 |


## Update User

Updates a user specified by the {user_id} parameter

<div class="heading">
<div class="url PUT"><span class="http_method">PUT</span>
<span class="path">https://rws.netdna.com/{companyalias}/users.json/{user_id}</span></div>
</div>

### Accepted Request Parameters

Parameter | Default Value | Validation | Description | Since |
--- | --- | --- | --- | ---
`email` | - | length: 6-200 chars; valid email address | Email Address | 1.0 |
`firstname` | - | length: 1-32 chars | First Name | 1.0 |
`lastname` | - | length: 1-32 chars | Last Name | 1.0 |
`phone` | - | length: 7, 10, 11, or 14 chars; only digits considered | Phone Number | 1.0 |
`timezone` | - | valid::timezone | Valid timezone (see [List ofSupported Timezones](http://php.net/manual/en/timezones.php)) | 1.0 |


### Response Parameters

Parameter | Description | Since |
--- | --- | ---
`id` | User ID | 1.0 |
`email` | Email Address | 1.0 |
`firstname` | First Name | 1.0 |
`lastname` | Last Name | 1.0 |
`phone` | Phone Number | 1.0 |
`timezone` | User's Timezone | 1.0 |


## Delete User

Deletes a user specified by the {user_id} parameter

<div class="heading">
<div class="url DELETE"><span class="http_method">DELETE</span>
<span class="path">https://rws.netdna.com/{companyalias}/users.json/{user_id}</span></div>
</div>



---

# Zones API

## List Zones

Returns a list of all zones on the specified account

<div class="heading">
<div class="url GET"><span class="http_method">GET</span>
<span class="path">https://rws.netdna.com/{companyalias}/zones.json</span></div>
</div>

## Get Zone Summary

Gets a summarized count of all zone types on the specified
account

<div class="heading">
<div class="url GET"><span class="http_method">GET</span>
<span class="path">https://rws.netdna.com/{companyalias}/zones.json/summary</span></div>
</div>

### Response Parameters

Parameter | Description | Since |
--- | --- | ---
`pull` | The number of pull zones for your account | 1.0 |
`push` | The number of push zones for your account | 1.0 |
`vod` | The number of vod zones for your account | 1.0 |
`live` | The number of live zones for your account | 1.0 |


## Get Zone Count

Counts all zones on the specified account

<div class="heading">
<div class="url GET"><span class="http_method">GET</span>
<span class="path">https://rws.netdna.com/{companyalias}/zones.json/count</span></div>
</div>

### Response Parameters

Parameter | Description | Since |
--- | --- | ---
`count` | The total number of content zones for your account | 1.0 |




---

# Pull Zone API

## List Pull Zones

Returns a list of all pull zones on the specified account

<div class="heading">
<div class="url GET"><span class="http_method">GET</span>
<span class="path">https://rws.netdna.com/{companyalias}/zones/pull.json</span></div>
</div>

### Response Parameters

Parameter | Description | Since |
--- | --- | ---
`id` | Pull Zone ID | 1.0 |
`name` | Pull Zone name | 1.0 |
`url` | Origin URL | 1.0 |
`port` | Port | 1.0 |
`ip` | IP address of the Origin URL | 1.0 |
`compress` | On the fly compression of your files served from our edges.GZip compression for the following file types: text/plain,text/html, text/javascript, text/css, text/xml,application/javascript, application/x-javascript, application/xml,text/x-component, application/json, application/xhtml+xml,application/rss+xml, application/atom+xml, app/vnd.ms-fontobject,image/svg+xml, application/x-font-ttf, font/opentype | 1.0 |
`backend_compress` | Allow us to cache compressed versions of your files from theorigin. GZip compression for the following file types: text/plain,text/html, text/javascript, text/css, text/xml,application/javascript, application/x-javascript, application/xml,text/x-component, application/json, application/xhtml+xml,application/rss+xml, application/atom+xml, app/vnd.ms-fontobject,image/svg+xml, application/x-font-ttf, font/opentype | 1.0 |
`queries` | Treat Query Strings as a separate cacheable item | 1.0 |
`set_host_header` | The URL sent as the Host in all HTTP Response Headers | 1.0 |
`cache_valid` | Ignore the origin Cache-Control Header and set every request tohave a Max-Age of 1d, 7d, 1M or 12M | 1.0 |
`ignore_setcookie_header` | Ignore any cookies set by the origin in order to make thecontent consistently cacheable | 1.0 |
`ignore_cache_control` | Ignore any max age values set by the origin and use the CDN setvalue instead | 1.0 |
`use_stale` | Serve expired content while fetching new content. This willalso cause the CDN to serve expired content in cases where theorigin is down or the file is not found | 1.0 |
`proxy_cache_lock` | When multiple requests for an uncached file are received, theywill wait until the first response is received rather than sendingeach request back to the origin | 1.0 |
`label` | Something that describes your zone | 1.0 |
`valid_referers` | List of domains for http referrer protection (separated byspace). Only the domains in the list will be treated as validreferrers | 1.0 |
`expires` | Set any request with a no "Cache-Control header" from theorigin to stay on the server. Possible values are 1d, 7d, 1M,12M | 1.0 |
`disallow_robots` | Enable robots.txt | 1.0 |
`disallow_robots_txt` | Use custom robots.txt | 1.0 |
`canonical_link_headers` | Pass the canonical URL in the Link HTTP Header | 1.0 |
`content_disposition` | Force files to download | 1.0 |
`pseudo_streaming` | Enable the zone for pseudo streaming content | 1.0 |
`sslshared` | Enable Shared SSL. This feature allows you use your zone inHTTPS mode. You don't need your own SSL certificate, our servernetdna-ssl.com will be used. | 1.0 |
`suspend` | Flag denoting if the zone has been suspended | 1.0 |
`locked` | Flag denoting if the zone has been locked | 1.0 |
`inactive` | Flag denoting if the zone has been deleted | 1.0 |
`creation_date` | Date Created | 1.0 |


## Create Pull Zone

Creates a new pull zone

<div class="heading">
<div class="url POST"><span class="http_method">POST</span>
<span class="path">https://rws.netdna.com/{companyalias}/zones/pull.json</span></div>
</div>

### Accepted Request Parameters

Parameter | Default Value | Validation | Description | Since |
--- | --- | --- | --- | ---
`name` | - | <span class="label important">required</span><br />length: 3-32 chars; only letters, digits, and dash (-)accepted | Pull Zone Name | 1.0 |
`url` | - | <span class="label important">required</span><br />length: 4-100 chars; only valid URLs accepted | Origin URL | 1.0 |
`port` | 80 | length: 1-5 chars; only digits accepted | Port | 1.0 |
`ip` | - | length: 1-10 chars, only digits accepted | Valid IP address of the Origin URL. If omitted, the servicewill try to lookup the IP automatically. | 1.0 |
`compress` | 0 | only 0 or 1 accepted | On the fly compression of your files served from our edges.Enable GZip compression for the following file types: text/plain,text/html, text/javascript, text/css, text/xml,application/javascript, application/x-javascript, application/xml,text/x-component, application/json, application/xhtml+xml,application/rss+xml, application/atom+xml, app/vnd.ms-fontobject,image/svg+xml, application/x-font-ttf, font/opentype | 1.0 |
`backend_compress` | 0 | only 0 or 1 accepted | Allow us to cache compressed versions of your files from theorigin. Enable GZip compression for the following file types:text/plain, text/html, text/javascript, text/css, text/xml,application/javascript, application/x-javascript, application/xml,text/x-component, application/json, application/xhtml+xml,application/rss+xml, application/atom+xml, app/vnd.ms-fontobject,image/svg+xml, application/x-font-ttf, font/opentype | 1.0 |
`queries` | 0 | only 0 or 1 accepted | Treat Query Strings as a separate cacheable item | 1.0 |
`set_host_header` | - | length: 4-100 chars; only valid URLs accepted | The URL to send as the Host in all HTTP Response Headers | 1.0 |
`cache_valid` | 1d | length: 1-30 chars; must be a number followed by one of s, m,h, d, M, or Y | Ignore the origin Cache-Control Header and set every request tohave a Max-Age of 1d, 7d, 1M or 12M | 1.0 |
`ignore_setcookie_header` | 0 | only 0 or 1 accepted | Ignore any cookies set by the origin in order to make thecontent consistently cacheable | 1.0 |
`ignore_cache_control` | 0 | only 0 or 1 accepted | Ignore any max age values set by the origin and use the CDN setvalue instead | 1.0 |
`use_stale` | 0 | only 0 or 1 accepted | Serve expired content while fetching new content. This willalso cause the CDN to serve expired content in cases where theorigin is down or the file is not found | 1.0 |
`proxy_cache_lock` | 0 | only 0 or 1 accepted | When multiple requests for an uncached file are received, theywill wait until the first response is received rather than sendingeach request back to the origin | 1.0 |
`label` | - | length: 1-255 chars | Something that describes your zone | 1.0 |
`valid_referers` | - | length: 1-100 chars | List of domains for http referrer protection (separated byspace). Only the domains in the list will be treated as validreferrers | 1.0 |
`expires` | 1d | length: 1-32 chars | Set any request with a no "Cache-Control header" from theorigin to stay on the server. Possible values are 1d, 7d, 1M,12M | 1.0 |
`disallow_robots` | 0 | only 0 or 1 accepted | Enable robots.txt | 1.0 |
`disallow_robots_txt` | - | length 1-255 chars | Use custom robots.txt | 1.0 |
`canonical_link_headers` | 1 | only 0 or 1 accepted | Pass the canonical URL in the Link HTTP Header | 1.0 |
`content_disposition` | 0 | only 0 or 1 accepted | Force files to download | 1.0 |
`pseudo_streaming` | 0 | only 0 or 1 accepted | Enable the zone for pseudo streaming content | 1.0 |
`secret` | - | length: 1 - 32 chars | Use a secret to protect your files from unwanted visitors | 1.0 |
`sslshared` | 0 | only 0 or 1 accepted | Enable Shared SSL. This feature allows you use your zone inHTTPS mode. You don't need your own SSL certificate, our servernetdna-ssl.com will be used. | 1.0 |


### Response Parameters

Parameter | Description | Since |
--- | --- | ---
`id` | Pull Zone ID | 1.0 |
`name` | Pull Zone name | 1.0 |
`url` | Origin URL | 1.0 |
`port` | Port | 1.0 |
`ip` | IP address of the Origin URL | 1.0 |
`compress` | On the fly compression of your files served from our edges.GZip compression for the following file types: text/plain,text/html, text/javascript, text/css, text/xml,application/javascript, application/x-javascript, application/xml,text/x-component, application/json, application/xhtml+xml,application/rss+xml, application/atom+xml, app/vnd.ms-fontobject,image/svg+xml, application/x-font-ttf, font/opentype | 1.0 |
`backend_compress` | Allow us to cache compressed versions of your files from theorigin. GZip compression for the following file types: text/plain,text/html, text/javascript, text/css, text/xml,application/javascript, application/x-javascript, application/xml,text/x-component, application/json, application/xhtml+xml,application/rss+xml, application/atom+xml, app/vnd.ms-fontobject,image/svg+xml, application/x-font-ttf, font/opentype | 1.0 |
`queries` | Treat Query Strings as a separate cacheable item | 1.0 |
`set_host_header` | The URL sent as the Host in all HTTP Response Headers | 1.0 |
`cache_valid` | Ignore the origin Cache-Control Header and set every request tohave a Max-Age of 1d, 7d, 1M or 12M | 1.0 |
`ignore_setcookie_header` | Ignore any cookies set by the origin in order to make thecontent consistently cacheable | 1.0 |
`ignore_cache_control` | Ignore any max age values set by the origin and use the CDN setvalue instead | 1.0 |
`use_stale` | Serve expired content while fetching new content. This willalso cause the CDN to serve expired content in cases where theorigin is down or the file is not found | 1.0 |
`proxy_cache_lock` | When multiple requests for an uncached file are received, theywill wait until the first response is received rather than sendingeach request back to the origin | 1.0 |
`label` | Something that describes your zone | 1.0 |
`valid_referers` | List of domains for http referrer protection (separated byspace). Only the domains in the list will be treated as validreferrers | 1.0 |
`expires` | Set any request with a no "Cache-Control header" from theorigin to stay on the server. Possible values are 1d, 7d, 1M,12M | 1.0 |
`disallow_robots` | Enable robots.txt | 1.0 |
`disallow_robots_txt` | Use custom robots.txt | 1.0 |
`canonical_link_headers` | Pass the canonical URL in the Link HTTP Header | 1.0 |
`content_disposition` | Force files to download | 1.0 |
`pseudo_streaming` | Enable the zone for pseudo streaming content | 1.0 |
`sslshared` | Enable Shared SSL. This feature allows you use your zone inHTTPS mode. You don't need your own SSL certificate, our servernetdna-ssl.com will be used. | 1.0 |
`suspend` | Flag denoting if the zone has been suspended | 1.0 |
`locked` | Flag denoting if the zone has been locked | 1.0 |
`inactive` | Flag denoting if the zone has been deleted | 1.0 |
`creation_date` | Date Created | 1.0 |


## Get Pull Zones Count

Counts all pull zones on the specified account

<div class="heading">
<div class="url GET"><span class="http_method">GET</span>
<span class="path">https://rws.netdna.com/{companyalias}/zones/pull.json/count</span></div>
</div>

### Response Parameters

Parameter | Description | Since |
--- | --- | ---
`count` | The number of pull zones on the specified account | 1.0 |


## Get Pull Zone

Gets a pull zone specified by the {zone_id} parameter

<div class="heading">
<div class="url GET"><span class="http_method">GET</span>
<span class="path">https://rws.netdna.com/{companyalias}/zones/pull.json/{zone_id}</span></div>
</div>

### Response Parameters

Parameter | Description | Since |
--- | --- | ---
`id` | The Pull Zone ID | 1.0 |
`name` | Pull Zone name | 1.0 |
`url` | Origin URL | 1.0 |
`port` | Port | 1.0 |
`ip` | Valid IP address of the Origin URL. If omitted, the servicewill try to lookup the IP automatically. | 1.0 |
`compress` | On the fly compression of your files served from our edges.GZip compression for the following file types: text/plain,text/html, text/javascript, text/css, text/xml,application/javascript, application/x-javascript, application/xml,text/x-component, application/json, application/xhtml+xml,application/rss+xml, application/atom+xml, app/vnd.ms-fontobject,image/svg+xml, application/x-font-ttf, font/opentype | 1.0 |
`backend_compress` | Allow us to cache compressed versions of your files from theorigin. GZip compression for the following file types: text/plain,text/html, text/javascript, text/css, text/xml,application/javascript, application/x-javascript, application/xml,text/x-component, application/json, application/xhtml+xml,application/rss+xml, application/atom+xml, app/vnd.ms-fontobject,image/svg+xml, application/x-font-ttf, font/opentype | 1.0 |
`queries` | Treat Query Strings as a separate cacheable item | 1.0 |
`set_host_header` | The URL sent as the Host in all HTTP Response Headers | 1.0 |
`cache_valid` | Ignore the origin Cache-Control Header and set every request tohave a Max-Age of 1d, 7d, 1M or 12M | 1.0 |
`ignore_setcookie_header` | Ignore any cookies set by the origin in order to make thecontent consistently cacheable | 1.0 |
`ignore_cache_control` | Ignore any max age values set by the origin and use the CDN setvalue instead | 1.0 |
`use_stale` | Serve expired content while fetching new content. This willalso cause the CDN to serve expired content in cases where theorigin is down or the file is not found | 1.0 |
`proxy_cache_lock` | When multiple requests for an uncached file are received, theywill wait until the first response is received rather than sendingeach request back to the origin | 1.0 |
`label` | Something that describes your zone | 1.0 |
`valid_referers` | List of domains for http referrer protection (separated byspace). Only the domains in the list will be treated as validreferrers | 1.0 |
`expires` | Set any request with a no "Cache-Control header" from theorigin to stay on the server. Possible values are 1d, 7d, 1M,12M | 1.0 |
`disallow_robots` | Enable robots.txt | 1.0 |
`disallow_robots_txt` | Use custom robots.txt | 1.0 |
`canonical_link_headers` | Pass the canonical URL in the Link HTTP Header | 1.0 |
`content_disposition` | Force files to download | 1.0 |
`pseudo_streaming` | Enable the zone for pseudo streaming content | 1.0 |
`sslshared` | Enable Shared SSL. This feature allows you use your zone inHTTPS mode. You don't need your own SSL certificate, our servernetdna-ssl.com will be used. | 1.0 |
`suspend` | Flag denoting if the zone has been suspended | 1.0 |
`locked` | Flag denoting if the zone has been locked | 1.0 |
`inactive` | Flag denoting if the zone has been deleted | 1.0 |
`creation_date` | Date Created | 1.0 |


## Update Pull Zone

Updates a pull zone specified by the {zone_id} parameter

<div class="heading">
<div class="url PUT"><span class="http_method">PUT</span>
<span class="path">https://rws.netdna.com/{companyalias}/zones/pull.json/{zone_id}</span></div>
</div>

### Accepted Request Parameters

Parameter | Default Value | Validation | Description | Since |
--- | --- | --- | --- | ---
`url` | - | length: 4-100 chars; only valid URLs accepted | Origin URL | 1.0 |
`port` | 80 | length: 1-5 chars; only digits accepted | Port | 1.0 |
`compress` | 0 | only 0 or 1 accepted | On the fly compression of your files served from our edges.Enable GZip compression for the following file types: text/plain,text/html, text/javascript, text/css, text/xml,application/javascript, application/x-javascript, application/xml,text/x-component, application/json, application/xhtml+xml,application/rss+xml, application/atom+xml, app/vnd.ms-fontobject,image/svg+xml, application/x-font-ttf, font/opentype | 1.0 |
`backend_compress` | 0 | only 0 or 1 accepted | Allow us to cache compressed versions of your files from theorigin. Enable GZip compression for the following file types:text/plain, text/html, text/javascript, text/css, text/xml,application/javascript, application/x-javascript, application/xml,text/x-component, application/json, application/xhtml+xml,application/rss+xml, application/atom+xml, app/vnd.ms-fontobject,image/svg+xml, application/x-font-ttf, font/opentype | 1.0 |
`queries` | 0 | only 0 or 1 accepted | Treat Query Strings as a separate cacheable item | 1.0 |
`set_host_header` | - | length: 4-100 chars; only valid URLs accepted | The URL to send as the Host in all HTTP Response Headers | 1.0 |
`cache_valid` | - | length: 1-30 chars; must be a number followed by one of s, m,h, d, M, or Y | Ignore the origin Cache-Control Header and set every request tohave a Max-Age of 1d, 7d, 1M or 12M | 1.0 |
`ignore_setcookie_header` | 0 | only 0 or 1 accepted | Ignore any cookies set by the origin in order to make thecontent consistently cacheable | 1.0 |
`ignore_cache_control` | 0 | only 0 or 1 accepted | Ignore any max age values set by the origin and use the CDN setvalue instead | 1.0 |
`use_stale` | 0 | only 0 or 1 accepted | Serve expired content while fetching new content. This willalso cause the CDN to serve expired content in cases where theorigin is down or the file is not found | 1.0 |
`proxy_cache_lock` | 0 | only 0 or 1 accepted | When multiple requests for an uncached file are received, theywill wait until the first response is received rather than sendingeach request back to the origin | 1.0 |
`label` | - | length: 1-255 chars | Something that describes your zone | 1.0 |
`valid_referers` | - | length: 1-100 chars | List of domains for http referrer protection (separated byspace). Only the domains in the list will be treated as validreferrers | 1.0 |
`expires` | 1d | length: 1-32 chars | Set any request with a no "Cache-Control header" from theorigin to stay on the server. Possible values are 1d, 7d, 1M,12M | 1.0 |
`disallow_robots` | 0 | only 0 or 1 accepted | Enable robots.txt | 1.0 |
`disallow_robots_txt` | - | length: 1-255 chars | Use custom robots.txt | 1.0 |
`canonical_link_headers` | 1 | only 0 or 1 accepted | Pass the canonical URL in the Link HTTP Header | 1.0 |
`content_disposition` | 0 | only 0 or 1 accepted | Force files to download | 1.0 |
`pseudo_streaming` | 0 | only 0 or 1 accepted | Enable the zone for pseudo streaming content | 1.0 |
`secret` | - | length: 1 - 32 chars | Use a secret to protect your files from unwanted visitors | 1.0 |
`sslshared` | 0 | only 0 or 1 accepted | Enable Shared SSL. This feature allows you use your zone inHTTPS mode. You don't need your own SSL certificate, our servernetdna-ssl.com will be used. | 1.0 |


### Response Parameters

Parameter | Description | Since |
--- | --- | ---
`id` | Pull Zone ID | 1.0 |
`name` | Pull Zone name | 1.0 |
`url` | Origin URL | 1.0 |
`port` | Port | 1.0 |
`ip` | Valid IP address of the Origin URL. If omitted, the servicewill try to lookup the IP automatically. | 1.0 |
`compress` | On the fly compression of your files served from our edges.GZip compression for the following file types: text/plain,text/html, text/javascript, text/css, text/xml,application/javascript, application/x-javascript, application/xml,text/x-component, application/json, application/xhtml+xml,application/rss+xml, application/atom+xml, app/vnd.ms-fontobject,image/svg+xml, application/x-font-ttf, font/opentype | 1.0 |
`backend_compress` | Allow us to cache compressed versions of your files from theorigin. GZip compression for the following file types: text/plain,text/html, text/javascript, text/css, text/xml,application/javascript, application/x-javascript, application/xml,text/x-component, application/json, application/xhtml+xml,application/rss+xml, application/atom+xml, app/vnd.ms-fontobject,image/svg+xml, application/x-font-ttf, font/opentype | 1.0 |
`queries` | Treat Query Strings as a separate cacheable item | 1.0 |
`set_host_header` | The URL sent as the Host in all HTTP Response Headers | 1.0 |
`cache_valid` | Ignore the origin Cache-Control Header and set every request tohave a Max-Age of 1d, 7d, 1M or 12M | 1.0 |
`ignore_setcookie_header` | Ignore any cookies set by the origin in order to make thecontent consistently cacheable | 1.0 |
`ignore_cache_control` | Ignore any max age values set by the origin and use the CDN setvalue instead | 1.0 |
`use_stale` | Serve expired content while fetching new content. This willalso cause the CDN to serve expired content in cases where theorigin is down or the file is not found | 1.0 |
`proxy_cache_lock` | When multiple requests for an uncached file are received, theywill wait until the first response is received rather than sendingeach request back to the origin | 1.0 |
`label` | Something that describes your zone | 1.0 |
`valid_referers` | List of domains for http referrer protection (separated byspace). Only the domains in the list will be treated as validreferrers | 1.0 |
`expires` | Set any request with a no "Cache-Control header" from theorigin to stay on the server. Possible values are 1d, 7d, 1M,12M | 1.0 |
`disallow_robots` | Enable robots.txt | 1.0 |
`disallow_robots_txt` | Use custom robots.txt | 1.0 |
`canonical_link_headers` | Pass the canonical URL in the Link HTTP Header | 1.0 |
`content_disposition` | Force files to download | 1.0 |
`pseudo_streaming` | Enable the zone for pseudo streaming content | 1.0 |
`sslshared` | Enable Shared SSL. This feature allows you use your zone inHTTPS mode. You don't need your own SSL certificate, our servernetdna-ssl.com will be used. | 1.0 |
`suspend` | Flag denoting if the zone has been suspended | 1.0 |
`locked` | Flag denoting if the zone has been locked | 1.0 |
`inactive` | Flag denoting if the zone has been deleted | 1.0 |
`creation_date` | Date Created | 1.0 |


## Delete Pull Zone

Deletes a pull zone specified by the {zone_id} parameter

<div class="heading">
<div class="url DELETE"><span class="http_method">DELETE</span>
<span class="path">https://rws.netdna.com/{companyalias}/zones/pull.json/{zone_id}</span></div>
</div>

## Enable Pull Zone

Enables a pull zone specified by the {zone_id} parameter

<div class="heading">
<div class="url ENABLE"><span class="http_method">ENABLE</span>
<span class="path">https://rws.netdna.com/{companyalias}/zones/pull.json/{zone_id}</span></div>
</div>

## Disable Pull Zone

Disables a pull zone specified by the {zone_id} parameter

<div class="heading">
<div class="url DISABLE"><span class="http_method">DISABLE</span>
<span class="path">https://rws.netdna.com/{companyalias}/zones/pull.json/{zone_id}</span></div>
</div>

## Purge Cache

Purges pull zone cache

<div class="heading">
<div class="url DELETE"><span class="http_method">DELETE</span>
<span class="path">https://rws.netdna.com/{companyalias}/zones/pull.json/{zone_id}/cache</span></div>
</div>

### Accepted Request Parameters

Parameter | Default Value | Validation | Description | Since |
--- | --- | --- | --- | ---
`files` | - | An array containing relative paths of the files to purge (i.e./favicon.ico) | 1.0 |




---

# Pull Zone Custom Domains API

## List Custom Domains

Returns a list of all custom domains on the zone specified by
{zone_id}

<div class="heading">
<div class="url GET"><span class="http_method">GET</span>
<span class="path">https://rws.netdna.com/{companyalias}/zones/pull/{zone_id}/customdomains.json</span></div>
</div>

### Response Parameters

Parameter | Description | Since |
--- | --- | ---
`id` | The id of the custom domain | 1.0 |
`bucket_id` | The id of the zone the custom domain belongs to | 1.0 |
`custom_domain` | A valid custom domain | 1.0 |


## Create Custom Domain

Adds a new custom domain to {zone_id}

<div class="heading">
<div class="url POST"><span class="http_method">POST</span>
<span class="path">https://rws.netdna.com/{companyalias}/zones/pull/{zone_id}/customdomains.json</span></div>
</div>

### Accepted Request Parameters

Parameter | Default Value | Validation | Description | Since |
--- | --- | --- | --- | ---
`custom_domain` | - | <span class="label important">required</span><br />length: 1-255 chars, valid::custom_domain, !valid::full_domain | A valid custom domain | 1.0 |
`type` | - | Applies only to Vod Zones and must be either 'vod-rtmp','vod-pseudo', 'vod-direct', or 'vod-ftp' | The type of custom domain being created | 1.0 |


### Response Parameters

Parameter | Description | Since |
--- | --- | ---
`id` | The id of the custom domain | 1.0 |
`bucket_id` | The id of the zone the custom domain belongs to | 1.0 |
`custom_domain` | The valid custom domain | 1.0 |


## Get Custom Domain

Gets a custom domain specified by the {zone_id} and
{customdomain_id} parameters

<div class="heading">
<div class="url GET"><span class="http_method">GET</span>
<span class="path">https://rws.netdna.com/{companyalias}/zones/pull/{zone_id}/customdomains.json/{customdomain_id}</span></div>
</div>

### Response Parameters

Parameter | Description | Since |
--- | --- | ---
`id` | The id of the custom domain | 1.0 |
`bucket_id` | The id of the zone the custom domain belongs to | 1.0 |
`custom_domain` | The valid custom domain | 1.0 |


## Update Custom Domain

Updates a custom domain specified by the id parameter

<div class="heading">
<div class="url PUT"><span class="http_method">PUT</span>
<span class="path">https://rws.netdna.com/{companyalias}/zones/pull/{zone_id}/customdomains.json/{customdomain_id}</span></div>
</div>

### Accepted Request Parameters

Parameter | Default Value | Validation | Description | Since |
--- | --- | --- | --- | ---
`custom_domain` | - | <span class="label important">required</span><br />length: 1-255 chars, valid::custom_domain, !valid::full_domain | A new valid custom domain | 1.0 |


### Response Parameters

Parameter | Description | Since |
--- | --- | ---
`id` | The id of the custom domain | 1.0 |
`bucket_id` | The id of the zone the custom domain belongs to | 1.0 |
`custom_domain` | The new valid custom domain | 1.0 |


## Delete Custom Domain

Deletes a custom domain specified by the {zone_id} and
{customdomain_id} parameters

<div class="heading">
<div class="url DELETE"><span class="http_method">DELETE</span>
<span class="path">https://rws.netdna.com/{companyalias}/zones/pull/{zone_id}/customdomains.json/{customdomain_id}</span></div>
</div>



---

# Push Zone API

## List Push Zones

Returns a list of all push zones on the specified account

<div class="heading">
<div class="url GET"><span class="http_method">GET</span>
<span class="path">https://rws.netdna.com/{companyalias}/zones/push.json</span></div>
</div>

### Response Parameters

Parameter | Description | Since |
--- | --- | ---
`id` | Push Zone ID | 1.0 |
`name` | Push Zone name | 1.0 |
`label` | Something that describes your zone | 1.0 |
`valid_referers` | List of domains for http referrer protection (separated byspace). Only the domains in the list will be treated as validreferrers | 1.0 |
`content_disposition` | Force files to download | 1.0 |
`sslshared` | Enable Shared SSL. This feature allows you use your zone inHTTPS mode. You don't need your own SSL certificate, our servernetdna-ssl.com will be used. | 1.0 |
`suspend` | Flag denoting if the zone has been suspended | 1.0 |
`locked` | Flag denoting if the zone has been locked | 1.0 |
`inactive` | Flag denoting if the zone has been deleted | 1.0 |
`creation_date` | Date Created | 1.0 |


## Create Push Zone

Creates a new push zone

<div class="heading">
<div class="url POST"><span class="http_method">POST</span>
<span class="path">https://rws.netdna.com/{companyalias}/zones/push.json</span></div>
</div>

### Accepted Request Parameters

Parameter | Default Value | Validation | Description | Since |
--- | --- | --- | --- | ---
`name` | - | <span class="label important">required</span><br />length: 3-30 chars; only letters, digits, and dash (-)accepted | Push Zone name | 1.0 |
`password` | - | <span class="label important">required</span><br />length: 5-30 chars; | Push Zone FTP password | 1.0 |
`label` | - | length: 1-255 chars | Something that describes your zone | 1.0 |
`valid_referers` | - | length: 1-200 chars | List of domains for http referrer protection (separated byspace). Only the domains in the list will be treated as validreferrers | 1.0 |
`content_disposition` | 0 | only 0 or 1 accepted | Force files to download | 1.0 |
`sslshared` | 0 | only 0 or 1 accepted | Enable Shared SSL. This feature allows you use your zone inHTTPS mode. You don't need your own SSL certificate, our servernetdna-ssl.com will be used. | 1.0 |


### Response Parameters

Parameter | Description | Since |
--- | --- | ---
`id` | Push Zone ID | 1.0 |
`name` | Push Zone name | 1.0 |
`label` | Something that describes your zone | 1.0 |
`valid_referers` | List of domains for http referrer protection (separated byspace). Only the domains in the list will be treated as validreferrers | 1.0 |
`content_disposition` | Force files to download | 1.0 |
`sslshared` | Enable Shared SSL. This feature allows you use your zone inHTTPS mode. You don't need your own SSL certificate, our servernetdna-ssl.com will be used. | 1.0 |
`suspend` | Flag denoting if the zone has been suspended | 1.0 |
`locked` | Flag denoting if the zone has been locked | 1.0 |
`inactive` | Flag denoting if the zone has been deleted | 1.0 |
`creation_date` | Date Created | 1.0 |


## Get Push Zones Count

Counts all push zones on the specified account

<div class="heading">
<div class="url GET"><span class="http_method">GET</span>
<span class="path">https://rws.netdna.com/{companyalias}/zones/push.json/count</span></div>
</div>

### Response Parameters

Parameter | Description | Since |
--- | --- | ---
`count` | The number of push zones on the specified account | 1.0 |


## Get Push Zone

Gets a push zone specified by the {zone_id} parameter

<div class="heading">
<div class="url GET"><span class="http_method">GET</span>
<span class="path">https://rws.netdna.com/{companyalias}/zones/push.json/{zone_id}</span></div>
</div>

### Response Parameters

Parameter | Description | Since |
--- | --- | ---
`id` | Push Zone ID | 1.0 |
`name` | Push Zone name | 1.0 |
`label` | Something that describes your zone | 1.0 |
`valid_referers` | List of domains for http referrer protection (separated byspace). Only the domains in the list will be treated as validreferrers | 1.0 |
`content_disposition` | Force files to download | 1.0 |
`sslshared` | Enable Shared SSL. This feature allows you use your zone inHTTPS mode. You don't need your own SSL certificate, our servernetdna-ssl.com will be used. | 1.0 |
`suspend` | Flag denoting if the zone has been suspended | 1.0 |
`locked` | Flag denoting if the zone has been locked | 1.0 |
`inactive` | Flag denoting if the zone has been deleted | 1.0 |
`creation_date` | Date Created | 1.0 |


## Update Push Zone

Updates a push zone specified by the {zone_id} parameter

<div class="heading">
<div class="url PUT"><span class="http_method">PUT</span>
<span class="path">https://rws.netdna.com/{companyalias}/zones/push.json/{zone_id}</span></div>
</div>

### Accepted Request Parameters

Parameter | Default Value | Validation | Description | Since |
--- | --- | --- | --- | ---
`label` | - | length: 1-255 chars | Something that describes your zone | 1.0 |
`valid_referers` | - | length: 1-100 chars | List of domains for http referrer protection (separated byspace). Only the domains in the list will be treated as validreferrers | 1.0 |
`content_disposition` | 0 | only 0 or 1 accepted | Force files to download | 1.0 |
`sslshared` | 0 | only 0 or 1 accepted | Enable Shared SSL. This feature allows you use your zone inHTTPS mode. You don't need your own SSL certificate, our servernetdna-ssl.com will be used. | 1.0 |


### Response Parameters

Parameter | Description | Since |
--- | --- | ---
`id` | Push Zone ID | 1.0 |
`name` | Push Zone name | 1.0 |
`label` | Something that describes your zone | 1.0 |
`valid_referers` | List of domains for http referrer protection (separated byspace). Only the domains in the list will be treated as validreferrers | 1.0 |
`content_disposition` | Force files to download | 1.0 |
`sslshared` | Enable Shared SSL. This feature allows you use your zone inHTTPS mode. You don't need your own SSL certificate, our servernetdna-ssl.com will be used. | 1.0 |
`suspend` | Flag denoting if the zone has been suspended | 1.0 |
`locked` | Flag denoting if the zone has been locked | 1.0 |
`inactive` | Flag denoting if the zone has been deleted | 1.0 |
`creation_date` | Date Created | 1.0 |


## Delete Push Zone

Deletes a push zone specified by the {zone_id} parameter

<div class="heading">
<div class="url DELETE"><span class="http_method">DELETE</span>
<span class="path">https://rws.netdna.com/{companyalias}/zones/push.json/{zone_id}</span></div>
</div>

## Enable Push Zone

Enables a push zone specified by the {zone_id} parameter

<div class="heading">
<div class="url ENABLE"><span class="http_method">ENABLE</span>
<span class="path">https://rws.netdna.com/{companyalias}/zones/push.json/{zone_id}</span></div>
</div>

## Disable Push Zone

Disables a push zone specified by the {zone_id} parameter

<div class="heading">
<div class="url DISABLE"><span class="http_method">DISABLE</span>
<span class="path">https://rws.netdna.com/{companyalias}/zones/push.json/{zone_id}</span></div>
</div>



---

# Push Zone Custom Domains API

## List Custom Domains

Returns a list of all custom domains on the zone specified by
{zone_id}

<div class="heading">
<div class="url GET"><span class="http_method">GET</span>
<span class="path">https://rws.netdna.com/{companyalias}/zones/push/{zone_id}/customdomains.json</span></div>
</div>

### Response Parameters

Parameter | Description | Since |
--- | --- | ---
`id` | The id of the custom domain | 1.0 |
`bucket_id` | The id of the zone the custom domain belongs to | 1.0 |
`custom_domain` | A valid custom domain | 1.0 |


## Create Custom Domain

Adds a new custom domain to {zone_id}

<div class="heading">
<div class="url POST"><span class="http_method">POST</span>
<span class="path">https://rws.netdna.com/{companyalias}/zones/push/{zone_id}/customdomains.json</span></div>
</div>

### Accepted Request Parameters

Parameter | Default Value | Validation | Description | Since |
--- | --- | --- | --- | ---
`custom_domain` | - | <span class="label important">required</span><br />length: 1-255 chars, valid::custom_domain, !valid::full_domain | A valid custom domain | 1.0 |
`type` | - | Applies only to Vod Zones and must be either 'vod-rtmp','vod-pseudo', 'vod-direct', or 'vod-ftp' | The type of custom domain being created | 1.0 |


### Response Parameters

Parameter | Description | Since |
--- | --- | ---
`id` | The id of the custom domain | 1.0 |
`bucket_id` | The id of the zone the custom domain belongs to | 1.0 |
`custom_domain` | The valid custom domain | 1.0 |


## Get Custom Domain

Gets a custom domain specified by the {zone_id} and
{customdomain_id} parameters

<div class="heading">
<div class="url GET"><span class="http_method">GET</span>
<span class="path">https://rws.netdna.com/{companyalias}/zones/push/{zone_id}/customdomains.json/{customdomain_id}</span></div>
</div>

### Response Parameters

Parameter | Description | Since |
--- | --- | ---
`id` | The id of the custom domain | 1.0 |
`bucket_id` | The id of the zone the custom domain belongs to | 1.0 |
`custom_domain` | The valid custom domain | 1.0 |


## Update Custom Domain

Updates a custom domain specified by the id parameter

<div class="heading">
<div class="url PUT"><span class="http_method">PUT</span>
<span class="path">https://rws.netdna.com/{companyalias}/zones/push/{zone_id}/customdomains.json/{customdomain_id}</span></div>
</div>

### Accepted Request Parameters

Parameter | Default Value | Validation | Description | Since |
--- | --- | --- | --- | ---
`custom_domain` | - | <span class="label important">required</span><br />length: 1-255 chars, valid::custom_domain, !valid::full_domain | A new valid custom domain | 1.0 |


### Response Parameters

Parameter | Description | Since |
--- | --- | ---
`id` | The id of the custom domain | 1.0 |
`bucket_id` | The id of the zone the custom domain belongs to | 1.0 |
`custom_domain` | The new valid custom domain | 1.0 |


## Delete Custom Domain

Deletes a custom domain specified by the {zone_id} and
{customdomain_id} parameters

<div class="heading">
<div class="url DELETE"><span class="http_method">DELETE</span>
<span class="path">https://rws.netdna.com/{companyalias}/zones/push/{zone_id}/customdomains.json/{customdomain_id}</span></div>
</div>



---

# VOD Zone API

## List VOD Zones

Returns a list of all VOD zones on the specified account

<div class="heading">
<div class="url GET"><span class="http_method">GET</span>
<span class="path">https://rws.netdna.com/{companyalias}/zones/vod.json</span></div>
</div>

### Response Parameters

Parameter | Description | Since |
--- | --- | ---
`id` | VOD Zone ID | 1.0 |
`name` | VOD Zone name | 1.0 |
`label` | The zone's description | 1.0 |
`suspend` | Flag denoting if the zone has been suspended | 1.0 |
`locked` | Flag denoting if the zone has been locked | 1.0 |
`inactive` | Flag denoting if the zone has been deleted | 1.0 |
`creation_date` | Date Created | 1.0 |


## Create VOD Zone

Creates a new VOD zone

<div class="heading">
<div class="url POST"><span class="http_method">POST</span>
<span class="path">https://rws.netdna.com/{companyalias}/zones/vod.json</span></div>
</div>

### Accepted Request Parameters

Parameter | Default Value | Validation | Description | Since |
--- | --- | --- | --- | ---
`name` | - | <span class="label important">required</span><br />length: 3-30 chars; only letters, digits, and dash (-)accepted | VOD Zone user name | 1.0 |
`password` | - | <span class="label important">required</span><br />length: 5-30 chars | Your desired password | 1.0 |
`token` | - | length: 1-64 chars | The token value (shared secret) for secure streaming | 1.0 |
`label` | - | length: 1-255 chars | Something that describes your zone | 1.0 |


### Response Parameters

Parameter | Description | Since |
--- | --- | ---
`id` | VOD Zone ID | 1.0 |
`name` | VOD Zone name | 1.0 |
`label` | The zone's description | 1.0 |
`suspend` | Flag denoting if the zone has been suspended | 1.0 |
`locked` | Flag denoting if the zone has been locked | 1.0 |
`inactive` | Flag denoting if the zone has been deleted | 1.0 |
`creation_date` | Date Created | 1.0 |


## Get VOD Zones Count

Counts all vod zones on the specified account

<div class="heading">
<div class="url GET"><span class="http_method">GET</span>
<span class="path">https://rws.netdna.com/{companyalias}/zones/vod.json/count</span></div>
</div>

### Response Parameters

Parameter | Description | Since |
--- | --- | ---
`count` | The number of vod zones on the specified account | 1.0 |


## Get VOD Zone

Gets a VOD zone specified by the {zone_id} parameter

<div class="heading">
<div class="url GET"><span class="http_method">GET</span>
<span class="path">https://rws.netdna.com/{companyalias}/zones/vod.json/{zone_id}</span></div>
</div>

### Response Parameters

Parameter | Description | Since |
--- | --- | ---
`id` | VOD Zone ID | 1.0 |
`name` | VOD Zone name | 1.0 |
`label` | The zone's description | 1.0 |
`suspend` | Flag denoting if the zone has been suspended | 1.0 |
`locked` | Flag denoting if the zone has been locked | 1.0 |
`inactive` | Flag denoting if the zone has been deleted | 1.0 |
`creation_date` | Date Created | 1.0 |


## Update VOD Zone

Updates a VOD zone specified by the {zone_id} parameter

<div class="heading">
<div class="url PUT"><span class="http_method">PUT</span>
<span class="path">https://rws.netdna.com/{companyalias}/zones/vod.json/{zone_id}</span></div>
</div>

### Accepted Request Parameters

Parameter | Default Value | Validation | Description | Since |
--- | --- | --- | --- | ---
`password` | - | length: 5-30 chars | Your desired password | 1.0 |
`token` | - | length: 1-64 chars | The token value (shared secret) for secure streaming | 1.0 |
`label` | - | length: 1-255 chars | Something that describes your zone | 1.0 |


### Response Parameters

Parameter | Description | Since |
--- | --- | ---
`id` | VOD Zone ID | 1.0 |
`name` | VOD Zone name | 1.0 |
`label` | The zone's description | 1.0 |
`suspend` | Flag denoting if the zone has been suspended | 1.0 |
`locked` | Flag denoting if the zone has been locked | 1.0 |
`inactive` | Flag denoting if the zone has been deleted | 1.0 |
`creation_date` | Date Created | 1.0 |


## Delete VOD Zone

Deletes a VOD zone specified by the {zone_id} parameter

<div class="heading">
<div class="url DELETE"><span class="http_method">DELETE</span>
<span class="path">https://rws.netdna.com/{companyalias}/zones/vod.json/{zone_id}</span></div>
</div>

## Enable VOD Zone

Enables a VOD zone specified by the {zone_id} parameter

<div class="heading">
<div class="url ENABLE"><span class="http_method">ENABLE</span>
<span class="path">https://rws.netdna.com/{companyalias}/zones/vod.json/{zone_id}</span></div>
</div>

## Disable VOD Zone

Disables a VOD zone specified by the {zone_id} parameter

<div class="heading">
<div class="url DISABLE"><span class="http_method">DISABLE</span>
<span class="path">https://rws.netdna.com/{companyalias}/zones/vod.json/{zone_id}</span></div>
</div>



---

# VOD Zone Custom Domains API

## List Custom Domains

Returns a list of all custom domains on the zone specified by
{zone_id}

<div class="heading">
<div class="url GET"><span class="http_method">GET</span>
<span class="path">https://rws.netdna.com/{companyalias}/zones/vod/{zone_id}/customdomains.json</span></div>
</div>

### Response Parameters

Parameter | Description | Since |
--- | --- | ---
`id` | The id of the custom domain | 1.0 |
`bucket_id` | The id of the zone the custom domain belongs to | 1.0 |
`custom_domain` | A valid custom domain | 1.0 |


## Create Custom Domain

Adds a new custom domain to {zone_id}

<div class="heading">
<div class="url POST"><span class="http_method">POST</span>
<span class="path">https://rws.netdna.com/{companyalias}/zones/vod/{zone_id}/customdomains.json</span></div>
</div>

### Accepted Request Parameters

Parameter | Default Value | Validation | Description | Since |
--- | --- | --- | --- | ---
`custom_domain` | - | <span class="label important">required</span><br />length: 1-255 chars, valid::custom_domain, !valid::full_domain | A valid custom domain | 1.0 |
`type` | - | Applies only to Vod Zones and must be either 'vod-rtmp','vod-pseudo', 'vod-direct', or 'vod-ftp' | The type of custom domain being created | 1.0 |


### Response Parameters

Parameter | Description | Since |
--- | --- | ---
`id` | The id of the custom domain | 1.0 |
`bucket_id` | The id of the zone the custom domain belongs to | 1.0 |
`custom_domain` | The valid custom domain | 1.0 |


## Get Custom Domain

Gets a custom domain specified by the {zone_id} and
{customdomain_id} parameters

<div class="heading">
<div class="url GET"><span class="http_method">GET</span>
<span class="path">https://rws.netdna.com/{companyalias}/zones/vod/{zone_id}/customdomains.json/{customdomain_id}</span></div>
</div>

### Response Parameters

Parameter | Description | Since |
--- | --- | ---
`id` | The id of the custom domain | 1.0 |
`bucket_id` | The id of the zone the custom domain belongs to | 1.0 |
`custom_domain` | The valid custom domain | 1.0 |


## Update Custom Domain

Updates a custom domain specified by the id parameter

<div class="heading">
<div class="url PUT"><span class="http_method">PUT</span>
<span class="path">https://rws.netdna.com/{companyalias}/zones/vod/{zone_id}/customdomains.json/{customdomain_id}</span></div>
</div>

### Accepted Request Parameters

Parameter | Default Value | Validation | Description | Since |
--- | --- | --- | --- | ---
`custom_domain` | - | <span class="label important">required</span><br />length: 1-255 chars, valid::custom_domain, !valid::full_domain | A new valid custom domain | 1.0 |


### Response Parameters

Parameter | Description | Since |
--- | --- | ---
`id` | The id of the custom domain | 1.0 |
`bucket_id` | The id of the zone the custom domain belongs to | 1.0 |
`custom_domain` | The new valid custom domain | 1.0 |


## Delete Custom Domain

Deletes a custom domain specified by the {zone_id} and
{customdomain_id} parameters

<div class="heading">
<div class="url DELETE"><span class="http_method">DELETE</span>
<span class="path">https://rws.netdna.com/{companyalias}/zones/vod/{zone_id}/customdomains.json/{customdomain_id}</span></div>
</div>



---

# Live Zone API

## List Live Zones

Returns a list of all live zones on the specified account

<div class="heading">
<div class="url GET"><span class="http_method">GET</span>
<span class="path">https://rws.netdna.com/{companyalias}/zones/live.json</span></div>
</div>

### Response Parameters

Parameter | Description | Since |
--- | --- | ---
`id` | Live Zone ID | 1.0 |
`name` | Live Zone name | 1.0 |
`label` | The zone's description | 1.0 |
`suspend` | Flag denoting if the zone has been suspended | 1.0 |
`locked` | Flag denoting if the zone has been locked | 1.0 |
`inactive` | Flag denoting if the zone has been deleted | 1.0 |
`creation_date` | Date Created | 1.0 |


## Create Live Zone

Creates a new live zone

<div class="heading">
<div class="url POST"><span class="http_method">POST</span>
<span class="path">https://rws.netdna.com/{companyalias}/zones/live.json</span></div>
</div>

### Accepted Request Parameters

Parameter | Default Value | Validation | Description | Since |
--- | --- | --- | --- | ---
`name` | - | <span class="label important">required</span><br />length: 3-30 chars; only letters, digits, and dash (-)accepted | Your desired zone name | 1.0 |
`password` | - | length: 5-30 chars | Your desired password | 1.0 |
`label` | - | length: 1-255 chars | Something that describes your zone | 1.0 |


### Response Parameters

Parameter | Description | Since |
--- | --- | ---
`id` | Live Zone ID | 1.0 |
`name` | Live Zone name | 1.0 |
`label` | The zone's description | 1.0 |
`suspend` | Flag denoting if the zone has been suspended | 1.0 |
`locked` | Flag denoting if the zone has been locked | 1.0 |
`inactive` | Flag denoting if the zone has been deleted | 1.0 |
`creation_date` | Date Created | 1.0 |


## Get Live Zones Count

Counts all live zones on the specified account

<div class="heading">
<div class="url GET"><span class="http_method">GET</span>
<span class="path">https://rws.netdna.com/{companyalias}/zones/live.json/count</span></div>
</div>

### Response Parameters

Parameter | Description | Since |
--- | --- | ---
`count` | The number of live zones on the specified account | 1.0 |


## Get Live Zone

Gets a live zone specified by the {zone_id} parameter

<div class="heading">
<div class="url GET"><span class="http_method">GET</span>
<span class="path">https://rws.netdna.com/{companyalias}/zones/live.json/{zone_id}</span></div>
</div>

### Response Parameters

Parameter | Description | Since |
--- | --- | ---
`id` | Live Zone ID | 1.0 |
`name` | Live Zone name | 1.0 |
`label` | The zone's description | 1.0 |
`suspend` | Flag denoting if the zone has been suspended | 1.0 |
`locked` | Flag denoting if the zone has been locked | 1.0 |
`inactive` | Flag denoting if the zone has been deleted | 1.0 |
`creation_date` | Date Created | 1.0 |


## Update Live Zone

Updates a live zone specified by the {zone_id} parameter

<div class="heading">
<div class="url PUT"><span class="http_method">PUT</span>
<span class="path">https://rws.netdna.com/{companyalias}/zones/live.json/{zone_id}</span></div>
</div>

### Accepted Request Parameters

Parameter | Default Value | Validation | Description | Since |
--- | --- | --- | --- | ---
`password` | - | length: 5-30 chars | Your desired password | 1.0 |
`token` | - | length: 1-64 chars | The token value (shared secret) for secure streaming | 1.0 |
`label` | - | length: 1-255 chars | Something that describes your zone | 1.0 |


### Response Parameters

Parameter | Description | Since |
--- | --- | ---
`id` | Live Zone ID | 1.0 |
`name` | Live Zone name | 1.0 |
`label` | The zone's description | 1.0 |
`suspend` | Flag denoting if the zone has been suspended | 1.0 |
`locked` | Flag denoting if the zone has been locked | 1.0 |
`inactive` | Flag denoting if the zone has been deleted | 1.0 |
`creation_date` | Date Created | 1.0 |


## Delete Live Zone

Deletes a live zone specified by the {zone_id} parameter

<div class="heading">
<div class="url DELETE"><span class="http_method">DELETE</span>
<span class="path">https://rws.netdna.com/{companyalias}/zones/live.json/{zone_id}</span></div>
</div>

## Enable Live Zone

Enables a live zone specified by the {zone_id} parameter

<div class="heading">
<div class="url ENABLE"><span class="http_method">ENABLE</span>
<span class="path">https://rws.netdna.com/{companyalias}/zones/live.json/{zone_id}</span></div>
</div>

## Disable Live Zone

Disables a live zone specified by the {zone_id} parameter

<div class="heading">
<div class="url DISABLE"><span class="http_method">DISABLE</span>
<span class="path">https://rws.netdna.com/{companyalias}/zones/live.json/{zone_id}</span></div>
</div>



---

# Zones SSL API

## Get Zone's SSL Information

Get the SSL certificate for the specified {zone_type} and
{zone_id}.

<div class="heading">
<div class="url GET"><span class="http_method">GET</span>
<span class="path">https://rws.netdna.com/{companyalias}/zones/{zone_type}/{zone_id}/ssl.json</span></div>
</div>

## Install SSL on Zone

Upload an SSL certificate for the specified {zone_type} and
{zone_id}.

<div class="heading">
<div class="url POST"><span class="http_method">POST</span>
<span class="path">https://rws.netdna.com/{companyalias}/zones/{zone_type}/{zone_id}/ssl.json</span></div>
</div>

### Accepted Request Parameters

Parameter | Default Value | Validation | Description | Since |
--- | --- | --- | --- | ---
`ssl_crt` | - | <span class="label important">required</span><br /> | The SSL certificate you are installing. | 1.0 |
`ssl_key` | - | <span class="label important">required</span><br /> | The key for the SSL certificate you are installing. | 1.0 |
`ssl_cabundle` | - | The CA Bundle for the SSL Certificate you are installing. | 1.0 |


### Response Parameters

Parameter | Description | Since |
--- | --- | ---
`id` | The SSL Certificate ID. | 1.0 |
`ssl_crt` | The SSL certificate. | 1.0 |
`ssl_key` | The SSL Private Key. | 1.0 |
`ssl_cabundle` | The CA Bundle for the cert. | 1.0 |
`domain` | The domain applicable to this certificate. | 1.0 |
`date_expiration` | The date of expiration for the certificate. | 1.0 |
`wildcard` | Flag to signify whether this is a wildcard certificate. | 1.0 |


## Update Zone's SSL Information

Update the SSL certificate for the specified {zone_type} and
{zone_id}.

<div class="heading">
<div class="url PUT"><span class="http_method">PUT</span>
<span class="path">https://rws.netdna.com/{companyalias}/zones/{zone_type}/{zone_id}/ssl.json</span></div>
</div>

### Accepted Request Parameters

Parameter | Default Value | Validation | Description | Since |
--- | --- | --- | --- | ---
`ssl_crt` | - | <span class="label important">required</span><br /> | The SSL certificate you are installing. | 1.0 |
`ssl_key` | - | <span class="label important">required</span><br /> | The key for the SSL certificate you are installing. | 1.0 |
`ssl_cabundle` | - | The CABundle for the SSL Certificate you are installing. | 1.0 |


### Response Parameters

Parameter | Description | Since |
--- | --- | ---
`id` | The SSL Certificate ID. | 1.0 |
`ssl_crt` | The SSL certificate. | 1.0 |
`ssl_key` | The SSL Private Key. | 1.0 |
`ssl_cabundle` | The CA Bundle for the cert. | 1.0 |
`domain` | The domain applicable to this certificate. | 1.0 |
`date_expiration` | The date of expiration for the certificate. | 1.0 |
`wildcard` | Flag to signify whether this is a wildcard certificate. | 1.0 |


## Remove Zone's SSL Information

Remove the SSL certificate for the specified {zone_type} and
{zone_id}.

<div class="heading">
<div class="url DELETE"><span class="http_method">DELETE</span>
<span class="path">https://rws.netdna.com/{companyalias}/zones/{zone_type}/{zone_id}/ssl.json</span></div>
</div>



---

# Zones Upstream API

## Get Upstream information for the current zone

Get the upstream information for the specified {zone_id}.

<div class="heading">
<div class="url GET"><span class="http_method">GET</span>
<span class="path">https://rws.netdna.com/{companyalias}/zones/{zone_type}/{zone_id}/upstream.json</span></div>
</div>

## Enable Upstream on Zone

Create and enable Upstream for a specific {zone_id}.

<div class="heading">
<div class="url POST"><span class="http_method">POST</span>
<span class="path">https://rws.netdna.com/{companyalias}/zones/{zone_type}/{zone_id}/upstream.json</span></div>
</div>

### Accepted Request Parameters

Parameter | Default Value | Validation | Description | Since |
--- | --- | --- | --- | ---
`server_url` | - | <span class="label important">required</span><br /> | The server url or ip to provide the streaming resources | 1.0.1 |
`port` | - | <span class="label important">required</span><br /> | The port where server is to be called | 1.0.1 |


### Response Parameters

Parameter | Description | Since |
--- | --- | ---
`id` | The Upstream ID. | 1.0.1 |
`bucket_id` | The bucket_id it belongs to | 1.0.1 |
`server_url` | The server url or ip | 1.0.1 |
`port` | The port it uses to call the server | 1.0.1 |


## Update Zone's Upstream Information

Update the Upstream information for the specified {zone_id}.

<div class="heading">
<div class="url PUT"><span class="http_method">PUT</span>
<span class="path">https://rws.netdna.com/{companyalias}/zones/{zone_type}/{zone_id}/upstream.json</span></div>
</div>

### Accepted Request Parameters

Parameter | Default Value | Validation | Description | Since |
--- | --- | --- | --- | ---
`upstream_id` | - | <span class="label important">required</span><br /> | The Upstream Information you're modifying. | 1.0.1 |
`server_url` | - | <span class="label important">required</span><br /> | The server url or ip | 1.0.1 |
`port` | - | <span class="label important">required</span><br /> | The port it uses to call the server | 1.0.1 |


### Response Parameters

Parameter | Description | Since |
--- | --- | ---
`id` | The Upstream ID. | 1.0.1 |
`bucket_id` | The bucket_id it belongs to | 1.0.1 |
`server_url` | The server url or ip | 1.0.1 |
`port` | The port it uses to call the server | 1.0.1 |


## Remove Zone's Upstream Information

Remove the Upstream Information for the specified {zone_id}.

<div class="heading">
<div class="url DELETE"><span class="http_method">DELETE</span>
<span class="path">https://rws.netdna.com/{companyalias}/zones/{zone_type}/{zone_id}/upstream.json</span></div>
</div>



---

# Reports by Zone API

## List Zone Stats

Gets all zone usage statistics optionally broken up by
{report_type}. If no {report_type} is given the request will return
the total usage for the zones.

<div class="heading">
<div class="url GET"><span class="http_method">GET</span>
<span class="path">https://rws.netdna.com/{companyalias}/reports/stats.json/{report_type}</span></div>
</div>

### Accepted Request Parameters

Parameter | Default Value | Validation | Description | Since |
--- | --- | --- | --- | ---
`date_from` | now() - 1 month | Y-m-d (e.g. 2012-01-01) | Start date | 1.0 |
`date_to` | now() | Y-m-d (e.g. 2012-01-01) | End date | 1.0 |


### Response Parameters

Parameter | Description | Since |
--- | --- | ---
`size` | The amount of bytes transferred | 1.0 |
`hit` | The number of times files were requested | 1.0 |
`noncache_hit` | The number of times a requested file was not in cache | 1.0 |
`cache_hit` | The number of times a requested file was already cached | 1.0 |
`timestamp` | The timestamp for the corresponding {report_type}. | 1.0 |


## List Stats per Zone

Gets the {zone_id} usage statistics optionally broken up by
{report_type}. If no {report_type} is given the request will return
the total usage for the zones.

<div class="heading">
<div class="url GET"><span class="http_method">GET</span>
<span class="path">https://rws.netdna.com/{companyalias}/reports/{zone_id}/stats.json/{report_type}</span></div>
</div>

### Accepted Request Parameters

Parameter | Default Value | Validation | Description | Since |
--- | --- | --- | --- | ---
`date_from` | now() - 1 month | Y-m-d (e.g. 2012-01-01) | Start date | 1.0 |
`date_to` | now() | Y-m-d (e.g. 2012-01-01) | End date | 1.0 |


### Response Parameters

Parameter | Description | Since |
--- | --- | ---
`size` | The amount of bytes transferred | 1.0 |
`hit` | The number of times files were requested | 1.0 |
`noncache_hit` | The number of times a requested file was not in cache | 1.0 |
`cache_hit` | The number of times a requested file was already cached | 1.0 |
`timestamp` | The timestamp for the corresponding {report_type}. | 1.0 |




---

# Reports by Location API

## List Nodes

Gets a list of all active nodes (locations)

<div class="heading">
<div class="url GET"><span class="http_method">GET</span>
<span class="path">https://rws.netdna.com/{companyalias}/reports/nodes.json</span></div>
</div>

### Response Parameters

Parameter | Description | Since |
--- | --- | ---
`id` | Node Id | 1.0 |
`name` | Node 3 letter code | 1.0 |
`description` | Full node name | 1.0 |


## List Nodes by Zone

Gets a list of all active nodes (locations) specified by the
{zone_id} parameter

<div class="heading">
<div class="url GET"><span class="http_method">GET</span>
<span class="path">https://rws.netdna.com/{companyalias}/reports/{zone_id}/nodes.json</span></div>
</div>

### Response Parameters

Parameter | Description | Since |
--- | --- | ---
`id` | Node Id | 1.0 |
`name` | Node 3 letter code | 1.0 |
`description` | Full node name | 1.0 |


## List Zone Node Stats by Report Type

Get usage statistics broken up by nodes and optionally
{report_type}. If no {report_type} is given the request will return
the total usage broken up by node.

<div class="heading">
<div class="url GET"><span class="http_method">GET</span>
<span class="path">https://rws.netdna.com/{companyalias}/reports/nodes.json/stats/{report_type}</span></div>
</div>

### Accepted Request Parameters

Parameter | Default Value | Validation | Description | Since |
--- | --- | --- | --- | ---
`date_from` | now() - 1 month | Y-m-d (e.g. 2012-01-31) | Start date | 1.0 |
`date_to` | now() | Y-m-d (e.g. 2012-01-31) | End date | 1.0 |


### Response Parameters

Parameter | Description | Since |
--- | --- | ---
`pop_id` | Node Id | 1.0 |
`pop_name` | Node 3 letter code. Only returned when {report_type} is notempty. | 1.0 |
`pop_description` | Full node name. Only returned when {report_type} is notempty. | 1.0 |
`size` | The amount of bytes transferred | 1.0 |
`hit` | The number of times files were requested | 1.0 |
`noncache_hit` | The number of times a requested file was not in cache | 1.0 |
`cache_hit` | The number of times a requested file was already cached | 1.0 |
`timestamp` | A timestamp corresponding to {report_type}. Only returned when{report_type} is not empty. | 1.0 |


## List Node Stats by Zone and Report Type

Get usage statistics for a particular {zone_id} broken up by
nodes and optionally {report_type}. If no {report_type} is given
the request will return the total usage broken up by node.

<div class="heading">
<div class="url GET"><span class="http_method">GET</span>
<span class="path">https://rws.netdna.com/{companyalias}/reports/{zone_id}/nodes.json/stats/{report_type}</span></div>
</div>

### Accepted Request Parameters

Parameter | Default Value | Validation | Description | Since |
--- | --- | --- | --- | ---
`date_from` | now() - 1 month | Y-m-d (e.g. 2012-01-01) | Start date | 1.0 |
`date_to` | now() | Y-m-d (e.g. 2012-01-01) | End date | 1.0 |


### Response Parameters

Parameter | Description | Since |
--- | --- | ---
`pop_id` | Node Id | 1.0 |
`pop_name` | Node 3 letter code. Only returned when {report_type} is notempty. | 1.0 |
`pop_description` | Full node name. Only returned when {report_type} is notempty. | 1.0 |
`size` | The amount of bytes transferred | 1.0 |
`hit` | The number of times files were requested | 1.0 |
`noncache_hit` | The number of times a requested file was not in cache | 1.0 |
`cache_hit` | The number of times a requested file was already cached | 1.0 |
`timestamp` | A timestamp corresponding to {report_type}. Only returned when{report_type} is not empty. | 1.0 |


## Get Zone Node

Gets the node information for the specified {node_id}

<div class="heading">
<div class="url GET"><span class="http_method">GET</span>
<span class="path">https://rws.netdna.com/{companyalias}/reports/nodes.json/{node_id}</span></div>
</div>

### Response Parameters

Parameter | Description | Since |
--- | --- | ---
`id` | Node Id | 1.0 |
`name` | Node 3 letter code | 1.0 |
`description` | Full node name | 1.0 |


## Get Node by Zone

Gets the node information for the specified {node_id} and
{zone_id}

<div class="heading">
<div class="url GET"><span class="http_method">GET</span>
<span class="path">https://rws.netdna.com/{companyalias}/reports/{zone_id}/nodes.json/{node_id}</span></div>
</div>

### Response Parameters

Parameter | Description | Since |
--- | --- | ---
`id` | Node Id | 1.0 |
`name` | Node 3 letter code | 1.0 |
`description` | Full node name | 1.0 |


## Get Zone Node Stats by Report Type

Get usage statistics for a particular {node_id} optionally
broken up by {report_type}. If no {report_type} is given the
request will return the total usage for the node.

<div class="heading">
<div class="url GET"><span class="http_method">GET</span>
<span class="path">https://rws.netdna.com/{companyalias}/reports/nodes.json/{node_id}/stats/{report_type}</span></div>
</div>

### Accepted Request Parameters

Parameter | Default Value | Validation | Description | Since |
--- | --- | --- | --- | ---
`date_from` | now() - 1 month | Y-m-d (e.g. 2012-01-01) | Start date. | 1.0 |
`date_to` | now() | Y-m-d (e.g. 2012-01-01) | End date. | 1.0 |


### Response Parameters

Parameter | Description | Since |
--- | --- | ---
`size` | The amount of bytes transferred | 1.0 |
`hit` | The number of times files were requested | 1.0 |
`noncache_hit` | The number of times a requested file was not in cache | 1.0 |
`cache_hit` | The number of times a requested file was already cached | 1.0 |
`timestamp` | A timestamp corresponding to {report_type}. Only returned when{report_type} is not empty. | 1.0 |


## Get Node Stats by Zone and Report Type

Get usage statistics for a particular {node_id} and {zone_id},
optionally broken up by {report_type}. If no {report_type} is given
the request will return the total usage for the node.

<div class="heading">
<div class="url GET"><span class="http_method">GET</span>
<span class="path">https://rws.netdna.com/{companyalias}/reports/{zone_id}/nodes.json/{node_id}/stats/{report_type}</span></div>
</div>

### Accepted Request Parameters

Parameter | Default Value | Validation | Description | Since |
--- | --- | --- | --- | ---
`date_from` | now() - 1 month | Y-m-d (e.g. 2012-01-01) | Start date | 1.0 |
`date_to` | now() | Y-m-d (e.g. 2012-01-01) | End date | 1.0 |


### Response Parameters

Parameter | Description | Since |
--- | --- | ---
`size` | The amount of bytes transferred | 1.0 |
`hit` | The number of times files were requested | 1.0 |
`noncache_hit` | The number of times a requested file was not in cache | 1.0 |
`cache_hit` | The number of times a requested file was already cached | 1.0 |
`timestamp` | A timestamp corresponding to {report_type}. Only returned when{report_type} is not empty. | 1.0 |




---

# Reports by Popular Files API

## List Popular Files

Gets the most popularly requested files for your account,
grouped into daily statistics

<div class="heading">
<div class="url GET"><span class="http_method">GET</span>
<span class="path">https://rws.netdna.com/{companyalias}/reports/popularfiles.json</span></div>
</div>

### Accepted Request Parameters

Parameter | Default Value | Validation | Description | Since |
--- | --- | --- | --- | ---
`date_from` | now() - 1 month | Y-m-d (e.g. 2012-01-01). | Start date | 1.0 |
`date_to` | now() | Y-m-d (e.g. 2012-01-01). | End date | 1.0 |


### Response Parameters

Parameter | Description | Since |
--- | --- | ---
`bucket_id` | The Zone ID for the popular file | 1.0 |
`uri` | The URI for the requested popular file | 1.0 |
`hit` | The number of times the file was requested | 1.0 |
`size` | The amount of bytes transferred for the given file | 1.0 |
`vhost` | The CDN URL for the corresponding zone | 1.0 |
`timestamp` | The amount of bytes transferred | 1.0 |


## List Popular Files

Gets the most popularly requested files for your account,
filtered by {zone_type} and grouped into daily statistics

<div class="heading">
<div class="url GET"><span class="http_method">GET</span>
<span class="path">https://rws.netdna.com/{companyalias}/reports/{zone_type}/popularfiles.json</span></div>
</div>

### Accepted Request Parameters

Parameter | Default Value | Validation | Description | Since |
--- | --- | --- | --- | ---
`date_from` | now() - 1 month | Y-m-d (e.g. 2012-01-01) | Start date | 1.0 |
`date_to` | now() | Y-m-d (e.g. 2012-01-01) | End date | 1.0 |


### Response Parameters

Parameter | Description | Since |
--- | --- | ---
`bucket_id` | The Zone ID for the popular file | 1.0 |
`uri` | The URI for the requested popular file | 1.0 |
`hit` | The number of times the file was requested | 1.0 |
`size` | The amount of bytes transferred for the given file | 1.0 |
`vhost` | The CDN URL for the corresponding zone | 1.0 |
`timestamp` | The amount of bytes transferred | 1.0 |




---

# Reports by Status Codes API

## List Status Code Responses

Gets HTTP status code response statistics for your account

<div class="heading">
<div class="url GET"><span class="http_method">GET</span>
<span class="path">https://rws.netdna.com/{companyalias}/reports/statuscodes.json/{report_type}</span></div>
</div>

### Accepted Request Parameters

Parameter | Default Value | Validation | Description | Since |
--- | --- | --- | --- | ---
`date_from` | now() - 1 month | Y-m-d (e.g. 2012-01-01) | Start date | 1.0 |
`date_to` | now() | Y-m-d (e.g. 2012-01-01) | End date | 1.0 |


### Response Parameters

Parameter | Description | Since |
--- | --- | ---
`status_code` | The HTTP status code for the response | 1.0 |
`hit` | The number of responses with this status code | 1.0 |
`definition` | The definition for the status code | 1.0 |


## List Status Code Responses by Zone Id

Gets HTTP status code response statistics for a specific
{zone_id}

<div class="heading">
<div class="url GET"><span class="http_method">GET</span>
<span class="path">https://rws.netdna.com/{companyalias}/reports/{zone_id}/statuscodes.json/{report_type}</span></div>
</div>

### Accepted Request Parameters

Parameter | Default Value | Validation | Description | Since |
--- | --- | --- | --- | ---
`date_from` | now() - 1 month | Y-m-d (e.g. 2012-01-01) | Start date | 1.0 |
`date_to` | now() | Y-m-d (e.g. 2012-01-01) | End date | 1.0 |


### Response Parameters

Parameter | Description | Since |
--- | --- | ---
`status_code` | The HTTP status code for the response | 1.0 |
`hit` | The number of responses with this status code | 1.0 |
`definition` | The definition for the status code | 1.0 |


## List Status Codes by Zone Type

Gets HTTP status code response statistics for a specific
{zone_type}

<div class="heading">
<div class="url GET"><span class="http_method">GET</span>
<span class="path">https://rws.netdna.com/{companyalias}/reports/{zone_type}/statuscodes.json/{report_type}</span></div>
</div>

### Accepted Request Parameters

Parameter | Default Value | Validation | Description | Since |
--- | --- | --- | --- | ---
`date_from` | now() - 1 month | Y-m-d (e.g. 2012-01-01) | Start date | 1.0 |
`date_to` | now() | Y-m-d (e.g. 2012-01-01) | End date | 1.0 |


### Response Parameters

Parameter | Description | Since |
--- | --- | ---
`status_code` | The HTTP status code for the response | 1.0 |
`hit` | The number of responses with this status code | 1.0 |
`definition` | The definition for the status code | 1.0 |


## List Status Codes by Zone Id

Gets HTTP status code response statistics for a specific
{zone_type} and {zone_id}

<div class="heading">
<div class="url GET"><span class="http_method">GET</span>
<span class="path">https://rws.netdna.com/{companyalias}/reports/{zone_type}/{zone_id}/statuscodes.json/{report_type}</span></div>
</div>

### Accepted Request Parameters

Parameter | Default Value | Validation | Description | Since |
--- | --- | --- | --- | ---
`date_from` | now() - 1 month | Y-m-d (e.g. 2012-01-01) | Start date | 1.0 |
`date_to` | now() | Y-m-d (e.g. 2012-01-01) | End date | 1.0 |


### Response Parameters

Parameter | Description | Since |
--- | --- | ---
`status_code` | The HTTP status code for the response | 1.0 |
`hit` | The number of responses with this status code | 1.0 |
`definition` | The definition for the status code | 1.0 |




---

# Reports by File Types API

## List File Types

Gets file type statistics for your account

<div class="heading">
<div class="url GET"><span class="http_method">GET</span>
<span class="path">https://rws.netdna.com/{companyalias}/reports/filetypes.json/{report_type}</span></div>
</div>

### Accepted Request Parameters

Parameter | Default Value | Validation | Description | Since |
--- | --- | --- | --- | ---
`date_from` | now() - 1 month | Y-m-d (e.g. 2012-01-01) | Start date | 1.0 |
`date_to` | now() | Y-m-d (e.g. 2012-01-01) | End date | 1.0 |


### Response Parameters

Parameter | Description | Since |
--- | --- | ---
`file_type` | The file type requested | 1.0 |
`hit` | The number of times a file of this type has been requested | 1.0 |


## List File Types by Zone Id

Gets file type statistics for a specific {zone_id}

<div class="heading">
<div class="url GET"><span class="http_method">GET</span>
<span class="path">https://rws.netdna.com/{companyalias}/reports/{zone_id}/filetypes.json/{report_type}</span></div>
</div>

### Accepted Request Parameters

Parameter | Default Value | Validation | Description | Since |
--- | --- | --- | --- | ---
`date_from` | now() - 1 month | Y-m-d e.g. 2012-01-01 | Start date | 1.0 |
`date_to` | now() | Y-m-d e.g. 2012-01-01 | End date | 1.0 |


### Response Parameters

Parameter | Description | Since |
--- | --- | ---
`file_type` | The file type requested | 1.0 |
`hit` | The number of times a file of this type has been requested | 1.0 |


## List File Types by Zone Type

Gets file type statistics for a specific {zone_type}

<div class="heading">
<div class="url GET"><span class="http_method">GET</span>
<span class="path">https://rws.netdna.com/{companyalias}/reports/{zone_type}/filetypes.json/{report_type}</span></div>
</div>

### Response Parameters

Parameter | Description | Since |
--- | --- | ---
`file_type` | The file type requested | 1.0 |
`hit` | The number of times a file of this type has been requested | 1.0 |


## List File Types by Zone Id

Gets file type statistics for a specific {zone_type} and
{zone_id}

<div class="heading">
<div class="url GET"><span class="http_method">GET</span>
<span class="path">https://rws.netdna.com/{companyalias}/reports/{zone_type}/{zone_id}/filetypes.json/{report_type}</span></div>
</div>

### Accepted Request Parameters

Parameter | Default Value | Validation | Description | Since |
--- | --- | --- | --- | ---
`date_from` | now() - 1 month | Y-m-d (e.g. 2012-01-01) | Start date | 1.0 |
`date_to` | now() | Y-m-d (e.g. 2012-01-01) | End date | 1.0 |


### Response Parameters

Parameter | Description | Since |
--- | --- | ---
`file_type` | The file type requested | 1.0 |
`hit` | The number of times a file of this type has been requested | 1.0 |




---

# Reports by File Size Ranges API

## List File Sizes

Gets request statistics for your account based on file size
ranges

<div class="heading">
<div class="url GET"><span class="http_method">GET</span>
<span class="path">https://rws.netdna.com/{companyalias}/reports/filesizes.json/{report_type}</span></div>
</div>

### Accepted Request Parameters

Parameter | Default Value | Validation | Description | Since |
--- | --- | --- | --- | ---
`date_from` | now() - 1 month | Y-m-d (e.g. 2012-01-01) | Start date | 1.0 |
`date_to` | now() | Y-m-d (e.g. 2012-01-01) | End date | 1.0 |


### Response Parameters

Parameter | Description | Since |
--- | --- | ---
`le_10k_hits` | The number of requests for files &lt;= 10KB | 1.0 |
`le_50k_hits` | The number of requests for files &lt;= 50KB | 1.0 |
`le_100k_hits` | The number of requests for files &lt;= 100KB | 1.0 |
`le_500k_hits` | The number of requests for files &lt;= 500KB | 1.0 |
`le_1m_hits` | The number of requests for files &lt;= 1MB | 1.0 |
`le_10m_hits` | The number of requests for files &lt;= 10MB | 1.0 |
`le_100m_hits` | The number of requests for files &lt;= 100MB | 1.0 |
`gt_100m_hits` | The number of requests for files &gt; 100MB | 1.0 |


## List File Sizes by Zone Id

Gets request statistics for the specified {zone_id} based on
file size ranges

<div class="heading">
<div class="url GET"><span class="http_method">GET</span>
<span class="path">https://rws.netdna.com/{companyalias}/reports/{zone_id}/filesizes.json/{report_type}</span></div>
</div>

### Accepted Request Parameters

Parameter | Default Value | Validation | Description | Since |
--- | --- | --- | --- | ---
`date_from` | now() - 1 month | Y-m-d e.g. 2012-01-01 | Start date | 1.0 |
`date_to` | now() | Y-m-d e.g. 2012-01-01 | End date | 1.0 |


### Response Parameters

Parameter | Description | Since |
--- | --- | ---
`le_10k_hits` | The number of requests for files &lt;= 10KB | 1.0 |
`le_50k_hits` | The number of requests for files &lt;= 50KB | 1.0 |
`le_100k_hits` | The number of requests for files &lt;= 100KB | 1.0 |
`le_500k_hits` | The number of requests for files &lt;= 500KB | 1.0 |
`le_1m_hits` | The number of requests for files &lt;= 1MB | 1.0 |
`le_10m_hits` | The number of requests for files &lt;= 10MB | 1.0 |
`le_100m_hits` | The number of requests for files &lt;= 100MB | 1.0 |
`gt_100m_hits` | The number of requests for files &gt; 100MB | 1.0 |


## List File Sizes by Zone Type

Gets request statistics for the specified {zone_type} based on
file size ranges

<div class="heading">
<div class="url GET"><span class="http_method">GET</span>
<span class="path">https://rws.netdna.com/{companyalias}/reports/{zone_type}/filesizes.json/{report_type}</span></div>
</div>

### Accepted Request Parameters

Parameter | Default Value | Validation | Description | Since |
--- | --- | --- | --- | ---
`date_from` | now() - 1 month | Y-m-d e.g. 2012-01-01 | Start date | 1.0 |
`date_to` | now() | Y-m-d e.g. 2012-01-01 | End date | 1.0 |


### Response Parameters

Parameter | Description | Since |
--- | --- | ---
`le_10k_hits` | The number of requests for files &lt;= 10KB | 1.0 |
`le_50k_hits` | The number of requests for files &lt;= 50KB | 1.0 |
`le_100k_hits` | The number of requests for files &lt;= 100KB | 1.0 |
`le_500k_hits` | The number of requests for files &lt;= 500KB | 1.0 |
`le_1m_hits` | The number of requests for files &lt;= 1MB | 1.0 |
`le_10m_hits` | The number of requests for files &lt;= 10MB | 1.0 |
`le_100m_hits` | The number of requests for files &lt;= 100MB | 1.0 |
`gt_100m_hits` | The number of requests for files &gt; 100MB | 1.0 |


## List File Sizes by Zone Id

Gets request statistics for the specified {zone_type} and
{zone_id} based on file size ranges

<div class="heading">
<div class="url GET"><span class="http_method">GET</span>
<span class="path">https://rws.netdna.com/{companyalias}/reports/{zone_type}/{zone_id}/filesizes.json/{report_type}</span></div>
</div>

### Accepted Request Parameters

Parameter | Default Value | Validation | Description | Since |
--- | --- | --- | --- | ---
`date_from` | now() - 1 month | Y-m-d (e.g. 2012-01-01) | Start date | 1.0 |
`date_to` | now() | Y-m-d (e.g. 2012-01-01) | End date | 1.0 |


### Response Parameters

Parameter | Description | Since |
--- | --- | ---
`le_10k_hits` | The number of requests for files &lt;= 10KB | 1.0 |
`le_50k_hits` | The number of requests for files &lt;= 50KB | 1.0 |
`le_100k_hits` | The number of requests for files &lt;= 100KB | 1.0 |
`le_500k_hits` | The number of requests for files &lt;= 500KB | 1.0 |
`le_1m_hits` | The number of requests for files &lt;= 1MB | 1.0 |
`le_10m_hits` | The number of requests for files &lt;= 10MB | 1.0 |
`le_100m_hits` | The number of requests for files &lt;= 100MB | 1.0 |
`gt_100m_hits` | The number of requests for files &gt; 100MB | 1.0 |




---

# Reports By Directory API

## List Stats By Directory

Gets usage statistics by directory for your account. (This
report has to be enabled by Sales).

<div class="heading">
<div class="url GET"><span class="http_method">GET</span>
<span class="path">https://rws.netdna.com/{companyalias}/reports/statsbydir.json/{report_type}</span></div>
</div>

### Accepted Request Parameters

Parameter | Default Value | Validation | Description | Since |
--- | --- | --- | --- | ---
`date_from` | now() - 1 month | Y-m-d (e.g. 2012-01-01) | Start date | 1.0 |
`date_to` | now() | Y-m-d (e.g. 2012-01-01) | End date | 1.0 |


### Response Parameters

Parameter | Description | Since |
--- | --- | ---
`bucket_id` | The Zone ID for the top level directory | 1.0 |
`dir` | The name of the directory | 1.0 |
`hit` | The number of requests made to files within this directory | 1.0 |
`size` | The amount of bytes transferred from within this directory | 1.0 |


## List Stats By Directory and Zone Id

Gets usage statistics by directory for the specified {zone_id}.
(This report has to be enabled by Sales).

<div class="heading">
<div class="url GET"><span class="http_method">GET</span>
<span class="path">https://rws.netdna.com/{companyalias}/reports/{zone_id}/statsbydir.json/{report_type}</span></div>
</div>

### Accepted Request Parameters

Parameter | Default Value | Validation | Description | Since |
--- | --- | --- | --- | ---
`date_from` | now() - 1 month | Y-m-d (e.g. 2012-01-01) | Start date | 1.0 |
`date_to` | now() | Y-m-d (e.g. 2012-01-01) | End date | 1.0 |


### Response Parameters

Parameter | Description | Since |
--- | --- | ---
`bucket_id` | The Zone ID for the top level directory | 1.0 |
`dir` | The name of the directory | 1.0 |
`hit` | The number of requests made to files within this directory | 1.0 |
`size` | The amount of bytes transferred from within this directory | 1.0 |




---

# Reports By File Name API

## List Stats By File Name

Gets usage statistics by file name for your account

<div class="heading">
<div class="url GET"><span class="http_method">GET</span>
<span class="path">https://rws.netdna.com/{companyalias}/clients/{client_id}/reports/statsbyfilename.json/{report_type}</span></div>
</div>

### Accepted Request Parameters

Parameter | Default Value | Validation | Description | Since |
--- | --- | --- | --- | ---
`date_from` | now() - 1 month | Y-m-d (e.g. 2012-01-01) | Start date | 1.0 |
`date_to` | now() | Y-m-d (e.g. 2012-01-01) | End date | 1.0 |
`file_names` | A JSON Encoded file names list | 1.0 |
`filter` | Matching expression for file names | 1.0 |
`sort_by` | Field to sort by | 1.0 |
`sort_dir` | Directory to sort files by | 1.0 |
`page_size` | - | The number of records returned in the result set | 1.0 |


### Response Parameters

Parameter | Description | Since |
--- | --- | ---
`bucket_id` | The Zone ID for the top level directory | 1.0 |
`hit` | The number of requests made to files within this directory | 1.0 |
`size` | The amount of bytes transferred from within this directory | 1.0 |
`200` | The amount of 200 hits | 1.0 |
`206` | The amount of 206 hits | 1.0 |
`2xx` | The amount of 2xx hits | 1.0 |
`3xx` | The amount of 3xx hits | 1.0 |
`404` | The amount of 404 hits | 1.0 |
`4xx` | The amount of 4xx hits | 1.0 |
`5xx` | The amount of 206 hits | 1.0 |
`5xx` | The amount of 206 hits | 1.0 |
`timestampf` | Timestamp | 1.0 |


## List Stats By File Name and Zone Id

Gets usage statistics by file name for the specified
{zone_id}

<div class="heading">
<div class="url GET"><span class="http_method">GET</span>
<span class="path">https://rws.netdna.com/{companyalias}/clients/{client_id}/reports/{zone_id}/statsbyfilename.json/{report_type}</span></div>
</div>

### Accepted Request Parameters

Parameter | Default Value | Validation | Description | Since |
--- | --- | --- | --- | ---
`date_from` | now() - 1 month | Y-m-d (e.g. 2012-01-01) | Start date | 1.0 |
`date_to` | now() | Y-m-d (e.g. 2012-01-01) | End date | 1.0 |
`file_names` | A JSON Encoded file names list | 1.0 |
`filter` | Matching expression for file names | 1.0 |
`sort_by` | Field to sort by | 1.0 |
`sort_dir` | Directory to sort files by | 1.0 |
`page_size` | - | The number of records returned in the result set | 1.0 |


### Response Parameters

Parameter | Description | Since |
--- | --- | ---
`bucket_id` | The Zone ID for the top level directory | 1.0 |
`hit` | The number of requests made to files within this directory | 1.0 |
`size` | The amount of bytes transferred from within this directory | 1.0 |
`200` | The amount of 200 hits | 1.0 |
`206` | The amount of 206 hits | 1.0 |
`2xx` | The amount of 2xx hits | 1.0 |
`3xx` | The amount of 3xx hits | 1.0 |
`404` | The amount of 404 hits | 1.0 |
`4xx` | The amount of 4xx hits | 1.0 |
`5xx` | The amount of 206 hits | 1.0 |
`5xx` | The amount of 206 hits | 1.0 |
`timestampf` | Timestamp | 1.0 |




---

# Reports By Custom Domain API

## List Stats By Directory

Gets usage statistics by custom domain for your account. (This
report has to be enabled by Sales).

<div class="heading">
<div class="url GET"><span class="http_method">GET</span>
<span class="path">https://rws.netdna.com/{companyalias}/clients/{client_id}/reports/statsbycustomdomain.json/{report_type}</span></div>
</div>

### Accepted Request Parameters

Parameter | Default Value | Validation | Description | Since |
--- | --- | --- | --- | ---
`date_from` | now() - 1 month | Y-m-d (e.g. 2012-01-01) | Start date | 1.0 |
`date_to` | now() | Y-m-d (e.g. 2012-01-01) | End date | 1.0 |


### Response Parameters

Parameter | Description | Since |
--- | --- | ---
`bucket_id` | The Zone ID for the custom domain | 1.0 |
`custom_domain_id` | The ID of your custom domain | 1.0 |
`hit` | The number of requests made to this custom domain | 1.0 |
`size` | The amount of bytes transferred to/from this custom domain | 1.0 |


## List Stats By Custom Domain and Zone Id

Gets usage statistics by custom domain for the specified
{zone_id}. (This report has to be enabled by Sales).

<div class="heading">
<div class="url GET"><span class="http_method">GET</span>
<span class="path">https://rws.netdna.com/{companyalias}/clients/{client_id}/reports/{zone_id}/statsbycustomdomain.json/{report_type}</span></div>
</div>

### Accepted Request Parameters

Parameter | Default Value | Validation | Description | Since |
--- | --- | --- | --- | ---
`date_from` | now() - 1 month | Y-m-d (e.g. 2012-01-01) | Start date | 1.0 |
`date_to` | now() | Y-m-d (e.g. 2012-01-01) | End date | 1.0 |


### Response Parameters

Parameter | Description | Since |
--- | --- | ---
`bucket_id` | The Zone ID for the top level directory | 1.0 |
`custom_domain_id` | The ID of the Custom Domain | 1.0 |
`hit` | The number of requests made to this custom domain | 1.0 |
`size` | The amount of bytes transferred to/from this custom domain | 1.0 |




---

# Reports for Live Zones API

## List Connection Stats

Gets zone stats in hourly, daily, or monthly summaries

<div class="heading">
<div class="url GET"><span class="http_method">GET</span>
<span class="path">https://rws.netdna.com/{companyalias}/reports/live/connectionstats.json/{report_type}</span></div>
</div>

### Accepted Request Parameters

Parameter | Default Value | Validation | Description | Since |
--- | --- | --- | --- | ---
`date_from` | - | Y-m-d e.g. 2012-01-01 | Start date | 1.0 |
`date_to` | - | Y-m-d e.g. 2012-01-01 | End date | 1.0 |


---



