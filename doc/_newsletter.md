#Send marketing campaigns

To send your first newsletter, you need to have at least one active sender address in the <a href="https://app.mailjet.com/account/sender" target="_blank">Sender domains & addresses</a> section.

You will need to create contacts and organize them into lists.
To do so, you have two options : use the <a href="https://app.mailjet.com/contacts/lists" target="_blank">interface</a> or the API.

## Create a contact list

```php
<?php
// Create : only need a Name
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "POST",
	"Name" => "myList"
);
$result = $mj->contactslist($params);
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
# Create : only need a Name
curl -s \
	-X POST \
	--user "$MJ_APIKEY_PUBLIC:$MJ_APIKEY_PRIVATE" \
	https://api.mailjet.com/v3/REST/contactslist \
	-H 'Content-Type: application/json' \
	-d '{
		"Name":"myList"
	}'
```


> API response:

```json
{
	"Count": 1,
	"Data": [
		{
			"Address": "",
			"CreatedAt": "",
			"ID": "",
			"IsDeleted": "false",
			"Name": "myList",
			"SubscriberCount": ""
		}
	],
	"Total": 1
}
```


You can create your contacts list by performing a simple <code>POST</code> request on the <code>[/contactslist](http://dev.mailjet.com/email-api/v3/contactslist/)</code> resource with only one mandatory field : its name.

The <code>Name</code> will be a unique identifier for your list. 

<div></div>

## Manage contacts

### Create a contact

```php
<?php
// Create : Manage the details of a Contact.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "POST",
	"Email" => "Mister@mailjet.com"
);
$result = $mj->contact($params);
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
# Create : Manage the details of a Contact.
curl -s \
	-X POST \
	--user "$MJ_APIKEY_PUBLIC:$MJ_APIKEY_PRIVATE" \
	https://api.mailjet.com/v3/REST/contact \
	-H 'Content-Type: application/json' \
	-d '{
		"Email":"Mister@mailjet.com"
	}'
```
 

> API response:

```json
{
	"Count": 1,
	"Data": [
		{
			"CreatedAt": "",
			"DeliveredCount": "",
			"Email": "Mister@mailjet.com",
			"ID": "",
			"IsOptInPending": "false",
			"IsSpamComplaining": "false",
			"LastActivityAt": "",
			"LastUpdateAt": "",
			"Name": "MisterMailjet",
			"UnsubscribedAt": "",
			"UnsubscribedBy": ""
		}
	],
	"Total": 1
}
```


To create some contacts which will be the recipients, you need to specify an email address with <code>POST</code> on the <code>[/contact](http://dev.mailjet.com/email-api/v3/contact/)</code> resource. 

The email address will be a unique identifier of your contact in the Mailjet System. 

<div></div>

### Personalisation : add contact properties

The <code>/contact</code> resource allows you to create contacts using their email addresses and names. If you want to add more granular details about your contacts, Mailjet provides the capability to add custom data to contacts. 

The addition of custom data starts with the definition of the extra information to store with the contacts (It could be for example the country the contacts live in, how old the contacts are, their current income, the value of their purchases on your site...) and how this data will be stored (string, number, boolean...). 

#### Defining custom Contact data

```php
<?php
// Create : Definition of available extra data items for contacts.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "POST",
	"Datatype" => "str",
	"Name" => "Age",
	"NameSpace" => "static"
);
$result = $mj->contactmetadata($params);
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
# Create : Definition of available extra data items for contacts.
curl -s \
	-X POST \
	--user "$MJ_APIKEY_PUBLIC:$MJ_APIKEY_PRIVATE" \
	https://api.mailjet.com/v3/REST/contactmetadata \
	-H 'Content-Type: application/json' \
	-d '{
		"Datatype":"str",
		"Name":"Age",
		"NameSpace":"static"
	}'
```


> API response:

```json
{
	"Count": 1,
	"Data": [
		{
			"Datatype": "str",
			"ID": "",
			"Name": "Age",
			"NameSpace": "static"
		}
	],
	"Total": 1
}
```


To define custom contact data, perform a <code>POST</code> on <code>[/contactmetadata](http://dev.mailjet.com/email-api/v3/contactmetadata/)</code> with the following properties:

 - <code>Name</code>: the name of the custom data field
 - <code>DataType</code>: the type of data that is being stored (this can be either a <code>str</code>, <code>int</code>, <code>float</code> or <code>bool</code>)
 - <code>NameSpace</code>: this can be either <code>static</code> or <code>historic</code>

For example, to store the age of each contacts, a <code>static</code> <code>int</code> "Age" property can be added to the metadata.

A <code>static</code> data stores only one value per DataType. It could store for example a firstname, a lastname, a country, a language ...  
A <code>historic</code> data stores a timestamped history of the value of this data. It could be used for example to store the value of each purchases over the history of the contact. 

These 2 Namespaces have their own resources for viewing, creating and editing: <code>[/contactdata](http://dev.mailjet.com/email-api/v3/contactdata/)</code> and <code>[/contacthistorydata](http://dev.mailjet.com/email-api/v3/contacthistorydata/)</code>  

The contact datas will be available for personalisation of your message content and for segmentation of your lists.

<div></div>
#### Adding custom static Contact data

```php
<?php
// Modify : Modify the static custom contact data
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "PUT",
	"ID" => "$CONTACT_ID",
	"Data" => json_decode('[
				{
						"Name": "Age",
						"value": 30
				},
				{
						"Name": "Country",
						"value": "US"
				}
		]', true)
);
$result = $mj->contactdata($params);
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
# Modify : Modify the static custom contact data
curl -s \
	-X PUT \
	--user "$MJ_APIKEY_PUBLIC:$MJ_APIKEY_PRIVATE" \
	https://api.mailjet.com/v3/REST/contactdata/$CONTACT_ID \
	-H 'Content-Type: application/json' \
	-d '{
		"Data":[
				{
						"Name": "Age",
						"value": 30
				},
				{
						"Name": "Country",
						"value": "US"
				}
		]
	}'
```


By Performing a <code>PUT</code> (acting like a PATCH, your other static datas will not be lost) on <code>[/contactdata](http://dev.mailjet.com/email-api/v3/contactdata/)</code>, you can add values for several metadata at once.

<div></div>
#### Adding custom historic Contact data

```php
<?php
// Create : This resource can be used to add historical data to contact.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "POST",
	"ContactID" => "$CONTACT_ID",
	"Data" => "10",
	"Name" => "Purchase"
);
$result = $mj->contacthistorydata($params);
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
# Create : This resource can be used to add historical data to contact.
curl -s \
	-X POST \
	--user "$MJ_APIKEY_PUBLIC:$MJ_APIKEY_PRIVATE" \
	https://api.mailjet.com/v3/REST/contacthistorydata \
	-H 'Content-Type: application/json' \
	-d '{
		"ContactID":"$CONTACT_ID",
		"Data":"10",
		"Name":"Purchase"
	}'
```


By Performing a <code>POST</code> on <code>[/contacthistorydata](http://dev.mailjet.com/email-api/v3/contacthistorydata/)</code>, you can add a new value for a historic metadata.

This historic metadata will be available for segmentation with dedicated functions like <code>Avg</code>,<code>Min</code>,<code>Max</code>...

<div></div>
#### Creating contacts with Contact data  

```php
<?php
// Create : Manage the details of a Contact.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "POST",
	"Contacts" => json_decode('[
				{
						"Email": "jimsmith@example.com",
						"Name": "Jim",
						"Properties": {
								"Property1": "value",
								"Property2": "value2"
						}
				},
				{
						"Email": "janetdoe@example.com",
						"Name": "Janet",
						"Properties": {
								"Property1": "value",
								"Property2": "value2"
						}
				}
		]', true)
);
$result = $mj->contactManageManyContacts($params);
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
# Create : Manage the details of a Contact.
curl -s \
	-X POST \
	--user "$MJ_APIKEY_PUBLIC:$MJ_APIKEY_PRIVATE" \
	https://api.mailjet.com/v3/REST/contact/managemanycontacts \
	-H 'Content-Type: application/json' \
	-d '{
		"Contacts":[
				{
						"Email": "jimsmith@example.com",
						"Name": "Jim",
						"Properties": {
								"Property1": "value",
								"Property2": "value2"
						}
				},
				{
						"Email": "janetdoe@example.com",
						"Name": "Janet",
						"Properties": {
								"Property1": "value",
								"Property2": "value2"
						}
				}
		]
	}'
```


Mailjet offers the <code>[/contact/managemanycontacts](http://dev.mailjet.com/email-api/v3/contact-managemanycontacts/)</code> resource to create or update multiple contacts and their properties at once.
 
[More information](#contact_managemanycontacts)

<div></div>
### Subscribe to a list

```php
<?php
// Create : Manage a contact subscription to a list
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "POST",
	"ID" => "$ID",
	"ContactsLists" => json_decode('[
				{
						"ListID": "$ListID_1",
						"Action": "addnoforce"
				},
				{
						"ListID": "$ListID_2",
						"Action": "addforce"
				}
		]', true)
);
$result = $mj->contactManageContactsLists($params);
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
# Create : Manage a contact subscription to a list
curl -s \
	-X POST \
	--user "$MJ_APIKEY_PUBLIC:$MJ_APIKEY_PRIVATE" \
	https://api.mailjet.com/v3/REST/contact/$ID/managecontactslists \
	-H 'Content-Type: application/json' \
	-d '{
		"ContactsLists":[
				{
						"ListID": "$ListID_1",
						"Action": "addnoforce"
				},
				{
						"ListID": "$ListID_2",
						"Action": "addforce"
				}
		]
	}'
```


Last step: you have to add this contact to the contactslist previously created.

<code>POST</code> on the <code>[/contact/$ID/managecontactslists](http://dev.mailjet.com/email-api/v3/contact-managecontactslists/)</code> with $ID being the Mailjet contact id or the email address of the contact. 
You can specify one or more list to add this contact to. The <code>action</code> specified with the ListID can be <code>addforce</code> (force the subscription of the contact even if he unsubscribed to the list before) or <code>addnoforce</code> (do not resubscribe the contact to the list if unsubscribed before) 

<code>managecontactslist</code> offer more possibilities of list management for a contact. [More information](#managecontactslists)

<div></div>
### Create contact and subscribe at once

```php
<?php
// Add a contact to the list
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "POST",
	"ID" => "$LIST_ID",
	"Email" => "mrsmith@mailjet.com",
	"Name" => "MrSmith",
	"Action" => "addnoforce",
	"Properties" => json_decode('{
				"property1": "value",
				"propertyN": "valueN"
		}', true)
);
$result = $mj->contactslistManageContact($params);
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
# Add a contact to the list
curl -s \
	-X POST \
	--user "$MJ_APIKEY_PUBLIC:$MJ_APIKEY_PRIVATE" \
	https://api.mailjet.com/v3/REST/contactslist/$LIST_ID/managecontact \
	-H 'Content-Type: application/json' \
	-d '{
		"Email":"mrsmith@mailjet.com",
		"Name":"MrSmith",
		"Action":"addnoforce",
		"Properties":{
				"property1": "value",
				"propertyN": "valueN"
		}
	}'
```


> API response: 

```json
{
	"Count": 1,
	"Data": [
		{
			"ContactID": "10",
			"Email": "mrsmith@mailjet.com",
			"Action": "addnoforce",
			"Name": "MrSmith",
			"Properties": {
				"property1": "value",
				"propertyN": "valueN"
			}
		}
	],
	"Total": 1
}
```


The <code>[/contactslist/$ID/managecontact](http://dev.mailjet.com/email-api/v3/contactslist-managecontact/)</code> allows to create and add a contact to a list in one call. 

The properties specified in this call can only be static Contact data.

  'Action' is mandatory and can be one of the following values:

  Actions | |
  ----------|------------
  addforce | **string** <br /> adds the contact and resets the unsub status to false
  addnoforce | **string** <br /> adds the contact and does not change the subscription status of the contact

The response will include the <code>ID</code> of the contact that was created or updated. 

## Add Contacts in bulks

###Managing and uploading multiple contacts ( /contact/managemanycontacts ) 

This resource allows to add contacts in bulk in a json format. Optionally, these contacts can be added to existing lists. 
[More information](#contact_managemanycontacts)

###Managing multiple Contacts subscriptions to a List ( /contactslist/$ID/managemanycontacts ) 

This resource allows to add contacts directly to a list. This resource will create new contacts if the contacts are not already in the Mailjet system. 
[More information](#contactslist_managemanycontacts)


###Managing Contacts through CSV upload

This process allows to upload csv containing large quantities of contacts.
[More information](#csv_upload_contacts)

##Prepare a newsletter

### Create a Newsletter

```php
<?php
// Create : Newsletter data.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "POST",
	"Locale" => "en_US",
	"Sender" => "MisterMailjet",
	"SenderEmail" => "Mister@mailjet.com",
	"Subject" => "Greetings from Mailjet",
	"ContactsListID" => "$ID_CONTACTSLIST",
	"Title" => "Friday newsletter"
);
$result = $mj->newsletter($params);
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
# Create : Newsletter data.
curl -s \
	-X POST \
	--user "$MJ_APIKEY_PUBLIC:$MJ_APIKEY_PRIVATE" \
	https://api.mailjet.com/v3/REST/newsletter \
	-H 'Content-Type: application/json' \
	-d '{
		"Locale":"en_US",
		"Sender":"MisterMailjet",
		"SenderEmail":"Mister@mailjet.com",
		"Subject":"Greetings from Mailjet",
		"ContactsListID":"$ID_CONTACTSLIST",
		"Title":"Friday newsletter"
	}'
```


> API response: 

```json
{
	"Count": 1,
	"Data": [
		{
			"AXFraction": "",
			"AXFractionName": "",
			"AXTesting": "",
			"Callback": "",
			"Campaign": "",
			"ContactsList": "",
			"CreatedAt": "",
			"DeliveredAt": "",
			"EditMode": "",
			"EditType": "",
			"Footer": "",
			"FooterAddress": "",
			"FooterWYSIWYGType": "",
			"HeaderFilename": "",
			"HeaderLink": "",
			"HeaderText": "",
			"HeaderUrl": "",
			"ID": "",
			"Ip": "",
			"IsHandled": "false",
			"IsStarred": "false",
			"IsTextPartIncluded": "false",
			"Locale": "en_US",
			"ModifiedAt": "",
			"Permalink": "",
			"PermalinkHost": "",
			"PermalinkWYSIWYGType": "",
			"PolitenessMode": "",
			"ReplyEmail": "",
			"Segmentation": "",
			"Sender": "MisterMailjet",
			"SenderEmail": "Mister@mailjet.com",
			"SenderName": "",
			"Status": "",
			"Subject": "Greetings from Mailjet",
			"Template": "",
			"TestAddress": "",
			"Title": "",
			"Url": ""
		}
	],
	"Total": 1
}
```


To create a newsletter, perform a POST on the <code>[/newsletter](http://dev.mailjet.com/email-api/v3/newsletter/)</code> resource. Required fields are a <code>Locale</code>, <code>Sender</code>, <code>SenderEmail</code>, <code>Subject</code> and <code>ContactsListID</code>.

Reminder: the SenderEmail needs to be active. Visit the <a href="https://app.mailjet.com/account/sender" target="_blank">Sender domains & addresses</a> section to check.

<div></div>
### Add a body to a newsletter

```php
<?php
// Modify : Newsletter data.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "PUT",
	"ID" => "$ID",
	"Html-part" => "Hello <strong>world</strong>!",
	"Text-part" => "Hello world!"
);
$result = $mj->newsletterDetailContent($params);
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
# Modify : Newsletter data.
curl -s \
	-X PUT \
	--user "$MJ_APIKEY_PUBLIC:$MJ_APIKEY_PRIVATE" \
	https://api.mailjet.com/v3/REST/newsletter/$ID/detailcontent \
	-H 'Content-Type: application/json' \
	-d '{
		"Html-part":"Hello <strong>world</strong>!",
		"Text-part":"Hello world!"
	}'
```


>API response : 

```json
{
	"Count": 1,
	"Data": [
		{
			"Html-part": "Hello <strong>world</strong>!",
			"Text-part": "Hello world!"
		}
	],
	"Total": 1
}
```

Now that we have a newsletter, we can add the most important property: its content, which can be Text or Html (Text-part or Html-part). To do so, you can perform a <code>PUT</code> or <code>POST</code> request  on the <code>[/newsletter/$ID/detailcontent](http://dev.mailjet.com/email-api/v3/newsletter-detailcontent/)</code> resource.
With a <code>POST</code>, if you only give a value to Html-part or Text-part, the other one will be set to empty.
While with a <code>PUT</code>, if you only give a value to Html-part or Text-part, the other one keeps its previous value.

## Send a newsletter

### Test Newsletters

```php
<?php
// Create : Newsletter data.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "POST",
	"ID" => "$ID",
	"Recipients" => json_decode('[
				{
						"Email": "mailjet@example.org",
						"Name": "Mailjet"
				}
		]', true)
);
$result = $mj->newsletterTest($params);
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
# Create : Newsletter data.
curl -s \
	-X POST \
	--user "$MJ_APIKEY_PUBLIC:$MJ_APIKEY_PRIVATE" \
	https://api.mailjet.com/v3/REST/newsletter/$ID/test \
	-H 'Content-Type: application/json' \
	-d '{
		"Recipients":[
				{
						"Email": "mailjet@example.org",
						"Name": "Mailjet"
				}
		]
	}'
```


> API response:

```json
{
	"Count": 1,
	"Data": [
		{
			"Status": "Draft"
		}
	],
	"Total": 1
}
```


To send a test version of a newsletter, you need to perform a POST request on the resource <code>[/newsletter/$ID/test](http://dev.mailjet.com/email-api/v3/newsletter-test/)</code> with a recipient in the JSON packet.

<aside class="notice">
Before sending, the API will check if the newsletter has all mandatory fields filled in and that they are valid. In case of error, the API will return a 400 Bad Request.
</aside>

<div></div>

### Send the newsletter immediately

```php
<?php
// Create : Newsletter data.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "POST",
	"ID" => "$ID",
);
$result = $mj->newsletterSend($params);
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
# Create : Newsletter data.
curl -s \
	-X POST \
	--user "$MJ_APIKEY_PUBLIC:$MJ_APIKEY_PRIVATE" \
	https://api.mailjet.com/v3/REST/newsletter/$ID/send \
	-H 'Content-Type: application/json' \
	-d '{
	}'
```


> API response:

```json
{
	"Count": 1,
	"Data": [
		{
			"Status": "programmed"
		}
	],
	"Total": 1
}
```


Once the newsletter is completely set up, it can be sent with a <code>POST</code> on the <code>[/newsletter/$ID/send](http://dev.mailjet.com/email-api/v3/newsletter-send/)</code> resource.

Before sending, the API will check if the newsletter has all mandatory fields filled in and that they are valid :

 - <code>SenderEmail</code> is a valid sender
 - <code>Sender</code> is not empty
 - <code>Subject</code> is not empty
 - <code>ContactsList</code> is an existing contact list with more than one active subscribed recipient
 - <code>Status</code> is <code>Draft</code> or <code>Programmed</code>
 - <code>Text-part</code> and/or <code>Html-part</code> exist
 - <code>AXTesting</code> is not set for this newsletter


<div></div>

### Schedule a newsletter

> Schedule a newsletter for the 22nd of April, 2015 at 9am UTC+1

```php
<?php
// Create : Newsletter data.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "POST",
	"ID" => "$ID",
	"date" => "2015-04-22T09:00:00+01:00"
);
$result = $mj->newsletterSchedule($params);
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
# Create : Newsletter data.
curl -s \
	-X POST \
	--user "$MJ_APIKEY_PUBLIC:$MJ_APIKEY_PRIVATE" \
	https://api.mailjet.com/v3/REST/newsletter/$ID/schedule \
	-H 'Content-Type: application/json' \
	-d '{
		"date":"2015-04-22T09:00:00+01:00"
	}'
```


> API response:

```json
{
	"Count": 1,
	"Data": [
		{
			"Status": "programmed"
		}
	],
	"Total": 1
}
```


To send a newsletter at a later date, we need to set the date property (ISO 8601 format) at which the newsletter shall be sent usind the <code>[/newsletter/$ID/schedule](http://dev.mailjet.com/email-api/v3/newsletter-schedule/)</code> resource.

Before scheduling, the API will check if the newsletter has all mandatory fields filled in and that they are valid:

 - <code>SenderEmail</code> is a valid sender
 - <code>Sender</code> is not empty
 - <code>Subject</code> is not empty
 - <code>ContactsList</code> is an existing contact list with more than one active subscribed recipient
 - <code>Status</code> is <code>Draft</code> or <code>Programmed</code>
 - <code>Text-part</code> and/or <code>Html-part</code> exist
 - <code>AXTesting</code> is not set for this newsletter
 - Date of scheduling is not in the past or too close to the execution

The value <code>NOW</code> is accepted as a date to indicate immediate sending

##Segmentation

Our <code>[/contactfilter](http://dev.mailjet.com/email-api/v3/contactfilter/)</code> resource allows you to send newsletters to certain subsets of your contact lists. A filter can be applied to any contact metadata that you defined, like age, gender, and location.

###Prerequisites

In order to use a contact filter, you must add additional data to your contacts. Please refer to the [personalisation](#personalisation-add-contact-properties) to see how this is done. You also have to create a contact list, because contact filters are applied to a contact list via the <code>/newsletter</code> resource.

###How does it work?

Mailjet allows you to segment a list of contacts by creating a ContactFilter resource. This resource has a property called expression and it is the value of this property that is used to filter a list of contacts. You can create simple expressions using the <code>=</code>, <code><</code>, <code>></code> and <code>!=</code> operators:

- age>40
- gender=male
- country=France

You can also apply the negative statement <code>not</code>

But you can also combine these operators with the <code>and</code> and <code>or</code> operator, using brackets:

- (age>40) and (gender=male)
- (country=France) and (profession=physician)
- ((age>=50) and (age<70)) or (income>50000)


Additionaly, you can filter on the contact Activities (who has opened/clicked your campaigns in the last X days). These function return a boolean.

- <code>HasOpenedSince(days)</code> 
- <code>HasClickedSince(days)</code> 

These functions are not scoped on a specific campaign. 

<div></div>
###Create a contact filter

```php
<?php
// Create : A filter expressions for use in newsletters.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "POST",
	"Description" => "Only contacts aged 40",
	"Expression" => "age=40",
	"Name" => "40 year olds"
);
$result = $mj->contactfilter($params);
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
# Create : A filter expressions for use in newsletters.
curl -s \
	-X POST \
	--user "$MJ_APIKEY_PUBLIC:$MJ_APIKEY_PRIVATE" \
	https://api.mailjet.com/v3/REST/contactfilter \
	-H 'Content-Type: application/json' \
	-d '{
		"Description":"Only contacts aged 40",
		"Expression":"age=40",
		"Name":"40 year olds"
	}'
```


> API response:

```json
{
	"Count": 1,
	"Data": [
		{
			"Description": "Only contacts contacts aged 40",
			"Expression": "age=40",
			"ID": "",
			"Name": "40 year olds",
			"Status": "unused"
		}
	],
	"Total": 1
}
```


Lets say that we added an age property to our contacts, using the <code>[/contactmetadata](http://dev.mailjet.com/email-api/v3/contactmetadata/)</code> and <code>[/contactdata](http://dev.mailjet.com/email-api/v3/contactdata/)</code> resources. 
We now want to create a filter that gives us only those contacts that are 40 years old. In order to do this, we perform a <code>POST</code> with the following properties: <code>Name</code> , <code>Expression</code> , and <code>Description</code> . Name and Description allow you to describe the filter,while <code>Expression</code> contains the actual filtering expression.

<div></div>
###Create a newsletter with a segmentation filter

```php
<?php
// Create : Newsletter data with segmentation.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "POST",
	"Title" => "Mailjet greets every contact over 40",
	"Locale" => "en_US",
	"Sender" => "MisterMailjet",
	"SenderEmail" => "Mister@mailjet.com",
	"Subject" => "Greetings from Mailjet",
	"ContactsListID" => "$ID_CONTACTLIST",
	"SegmentationID" => "$ID_CONTACT_FILTER"
);
$result = $mj->newsletter($params);
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
# Create : Newsletter data with segmentation.
curl -s \
	-X POST \
	--user "$MJ_APIKEY_PUBLIC:$MJ_APIKEY_PRIVATE" \
	https://api.mailjet.com/v3/REST/newsletter \
	-H 'Content-Type: application/json' \
	-d '{
		"Title":"Mailjet greets every contact over 40",
		"Locale":"en_US",
		"Sender":"MisterMailjet",
		"SenderEmail":"Mister@mailjet.com",
		"Subject":"Greetings from Mailjet",
		"ContactsListID":"$ID_CONTACTLIST",
		"SegmentationID":"$ID_CONTACT_FILTER"
	}'
```


Segmentation is achieved by adding a contact filter to a newsletter resource using the property <code>SegmentationID</code>. <code>$ID_CONTACT_FILTER</code> is the ID of the contact filter that was created on the previous step.

##Campaign and Statistics

A new campaign resource is created for each newsletter and transactional email that is sent.  You can query the campaign resource and its related statistics resources for a variety of data like bounces, number of clicks, and sending time.

###Retrieve campaign information for a particular newsletter

```php
<?php
// View : Campaign linked to the Newsletter :NEWSLETTER_ID
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "VIEW",
	"ID" => "mj.nl=$NEWSLETTER_ID",
);
$result = $mj->campaign($params);
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
# View : Campaign linked to the Newsletter :NEWSLETTER_ID
curl -s \
	-X GET \
	--user "$MJ_APIKEY_PUBLIC:$MJ_APIKEY_PRIVATE" \
	https://api.mailjet.com/v3/REST/campaign/mj.nl=$NEWSLETTER_ID 
```


> API response:

```json
{
	"Count": 1,
	"Data": [
		{
			"CampaignType": "",
			"ClickTracked": "",
			"CreatedAt": "",
			"CustomValue": "",
			"FirstMessageID": "",
			"FromID": "",
			"FromEmail": "miss@mailjet.com",
			"FromName": "",
			"HasHtmlCount": "",
			"HasTxtCount": "",
			"ID": "",
			"IsDeleted": "false",
			"IsStarred": "false",
			"ListID": "",
			"NewsLetterID": "",
			"OpenTracked": "",
			"SegmentationID": "",
			"SendEndAt": "",
			"SendStartAt": "",
			"SpamassScore": "",
			"Status": "",
			"Subject": "",
			"UnsubscribeTrackedCount": ""
		}
	],
	"Total": 1
}
```


When a campaign is created from the processing of a newsletter, its <code>CustomValue</code> property is set to <code>mj.nl=$NEWSLETTER_ID</code> where <code>$NEWSLETTER_ID</code> is the id of the newsletter you just sent. You can use <code>mj.nl=$NEWSLETTER_ID</code> as a unique key to retrieve the campaign.


<div></div>
### Campaign statistics

```php
<?php
// View : Statistics related to emails processed by Mailjet, grouped in a Campaign.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "GET",
);
$result = $mj->campaignstatistics($params);
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
# View : Statistics related to emails processed by Mailjet, grouped in a Campaign.
curl -s \
	-X GET \
	--user "$MJ_APIKEY_PUBLIC:$MJ_APIKEY_PRIVATE" \
	https://api.mailjet.com/v3/REST/campaignstatistics 
```


> API response:

```json
{
	"Count": 1,
	"Data": [
		{
			"AXTesting": "",
			"BlockedCount": "",
			"BouncedCount": "",
			"CampaignID": "",
			"CampaignIsStarred": "false",
			"CampaignSendStartAt": "",
			"CampaignSubject": "",
			"ClickedCount": "",
			"ContactListName": "",
			"DeliveredCount": "",
			"LastActivityAt": "",
			"NewsLetterID": "",
			"OpenedCount": "",
			"ProcessedCount": "",
			"QueuedCount": "",
			"SegmentName": "",
			"SpamComplaintCount": "",
			"UnsubscribedCount": ""
		}
	],
	"Total": 1
}
```


View message statistics grouped by campaigns using <code>[/campaignstatistics](http://dev.mailjet.com/email-api/v3/campaignstatistics/)</code> resource .

The [API reference](http://dev.mailjet.com/email-api/v3/campaign/) offers more information on additional resources to explore the campaigns.


