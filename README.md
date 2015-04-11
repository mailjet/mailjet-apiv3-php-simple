# [API v3] Mailjet PHP Wrapper

## Introduction

Provides a simple PHP library for the last version of the [MailJet API](http://dev.mailjet.com).
The goal of this component is to simplify the usage of the MailJet API for PHP developers.

### Prerequisites

Make sure to have the following details:
* Mailjet API Key
* Mailjet API Secret Key
* PHP
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

Now you can start working with the mailjetapi.php file by creating a new \Mailjet\Mailjet object with your api key and secret key (you can find these at https://app.mailjet.com/account/api_keys):
```php
$mj = new \Mailjet\Mailjet( $apiKey, $secretKey );
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
    $mj = new \Mailjet\Mailjet();
    $params = array(
        "method" => "POST",
        "from" => "ms.mailjet@example.com",
        "to" => "mr.mailjet@example.com",
        "subject" => "Hello World!",
        "text" => "Greetings from Mailjet."
    );

    $result = $mj->sendEmail($params);

    if ($mj->getResponseCode() == 200)
       echo "success - email sent";
    else
       echo "error - ".$mj->getResponseCode();

    return $result;
}
```

- A function to send an email with some attachments (absolute paths on your computer) :
```php
function sendEmailWithAttachments() {
    $mj = new \Mailjet\Mailjet();
    $params = array(
        "method" => "POST",
        "from" => "ms.mailjet@example.com",
        "to" => "mr.mailjet@example.com",
        "subject" => "Hello World!",
        "text" => "Greetings from Mailjet.",
        "attachment" => array("@/path/to/first/file.txt", "@/path/to/second/file.txt")
    );

    $result = $mj->sendEmail($params);

    if ($mj->getResponseCode() == 200)
       echo "success - email sent";
    else
       echo "error - ".$mj->getResponseCode();

    return $result;
}
```

- A function to send an email with some inline attachments (absolute paths on your computer) :
```php
function sendEmailWithInlineAttachments() {
    $mj = new \Mailjet\Mailjet();
    $params = array(
        "method" => "POST",
        "from" => "ms.mailjet@example.com",
        "to" => "mr.mailjet@example.com",
        "subject" => "Hello World!",
        "html" => "<html>Greetings from Mailjet <img src=\"cid:photo1.jpg\"><img src=\"cid:photo2.jpg\"></html>",
    "inlineattachment" => array("@/path/to/photo1.jpg", "@/path/to/photo2.jpg")
    );

    $result = $mj->sendEmail($params);

    if ($mj->getResponseCode() == 200)
       echo "success - email sent";
    else
       echo "error - ".$mj->getResponseCode();

    return $result;
}
```

### Account Settings

- A function to get your profile information :
```php
function viewProfileInfo() {
    $mj = new \Mailjet\Mailjet();
    $result = $mj->myprofile();

    if ($mj->getResponseCode() == 200)
       echo "success - got profile information";
    else
       echo "error - ".$mj->getResponseCode();
}
```

- A function to update the field ```AddressCity``` of your profile :
```php
function updateProfileInfo() {
    $mj = new \Mailjet\Mailjet();
    $params = array(
        "method" => "PUT",
        "AddressCity" => "New York"
    );

    $result = $mj->myprofile($params);

    if ($mj->getResponseCode() == 200)
       echo "success - field AddressCity changed";
    else
       echo "error - ".$mj->getResponseCode();

    return $result;
}
```

### Contact Lists

- A function to print the list of your contacts :
```php
function listContacts()
{
    $mj = new \Mailjet\Mailjet();
    $result = $mj->contact();

    if ($mj->getResponseCode() == 200)
       echo "success - listed contacts";
    else
       echo "error - ".$mj->getResponseCode();

    return $result;
}
```

- A function to update your contactData resource with ID ```$id```, using arrays :
```php
function updateContactData($id) {
    $mj = new \Mailjet\Mailjet();
    $data = array(array('Name' => 'lastname', 'Value' => 'Jet'), array('Name' => 'firstname', 'Value' => 'Mail'));
    $params = array(
        'ID' => $id,
        'Data' => $data,
        'method' => 'PUT'
    );

    $result = $mj->contactdata($params);

    if ($mj->getResponseCode() == 200)
       echo "success - data changed";
    else
       echo "error - ".$mj->getResponseCode();

    return $result;
}
```

- A function to create a list with name ```$Lname``` :
```php
function createList($Lname) {
    $mj = new \Mailjet\Mailjet();
    $params = array(
        "method" => "POST",
        "Name" => $Lname
    );

    $result = $mj->contactslist($params);

    if ($mj->getResponseCode() == 201)
       echo "success - created list ".$Lname;
    else
       echo "error - ".$mj->getResponseCode();

    return $result;
}
```

- A function to get a list with ID ```$listID``` :
```php
function getList($listID) {
    $mj = new \Mailjet\Mailjet();
    $params = array(
        "method" => "VIEW",
        "ID" => $listID
    );

    $result = $mj->contactslist($params);

    if ($mj->getResponseCode() == 200)
       echo "success - got list ".$listID;
    else
       echo "error - ".$mj->getResponseCode();

    return $result;
}
```
Note : You can use unique fields of resources instead of IDs, like
```"unique" => "test@gmail.com"``` in your ```params``` array for this example

- A function to create a contact with email ```$Cemail``` :
```php
function createContact($Cemail) {
    $mj = new \Mailjet\Mailjet();
    $params = array(
        "method" => "POST",
        "Email" => $Cemail
    );

    $result = $mj->contact($params);

    if ($mj->getResponseCode() == 201)
       echo "success - created contact ".$Cname;
    else
       echo "error - ".$mj->getResponseCode();

    return $result;
}
```

- A function to add the contact which ID is ```$contactID``` to the list which ID is ```$listID``` :
```php
function addContactToList($contactID, $listID) {
    $mj = new \Mailjet\Mailjet();
    $params = array(
        "method" => "POST",
        "ContactID" => $contactID,
        "ListID" => $listID,
        "IsActive" => "True"
    );

    $result = $mj->listrecipient($params);

    if ($mj->getResponseCode() == 201)
       echo "success - contact ".$contactID." added to the list ".$listID;
    else
       echo "error - ".$mj->getResponseCode();

    return $result;
}
```

- A function to delete the list which ID is ```$listID``` :
```php
function deleteList($listID) {
    $mj = new \Mailjet\Mailjet();
    $params = array(
        "method" => "DELETE",
        "ID" => $listID
    );

    $result = $mj->contactslist($params);

    if ($mj->getResponseCode() == 204)
       echo "success - deleted list";
    else
       echo "error - ".$mj->getResponseCode();

    return $result;
}
```

- A function to get unsubscribed contact(s) from a list with ID ```$listID``` :
```php
function getUnsubscribedContactsFromList($listID) {
	$mj = new \Mailjet\Mailjet();
	
	$params = array(
		"method" => "GET",
		"ContactsList" => $listID,
		"Unsub" => true
	);
	
	$result = $mj->listrecipient($params);
	
    if ($mj->getResponseCode() == 200)
       echo "success - got unsubscribed contact(s) ";
    else
       echo "error - ".$mj->getResponseCode();
   
	return $result;   
}
```

- A function to get a contact with ID ```$contactID``` :
```php
function getContact($contactID) {
    $mj = new \Mailjet\Mailjet();
    $params = array(
        "method" => "VIEW",
        "ID" => $contactID
    );

    $result = $mj->contact($params);

    if ($mj->getResponseCode() == 200)
       echo "success - got contact ".$contactID;
    else
       echo "error - ".$mj->getResponseCode();

    return $result;
}
```
Note : You can use unique fields of resources instead of IDs, like
```"unique" => "test@gmail.com"``` in your ```params``` array for this example

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
    $mj = new \Mailjet\Mailjet('', '');
    $params = array(
        "method" => "GET",
        "ID" => $newsletter_id
    );

    $result = $mj->newsletterDetailContent($params);

    if ($mj->getResponseCode() == 200)
        echo "success - got content for the newsletter ". $newsletter_id;
    else
        echo "error - ".$mj->getResponseCode();
    
    return $result;
}
```

Use the ```schedule``` action to send a newsletter later.
You just need to perform a ```POST``` request to schedule a new sending and to fill the ```date``` property with a Timestamp format in ISO 8601 : http://www.iso.org/iso/home/standards/iso8601.htm
You can also ```DELETE``` a schedule
Here is an example :

```php
function scheduleNewsletter($newsletter_id) {
    $mj = new \Mailjet\Mailjet('', '');
    $params = array(
        "method" => "POST",
        "ID" => $newsletter_id,
        "date" => "2014-11-25T10:12:59Z"
    );

    $result = $mj->newsletterSchedule($params);

    if ($mj->getResponseCode() == 201)
        echo "success - schedule done for the newsletter ". $newsletter_id;
    else
        echo "error - ".$mj->getResponseCode();
    
    return $result;
}
```

To send a newsletter immediately, you have two possibilities :
* ```POST``` a new schedule with a Timestamp which value is ```NOW```
* use send (only ```POST``` is supported)
For the second case, here is an example :

```php
function sendNewsletter($newsletter_id) {
    $mj = new \Mailjet\Mailjet('', '');
    $params = array(
        "method" => "POST",
        "ID" => $newsletter_id
    );

    $result = $mj->newsletterSend($params);

    if ($mj->getResponseCode() == 201)
        echo "success - newsletter ". $newsletter_id . " has been sent";
    else
        echo "error - ".$mj->getResponseCode();
    
    return $result;
}
```

You can also test a newsletter by sending it to some specified recipients before making the real sending.
To do so, you have to perform a ```POST``` request on a newsletter with action ```test``` like in the following example :

```php
function testNewsletter($newsletter_id) {
    $mj = new \Mailjet\Mailjet('', '');
    $recipients = array(array('Email' => 'mailjet@example.org', 'Name' => 'Mailjet'));
    $params = array(
        "method" => "POST",
        "ID" => $newsletter_id,
        "Recipients" => $recipients
    );

    $result = $mj->newsletterTest($params);

    if ($mj->getResponseCode() == 201)
        echo "success - newsletter ". $newsletter_id . " has been sent";
    else
        echo "error - ".$mj->getResponseCode();
    
    return $result;
}
```

## Reporting issues

Open an issue on github.
