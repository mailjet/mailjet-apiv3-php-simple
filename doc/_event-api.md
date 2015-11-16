#Event API: real-time notifications

The Event API offer a real-time notification through http request on any events related to the messages you sent. The main supported events are <code>open</code>, <code>click</code>, <code>bounce</code>, <code>spam</code>, <code>blocked</code>, <code>unsub</code> and <code>sent</code>. This event notification works for transactional and marketing emails. 

The Event API is a very efficient way to do specific actions on your website (log the marketing messages sent to your customers, generate your own statistics, update the unsubscribed contacts on a CRM...). Instead of polling our API a few times a day, we push new data just as the events happen, almost instantly.

##Endpoint URL
```php
<?php
// Create an handler for the open event
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "POST",
	"EventType" => "open",
	"Url" => "https://mydomain.com/event_handler"
);
$result = $mj->eventcallbackurl($params);
if ($mj->_response_code == 201){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>
```
```bash
# Create an handler for the open event
curl -s \
	-X POST \
	--user "$MJ_APIKEY_PUBLIC:$MJ_APIKEY_PRIVATE" \
	https://api.mailjet.com/v3/REST/eventcallbackurl \
	-H 'Content-Type: application/json' \
	-d '{
		"EventType":"open",
		"Url":"https://mydomain.com/event_handler"
	}'
```


The endpoint is an URL our server will call for each event (it can lead to a lot of hits !). You can use the API to setup a new endpoint using the <code>[/eventcallbackurl](http://dev.mailjet.com/email-api/v3/eventcallbackurl/)</code> resource. Alternatively, you can configure this in your account preferences, in the <a href="https://app.mailjet.com/account/triggers" target="_blank">Event Tracking</a> section.

It must return a <code>200 OK</code> HTTP code if all goes well. Any other HTTP code will result in our server retrying the request later (up to 10 times, every 10 minutes). If the request still fails after 10 errors, we will stop trying.

We strongly recommend using a secure (HTTPS) URL in combination with a basic authentification to make sure data cannot be intercepted, and that only our servers can send you data.

<code>Eg: https://username:password@www.example.com/mailjet_triggers.php</code>

The event data is sent in the <code>POST</code> request body using a JSON object. Its content depends on the event.

##Events

All JSON event objects contain the following properties:

- event : the event type
- time : unix timestamp of event
- email : email address of recipient triggering the event
- mj_campaign_id : internal Mailjet campaign ID associated to the message
- mj_contact_id : internal Mailjet contact ID
- customcampaign : value of the X-Mailjet-Campaign header when provided
- MessageID : The unique message ID
- CustomID: the custom ID, when provided at send time
- Payload: the event payload, when provided at send time

<div></div>
###Sent event

> Sample sent event:

```json
{
   "event": "sent",
   "time": 1433333949,
   "MessageID": 19421777835146490,
   "email": "api@mailjet.com",
   "mj_campaign_id": 7257,
   "mj_contact_id": 4,
   "customcampaign": "",
   "mj_message_id": "19421777835146490",
   "smtp_reply": "sent (250 2.0.0 OK 1433333948 fa5si855896wjc.199 - gsmtp)",
   "CustomID": "helloworld",
   "Payload": ""
}
```

Dispatched when the destination SMTP server (gmail, hotmail, yahoo, etc) has accepted the message. Depending on your volume, it could dispatch a lot of events to your system. See [Event grouping section](#grouping-events) to group events together.

Sent event additional properties:

- mj_message_id : The unique message ID as a string (deprecated, see MessageID)
- smtp_reply: The raw SMTP response message

<div></div>
###Open event
> Sample open event

```json
{
   "event": "open",
   "time": 1433103519,
   "MessageID": 19421777396190490,
   "email": "api@mailjet.com",
   "mj_campaign_id": 7173,
   "mj_contact_id": 320,
   "customcampaign": "",
   "CustomID": "helloworld",
   "Payload": "",
   "ip": "127.0.0.1",
   "geo": "US",
   "agent": "Mozilla/5.0 (Windows NT 5.1; rv:11.0) Gecko Firefox/11.0"
}
```

Open event additional properties:

- ip : IP address (can be IPv4 or IPv6) that triggered the event
- geo : country code of IP address (see <a href="http://www.maxmind.com/app/iso3166" target="_blank">list</a>)
- agent : User-Agent

<div></div>
###Click event

> Sample click event

```json
{
   "event": "click",
   "time": 1433334653,
   "MessageID": 19421777836302490,
   "email": "api@mailjet.com",
   "mj_campaign_id": 7272,
   "mj_contact_id": 4,
   "customcampaign": "",
   "CustomID": "helloworld",
   "Payload": "",
   "url": "https://mailjet.com",
   "ip": "127.0.0.1",
   "geo": "FR",
   "agent": "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_0) AppleWebKit/537.36"
}
```

Click event additional properties:

- url : the link that was clicked

<div></div>
###Bounce event

> Sample bounce event

```json
{
   "event": "bounce",
   "time": 1430812195,
   "MessageID": 13792286917004336,
   "email": "bounce@mailjet.com",
   "mj_campaign_id": 0,
   "mj_contact_id": 0,
   "customcampaign": "",
   "CustomID": "helloworld",
   "Payload": "",
   "blocked": true,
   "hard_bounce": true,
   "error_related_to": "recipient",
   "error": "user unknown"
}
```

Bounce event additional properties:

- blocked : true if this bounce leads to the recipient being blocked
- hard_bounce : true if error was permanent
- error_related_to : see error table
- error : see [error table](#possible-values-for-errors)

<div></div>
###Blocked event

> Sample blocked event

```json
{
   "event": "blocked",
   "time": 1430812195,
   "MessageID": 13792286917004336,
   "email": "bounce@mailjet.com",
   "mj_campaign_id": 0,
   "mj_contact_id": 0,
   "customcampaign": "",
   "CustomID": "helloworld",
   "Payload": "",
   "error_related_to": "recipient",
   "error": "user unknown"
}
```

Blocked event additional properties:

- error_related_to : see error table
- error : see [error table](#possible-values-for-errors)

<div></div>
###Spam event

> Sample spam event

```json

{
   "event": "spam",
   "time": 1430812195,
   "MessageID": 13792286917004336,
   "email": "bounce@mailjet.com",
   "mj_campaign_id": 0,
   "mj_contact_id": 0,
   "customcampaign": "",
   "CustomID": "helloworld",
   "Payload": "",
   "source": "JMRPP"
}
```

Spam event additional properties:

- source : indicates which feedback loop program reported this complaint

<div></div>
###Unsub event

> Sample unsub event

```json
{
   "event": "unsub",
   "time": 1433334941,
   "MessageID": 20547674933128000,
   "email": "api@mailjet.com",
   "mj_campaign_id": 7276,
   "mj_contact_id": 126,
   "customcampaign": "",
   "CustomID": "helloworld",
   "Payload": "",
   "mj_list_id": 1,
   "ip": "127.0.0.1",
   "geo": "FR",
   "agent": "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/42.0.2311.135 Safari/537.36"
}
```
Unsub event additional properties:

- mj_list_id : internal Mailjet List id for REST API access to lists management
- ip : IP address (can be IPv4 or IPv6) that triggered the event
- geo : country code of IP address (see <a href="http://www.maxmind.com/app/iso3166" target="_blank">list</a>)
- agent : User-Agent


##Grouping events

```php
<?php
// Create an grouped handler for the open event
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "POST",
	"EventType" => "open",
	"Url" => "https://mydomain.com/event_handler",
	"Version" => "2"
);
$result = $mj->eventcallbackurl($params);
if ($mj->_response_code == 201){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>
```
```bash
# Create an grouped handler for the open event
curl -s \
	-X POST \
	--user "$MJ_APIKEY_PUBLIC:$MJ_APIKEY_PRIVATE" \
	https://api.mailjet.com/v3/REST/eventcallbackurl \
	-H 'Content-Type: application/json' \
	-d '{
		"EventType":"open",
		"Url":"https://mydomain.com/event_handler",
		"Version":"2"
	}'
```


When you create an handler (see above), the default behaviour is to send one event at the time. 

It is convenient and efficient enough for low event volumes but if you're sending larger volumes, it is more efficient to group events together. 

To enable the grouping of events, you have to use the Version 2 of our Event API. To do so, just set the <code>Version</code> field of the <code>/[eventcallbackurl](http://dev.mailjet.com/email-api/v3/eventcallbackurl/)</code> resource to 2.


> From now, all the events will be delivered to your webhook in a JSON array, similar to:

```json
[
   {
      "customcampaign": "test",
      "email": "api@mailjet.com",
      "event": "sent",
      "mj_campaign_id": 483,
      "mj_contact_id": 4,
      "mj_message_id": "18858825588804172",
      "smtp_reply": "sent (250 2.0.0 OK 1424873937 fn1si2587485pab.205 - gsmtp)",
      "time": 1424873938
   },
   {
      "customcampaign": "test",
      "email": "api@mailjet.com",
      "event": "sent",
      "mj_campaign_id": 483,
      "mj_contact_id": 4,
      "mj_message_id": "18858825588803684",
      "smtp_reply": "sent (250 2.0.0 OK 1424873937 av4si15414111pbd.46 - gsmtp)",
      "time": 1424873938
   },
   {
      "customcampaign": "test",
      "email": "api@mailjet.com",
      "event": "sent",
      "mj_campaign_id": 483,
      "mj_contact_id": 4,
      "mj_message_id": "18014400413866302",
      "smtp_reply": "sent (250 2.0.0 OK 1424873938 j6si29391363wif.14 - gsmtp)",
      "time": 1424873939
   },
   {
      "customcampaign": "test",
      "email": "api@mailjet.com",
      "event": "sent",
      "mj_campaign_id": 483,
      "mj_contact_id": 4,
      "mj_message_id": "18858825588804459",
      "smtp_reply": "sent (250 2.0.0 OK 1424873939 r6si17223863wjx.75 - gsmtp)",
      "time": 1424873940
   }
]
```

Please note that the event types in the collection can be mixed. We group together all the events of the last second.

You can always go back to the default mode by setting the <code>Version</code> field to 1.

##Possible values for errors

error_related_to | error | What really happened ?
-------------- | -------------- | --------------
recipient | user unknown | Email address doesn't exist, double check it for typos !
 | mailbox inactive | Account has been inactive for too long (likely that it doesn't exist anymore).
 | quota exceeded | Even though this is a non-permanent error, most of the time when accounts are over-quota, it means they are inactive.
domain | invalid domain | There's a typo in the domain name part of the address. Or the address is so old that its domain has expired !
 | no mail host | Nobody answers when we knock at the door.
 | relay/access denied | The destination mail server is refusing to talk to us.
 | greylisted | This is a temporary error due to possible unrecognised senders. Delivery will be re-attempted.
spam | sender blocked | This is quite bad! You should contact us to investigate this issue.
 | content blocked | Something in your email has triggered an anti-spam filter and your email was rejected. Please contact us so we can review the email content and report any false positives.
 | policy issue | We do our best to avoid these errors with outbound throttling and following best practices. Although we do receive alerts when this happens, make sure to contact us for further information and a workaround
system | system issue | Something went wrong on our server-side. A temporary error. Please contact us if you receive an event of this type.
 | protocol issue | Something went wrong with our servers. This should not happen, and never be permanent !
 | connection issue | Something went wrong with our servers. This should not happen, and never be permanent !
mailjet | preblocked | You tried to send an email to an address that recently (or repeatedly) bounced. We didn't try to send it to avoid damaging your reputation. (Coming soon: New options to bypass email blocking)
 | duplicate in campaign | You used X-Mailjet-DeduplicateCampaign and sent more than one email to a single recipient. Only the first email was sent; the others were blocked.

##Online Demonstration

You can test the Event API with our <a href="https://live-event-dashboard-demo.mailjet.com/" target="_blank">Mailjet Live Event API Dashboard</a>. 
After setting up your public and private API key, you can select the events you want to test. This dashboard will update your Endpoint URLs (Make sure that when testing you make a backup of your current Endpoint URLs). You can then send messages and see the event payload appear in the Dashboard. 

This demo, built in NodeJS and Golang, is available on <a href="https://github.com/arnaudbreton/mailjet-live-event-dashboard" target="_blank">GitHub</a>. Feel free to reuse or contribute. 

