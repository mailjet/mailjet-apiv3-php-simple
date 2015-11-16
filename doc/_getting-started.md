#Getting Started

This is a quick tutorial to get you started using our API. 

We will show you how to send your first email, how to authenticate with our API and tell you more about Mailjet RESTful API.

We will also show you how to verify your domain to get a better deliverability of your emails.

## Make your first request

Give it a go and send your first email...

This simple example shows how to send an email with the API in a few easy steps.

First, you need to have at least one active sender address in the Mailjet system. Visit the <a href="https://app.mailjet.com/account/sender" target="_blank">Sender domains & addresses</a> section to check and setup your domain and sender.

Second, you need to find your credentials, the API Key and the API Private Key, in the <a href="https://eu.mailjet.com/account/api_keys" target="_blank">account/API Keys</a> section.

<div></div>

> Example available only with CURL
 
```bash 
curl -s \
	-X POST \
	--user "$MJ_APIKEY_PUBLIC:$MJ_APIKEY_PRIVATE" \
	https://api.mailjet.com/v3/send \
	-H "Content-Type: application/json" \
	-d '{
		"FromEmail":"$SENDER_EMAIL",
		"FromName":"Me",
		"Recipients": [ 
			{
			"Email":"$RECIPIENT_EMAIL"
			}
		],
		"Subject":"My first Mailjet Email!",
		"Text-part":"Greetings from Mailjet."
	}'
```

Now run the Curl command line, after replacing: 

 - $MJ_APIKEY_PUBLIC : your API Key
 - $MJ_APIKEY_PRIVATE : your API Private Key 
 - $SENDER_EMAIL : sender email address found in the interface 
 - $RECIPIENT_EMAIL : the recipient email address of your test
 


## About the Mailjet RESTful API

###API in a Nutshell

The Mailjet API is designed to be <a href="http://en.wikipedia.org/wiki/Representational_state_transfer" target="_blank">RESTful compliant</a>.  This means that the API communicate over HTTP (including the use of HTTP verbs) . The API allows you to create, read, update and delete (<a href="http://en.wikipedia.org/wiki/CRUD" target="_blank">CRUD</a>) resources. Also, each single resource has a URI (Unique Resource Identifier) to help access it's properties.

The CRUD methods on the Mailjet API correspond to HTTP's verbs <code>POST</code>, <code>GET</code>, <code>PUT</code> and <code>DELETE</code>, so that depending on the resources and providing you have the access rights, you can do the following :

- <code>GET /$resource</code> gives you a list of resources of type $resource
- <code>GET /$resource/$id</code> gives you a single resource of type $resource, identified by the id $id, using its URI
- <code>POST /$resource</code> allows you to create a resource of type $resource
- <code>PUT /$resource/$id</code> allows you to update an existing resource of type $resource, identified by the id $id, using its URI
- <code>DELETE /$resource/$id</code> allows you to delete a single resource of type $resource, identified by the id $id, using its URI

Each resource has a list of properties and methods you can see in our [API reference](http://dev.mailjet.com/email-api/v3/).

<aside class="notice">
On the Mailjet API, all <code>PUT</code> method use will behave like a <code>PATCH</code> method. The update will affect only the specified properties, the other properties of an existing single resource will not be modified nor deleted. It also mean that all non mandatory properties can be omitted from your payload.
</aside>

###Authenticate

In order to use the Mailjet API you have to authenticate using <a href="http://en.wikipedia.org/wiki/Basic_access_authentication" target="_blank">HTTP Basic Auth</a>. HTTP Basic Auth requires you to provide a username and a password for each API request. The username is your API Key and the password is your API Secret Key, which are both generated for you after registration.

<aside class="notice">
TIP: You can find the API Key and the API Private Key in the <a href="https://app.mailjet.com/account/api_keys" target="_blank">API keys Management</a> section.
</aside>

```bash
#To make better use of our cURL examples you can set your keys in your environment variables with the following commands: 
export MJ_APIKEY_PUBLIC=xxxxxxxxxxxxxxxxxxxxxx
export MJ_APIKEY_PRIVATE=xxxxxxxxxxxxxxxxxxxxxxx

#View user information : now, you don't need to replace $MJ_APIKEY_PUBLIC and $MJ_APIKEY_PRIVATE when running a cURL command
curl --user "$MJ_APIKEY_PUBLIC:$MJ_APIKEY_PRIVATE" https://api.mailjet.com/v3/REST/user
```

>The server should respond with the following data:

```json
{
	"Count": 1,
	"Data": [
		{
			"ACL": "",
			"CreatedAt": "",
			"Email": "miss@mailjet.com",
			"ID": "",
			"LastIp": "",
			"LastLoginAt": "",
			"Locale": "",
			"MaxAllowedAPIKeys": "5",
			"Timezone": "",
			"Username": "",
			"WarnedRatelimitAt": ""
		}
	],
	"Total": 1
}
```


Most developers use one of our API libraries for their production systems and the respective library documentation tells you where to place your API Keys. However for testing purposes it can be nice to query the API directly from the shell.

In this example :

 - $MJ_APIKEY_PUBLIC is your API Key
 - $MJ_APIKEY_PRIVATE is your API Private Key

Both these keys can be found in your control panel, once you're logged-in and your account is provisioned (activated).

The usual json payload response will have the following structure : <code>{"Count": int, "Data": array, "Total": int}</code> where <code>Count</code> and <code>Total</code> represent the number of line affected by your API call. When using the <code>[countOnly](#the-count-filter)</code> filter <code>Total</code> will be the global number of elements corresponding to your API call.  

<div></div>
###Status Codes

These status codes will be sent back by the API to notify of the success or failure of your calls.

Code|  | Description 
-------------- | -------------- | --------------
200 | OK | All went well. Congrats!
201 | Created | The <code>POST</code> request was successfully executed.
204 | No Content | No content found or expected to return. Returned when <code>DELETE</code> was successful.
304 | Not Modified | The <code>PUT</code> request didn't affect any record. 
400 | Bad Request | One or more parameters are missing or maybe mispelled (unknown resource or action)
401 | Unauthorized | You have specified an incorrect Api Key / API Secret Key. You may be unauthorized to access the API or your API key may be expired. Visit <a href="https://app.mailjet.com/account/api_keys" target="_blank">API keys Management</a> section to check your keys. 
403 | Forbidden | You are not authorised to access this resource. 
404 | Not Found | The resource with the specified ID you are trying to reach does not exist.
405 | Method Not Allowed | The method requested on the resource does not exist.
500 | Internal Server Error | Ouch! Something went wrong on our side and we apologize! Please contact <a href="https://www.mailjet.com/support" target="_blank">our support team</a> who'll be able to help you on this


<div></div>
```json 
{
    "ErrorInfo": "Bad Request",
    "ErrorMessage": "Unknown resource: \"contacts\"",
    "StatusCode": 400
}
```

In addition to the status codes, in case of error, you can find hints in a standardised JSON response with the reason under <code>ErrorMessage</code>.  

##Verify Your Domain

We strongly recommend that you verify the domain or subdomain you will use for sending emails. To do so you have to go to your <a href="https://eu.mailjet.com/account/sender/domain" target="_blank">account settings</a> and add the domain you want to use for sending emails. Once the domain is successfully set up we generate an SPF and a DKIM record for you.

<a href="http://www.openspf.org/Introduction" target="_blank">SPF</a> is a DNS TXT record and acts as a filter. It is used to specify a whitelist of IP addresses. This whitelist can be queried by mail clients to see whether a sender IP is in the list.

<a href="http://www.dkim.org/#introduction" target="_blank">DKIM</a> is another DNS TXT record and contains a public key. We automatically generate a public/private key pair for you after registration. The private key is used to sign every message you send. Email clients can then check your DKIM record and use it to verify the signature. Together, SPF and DKIM form the technical basis of email deliverability.

Tip: You can find both records together with instructions in your account settings. Go to your <a href="https://eu.mailjet.com/account/setup" target="_blank">account setup page</a> and click on the info button for your domain.

Once your domain is verified you should add the SPF and DKIM records to your domain using the domain configuration tool of your DNS Provider.


You can refer to our step-by-step user guides on creating DNS records:

 - <a href="https://www.mailjet.com/docs/ovh-setup-spf-dkim-record" target="_blank">OVH</a>
 - <a href="https://www.mailjet.com/docs/godaddy-setup-spf-dkim-record" target="_blank">GoDaddy</a>
 - <a href="https://www.mailjet.com/docs/dreamhost-setup-spf-dkim-record" target="_blank">DreamHost</a>
 - <a href="https://www.mailjet.com/docs/1and1-setup-spf-dkim-record" target="_blank">1&1</a>


You can also visit the offical and third-party documentations for DNS providers :

 - Amazon Route 53: <a href="http://anl4u.com/blog/how-to-add-txtspf-dkim-records-for-sub-domain-in-route-53-on-amazon" target="_blank">SPF and DKIM</a>
 - Bluehost: <a href="https://my.bluehost.com/cgi/help/559" target="_blank">General DNS Setup</a>
 - CloudFlare: <a href="https://support.cloudflare.com/hc/en-us" target="_blank">General DNS help</a>
 - Dreamhost: <a href="http://wiki.dreamhost.com/SPF" target="_blank">SPF</a>, <a href="http://wiki.dreamhost.com/DomainKeys_Identified_Mail" target="_blank">DKIM</a>
 - DynDNS: <a href="http://dyn.com/support/record-types-standard-dns/" target="_blank">General DNS setup</a>
 - GoDaddy: <a href="http://support.godaddy.com/help/article/680/managing-dns-for-your-domain-names" target="_blank">SPF and DKIM</a>
 - HostGator: <a href="https://support.hostgator.com/articles/cpanel/how-to-change-dns-zones-mx-cname-and-a-records" target="_blank">General DNS setup</a>
 - Hover: General <a href="https://help.hover.com/entries/21204757-how-to-edit-dns-records-a-cname-mx-txt-and-srv" target="_blank">DNS setup</a>
 - Namecheap: <a href="https://www.namecheap.com/support/knowledgebase/article.aspx/9214/31/email-authentication-tool-in-cpanel-spf-records" target="_blank">SPF</a>, <a href="https://community.namecheap.com/forums/viewtopic.php?f=6&t=5777" target="_blank">DKIM</a>
 - Network Solutions: <a href="http://www.networksolutions.com/support/how-to-manage-advanced-dns-records/" target="_blank">General DNS setup</a>
 - Rackspace: <a href="http://www.rackspace.com/apps/support/portal/1172" target="_blank">General DNS setup</a>
 - Rackspace Cloud DNS: <a href="http://www.rackspace.com/knowledge_center/article/rackspace-cloud-dns" target="_blank">General DNS setup</a>
 - Register.com: <a href="http://help.register.com/app/answers/detail/a_id/487/kw/txt%20record/related/1" target="_blank">General DNS setup</a>
 - United Domains: <a href="http://www.steffen-ille.de/blog.php?scrx=1280&scry=800&entry=15" target="_blank">DKIM and SPF (in German)</a>
 - ZoneEdit: <a href="https://dotster.secure.force.com/zoneeditpkb/KnowledgeArticleDetail?Id=kA260000000CbYd&articleType=How_To__kav" target="_blank">General DNS setup</a>

With some DNS providers the setup can be quite tedious, but we would be happy to help you out. Just contact <a href="https://www.mailjet.com/support/ticket" target="_blank">our support</a>!

## Where to go from here ?

In the next sections of this guide, you will find 2 common user cases:

 - [Send transactional email](#send-transactional-email) : sending custom email for each client events
 - [Send marketing campaigns](#send-marketing-campaigns) : setting up a mailing list, a newsletter and extracting statistics

You can also discover our [real time notification API](#event-api-real-time-notifications) that allows you to monitor every events (sent, opened, clicked, bounced...) on the emails you will send.

Mailjet also offers an [inbound emails parsing](#receive-emails) solution that allows to easily manage your contacts replies.
 
<aside class="notice">The examples in this documentation are using Mailjet libraries. Find the list and where to download them <a href="#the-libraries">here</a></aside>
