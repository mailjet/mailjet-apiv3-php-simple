# Managing Contacts in bulk

## Choosing a resource


###Managing list subscriptions for a single contact ( /contact/$ID/managecontactslists )

This resource allows to add a single contact in several lists at once.
[More information](#managecontactslists)

###Managing and uploading multiple contacts ( /contact/managemanycontacts ) 

This resource allows to add contacts in bulk in a json format. Optionally, these contacts can be added to existing lists. 
[More information](#contact_managemanycontacts)

###Managing multiple Contacts subscriptions to a list ( /contactslist/$ID/managemanycontacts ) 

This resource allows to add contacts directly to a list. This resource will create new contacts if the contacts are not already in the Mailjet system. 
[More information](#contactslist_managemanycontacts)


###Managing Contacts through CSV upload

This process allows to upload csv containing large quantities of contacts.
[More information](#csv_upload_contacts)


<h2 id="managecontactslists">Managing list subscriptions for a single contact</h2>

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


> API response:

```json
{
	"Count": 1,
	"Data": [
		{ 
			"ContactsLists" : [
				{ 
					"Action" : "addnoforce", 
					"ListID" : "$ListID_1" 
				}, 
				{ 
					"Action" : "addforce", 
					"ListID" : "$ListID_2"
				}
			] 
		}
	],
	"Total": 1
}
```


To manage a Contact subscription for one or multiple Lists, we can do a <code>POST</code> on <code>[/contact/$ID/managecontactslists](http://dev.mailjet.com/email-api/v3/contact-managecontactslists/)</code>, specifying the contact ID in the URL and add JSON to the body of the request with the list subscriptions to be modified.


  'Action' is mandatory and can be one of the following values:

  Actions | |
  ----------|------------
  addforce | **string** <br /> adds the contact and resets the unsub status to false
  addnoforce | **string** <br /> adds the contact and does not change the subscription status of the contact
  remove | **string** <br /> removes the contact from the list
  unsub | **string** <br /> unsubscribes a contact from the list

<div></div>
```json
{
	"ErrorInfo": "",
	"ErrorMessage": {
		"ContactsLists": [
			{
				"ListID": "original_list_id", 
				"Action": "original_string_action", 
				"Error": "errorstring"
			}
		]
	},
	"StatusCode": 400
}

```

For this API call, there is one specific <code>HTTP 400 status</code> error condition that is worth noting:
<ul>
	<li><code>400 Object properties invalid</code>: The ID of the Contact List is missing / invalid.
</ul>

<p>
	A detailed description of the error will be sent in a standard API error payload: <br />

	The <code>errorpayload</code> will contain the following json detailing each property error in the original json payload. Only the properties having an error will be listed. <br /><br />
	<br>
	The possible <code>errorstring</code> are:
	</p>
	<ul>
		<li>listID missing or not valid</li>
		<li>action missing or not valid</li>
	</ul>

<h2 id="contact_managemanycontacts">Managing and uploading multiple contacts</h2>

```php
<?php
// Create : Manage the details of a Contact.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "POST",
	"ContactsLists" => json_decode('[
				{
						"ListID": 1,
						"action": "addnoforce"
				},
				{
						"ListID": 2,
						"action": "addforce"
				}
		]', true),
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
		"ContactsLists":[
				{
						"ListID": 1,
						"action": "addnoforce"
				},
				{
						"ListID": 2,
						"action": "addforce"
				}
		],
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


Uploading multiple contacts, with the option to manage their subscription to a Contact List or multiple lists, if required, can be done with a <code>POST</code> on the <code>[/contact/managemanycontacts](http://dev.mailjet.com/email-api/v3/contact-managemanycontacts/)</code> resource. This resource is asynchronous and will return a <code>JobID</code> allowing you to monitor the process.

<code>Email</code> is the only mandatory property in <code>Contacts</code>.

If you are specifying <code>Properties</code> for a contact, please note that these properties must already be defined with the <code>[/contactmetadata](#defining-custom-contact-data)</code> resource. The properties specified can only be <code>static</code> in this ressource.

If a contact (uniquely identified by the email) has already been added, multiple entries or subsequent uploads will not add duplicate entries in neither the contacts and list subscription. The <code>Properties</code> and <code>Name</code> of the contact will be updated with any modified values.

<code>ContactsLists</code> in this <code>POST</code> is not mandatory. You can upload multiple contact without adding them to a list. The field <code>Action</code> in ContactsLists can have the following values:

Actions | |
  ----------|------------
  addforce | **string** <br /> adds the contact and re-subscribes the contact to the list
  addnoforce | **string** <br /> adds the contact and does not change the subscription status of the contact
  remove | **string** <br /> removes the contact from the list
  unsub | **string** <br /> unsubscribes the contact from the list

<div></div>

> API response:

```json
{
   "Count": 1,
   "Data": [
      {
         "JobID": 35800
      }
   ],
   "Total": 1
}

```

A successful call will return JSON in the following format, containing the <code>JobID</code> allowing to monitor the processing :

<div></div>
### Monitoring the upload of multiple contacts

```php
<?php
// View: Job information
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
    "method" => "VIEW",
    "ID" => "$JOBID",
);
$result = $mj->contactManageManyContacts($params);
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
# View: Job information
curl -s \
	-X GET \
	--user "$MJ_APIKEY_PUBLIC:$MJ_APIKEY_PRIVATE" \
	https://api.mailjet.com/v3/REST/contact/managemanycontacts/$JOBID
```


> API response: 

```json
{
   "Count": 1,
   "Data": [
      {
         "Status": "string",
         "JobStart": "timestamp",
         "JobEnd": "timestamp",
         "Count": "integer",
         "Error": "string",
         "ErrorFile": "string"
      }
   ],
   "Total": 1
}
```

After the <code>POST</code> on <code>/contact/managemanycontacts</code>, we can follow with a <code>GET</code>, this time including the <code>JobID</code>

This provides the following information:

 - Status: This can be one of the following:
  - Allocated: the job is in the queue
  - Upload: The data is in the upload phase
  - Prepare: The data is being formatted to be added to the list
  - Importing: Data is being added to the Contact List
  - Completed: Addition to the Contact List complete
  - Error: Declares an error
  - Abort: For cancelled jobs.
 - JobStart: Time of job start
 - JobEnd: Time of job end
 - Count: Represents the number of contacts already processed by the background job
 - Error: If the status equals 'error', contains error information from the batch job
 - ErrorFile: Contains the URL to the Error information file

<h2 id="contactslist_managemanycontacts">Managing multiple Contacts subscriptions to a List</h2>

```php
<?php
// Create : Manage your contact lists. One Contact might be associated to one or more ContactsList.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "POST",
	"ID" => "$ID",
	"Action" => "addnoforce",
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
$result = $mj->contactslistManageManyContacts($params);
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
# Create : Manage your contact lists. One Contact might be associated to one or more ContactsList.
curl -s \
	-X POST \
	--user "$MJ_APIKEY_PUBLIC:$MJ_APIKEY_PRIVATE" \
	https://api.mailjet.com/v3/REST/contactslist/$ID/ManageManyContacts \
	-H 'Content-Type: application/json' \
	-d '{
		"Action":"addnoforce",
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


> API response:

```json
{
   "Count": 1,
   "Data": [
      {
         "JobID": 35800
      }
   ],
   "Total": 1
}

```

Multiple contacts, in JSON format, can be uploaded with a <code>POST</code> using the <code>[/contactslist/$ID/managemanycontacts](http://dev.mailjet.com/email-api/v3/contactslist-managemanycontacts/)</code> action. This resource is asynchronous and will return a <code>JobID</code> allowing you to monitor the process. This is the perfect method to easily add large quantity of contacts in a list.

The field <code>Email</code> in Contacts is the key for the contact and is mandatory, as is <code>Action</code>. <code>Action</code> can have one of the following values:

Actions | |
  ----------|------------
  addforce | **string** <br /> adds the contact and re-subscribes the contact to the list
  addnoforce | **string** <br /> adds the contact and does not change the subscription status of the contact
  remove | **string** <br /> removes the contact from the List
  unsub | **string** <br /> unsubscribes the contact from the List

If you are specifying <code>Properties</code> for a contact, please note that these properties must already be defined with the <code>[/contactmetadata](#defining-custom-contact-data)</code> resource. The properties specified can only be <code>static</code> in this ressource.

If a contact (uniquely identified by the email) has already been added to your contacts or a list, multiple entries or subsequent uploads will not add duplicate entries in either the contacts or list subscription. The <code>Properties</code> and <code>Name</code> of the contact will be updated with any modified values.

<div></div>
### Monitoring the upload of multiple contacts

```php
<?php
// View: Job information
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
    "method" => "VIEW",
    "unique" => "$ID",
    "JobID" => "$JOBID",
);
$result = $mj->contactslistManageManyContacts($params);
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
# View: Job information
curl -s \
	-X GET \
	--user "$MJ_APIKEY_PUBLIC:$MJ_APIKEY_PRIVATE" \
	https://api.mailjet.com/v3/REST/contactslist/$ID/ManageManyContacts/$JOBID
```


> API response: 

```json
{
   "Count": 1,
   "Data": [
      {
         "Status": "string",
         "JobStart": "timestamp",
         "JobEnd": "timestamp",
         "Count": "integer",
         "Error": "string",
         "ErrorFile": "string"
      }
   ],
   "Total": 1
}
```


After the <code>POST</code> on <code>/contactslist/$ID/managemanycontacts</code>, we can follow with a <code>GET</code>, this time including the <code>JobID</code>

This provides the following information:

 - Status: This can be one of the following:
  - Allocated: the job is in the queue
  - Upload: The data is in the upload phase
  - Prepare: The data is being formatted to be added to the list
  - Importing: Data is being added to the Contact List
  - Completed: Addition to the Contact List complete
  - Error: Declares an error
  - Abort: For cancelled jobs.
 - JobStart: Time of job start
 - JobEnd: Time of job end
 - Count: Represents the number of contacts already processed by the background job
 - Error: If the status equals 'error', contains error information from the batch job
 - ErrorFile: Contains the URL to the Error information file


<h2 id="csv_upload_contacts">Managing Contacts through CSV upload</h2>

In some cases you might need to manage large quantities of contacts stored into a csv record in relation to a contactslist. 

With the following process, you will be able to fully manage your contacts and their relationship with a contact list (ie: adding, removing or unsubscribing)

Please note that these steps represent a single process. Don't execute each step independently but rather as a whole.

###CSV file structure

```
"email","age"
"foo@example.org",42
"bar@example.com",13
"sam@ple.co.uk",37
```

The structure for the csv file should be as follows:

You can define Custom Contact Data in the csv. Visit our [Contact Personalisation Guide](#personalisation-add-contact-properties) for more information about defining Custom Contact Data. If you are using undefined contact properties, Mailjet will automatically create <code>/contactmetadata</code> in the next step of the process.

With this process it is not possible to populate the Contact Name property. If you specify a "name" it will create a new <code>/contactmetadata</code> and <code>/contactdata</code> as explained above.
The email should be unique in the file and will be the key to reconcile this list with your existing contact in Mailjet system. 

<div></div>
###Uploading of the data

```php
<?php
// View: CSV upload
$CSVContent = file_get_contents('test.csv');
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
    "method" => "POST",
    "ID" => $listID,
    "csv_content" => $CSVContent
);
$result = $mj->uploadCSVContactslistData($params);
if ($mj->_response_code == 200){
   echo "success - uploaded CSV file";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>
```
```bash
# Import the CSV file through the DATA API
curl --user "$MJ_APIKEY_PUBLIC:$MJ_APIKEY_PRIVATE" \
https://api.mailjet.com/v3/DATA/contactslist/$listID/CSVData/text:plain \
-H "Content-Type: text/plain" \
--data-binary "@./test.csv"
```


> API response:

```json 
{
   "ID": 57
}
```

The first step is to upload the csv data to the server.
You need to specify the wanted <code>contactslist</code> ID and, of course, the csv_content.

<div></div>
###Adding the contacts and subscriptions to the contact list

```php
<?php
// Create: A wrapper for the CSV importer
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "POST",
	"ContactsListID" => "$ID_CONTACTLIST",
	"DataID" => "$ID_DATA",
	"Method" => "addnoforce"
);
$result = $mj->csvimport($params);
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
# Create: A wrapper for the CSV importer
curl -s \
	-X POST \
	--user "$MJ_APIKEY_PUBLIC:$MJ_APIKEY_PRIVATE" \
	https://api.mailjet.com/v3/REST/csvimport \
	-H 'Content-Type: application/json' \
	-d '{
		"ContactsListID":"$ID_CONTACTLIST",
		"DataID":"$ID_DATA",
		"Method":"addnoforce"
	}'
```


> API response:

```json
{
	"Count": 1,
	"Data": [
		{
			"AliveAt": "",
			"ContactsListID": "",
			"Count": "1",
			"Current": "",
			"DataID": "",
			"Errcount": "0",
			"ErrTreshold": "",
			"ID": "",
			"ImportOptions": "",
			"JobEnd": "",
			"JobStart": "",
			"Method": "",
			"RequestAt": "",
			"Status": "Upload"
		}
	],
	"Total": 1
}
```


Now, the uploaded data needs to be assigned to the given <code>contactslist</code> resource.

Method's possible values are: 

  Actions | |
  ----------|------------
  addforce | **string** <br /> adds the contact and resets the unsub status to false
  addnoforce | **string** <br /> adds the contact and does not change the subscription status of the contact
  remove | **string** <br /> removes the contact from the List
  unsub | **string** <br /> unsubscribes a contact from the List

<div></div>
###Monitoring the process

```php
<?php
// View: CSV upload Batch job running on the Mailjet infrastructure.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "VIEW",
	"ID" => "$ID_JOB",
);
$result = $mj->csvimport($params);
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
# View: CSV upload Batch job running on the Mailjet infrastructure.
curl -s \
	-X GET \
	--user "$MJ_APIKEY_PUBLIC:$MJ_APIKEY_PRIVATE" \
	https://api.mailjet.com/v3/REST/csvimport/$ID_JOB 
```


> API response:

```json
{
	"Count": 1,
	"Data": [
		{
			"AliveAt": "",
			"ContactsList": "",
			"Count": "1",
			"Current": "",
			"DataID": "",
			"Errcount": "0",
			"ErrTreshold": "",
			"ID": "",
			"ImportOptions": "",
			"JobEnd": "",
			"JobStart": "",
			"Method": "",
			"RequestAt": "",
			"Status": "Completed"
		}
	],
	"Total": 1
}
```


You can now make sure the task completed successfully. You might need multiple checks as a huge amount of data may take some time to be processed (several hours are not uncommon).
Using the job <code>ID</code> returned in the previous step, you can retrieve the job status

	This provides the following information:
	<ul>
		<li>Status: This can be one of the following:
			<ul>
			    <li>Prepare: The data is being formatted to be added to the list</li>
			    <li>Importing: Data is being added to the Contact List</li>
			    <li>Completed: Addition to the Contact List complete</li>
			    <li>Error: Declares an error</li>
			</ul>
		</li>
		<li>JobStart: Time of job start</li>
		<li>JobEnd: Time of job end</li>
		<li>Count: Represents the number of contacts already processed by the background job</li>
		<li>Errcount: contains the number of errors detected during the processus, the Status can be "Completed" and have errors</li>
	</ul>

<div></div>
###Error handling

```bash
curl --user "$MJ_APIKEY_PUBLIC:$MJ_APIKEY_PRIVATE" \
https://api.mailjet.com/v3/DATA/BatchJob/$job_id/CSVError/text:csv
```

Using the job ID, you can retrieve the error file (if any, see <code>Errcount</code> number in the response of the monitoring of the job), through the DATA API. This error file will give you a textual reason for errors.

<div></div>
The returned file will be a copy of your original file with an added column describing the error for each line in error. 

> File uploaded with error : 

```
"email","age"
"foo@example.org",42
"bar@example.com"
"sam@ple.co.uk",37
```

> Error file content

```
email,age,error
"bar@example.com", ###Too few columns at line
```
