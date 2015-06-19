# [API v3] Mailjet PHP Wrapper v1.0.7

## Introduction

Provides a simple PHP library for the last version of the [MailJet API](http://dev.mailjet.com).
The goal of this component is to simplify the usage of the MailJet API for PHP developers.

### Prerequisites

Make sure to have the following details:
* Mailjet API Key
* Mailjet API Secret Key
* PHP (v. >= 5.3, preferably v. >= 5.4)
* This PHP class

## Installation

First clone the repository
```
git clone https://github.com/mailjet/mailjet-apiv3-php-simple.git
```

Go into the mailjet-apiv3-php-simple folder and create an empty file named ```mailjetapi.php```
```
cd mailjet-apiv3-php-simple
touch mailjetapi.php
```

You are now ready to go !

## Usage

In your mailjetapi.php file, you need to include our php class :

```php
include("php-mailjet-v3-simple.class.php");
```
**Be Careful :** Make sure that both mailjetapi.php and php-mailjet-v3-simple.class.php files are in the same folder to make this include work

Now you can start working with the mailjetapi.php file by creating a new Mailjet object with your api key and secret key (you can find these at https://app.mailjet.com/account/api_keys):
```php
$mj = new Mailjet( $apiKey, $secretKey );
```

This basically starts the engine. Now what you're going to do next depends on what you want to GET, POST, PUT or DELETE from the Mailjet servers through the API.
Take a tour on the [Reference documentation](http://dev.mailjet.com/email-api/v3/apikey/) to see all the resources available.

Next you will specify which resource to call this way (resource Contact in this example) with an array of parameters ```$params``` :
```php
$mj->contact($params);
```
**Info :** If you don't specify the method of the request in the array ```$params``` (see examples below), it will be a GET.

## Examples

### SendAPI

- A function to send an email :

```php

    function sendEmail() {
        $mj = new Mailjet();
        $params = array(
            "method" => "POST",
            "from" => "ms.mailjet@example.com",
            "to" => "mr.mailjet@example.com",
            "subject" => "Hello World!",
            "text" => "Greetings from Mailjet."
        );

        $result = $mj->sendEmail($params);

        if ($mj->_response_code == 200)
           echo "success - email sent";
        else
           echo "error - ".$mj->_response_code;

        return $result;
    }
```

- A function to send an email with some attachments (absolute paths on your computer) :

```php

    function sendEmailWithAttachments() {
        $mj = new Mailjet();
        $params = array(
            "method" => "POST",
            "from" => "ms.mailjet@example.com",
            "to" => "mr.mailjet@example.com",
            "subject" => "Hello World!",
            "text" => "Greetings from Mailjet.",
            "attachment" => array(
                "MyFirstAttachment" => "@/path/to/first/file.txt",
                "@/path/to/second/file.pdf",
                "MyThirdAttachment" => "@/path/to/third/file.jpg"
                )
        );

        $result = $mj->sendEmail($params);

        if ($mj->_response_code == 200)
           echo "success - email sent";
        else
           echo "error - ".$mj->_response_code;

        return $result;
    }
```
  * N.B.: Regarding attachments and as shown in the code above, it is possible to declare them in two different (but combinable; PHP is cool like that) ways:
    * Using a `"key" => "value"` combination: The `key` is the filename and the `value` the path to that filename. This allows for a customizable filename, independent from the actual file.
    * Using a usual array field containing the path to the file you want to attach. The name displayed for that attachment will be the actual name of the file.

- A function to send an email with some inline attachments (absolute paths on your computer) :

```php

    function sendEmailWithInlineAttachments() {
        $mj = new Mailjet();
        $params = array(
            "method" => "POST",
            "from" => "ms.mailjet@example.com",
            "to" => "mr.mailjet@example.com",
            "subject" => "Hello World!",
            "html" => "<html>Greetings from Mailjet <img src=\"cid:MaPhoto\"><img src=\"cid:photo2.png\"></html>",
            "inlineattachment" => array(
                "MaPhoto" => "@/path/to/photo1.jpg",
                "@/path/to/photo2.png"
                )
        );

        $result = $mj->sendEmail($params);

        if ($mj->_response_code == 200)
           echo "success - email sent";
        else
           echo "error - ".$mj->_response_code;

        return $result;
    }
```

- A function to send an email with a custom ID:  
As described [here](http://dev.mailjet.com/guides/send-api-guide/#customid).

```php
function sendEmailWithCustomID()
{
    $mj = new Mailjet();

    $params = array(
        "method" => "POST",
        "from" => "ms.mailjet@example.com",
        "to" => "mr.mailjet@example.com",
        "subject" => "Hello World!",
        "text" => "Greetings from Mailjet.",
        "mj-customid" => "helloworld"
    );

    $result = $mj->sendEmail($params);

    if ($mj->_response_code == 200)
       echo "success - email sent";
    else
       echo "error - ".$mj->_response_code;

    return $result;
}
```

- A function to send an email with a event payload:  
As described [here](http://dev.mailjet.com/guides/send-api-guide/#payload).

```php
function sendEmailWithEventPayload()
{
    $mj = new Mailjet();

    $params = array(
        "method" => "POST",
        "from" => "ms.mailjet@example.com",
        "to" => "mr.mailjet@example.com",
        "subject" => "Hello World!",
        "text" => "Greetings from Mailjet.",
        "mj-eventpayload" => '{"message": "helloworld"}'
    );

    $result = $mj->sendEmail($params);

    if ($mj->_response_code == 200)
       echo "success - email sent";
    else
       echo "error - ".$mj->_response_code;

    return $result;
}
```

### Account Settings

- A function to get your profile information :
```php
function viewProfileInfo() {
    $mj = new Mailjet();
    $result = $mj->myprofile();

    if ($mj->_response_code == 200)
       echo "success - got profile information";
    else
       echo "error - ".$mj->_response_code;
}
```

- A function to update the field ```AddressCity``` of your profile :
```php
function updateProfileInfo() {
    $mj = new Mailjet();
    $params = array(
        "method" => "PUT",
        "AddressCity" => "New York"
    );

    $result = $mj->myprofile($params);

    if ($mj->_response_code == 200)
       echo "success - field AddressCity changed";
    else
       echo "error - ".$mj->_response_code;

    return $result;
}
```

### Contact Lists

- A function to print the list of your contacts :
```php
function listContacts()
{
    $mj = new Mailjet();
    $result = $mj->contact();

    if ($mj->_response_code == 200)
       echo "success - listed contacts";
    else
       echo "error - ".$mj->_response_code;

    return $result;
}
```

- A function to update your contactData resource with ID ```$id```, using arrays :
```php
function updateContactData($id) {
    $mj = new Mailjet();
    $data = array(array('Name' => 'lastname', 'Value' => 'Jet'), array('Name' => 'firstname', 'Value' => 'Mail'));
    $params = array(
        'ID' => $id,
        'Data' => $data,
        'method' => 'PUT'
    );

    $result = $mj->contactdata($params);

    if ($mj->_response_code == 200)
       echo "success - data changed";
    else
       echo "error - ".$mj->_response_code;

    return $result;
}
```

- A function to create a list with name ```$Lname``` :
```php
function createList($Lname) {
    $mj = new Mailjet();
    $params = array(
        "method" => "POST",
        "Name" => $Lname
    );

    $result = $mj->contactslist($params);

    if ($mj->_response_code == 201)
       echo "success - created list ".$Lname;
    else
       echo "error - ".$mj->_response_code;

    return $result;
}
```

- A function to get a list with ID ```$listID``` :
```php
function getList($listID) {
    $mj = new Mailjet();
    $params = array(
        "method" => "VIEW",
        "ID" => $listID
    );

    $result = $mj->contactslist($params);

    if ($mj->_response_code == 200)
       echo "success - got list ".$listID;
    else
       echo "error - ".$mj->_response_code;

    return $result;
}
```
Note : You can use unique fields of resources instead of IDs, like
```"unique" => "test@gmail.com"``` in your ```params``` array for this example

- A function to create a contact with email ```$Cemail``` :
```php
function createContact($Cemail) {
    $mj = new Mailjet();
    $params = array(
        "method" => "POST",
        "Email" => $Cemail
    );

    $result = $mj->contact($params);

    if ($mj->_response_code == 201)
       echo "success - created contact ".$Cemail;
    else
       echo "error - ".$mj->_response_code;

    return $result;
}
```

- A function to add the contact which ID is ```$contactID``` to the list which ID is ```$listID``` :
```php
function addContactToList($contactID, $listID) {
    $mj = new Mailjet();
    $params = array(
        "method" => "POST",
        "ContactID" => $contactID,
        "ListID" => $listID,
        "IsActive" => "True"
    );

    $result = $mj->listrecipient($params);

    if ($mj->_response_code == 201)
       echo "success - contact ".$contactID." added to the list ".$listID;
    else
       echo "error - ".$mj->_response_code;

    return $result;
}
```

- A function to delete the list which ID is ```$listID``` :
```php
function deleteList($listID) {
    $mj = new Mailjet();
    $params = array(
        "method" => "DELETE",
        "ID" => $listID
    );

    $result = $mj->contactslist($params);

    if ($mj->_response_code == 204)
       echo "success - deleted list";
    else
       echo "error - ".$mj->_response_code;

    return $result;
}
```

- A function to get unsubscribed contact(s) from a list with ID ```$listID``` :
```php
function getUnsubscribedContactsFromList($listID) {
	$mj = new Mailjet();
	
	$params = array(
		"method" => "GET",
		"ContactsList" => $listID,
		"Unsub" => true
	);
	
	$result = $mj->listrecipient($params);
	
    if ($mj->_response_code == 200)
       echo "success - got unsubscribed contact(s) ";
    else
       echo "error - ".$mj->_response_code;
   
	return $result;   
}
```

- A function to get a contact with ID ```$contactID``` :
```php
function getContact($contactID) {
    $mj = new Mailjet();
    $params = array(
        "method" => "VIEW",
        "ID" => $contactID
    );

    $result = $mj->contact($params);

    if ($mj->_response_code == 200)
       echo "success - got contact ".$contactID;
    else
       echo "error - ".$mj->_response_code;

    return $result;
}
```
Note : You can use unique fields of resources instead of IDs, like
```"unique" => "test@gmail.com"``` in your ```params``` array for this example

#### Managing contacts in a contactslist from a CSV file

"Managing" here means **adding**, **removing** or **unsubscribing**.

In some cases you might need to manage large quantities of `contacts` stored into a CSV record in relation to a `contactslist`. Here is how to proceed using the PHP Wrapper.  

Please note that these steps represent a single process. Don't execute each step independently but, rather, as a whole.  
You can find a sample script [here](https://github.com/mailjet/mailjet-apiv3-php-simple/blob/master/samples/csv_sample.php).

##### Step zero: CSV file structure.
The structure for the CSV file should be as follows:

```csv

    "email","age"
    "foo@example.org",42
    "bar@example.com",13
    "sam@ple.co.uk",37
```
Please note that undefined contact properties present in the CSV file will be automatically created during the second step.

##### First step: upload the data
The first step is to upload the csv data to the server.  
You need to specify the wanted `contactslist` ID and, of course, the *csv_content*.

```php

    $CSVContent = file_get_contents('test.csv');

    $uploadParams = array(
        "method" => "POST",
        "ID" => $listID,
        "csv_content" => $CSVContent
    );

    $csvUpload = $mj->uploadCSVContactslistData($uploadParams);

    if ($mj->_response_code == 200)
       echo "success - uploaded CSV file ";
    else
       echo "error - ".$mj->_response_code;
```

##### Second step: Manage the contacts subscription to the contactslist

Now, you need to tell the API that this uploaded data has to be assign to the given `contactslist` resource.

Please note that *method* and *Method* are not the same field.  
*Method* describes how the contacts import will behave. Possible values are **addforce**, **addnoforce**, **remove** and **unsub**.

* **addforce** will add the contacts and re-subscribe them to the list if need be.
* **addnoforce** will add the contacts but won't change their subscription status.
* **remove** will remove the contacts from the list.
* **unsub** will unsubscribe the contacts from the list.

```php

    $assignParams = array(
        "method" => "POST",
        "ContactsListID" => $listID,
        "DataID" => $csvUpload->ID,
        "Method" => "addnoforce"
    );

    $csvAssign = $mj->csvimport($assignParams);

    if ($mj->_response_code == 201)
       echo "success - CSV data ".$csvUpload->ID." assigned to contactslist ".$listID;
    else
       echo "error - ".$mj->_response_code;
```

##### Third step: Monitor the process

What is left to do is to make sure the task completed successfully, which might require multiple checks as a huge amount of data may take some time to be processed (several hours are not uncommon).

```php

    $monitorParmas = array (
        "method" => "VIEW",
        "ID" => $csvAssign->Data[0]->ID
    );

    $res = $mj->batchjob($monitorParmas);

    if ($mj->_response_code == 200)
       echo "job ".$res->Data[0]->Status."\n";
    else
        echo "error - ".$mj->_response_code."\n";
```

### Newsletters

You can use the ```DetailContent``` action to manage the content of a newsletter, in Text and Html.
It has two properties : ```Text-part``` and ```Html-part```.
You can use ```GET```, ```POST```, ```PUT``` and ```DELETE``` both  requests on this action :
* ```GET``` : you get the ```Text-part``` and ```Html-part``` properties of a newsletter
* ```POST``` : update the content of ```Text-part``` and ```Html-part```. If you specify only one, the other will be emptied
* ```PUT``` : update the content of ```Text-part``` and ```Html-part```. You can specify only one, it will not empty the other one
* ```DELETE``` : update the content of ```Text-part``` and ```Html-part``` and put both to empty.

Example with a ```GET``` on ```DetailContent``` :

```php
function getNewsletterDetailcontent($newsletter_id) {
    $mj = new Mailjet('', '');
    $params = array(
        "method" => "GET",
        "ID" => $newsletter_id
    );

    $result = $mj->newsletterDetailContent($params);

    if ($mj->_response_code == 200)
        echo "success - got content for the newsletter ". $newsletter_id;
    else
        echo "error - ".$mj->_response_code;
    
    return $result;
}
```

Use the ```schedule``` action to send a newsletter later.
You just need to perform a ```POST``` request to schedule a new sending and to fill the ```date``` property with a Timestamp format in ISO 8601 : http://www.iso.org/iso/home/standards/iso8601.htm
You can also ```DELETE``` a schedule
Here is an example :

```php
function scheduleNewsletter($newsletter_id) {
    $mj = new Mailjet('', '');
    $params = array(
        "method" => "POST",
        "ID" => $newsletter_id,
        "date" => "2014-11-25T10:12:59Z"
    );

    $result = $mj->newsletterSchedule($params);

    if ($mj->_response_code == 201)
        echo "success - schedule done for the newsletter ". $newsletter_id;
    else
        echo "error - ".$mj->_response_code;
    
    return $result;
}
```

To send a newsletter immediately, you have two possibilities :
* ```POST``` a new schedule with a Timestamp which value is ```NOW```
* use send (only ```POST``` is supported)
For the second case, here is an example :

```php
function sendNewsletter($newsletter_id) {
    $mj = new Mailjet('', '');
    $params = array(
        "method" => "POST",
        "ID" => $newsletter_id
    );

    $result = $mj->newsletterSend($params);

    if ($mj->_response_code == 201)
        echo "success - newsletter ". $newsletter_id . " has been sent";
    else
        echo "error - ".$mj->_response_code;
    
    return $result;
}
```

You can also test a newsletter by sending it to some specified recipients before making the real sending.
To do so, you have to perform a ```POST``` request on a newsletter with action ```test``` like in the following example :

```php
function testNewsletter($newsletter_id) {
    $mj = new Mailjet('', '');
    $recipients = array(array('Email' => 'mailjet@example.org', 'Name' => 'Mailjet'));
    $params = array(
        "method" => "POST",
        "ID" => $newsletter_id,
        "Recipients" => $recipients
    );

    $result = $mj->newsletterTest($params);

    if ($mj->_response_code == 201)
        echo "success - newsletter ". $newsletter_id . " has been sent";
    else
        echo "error - ".$mj->_response_code;
    
    return $result;
}
```

To duplicate an existing Newsletter, use the `DuplicateFrom` filter, with the Newsletter ID to duplicate. `EditMode` is `html` if the Newsletter was built using the API or advanced mode. If you used our WYSIWYG tool, set it to `tool`:

```php

    function duplicateNewsletter($newsletter_id) {
        $mj = new Mailjet('', '');
        $params = array(
            "method" => "POST",
            "EditMode" => "html",
            "Status" => 0,
            "_DuplicateFrom" => $newsletter_id
        );

        $result = $mj->newsletter($params);

        if ($mj->_response_code == 201)
            echo "success - duplicated Newsletter ". $newsletter_id;
        else
            echo "error - ".$mj->_response_code;

        return $result;
    }
```

## Filtering

The API allows for filtering of resources on `GET` and `POST` requests.  
However, there is a difference in how you need to specify the filters you want to use in your payload hod, depending on the method you want to use:

* For `GET` requests:  
This is easy. Simply append the filter to your parameters array, like you would for an extra parameter.

Need to show more than the first 10 `contacts` in a `contactslist` the API response contains? Use the `limit` filter:

```php

    $params = array (
        "COntactsList"  =>  $contactslistID,
        "Limit" =>  "100"
    );

    $res = $mj->contacts($params);
```

* For `POST` requests:  
For filters using that method, the wrapper needs to be able to differentiate between a parameter and a filter.  
How? Simply append a "_" (underscore character) at the beginning of the filter's name.

Want to duplicate a newsletter? Do:  

```php

    $params = array(
            "method" => "POST",
            "EditMode" => "html",
            "Status" => 0,
            "_DuplicateFrom" => $newsletter_id
        );

    $result = $mj->newsletter($params);
```

## Reporting issues

Open an issue [here](https://github.com/mailjet/mailjet-apiv3-php-simple/issues).