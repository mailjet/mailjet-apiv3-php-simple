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

First, you need to edit our php-mailjet-v3-simple.class.php file to assign your API keys to the variables ```$apiKey``` and ```$secretKey``` on lines 23 and 24 between simple quotes.
You can find this keys in your Mailjet account here : https://app.mailjet.com/account/api_keys

Then, in your mailjetapi.php file, you need to include our php class :

```php
include("php-mailjet-v3-simple.class.php");
```
**Be Careful :** Make sure that both mailjetapi.php and php-mailjet-v3-simple.class.php files are in the same folder to make this include work

Now you can start working with the mailjetapi.php file by creating a new Mailjet object :
```php
$mj = new Mailjet();
```

This basically starts the engine. Now what you're going to do next depends on what you want to GET, POST, PUT or DELETE from the Mailjet servers through the API.
Take a tour on the [Reference documentation](http://dev.mailjet.com/email-api/v3/apikey/) to see all the resources available.

Next you will specify which resource to call this way (resource Contact in this example) with an array of parameters ```$params``` :
```php
$mj->contact($params);
```
**Info :** If you don't specify the method of the request in the array ```$params``` (see examples below), it will be a GET.

## Examples
Here are some function examples :

- A function to print the list of your contacts :
```php
function listContacts()
{
	$mj = new Mailjet();
	print_r($mj->contact());
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

    echo "success - created list ".$Lname;

    return $mj->contactslist($params);
}
```

- A function to create a contact with email ```$Cemail``` :
```php
function createContact($Cemail) {
  	$mj = new Mailjet();
    $params = array(
    	"method" => "POST",
    	"Email" => $Cemail
    );

    echo "success - created contact ".$Cemail;

    return $mj->contact($params);
}
```

- A function to add the contact which ID is ```$contactID``` to the list which ID is ```$listID``` :
```php
function addContactToList($listID, $contactID) {
	$mj = new Mailjet();
    $params = array(
    	"method" => "POST",
    	"ContactID" => $contactID,
    	"ListID" => $listID
    );

    echo "success - contact ".$contactID." added to the list ".$listID;

    return $mj->listrecipient($params);
}
```

- A function to print your profile information :
```php
function viewProfileInfo() {
  	$mj = new Mailjet();
	print_r($mj->myprofile());
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

    echo "success - field AddressCity changed";

    return $mj->myprofile($params);
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

    echo "success - deleted list ".$listID;

    return $mj->contactslist($params);
}
```

## Reporting issues

Open an issue on github.
