# [API v3] Mailjet PHP Wrapper 
**_v2.0.0-dev_**

## Introduction

This repository provides a simple PHP library (we also call it *wrapper*) for the latest version of the [MailJet API](http://dev.mailjet.com).  
The goal of this wrapper is to simplify the usage of the MailJet API for PHP developers.

### Prerequisites

Make sure to have the following details:
* A Mailjet account (If you don't have one, [see here](https://app.mailjet.com/signup))
* Mailjet API Key **&** Secret Key ([See here](https://app.mailjet.com/account/api_keys))
* PHP version >= 5.4 ([See here](http://php.net/))

## Installation

There are two ways of installing this wrapper.  
+ Through [composer](https://getcomposer.org/) (**Recommended**)
+ _Via_ a manual installation

#### Through composer

Add the following line in the `require` section of your `composer.json` file:
```
"mailjet/mailjet-apiv3-php-simple": "2.0.0"
```

#### Manual installation

First clone the repository

```bash
git clone https://github.com/mailjet/mailjet-apiv3-php-simple.git
```

Go into the `src/Mailjet/API/` folder inside the local repository and create an empty file named `myProjectEmailer.php` (for example):

```bash
cd src/Mailjet/API/
touch myProjectEmailer.php
```

At the top of the `myProjectEmailer.php` file (or whatever you named it) copy paste the following:

```php
include("Client.php");  // This includes this wrapper inside your own file.
```
**Be Careful:** Make sure that both `myProjectEmailer.php` and `Client.php` files are in the same folder to make this include work!

You are now ready to go !

## Usage

In order to simplify the use of this wrapper, we recommend that you put the following at the top (or just bellow any `include`) of your php file that uses this wrapper:

```php
use Mailjet\API\Client as Mailjet;
```

If, for some reason, you don't, you will need to write `\Mailjet\API\Client(...)` instead of `Mailjet(...)`. It's up to you, really :smile:

Now you can start working with the wrapper inside your project by creating a new `Mailjet` object with your API key and secret key:

```php
$mj = new Mailjet( $apiKey, $secretKey );
```

This basically starts the engine.  
What you do next depends on what you want to `GET`, `POST`, `PUT` or `DELETE` from the Mailjet servers through the API.  
Take a tour on the [Reference documentation](http://dev.mailjet.com/email-api/v3/apikey/) to see all the available resources.

Once you know which resource you need to call and which way you want to call it (again: `GET`, `POST`, `PUT` or `DELETE`), you will need (for most of the resources at least) to build the parameters array which specifies certain properties of the resource you want to access.  
In our example below, the goal is to access a specific `Contact` resource and `GET` it _via_ its **email**. This "sub-method" of `GET` is called `VIEW`.
```php
$params = [
    "method" => "VIEW",     // Lowercase 'method' is mandatory.
    "unique" =>  "foo@bar.com"
];

$mj->contact($params);
```
**Info:** If you don't specify the method of the request in the array `$params` (see examples below), `GET` will be used as default.

## Examples

### SendAPI

- A function to send an email:

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

    if ($mj->getResponseCode() == 200)
       echo "success - email sent";
    else
       echo "error - ".$mj->getResponseCode();

    return $result;
}
```

- A function to send an email with some attachments (absolute paths on your computer):

```php
function sendEmailWithAttachments() {

    $mj = new Mailjet();
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

- A function to send an email with some in-line attachments (absolute paths on your computer):

```php
function sendEmailWithInlineAttachments() {

    $mj = new Mailjet();
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

- A function to get your profile information:

```php
function viewProfileInfo() {

    $mj = new Mailjet();
    $result = $mj->myprofile();

    if ($mj->getResponseCode() == 200)
       echo "success - got profile information";
    else
       echo "error - ".$mj->getResponseCode();
}
```

- A function to update the field `AddressCity` of your profile:

```php
function updateProfileInfo() {

    $mj = new Mailjet();
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

### Contact & Contact Lists

[Reference page](http://dev.mailjet.com/email-api/v3/contact/).

- A function to print the list of your contacts:

```php
function listContacts() {

    $mj = new Mailjet();
    $result = $mj->contact();

    if ($mj->getResponseCode() == 200)
       echo "success - listed contacts";
    else
       echo "error - ".$mj->getResponseCode();

    return $result;
}
```

- A function to update your contactData resource _via_  ID `$id`, using arrays:

```php
function updateContactData($id) {

    $mj = new Mailjet();
    $data = array(
        array(
            'Name' => 'lastname',
            'Value' => 'Jet'
            ),
        array(
            'Name' => 'firstname',
            'Value' => 'Mail')
    );
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

- A function to create a list with name `$Lname`:

```php
function createList($Lname) {

    $mj = new Mailjet();
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

- A function to get a list with ID `$listID`:

```php
function getList($listID) {

    $mj = new Mailjet();
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
Note: You can use unique fields of resources instead of IDs, like
`"unique" => "test@gmail.com"` in your `params` array for this example

- A function to create a contact with email `$Cemail`:

```php
function createContact($Cemail) {

    $mj = new Mailjet();
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

- A function to get the lists for a single contact which ID is `$contactID`:

```php
/**
 *  @param int      $contactID  The ID of the contact
 */
function getContactsLists ($contactID) {

    $mj = new Mailjet();
    $params = [
        "ID"    =>  $contactID
    ];

    $result = $mj->contactGetContactsLists($params);

    if ($mj->getResponseCode() == 201)
       echo "success - fetched lists for contact ".$contactID;
    else
       echo "error - ".$mj->getResponseCode();

    return $result;
}
```

- A function to add the contact which ID is `$contactID` to the list which ID is `$listID`:  
_The preferred method to add a single contact to a list is described at the next bullet point._

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

    if ($mj->getResponseCode() == 201)
       echo "success - contact ".$contactID." added to the list ".$listID;
    else
       echo "error - ".$mj->getResponseCode();

    return $result;
}
```

- A function to add the contact described in `$contact` to the list which id is `$listID`:

```php
/**
 *  @param  array   $contact    An array describing a contact.
 *                              Example below the function.
 *  @param  int     $listID     The ID of the list.
 *
 */
function addDetailedContactToList ($contact, $listID) {

    $mj = new Mailjet();
    $params = [
        "method" => "POST"
    ];

    $params = array_merge($params, $contact);

    $result = $mj->contactslistManageContact($params);

    if ($mj->getResponseCode() == 201)
       echo "success - detailed contact ".$contactID." added to the list ".$listID;
    else
       echo "error - ".$mj->getResponseCode();

    return $result;
}

// $contact array example
/*  $contact = [
 *      "Email"         =>  "foo@bar.com",   // Mandatory field!
 *      "Name"          =>  "FooBar",
 *      "Action"        =>  "addnoforce",
 *      "Properties"    =>  [
 *          "Prop1" =>  "value1",
 *          ...
 *      ]
 *  ];
 */
```
Note:  
`action` can be **addforce**, **addnoforce**, **remove** or **unsub**.

- A function to add, remove or unsub the contact which ID is `$contactID` to / from the list(s) contain(ed) in `$lists`:

```php
/**
 *  @param int      $contactID  The ID of the contact
 *  @param array    $lists      An array of arrays,
 *                              each one describing a list.
 *                              Example below the function.
 */
function addContactToLists ($contactID, $lists) {

    $mj = Mailjet('', '');

    $params = [
        "method"        =>  "POST",
        "ID"            =>  $contactID,
        "ContactLists"  =>  $lists
    ];

    $result = $mj->contactManageContactsLists($params);

    if ($mj->getResponseCode() == 204)
       echo "success - contact ".$contactID." added to the list(s)";
    else
       echo "error - ".$mj->getResponseCode();

    return $result;
}

// $lists array example
/*  $lists = [
 *      [
 *          "ListID"    =>  1,
 *          "Action"    =>  "remove"
 *      ],
 *      [
 *          "ListID"    =>  4,
 *          "Action"    =>  "addnoforce"
 *      ]
 *      // ...
 *  ];
 */
```
Note:  
`action` can be **addforce**, **addnoforce**, **remove** or **unsub**.

- A function to delete the list which ID is `$listID`:

```php
function deleteList($listID) {

    $mj = new Mailjet();
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

- A function to get unsubscribed contact(s) from a list with ID `$listID`:

```php
function getUnsubscribedContactsFromList($listID) {

    $mj = new Mailjet();
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

- A function to get a contact with ID `$contactID`:

```php
function getContact($contactID) {

    $mj = new Mailjet();
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
Note: You can use unique fields of resources instead of IDs, like
`"unique" => "foo@bar.com"` in your `params` array for this example

#### Asynchronous jobs

An _asynchronous job_ (in short, **async job**) is a way to add or update massive amount of data (contacts, for example) in an all-in-one call which will return a job id used to check on the progress of the job _via_ another call.

- **Contact resource** _Async job execution_  
A function to asynchronously add, remove or unsub contact(s) to/from one or more list(s) and returns the status array for the job:  
(Useful for uploading **lots** of contacts to one or more list(s) at once.)  

  This example shows how to remove the given contacts from one list and add them to another (if they are not in it). In **_one_** call.

```php
/**
 *  @param  array   $contacts   Should be an array of arrays,
 *                              each one describing a contact.
 *                              Example below the function.
 *
 *  @param  array   $lists      Should be an array of arrays,
 *                              each one describing a list.
 *                              Example below the function.
 */
function asyncTransferContactsToLists ($contacts, $lists) {

    $mj = new Mailjet('', '');

    $params = [
        "method"        =>  "POST",
        "ContactsLists" =>  $lists,
        "Contacts"      =>  $contacts
    ];

    $asyncJobResponse = $mj->contactManageManyContacts($params);

    if ($mj->getResponseCode() == 200)
        echo "success - proper request";
    else
        echo "error while accessing the resource - ".$mj->getResponseCode();

    return $asyncJobResponse;
}

// $contacts array example
/*  $contacts = [
 *      [
 *          "Email" =>  "foo@bar.org",
 *          ...
 *      ],
 *      [
 *          "Email" =>  "foo2@bar.com",
 *          ...
 *      ]
 *  ];
 */

// $lists array example
/*  $lists = [
 *      [
 *          "ListID"    =>  1,
 *          "Action"    =>  "remove"
 *      ],
 *      [
 *          "ListID"    =>  4,
 *          "Action"    =>  "addnoforce"
 *      ]
 *  ];
 */
```
Note:  
`action` can be **addforce**, **addnoforce**, **remove** or **unsub**.

- **Contactslist resource** _Async job execution_  
A function to asynchronously add, remove or unsub contact(s) to/from a list and return the status array for the job:

  This example shows how to unsub contacts from a contacts list.

```php
/**
 *  @param  array   $contacts   Should be an array of arrays,
 *                              each one describing a contact.
 *                              Example below the function.
 *
 *  @param  int     $listID     The list ID.
 *
 */
function asyncManageContactsToList ($contacts, $listID) {

    $mj = new Mailjet('', '');

    $params = [
        "method"        =>  "POST",
        "Action"        =>  "unsub",
        "Contacts"      =>  $contacts
    ];

    $asyncJobResponse = $mj->contactslistManageManyContacts($params);

    if ($mj->getResponseCode() == 200)
        echo "success - proper request";
    else
        echo "error while accessing the resource - ".$mj->getResponseCode();

    return $asyncJobResponse;
}

// $contacts array example
/*  $contacts = [
 *      [
 *          "Email" =>  "foo@bar.org",
 *          ...
 *      ],
 *      [
 *          "Email" =>  "foo2@bar.com",
 *          ...
 *      ]
 *  ];
 */
```
Note:  
`action` can be **addforce**, **addnoforce**, **remove** or **unsub**.

- **Contact resource**  _Async job monitoring_  
A function to get the status of a previously launched asynchronous job:

```php
/**
 *  @param array $asyncJobResponse The result object returned by the async job. (See function above)
 *
 */
function getAsyncJobStatus ($asyncJobResponse) {

    $mj = new Mailjet('', '');

    $jobID = $asyncJobResponse->Data[0]->JobID;

    $statusParams = [
        "method"    =>  "VIEW",
        "ID"        =>  $jobID
    ];

    $status = $mj->contactManageManyContacts($statusParams);

    if ($mj->getResponseCode() == 200)
       echo "success - status obtained";
    else
       echo "error while retrieving the status - ".$mj->getResponseCode();

    return status;
}
```

### Newsletters

You can use the `DetailContent` action to manage the content of a newsletter, in Text and Html.
It has two properties: `Text-part` and `Html-part`.
You can use `GET`, `POST`, `PUT` and `DELETE` both  requests on this action:
* `GET`: you get the `Text-part` and `Html-part` properties of a newsletter
* `POST`: update the content of `Text-part` and `Html-part`. If you specify only one, the other will be emptied
* `PUT`: update the content of `Text-part` and `Html-part`. You can specify only one, it will not empty the other one
* `DELETE`: update the content of `Text-part` and `Html-part` and put both to empty.

Example with a `GET` on `DetailContent`:

```php
function getNewsletterDetailcontent($newsletter_id) {

    $mj = new Mailjet('', '');
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

Use the `schedule` action to send a newsletter later.
You just need to perform a `POST` request to schedule a new sending and to fill the `date` property with a Timestamp format in ISO 8601: http://www.iso.org/iso/home/standards/iso8601.htm
You can also `DELETE` a schedule
Here is an example:

```php
function scheduleNewsletter($newsletter_id) {

    $mj = new Mailjet('', '');
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

To send a newsletter immediately, you have two possibilities:
* `POST` a new schedule with a Timestamp which value is `NOW`
* use send (only `POST` is supported)
For the second case, here is an example:

```php
function sendNewsletter($newsletter_id) {

    $mj = new Mailjet('', '');
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
To do so, you have to perform a `POST` request on a newsletter with action `test` like in the following example:

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

    if ($mj->getResponseCode() == 201)
        echo "success - newsletter ". $newsletter_id . " has been sent";
    else
        echo "error - ".$mj->getResponseCode();
    
    return $result;
}
```

## Reporting issues

[Open an issue on github](https://github.com/mailjet/mailjet-apiv3-php-simple/issues).
