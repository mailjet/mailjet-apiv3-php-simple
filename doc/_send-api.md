#Send transactional email
##Choose sending method

Mailjet offers two ways to send transactional emails : SMTP Relay or Send API

###SMTP Relay

<a href="https://www.mailjet.com/feature/smtp-relay/" target="_blank">SMTP Relay</a> to send email in a fairly easy way, requiring minimum integration effort on your side.

The SMTP Relay is useful if you have an existing solution for transactional email by SMTP or if you cannot use the Send API. Using the SMTP relay, you have to take care of email headers, MIME type handling and completely format and personalize your message content. 

The best and fastest way to use the SMTP Relay is to have your own local mail server relaying messages to the Mailjet SMTP. Your local mail server will give you reliable management of the messages and connections between our 2 systems. 
In case of breakage in the connection, your mail server will handle properly the error and retry to send your messages. 

In case you don't have a local mail server, you can still use the SMTP Relay by using one of the many SMTP libraries available or configuring your exiting system (frameworks, CMS, CRM...). However, some of these libraries or systems can lack the advanced error handling necessary to queue and resend the messages in case of error. The use of Send API can be a better choice has it require less interactions between our systems and limit the risk of failures. The error handling is also a lot simpler with the API as we are managing for you the delivery and queuing of your messages.

Using Mailjet's SMTP servers to send your transactional emails is very simple. All you have to do is update your SMTP server settings to use our server as a "relay" or "smarthost" with the credentials provided by Mailjet. The credentials are your $MJ_APIKEY_PUBLIC as a login and $MJ_APIKEY_PRIVATE as a password.

You can find your SMTP credentials in your <a href="https://eu.mailjet.com/account/setup" target="_blank">Account Setup page</a>


### Send API

Mailjet's Send API allows you to send transactional emails using our HTTP API, using POST requests. This solution is aimed at users needing a programmatically way to send messages.

Send API allows to send single messages but also to mutualise the calls by leveraging templating and personalisation of the content. 

The API will return a simple response indicating if the message is ready to be processed on the Mailjet system. This makes the error management on your side simple and efficient. 


##Verify a Sender

```php
<?php
// Create : Manage an email sender for a single API key. An e-mail address or a complete domain (*) has to be registered and validated before being used to send e-mails. In order to manage a sender available across multiple API keys, see the related MetaSender resource.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "POST",
	"Email" => "anothersender@example.com"
);
$result = $mj->sender($params);
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
# Create : Manage an email sender for a single API key. An e-mail address or a complete domain (*) has to be registered and validated before being used to send e-mails. In order to manage a sender available across multiple API keys, see the related MetaSender resource.
curl -s \
	-X POST \
	--user "$MJ_APIKEY_PUBLIC:$MJ_APIKEY_PRIVATE" \
	https://api.mailjet.com/v3/REST/sender \
	-H 'Content-Type: application/json' \
	-d '{
		"Email":"anothersender@example.com"
	}'
```


To create a sender, provide the email address of the sender as part of a <code>POST</code> on the resource <code>[/sender](http://dev.mailjet.com/email-api/v3/sender/)</code>.

A verification email will be sent to the address you added to activate this new sender.

##Setup SPF/DKIM on DNS 

To increase the deliverability of your emails, dont forget to setup properly your DNS. 

[More information](#verify-your-domain)

##Sending a basic email

```php
<?php
// This calls sends an email to one recipient.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
    "method" => "POST",
    "FromEmail" => "pilot@mailjet.com",
    "FromName" => "Mailjet Pilot",
    "Subject" => "Your email flight plan!",
    "Text-part" => "Dear passenger, welcome to Mailjet! May the delivery force be with you!",
    "Html-part" => "<h3>Dear passenger, welcome to Mailjet!</h3><br />May the delivery force be with you!",
    "Recipients" => json_decode('[{"Email":"passenger@mailjet.com"}]', true)
);
$result = $mj->send($params);
if ($mj->_response_code == 200){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>
```
```bash
# This calls sends an email to one recipient.
curl -s \
	-X POST \
	--user "$MJ_APIKEY_PUBLIC:$MJ_APIKEY_PRIVATE" \
	https://api.mailjet.com/v3/send \
	-H 'Content-Type: application/json' \
	-d '{
		"FromEmail":"pilot@mailjet.com",
		"FromName":"Mailjet Pilot",
		"Subject":"Your email flight plan!",
		"Text-part":"Dear passenger, welcome to Mailjet! May the delivery force be with you!",
		"Html-part":"<h3>Dear passenger, welcome to Mailjet!</h3><br />May the delivery force be with you!",
		"Recipients":[{"Email":"passenger@mailjet.com"}]
	}'
```




To send an email, you need the following mandatory properties: 

 - <code>FromEmail</code>: a verified Sender address 
 - <code>FromName</code>: name of the sender visible by the recipient 
 - <code>Recipients</code>: list with at least one <code>Email</code> address 
 - <code>Subject</code>: subject of the message that will be sent
 - <code>Text-part</code> or/and <code>Html-part</code>: content of the message sent in text or HTML format. At least one of these contents type needs to be specified. When Html-part is the only content provided, Mailjet will not generate a Text-part from the HTML version.   



<div></div>
> API response:

```json
{
	"Sent": [
		{
			"Email": "passenger@mailjet.com",
			"MessageID": 111111111111111
		}
	]
}
```

<code>MessageID</code> is the internal Mailjet id of your message. You will be able to use this id to get more information about your message with <code>[/message](http://dev.mailjet.com/email-api/v3/message/)</code>,<code>[/messagehistory](http://dev.mailjet.com/email-api/v3/messagehistory/)</code> and <code>[/messageinformation](http://dev.mailjet.com/email-api/v3/messageinformation/)</code> resources.

<aside class="notice">
NOTICE: If a recipient does not exist in any of your contacts list it will be created from scratch, keep that in mind if you are planning on sending a welcome email and then you're trying to add the email to a list as the contact effectively exists already.
</aside>

##Sending to multiple recipients

```php
<?php
// This calls sends an email to 2 recipients.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
    "method" => "POST",
    "FromEmail" => "pilot@mailjet.com",
    "FromName" => "Mailjet Pilot",
    "Subject" => "Your email flight plan!",
    "Text-part" => "Dear passenger, welcome to Mailjet! May the delivery force be with you!",
    "Html-part" => "<h3>Dear passenger, welcome to Mailjet!</h3><br />May the delivery force be with you!",
    "Recipients" => json_decode('[{"Email":"passenger1@mailjet.com","Name":"passenger 1"},{"Email":"passenger2@mailjet.com","Name":"passenger 2"}]', true)
);
$result = $mj->send($params);
if ($mj->_response_code == 200){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>
```
```bash
# This calls sends an email to 2 recipients.
curl -s \
	-X POST \
	--user "$MJ_APIKEY_PUBLIC:$MJ_APIKEY_PRIVATE" \
	https://api.mailjet.com/v3/send \
	-H 'Content-Type: application/json' \
	-d '{
		"FromEmail":"pilot@mailjet.com",
		"FromName":"Mailjet Pilot",
		"Subject":"Your email flight plan!",
		"Text-part":"Dear passenger, welcome to Mailjet! May the delivery force be with you!",
		"Html-part":"<h3>Dear passenger, welcome to Mailjet!</h3><br />May the delivery force be with you!",
		"Recipients":[{"Email":"passenger1@mailjet.com","Name":"passenger 1"},{"Email":"passenger2@mailjet.com","Name":"passenger 2"}]
	}'
```


> API response:

```json
{
	"Sent": [
		{
			"Email": "passenger1@mailjet.com",
			"MessageID": 20547681647433000
		},
		{
			"Email": "passenger2@mailjet.com",
			"MessageID": 20547681647433001
		}
	]
}
```

To send the same email to multiple contacts, add <code>Email</code> addresses in the <code>Recipients</code> list.

Each recipient will receive a dedicated message.

##Sending with attached files

```php
<?php
// This calls sends an email to the given recipient.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
    "method" => "POST",
    "FromEmail" => "pilot@mailjet.com",
    "FromName" => "Mailjet Pilot",
    "Subject" => "Your email flight plan!",
    "Text-part" => "Dear passenger, welcome to Mailjet! May the delivery force be with you!",
    "Html-part" => "<h3>Dear passenger, welcome to Mailjet!</h3><br />May the delivery force be with you!",
    "Recipients" => json_decode('[{"Email":"passenger@mailjet.com"}]', true),
    "Attachments" => json_decode('[{"Content-type":"text/plain","Filename":"test.txt","content":"VGhpcyBpcyB5b3VyIGF0dGFjaGVkIGZpbGUhISEK"}]', true)
);
$result = $mj->send($params);
if ($mj->_response_code == 200){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>
```
```bash
# This calls sends an email to the given recipient.
curl -s \
	-X POST \
	--user "$MJ_APIKEY_PUBLIC:$MJ_APIKEY_PRIVATE" \
	https://api.mailjet.com/v3/send \
	-H 'Content-Type: application/json' \
	-d '{
		"FromEmail":"pilot@mailjet.com",
		"FromName":"Mailjet Pilot",
		"Subject":"Your email flight plan!",
		"Text-part":"Dear passenger, welcome to Mailjet! May the delivery force be with you!",
		"Html-part":"<h3>Dear passenger, welcome to Mailjet!</h3><br />May the delivery force be with you!",
		"Recipients":[{"Email":"passenger@mailjet.com"}],
		"Attachments":[{"Content-type":"text/plain","Filename":"test.txt","content":"VGhpcyBpcyB5b3VyIGF0dGFjaGVkIGZpbGUhISEK"}]
	}'
```


To attach files, use <code>Attachments</code> or <code>Inline_attachments</code>.  
The recipient of a email with attachment will have to click to see it. The inline attachment can be visible directly in the body of the message depending of the email client support.  

In both call, the content will need to be Base64 encoded. You will need to specify the MIME type and a file name.

<div></div>

```php
<?php
// This calls sends an email to the given recipient.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
    "method" => "POST",
    "FromEmail" => "pilot@mailjet.com",
    "FromName" => "Mailjet Pilot",
    "Subject" => "Your email flight plan!",
    "Text-part" => "Dear passenger, welcome to Mailjet! May the delivery force be with you!",
    "Html-part" => "<h3>Dear passenger, welcome to <img src="cid:logo.gif">Mailjet!</h3><br />May the delivery force be with you!",
    "Recipients" => json_decode('[{"Email":"passenger@mailjet.com"}]', true),
    "Inline_attachments" => json_decode('[{"Content-type":"image/gif","Filename":"logo.gif","content":"R0lGODlhEAAQAOYAAP////748v39/Pvq1vr6+lJSVeqlK/zqyv7+/unKjJ+emv78+fb29pucnfrlwvTCi9ra2vTCa6urrWdoaurr6/Pz8uHh4vn49PO7QqGfmumaN+2uS1ZWWfr27uyuLnBxd/z8+0pLTvHAWvjar/zr2Z6cl+jal+2kKmhqcEJETvHQbPb07lBRVPv6+cjJycXFxn1+f//+/f337nF0efO/Mf306NfW0fjHSJOTk/TKlfTp0Prlx/XNj83HuPfEL+/v8PbJgueXJOzp4MG8qUNES9fQqN3d3vTJa/vq1f317P769f/8+gAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACH/C1hNUCBEYXRhWE1QPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4gPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1QIENvcmUgNS4wLWMwNjAgNjEuMTM0Nzc3LCAyMDEwLzAyLzEyLTE3OjMyOjAwICAgICAgICAiPiA8cmRmOlJERiB4bWxuczpyZGY9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkvMDIvMjItcmRmLXN5bnRheC1ucyMiPiA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtbG5zOnhtcE1NPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvbW0vIiB4bWxuczpzdFJlZj0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL3NUeXBlL1Jlc291cmNlUmVmIyIgeG1wOkNyZWF0b3JUb29sPSJBZG9iZSBQaG90b3Nob3AgQ1M1IFdpbmRvd3MiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6MjY5ODYxMzYzMkJCMTFFMDkzQkFFMkFENzVGN0JGRkYiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6MjY5ODYxMzczMkJCMTFFMDkzQkFFMkFENzVGN0JGRkYiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDoyNjk4NjEzNDMyQkIxMUUwOTNCQUUyQUQ3NUY3QkZGRiIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDoyNjk4NjEzNTMyQkIxMUUwOTNCQUUyQUQ3NUY3QkZGRiIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/PgH//v38+/r5+Pf29fTz8vHw7+7t7Ovq6ejn5uXk4+Lh4N/e3dzb2tnY19bV1NPS0dDPzs3My8rJyMfGxcTDwsHAv769vLu6ubi3trW0s7KxsK+urayrqqmop6alpKOioaCfnp2cm5qZmJeWlZSTkpGQj46NjIuKiYiHhoWEg4KBgH9+fXx7enl4d3Z1dHNycXBvbm1sa2ppaGdmZWRjYmFgX15dXFtaWVhXVlVUU1JRUE9OTUxLSklIR0ZFRENCQUA/Pj08Ozo5ODc2NTQzMjEwLy4tLCsqKSgnJiUkIyIhIB8eHRwbGhkYFxYVFBMSERAPDg0MCwoJCAcGBQQDAgEAACH5BAEAAAAALAAAAAAQABAAAAdUgACCg4SFhoeIiYRGLhaKhA0TMDgSLxAUiEIZHAUsIUQpKAo9Og6FNh8zJUNFJioYQIgJRzc+NBEkiAcnBh4iO4o8QRsjj0gaOY+CDwPKzs/Q0YSBADs="}]', true)
);
$result = $mj->send($params);
if ($mj->_response_code == 200){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>
```
```bash
# This calls sends an email to the given recipient.
curl -s \
	-X POST \
	--user "$MJ_APIKEY_PUBLIC:$MJ_APIKEY_PRIVATE" \
	https://api.mailjet.com/v3/send \
	-H 'Content-Type: application/json' \
	-d '{
		"FromEmail":"pilot@mailjet.com",
		"FromName":"Mailjet Pilot",
		"Subject":"Your email flight plan!",
		"Text-part":"Dear passenger, welcome to Mailjet! May the delivery force be with you!",
		"Html-part":"<h3>Dear passenger, welcome to <img src="cid:logo.gif">Mailjet!</h3><br />May the delivery force be with you!",
		"Recipients":[{"Email":"passenger@mailjet.com"}],
		"Inline_attachments":[{"Content-type":"image/gif","Filename":"logo.gif","content":"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"}]
	}'
```


When using a inline Attachment, it's possible to insert the file inside the HTML code of the email by using <code>cid:FILENAME.EXT</code> where FILENAME.EXT is the <code>Filename</code> specified in the declaration of the Attachment.

<aside class="warning">
Remember to keep the size of your attachements low and not to exceed 15 MB.
</aside>


##Sending in bulk

```php
<?php
// This calls sends an email to the given recipient.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
    "method" => "POST",
    "Messages" => json_decode('[
			{
			"FromEmail":"pilot@mailjet.com",
			"FromName":"Mailjet Pilot",
			"Recipients":[{"Email":"passenger1@mailjet.com","Name":"passenger 1"}],
			"Subject":"Your email flight plan!",
			"Text-part":"Dear passenger 1, welcome to Mailjet! May the delivery force be with you!",
			"Html-part":"<h3>Dear passenger 1, welcome to Mailjet!</h3><br />May the delivery force be with you!"
			},
			{
			"FromEmail":"pilot@mailjet.com",
			"FromName":"Mailjet Pilot",
			"Recipients":[{"Email":"passenger2@mailjet.com","Name":"passenger 2"}],
			"Subject":"Your email flight plan!",
			"Text-part":"Dear passenger 2, welcome to Mailjet! May the delivery force be with you!",
			"Html-part":"<h3>Dear passenger 2, welcome to Mailjet!</h3><br />May the delivery force be with you!"
			}
		]', true)
);
$result = $mj->send($params);
if ($mj->_response_code == 200){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>
```
```bash
# This calls sends an email to the given recipient.
curl -s \
	-X POST \
	--user "$MJ_APIKEY_PUBLIC:$MJ_APIKEY_PRIVATE" \
	https://api.mailjet.com/v3/send \
	-H 'Content-Type: application/json' \
	-d '{
		"Messages":[
			{
			"FromEmail":"pilot@mailjet.com",
			"FromName":"Mailjet Pilot",
			"Recipients":[{"Email":"passenger1@mailjet.com","Name":"passenger 1"}],
			"Subject":"Your email flight plan!",
			"Text-part":"Dear passenger 1, welcome to Mailjet! May the delivery force be with you!",
			"Html-part":"<h3>Dear passenger 1, welcome to Mailjet!</h3><br />May the delivery force be with you!"
			},
			{
			"FromEmail":"pilot@mailjet.com",
			"FromName":"Mailjet Pilot",
			"Recipients":[{"Email":"passenger2@mailjet.com","Name":"passenger 2"}],
			"Subject":"Your email flight plan!",
			"Text-part":"Dear passenger 2, welcome to Mailjet! May the delivery force be with you!",
			"Html-part":"<h3>Dear passenger 2, welcome to Mailjet!</h3><br />May the delivery force be with you!"
			}
		]
	}'
```


To send messages in bulk, package the multiple messages inside a <code>Messages</code> property. Each message inside this list of message will enjoy the same properties described above. 

##Personalisation
<div></div>
###Content formating

Mailjet system allows to insert datas in your text or html parts. 

To do so, use <code>[[DATA_TYPE:DATA_NAME]]</code> where: 

- <code>DATA_TYPE</code>: <code>var</code> for Vars specified in the API call or <code>data</code> for contact datas already available on Mailjet system 
- <code>DATA_NAME</code>: name of the data you want to insert

<div></div>
###Using vars and custom vars 

```php
<?php
// This calls sends an email to the given recipient.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
    "method" => "POST",
    "FromEmail" => "pilot@mailjet.com",
    "FromName" => "Mailjet Pilot",
    "Subject" => "Your email flight plan!",
    "Text-part" => "Dear passenger, welcome to Mailjet! On this [[var:day]], may the delivery force be with you!",
    "Html-part" => "<h3>Dear passenger, welcome to Mailjet!</h3><br /> On this [[var:day]], may the delivery force be with you!",
    "Vars" => json_decode('{"day":"Monday"}', true),
    "Recipients" => json_decode('[{"Email":"passenger1@mailjet.com","Name":"passenger 1"},{"Email":"passenger2@mailjet.com","Name":"passenger 2"}]', true)
);
$result = $mj->send($params);
if ($mj->_response_code == 200){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>
```
```bash
# This calls sends an email to the given recipient.
curl -s \
	-X POST \
	--user "$MJ_APIKEY_PUBLIC:$MJ_APIKEY_PRIVATE" \
	https://api.mailjet.com/v3/send \
	-H 'Content-Type: application/json' \
	-d '{
		"FromEmail":"pilot@mailjet.com",
		"FromName":"Mailjet Pilot",
		"Subject":"Your email flight plan!",
		"Text-part":"Dear passenger, welcome to Mailjet! On this [[var:day]], may the delivery force be with you!",
		"Html-part":"<h3>Dear passenger, welcome to Mailjet!</h3><br /> On this [[var:day]], may the delivery force be with you!",
		"Vars":{"day":"Monday"},
		"Recipients":[{"Email":"passenger1@mailjet.com","Name":"passenger 1"},{"Email":"passenger2@mailjet.com","Name":"passenger 2"}]
	}'
```


By using <code>Vars</code> in conjunction with the <code>[[var:VAR_NAME]]</code>, you can modify the content of you email.

<div></div>

```php
<?php
// This calls sends an email to the given recipient.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
    "method" => "POST",
    "FromEmail" => "pilot@mailjet.com",
    "FromName" => "Mailjet Pilot",
    "Subject" => "Your email flight plan!",
    "Text-part" => "Dear passenger, welcome to Mailjet! On this [[var:day]], may the delivery force be with you! [[var:personalmessage]]",
    "Html-part" => "<h3>Dear passenger, welcome to Mailjet!</h3><br /> On this [[var:day]], may the delivery force be with you! [[var:personalmessage]]",
    "Vars" => json_decode('{"day":"Monday"}', true),
    "Recipients" => json_decode('[{"Email":"passenger1@mailjet.com","Name":"passenger 1","Vars":{"day":"Tuesday","personalmessage":"Happy birthday!"}},{"Email":"passenger2@mailjet.com","Name":"passenger 2"}]', true)
);
$result = $mj->send($params);
if ($mj->_response_code == 200){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>
```
```bash
# This calls sends an email to the given recipient.
curl -s \
	-X POST \
	--user "$MJ_APIKEY_PUBLIC:$MJ_APIKEY_PRIVATE" \
	https://api.mailjet.com/v3/send \
	-H 'Content-Type: application/json' \
	-d '{
		"FromEmail":"pilot@mailjet.com",
		"FromName":"Mailjet Pilot",
		"Subject":"Your email flight plan!",
		"Text-part":"Dear passenger, welcome to Mailjet! On this [[var:day]], may the delivery force be with you! [[var:personalmessage]]",
		"Html-part":"<h3>Dear passenger, welcome to Mailjet!</h3><br /> On this [[var:day]], may the delivery force be with you! [[var:personalmessage]]",
		"Vars":{"day":"Monday"},
		"Recipients":[{"Email":"passenger1@mailjet.com","Name":"passenger 1","Vars":{"day":"Tuesday","personalmessage":"Happy birthday!"}},{"Email":"passenger2@mailjet.com","Name":"passenger 2"}]
	}'
```


To go further in personalisation <code>Vars</code> is also available for each recipient. The main <code>Vars</code> will be overidden by the recipient <code>Vars</code>


<div></div>
###Using contact properties

```php
<?php
// This calls sends an email to the given recipient.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
    "method" => "POST",
    "FromEmail" => "pilot@mailjet.com",
    "FromName" => "Mailjet Pilot",
    "Subject" => "Your email flight plan!",
    "Text-part" => "Dear [[data:firstname:\"passenger\"]], welcome to Mailjet! May the delivery force be with you!",
    "Html-part" => "<h3>Dear [[data:firstname:\"passenger\"]], welcome to Mailjet!</h3><br /> May the delivery force be with you!",
    "Recipients" => json_decode('[{"Email":"passenger1@mailjet.com","Name":"passenger 1"},{"Email":"passenger2@mailjet.com","Name":"passenger 2"}]', true)
);
$result = $mj->send($params);
if ($mj->_response_code == 200){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>
```
```bash
# This calls sends an email to the given recipient.
curl -s \
	-X POST \
	--user "$MJ_APIKEY_PUBLIC:$MJ_APIKEY_PRIVATE" \
	https://api.mailjet.com/v3/send \
	-H 'Content-Type: application/json' \
	-d '{
		"FromEmail":"pilot@mailjet.com",
		"FromName":"Mailjet Pilot",
		"Subject":"Your email flight plan!",
		"Text-part":"Dear [[data:firstname:\"passenger\"]], welcome to Mailjet! May the delivery force be with you!",
		"Html-part":"<h3>Dear [[data:firstname:\"passenger\"]], welcome to Mailjet!</h3><br /> May the delivery force be with you!",
		"Recipients":[{"Email":"passenger1@mailjet.com","Name":"passenger 1"},{"Email":"passenger2@mailjet.com","Name":"passenger 2"}]
	}'
```


If the contact you are sending an email to is already in Mailjet system with some contact datas, you can leverage this information to personalise your email.

Use <code>[[data:METADATA_NAME]]</code> or <code>[[data:METADATA_NAME:DEFAULT_VALUE]]</code> to insert datas in your content.

<code>DEFAULT_VALUE</code>is the default value that will be used if no data found.

[More information](#personalisation-add-contact-properties) about how to add contact properties.

##Adding Email Headers 

```php
<?php
// This calls sends an email to one recipient.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
    "method" => "POST",
    "FromEmail" => "pilot@mailjet.com",
    "FromName" => "Mailjet Pilot",
    "Subject" => "Your email flight plan!",
    "Text-part" => "Dear passenger, welcome to Mailjet! May the delivery force be with you!",
    "Html-part" => "<h3>Dear passenger, welcome to Mailjet!</h3><br />May the delivery force be with you!",
    "Recipients" => json_decode('[{"Email":"passenger@mailjet.com"}]', true),
    "Headers" => json_decode('{"Reply-To":"copilot@mailjet.com"}', true)
);
$result = $mj->send($params);
if ($mj->_response_code == 200){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>
```
```bash
# This calls sends an email to one recipient.
curl -s \
	-X POST \
	--user "$MJ_APIKEY_PUBLIC:$MJ_APIKEY_PRIVATE" \
	https://api.mailjet.com/v3/send \
	-H 'Content-Type: application/json' \
	-d '{
		"FromEmail":"pilot@mailjet.com",
		"FromName":"Mailjet Pilot",
		"Subject":"Your email flight plan!",
		"Text-part":"Dear passenger, welcome to Mailjet! May the delivery force be with you!",
		"Html-part":"<h3>Dear passenger, welcome to Mailjet!</h3><br />May the delivery force be with you!",
		"Recipients":[{"Email":"passenger@mailjet.com"}],
		"Headers": {"Reply-To":"copilot@mailjet.com"}
	}'
```


In every message, you can specify your own Email headers using the <code>Headers</code> property. For example, it is possible to specify a <code>Reply-To</code> email address.  

##Tagging Email Messages

Mailjet provides 2 properties to pass your system own internal information to tag the messages.

These custom pieces of information are returned back in the events you registered to via our [Event API](#events) and in the messages processed via our [Parse API](#customid-and-payload).

<div></div>
###Sending an email with a custom ID

```php
<?php
// This calls sends an email to one recipient.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
    "method" => "POST",
    "FromEmail" => "pilot@mailjet.com",
    "FromName" => "Mailjet Pilot",
    "Subject" => "Your email flight plan!",
    "Text-part" => "Dear passenger, welcome to Mailjet! May the delivery force be with you!",
    "Html-part" => "<h3>Dear passenger, welcome to Mailjet!</h3><br />May the delivery force be with you!",
    "Recipients" => json_decode('[{"Email":"passenger@mailjet.com"}]', true),
    "Mj-CustomID" => "PassengerEticket1234"
);
$result = $mj->send($params);
if ($mj->_response_code == 200){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>
```
```bash
# This calls sends an email to one recipient.
curl -s \
	-X POST \
	--user "$MJ_APIKEY_PUBLIC:$MJ_APIKEY_PRIVATE" \
	https://api.mailjet.com/v3/send \
	-H 'Content-Type: application/json' \
	-d '{
		"FromEmail":"pilot@mailjet.com",
		"FromName":"Mailjet Pilot",
		"Subject":"Your email flight plan!",
		"Text-part":"Dear passenger, welcome to Mailjet! May the delivery force be with you!",
		"Html-part":"<h3>Dear passenger, welcome to Mailjet!</h3><br />May the delivery force be with you!",
		"Recipients":[{"Email":"passenger@mailjet.com"}],
		"Mj-CustomID":"PassengerEticket1234"
	}'
```


Sometimes you need to use your own ID in addition to ours to be able to trace back the message in our system easily. For this purpose we let you insert your own ID in the message. To achieve this, just pass the ID you want to use in the <code>Mj-CustomID</code> property.

<div></div>
```php
<?php
// View : API Key Statistical campaign/message data.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "GET",
	"CustomID" => "PassengerEticket1234"
);
$result = $mj->messagesentstatistics($params);
if ($mj->_response_code == 200){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>
```
```bash
# View : API Key Statistical campaign/message data.
curl -s \
	-X GET \
	--user "$MJ_APIKEY_PUBLIC:$MJ_APIKEY_PRIVATE" \
	https://api.mailjet.com/v3/REST/messagesentstatistics?CustomID=PassengerEticket1234 
```


From then, your <code>CustomID</code> is linked to our own Message ID. You can also retrieve the message later by providing it to the <code>/messagesentstatistics</code> resource <code>CustomID</code> filter.

<div></div>
###Sending an email with a payload

```php
<?php
// This calls sends an email to one recipient.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
    "method" => "POST",
    "FromEmail" => "pilot@mailjet.com",
    "FromName" => "Mailjet Pilot",
    "Subject" => "Your email flight plan!",
    "Text-part" => "Dear passenger, welcome to Mailjet! May the delivery force be with you!",
    "Html-part" => "<h3>Dear passenger, welcome to Mailjet!</h3><br />May the delivery force be with you!",
    "Recipients" => json_decode('[{"Email":"passenger@mailjet.com"}]', true),
    "Mj-EventPayLoad" => "Eticket,1234,row,15,seat,B"
);
$result = $mj->send($params);
if ($mj->_response_code == 200){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>
```
```bash
# This calls sends an email to one recipient.
curl -s \
	-X POST \
	--user "$MJ_APIKEY_PUBLIC:$MJ_APIKEY_PRIVATE" \
	https://api.mailjet.com/v3/send \
	-H 'Content-Type: application/json' \
	-d '{
		"FromEmail":"pilot@mailjet.com",
		"FromName":"Mailjet Pilot",
		"Subject":"Your email flight plan!",
		"Text-part":"Dear passenger, welcome to Mailjet! May the delivery force be with you!",
		"Html-part":"<h3>Dear passenger, welcome to Mailjet!</h3><br />May the delivery force be with you!",
		"Recipients":[{"Email":"passenger@mailjet.com"}],
		"Mj-EventPayLoad":"Eticket,1234,row,15,seat,B"
	}'
```


Sometimes, you need more than just an ID to represent the context to what a specific message is attached to. For this purpose, we let you insert a payload in the message which can be of any format (XML, JSON, CSV, etc). To take advantage of this, just pass the payload you want in the <code>Mj-EventPayLoad</code> property.


##Regrouping messages into a campaign

```php
<?php
// This calls sends an email to one recipient within a campaign blocking multiple email to same recipient
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "POST",
	"FromEmail" => "pilot@mailjet.com",
	"FromName" => "Mailjet Pilot",
	"Subject" => "Your email flight plan!",
	"Text-part" => "Dear passenger, welcome to Mailjet! May the delivery force be with you!",
	"Html-part" => "<h3>Dear passenger, welcome to Mailjet!</h3><br />May the delivery force be with you!",
	"Recipients" => json_decode('[
				{
						"Email": "passenger@mailjet.com"
				}
		]', true),
	"Mj-campaign" => "SendAPI_campaign",
	"Mj-deduplicatecampaign" => 1
);
$result = $mj->send($params);
if ($mj->_response_code == 200){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>
```
```bash
# This calls sends an email to one recipient within a campaign blocking multiple email to same recipient
curl -s \
	-X POST \
	--user "$MJ_APIKEY_PUBLIC:$MJ_APIKEY_PRIVATE" \
	https://api.mailjet.com/v3/send \
	-H 'Content-Type: application/json' \
	-d '{
		"FromEmail":"pilot@mailjet.com",
		"FromName":"Mailjet Pilot",
		"Subject":"Your email flight plan!",
		"Text-part":"Dear passenger, welcome to Mailjet! May the delivery force be with you!",
		"Html-part":"<h3>Dear passenger, welcome to Mailjet!</h3><br />May the delivery force be with you!",
		"Recipients":[
				{
						"Email": "passenger@mailjet.com"
				}
		],
		"Mj-campaign":"SendAPI_campaign",
		"Mj-deduplicatecampaign":1
	}'
```


Messages sent through Send API can be regrouped into campaigns to simulate the behavior of a regular Marketing Campaign. This is useful when your transactional needs are advanced (statistics...).

Use the Property <code>Mj-campaign</code> to specify the name of the campaign the message will be classified in. If the campaign doesn't already exist it will be automatically created in Mailjet system.

By default, Mailjet lets you send multiple emails with the same campaign to the same contact. To block this feature, use <code>Mj-deduplicatecampaign</code> with the value <code>1</code> to stop contacts from being emailed several times in the same campaign.


##Send API json properties

Property Name | Description 
  ----------|------------
FromEmail | Must be a valid, activated and registered sender for this account <br />May include the name part: <code>john@example.com</code> or <code>&lt;john@example.com&gt;</code> or <code>"John Doe" &lt;john@example.com&gt;</code><br />**MANDATORY - MAX FROM: 1**
FromName | Must be a valid, activated and registered sender for this account <br />May include the name part: <code>john@example.com</code> or <code>&lt;john@example.com&gt;</code> or <code>"John Doe" &lt;john@example.com&gt;</code><br />**MANDATORY - MAX FROM: 1**
Sender | This can be set only on given API Keys. Contact the <a href="https://app.mailjet.com/support/ticket" target="_blank">support team</a> if you want us to enable this setting on your account.<br />Must be a valid active sender for this account.<br />Perform a simple GET on resource <code>/sender</code> to view a list of allowed senders for your account, or within the Mailjet Account Settings under <a href="https://app.mailjet.com/account/sender" target="_blank">Sender Addresses</a><br />**MAX SENDER: 1**
Recipients | List of recipients, Must include at least a property <code>Email</code> in each element<br />Sample: <code>[{"Email":"passenger@mailjet.com","Name":"passenger"}]</code><br />**MANDATORY**
To | May include the name part: <code>john@example.com</code> or <code>&lt;john@example.com&gt;</code> or <code>"John Doe" &lt;john@example.com&gt;</code><br />If a recipient is specified twice (in the to, cc, or bcc), it is counted only once.<br />Can be a magic list @lists.mailjet.com. See the <code>Address</code> [contactslist](http://dev.mailjet.com/email-api/v3/contactslist/) property.<br />**MAX RECIPIENTS: 50**
Cc, Bcc | May include the name part: <code>john@example.com</code> or <code>&lt;john@example.com&gt;</code> or <code>"John Doe" &lt;john@example.com&gt;</code><br />If one recipient is specified twice, count as one only (including to, cc, bcc)<br />**MAX RECIPIENTS: 50**
Subject | At least 1 char, maximum length is 255 chars <br />**MANDATORY - MAX SUBJECTS: 1**
Text-part | Provides the Text part of the message<br />Mandatory if the HTML param is not specified<br />**MANDATORY IF NO HTML - MAX PARTS: 1**
Html-part | Provides the HTML part of the message<br />Mandatory if the text param is not specified<br />**MANDATORY IF NO TEXT - MAX PARTS: 1**
Mj-TemplateID | The Template ID or Name to use as this email content. Overrides the HTML/Text parts if any.**MANDATORY IF NO HTML/TEXT - MAX TEMPLATEID: 1**
Attachments | Attach files automatically to this Email<br />Sum of all attachments, including inline may not exceed 15 MB total<br />Sample: [{"Content-type": "MIME TYPE", "Filename": "FILENAME.EXT", "content":"BASE64 ENCODED CONTENT"}] 
Inline_attachments | Attach a file for inline use via <code>cid:FILENAME.EXT</code><br />Sum of all attachements, including inline may not exceed 15 MB total<br />Sample: [{"Content-type": "MIME TYPE", "Filename": "FILENAME.EXT", "content":"BASE64 ENCODED CONTENT"}]
Mj-prio | Manage message processing priority inside your account (API key) scheduling queue.<br />Default is <code>2</code> as in the SMTP submission.<br />Equivalent of using <code>X-Mailjet-Prio</code> header through SMTP<br /><a href="https://app.mailjet.com/docs/email-priority-management" target="_blank">More information</a>
Mj-campaign | Groups multiple messages in one campaign<br />Equivalent of using <code>X-Mailjet-Campaign</code> header through SMTP.<br /><a href="https://app.mailjet.com/docs/emails_headers" target="_blank">More information</a>
<span style="white-space: nowrap;">Mj-deduplicatecampaign</span> | Block/unblock messages to be sent multiple times inside one campaign to the same contact.<br>0: unblocked (default behavior) - 1: blocked<br />Equivalent of using <code>X-Mailjet-DeduplicateCampaign</code> header through SMTP.<br />Can only be used if mj-campaign is specified.<br /><a href="https://app.mailjet.com/docs/emails_headers" target="_blank">More information</a>
Mj-trackopen | Force or disable open tracking on this message, overriding preferences.<br />Equivalent of using <code>X-Mailjet-TrackOpen</code> header through SMTP.<br />Can only be used with a HTML part.<br /><a href="https://app.mailjet.com/docs/emails_headers" target="_blank">More information</a>
Mj-trackclick | Force or disable click tracking on this message, overriding preferences.<br />Equivalent to using the <code>X-Mailjet-TrackClick</code> header through SMTP.<br />Can only be specified if the HTML part is provided.<br /><a href="https://app.mailjet.com/docs/emails_headers" target="_blank">More information</a>
Mj-CustomID | Attach a custom ID to the message<br />Equivalent to using the X-MJ-CustomID header through SMTP.<br />[More information](#sending-an-email-with-a-custom-id)
Mj-EventPayLoad | Attach a payload to the message<br />Equivalent to using the X-MJ-EventPayload header through SMTP.<br />[More information](#sending-an-email-with-a-payload)
Headers | Add lines to the email's headers<br />List of headers as <code>"property":"value"</code> pairs<br />Notice: overriding values of header properties (ie: subject)<br />Sample: <code>{"X-My-Header":"my own value","X-My-Header-2":"my own value 2"}</code>
Vars | Global variables used for personalisation
Messages | List of messages<br /> Used for bulk emailing.<br />[More information](#sending-in-bulk)


