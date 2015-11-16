
[doc]: http://dev.mailjet.com/guides/?php#
[api_doc_repo]: https://github.com/mailjet/api-documentation
[new]: https://github.com/mailjet/mailjet-apiv3-php


|  READ THIS FIRST!!  |
| :---------: |
| _**This repository is now considered deprecated and won't undergo further development. Please refer to the [new one][new].**_ |


# [API v3] Mailjet PHP Wrapper v1.1.0

[![Build Status](https://travis-ci.org/mailjet/mailjet-apiv3-php-simple.svg?branch=master)](https://travis-ci.org/mailjet/mailjet-apiv3-php-simple)

**Table of Contents**

- [Introduction](#introduction)
  - [Prerequisites](#prerequisites)
- [Usage](#usage)
- [Examples](#examples)
  - [SendAPI](#sendapi)
    - [A function to send an email](#a-function-to-send-an-email)
    - [A function to send an email with some attachments](#a-function-to-send-an-email-with-some-attachments-absolute-paths-on-your-computer)
    - [A function to send an email with some inline attachments](#a-function-to-send-an-email-with-some-inline-attachments-absolute-paths-on-your-computer)
    - [A function to send an email with a custom ID](#a-function-to-send-an-email-with-a-custom-id-as-described-here)
    - [A function to send an email with a event payload](#a-function-to-send-an-email-with-a-event-payload-as-described-here)
  - [Account Settings](#account-settings)
    - [A function to get your profile information](#a-function-to-get-your-profile-information)
    - [A function to update the field AddressCity of your profile](#a-function-to-update-the-field-addresscity-of-your-profile)
  - [Contact & Contact Lists](#contact--contact-lists)
    - [Principle functionalities](#principle-functionalities)
      - [A function to print the list of your contacts](#a-function-to-print-the-list-of-your-contacts)
      - [A function to update your contactData resource with its ID, using arrays](#a-function-to-update-your-contactdata-resource-with-id-id-using-arrays)
      - [A function to create a list with name $Lname](#a-function-to-create-a-list-with-name-lname)
      - [A function to get a list through its ID](#a-function-to-get-a-list-with-id-listid)
      - [A function to create a contact with its email](#a-function-to-create-a-contact-with-email-cemail)
      - [A function to get the lists for a single contact with its ID](#a-function-to-get-the-lists-for-a-single-contact-which-id-is-contactid)
      - [A function to add a contact to a list through IDs](#a-function-to-add-the-contact-which-id-is-contactid-to-the-list-which-id-is-listid)
      - [A function to add a new detailed contact to a list with its ID](#a-function-to-add-the-contact-described-in-contact-to-the-list-which-id-is-listid)
      - [A function to add, remove or unsub a contact to/from detailed lists](#a-function-to-add-remove-or-unsub-the-contact-which-id-is-contactid-to--from-the-lists-contained-in-lists)
      - [A function to delete a list with its ID](#a-function-to-delete-the-list-which-id-is-listid)
      - [A function to get unsubscribed contact(s) from a list](#a-function-to-get-unsubscribed-contacts-from-a-list-with-id-listid)
      - [A function to get a contact with its ID](#a-function-to-get-a-contact-with-id-contactid)
    - [Asynchronous jobs](#asynchronous-jobs)
      - [On the contact resource](#performing-an-async-job-on-the-contact-resource)
      - [On the contactslist resource](#performing-an-async-job-on-the-contactslist-resource)
      - [Monitoring](#monitoring-an-async-job)
    - [Managing contacts in a contactslist from a CSV file](#managing-contacts-in-a-contactslist-from-a-csv-file)
      - [Step zero: CSV file structure.](#step-zero-csv-file-structure)
      - [First step: upload the data](#first-step-upload-the-data)
      - [Second step: Manage the contacts subscription to the contactslist](#second-step-manage-the-contacts-subscription-to-the-contactslist)
      - [Third step: Monitor the process](#third-step-monitor-the-process)
  - [Newsletters](#newsletters)
    - [Managing the content of a newsletter](#managing-the-content-of-a-newsletter)
    - [Scheduling a newsletter](#scheduling-a-newsletter)
    - [Sending a newsletter immediately](#sending-a-newsletter-immediately)
    - [Sending a newsletter to test recipients](#sending-a-newsletter-to-test-recipients)
    - [Duplicating an existing newsletter](#duplicating-an-existing-newsletter)
- [Filtering](#filtering)
    - [For GET requests](#for-get-requests)
    - [For POST requests](#for-post-requests)
- [Reporting issues](#reporting-issues)

## Introduction

Provides a simple PHP library for the last version of the [MailJet API](http://dev.mailjet.com/guides/?php#).
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

Go into the mailjet-apiv3-php-simple folder and create an empty file named (for example) `myProjectEmailer.php`
```
cd mailjet-apiv3-php-simple
touch myProjectEmailer.php
```

You are now ready to go !

## Usage

In your `myProjectEmailer.php` file, you need to include our php class:

```php
include("php-mailjet-v3-simple.class.php");
```
**Be Careful:** Make sure that both `myProjectEmailer.php` and php-mailjet-v3-simple.class.php files are in the same folder to make this include work

Now you can start working with the `myProjectEmailer.php` file by creating a new Mailjet object with your api key and secret key (you can find these at https://app.mailjet.com/account/api_keys):
```php
$mj = new Mailjet( $apiKey, $secretKey );
```

This basically starts the engine. Now what you're going to do next depends on what you want to GET, POST, PUT or DELETE from the Mailjet servers through the API.
Take a tour on the [Reference documentation](http://dev.mailjet.com/email-api/v3/apikey/) to see all the resources available.

Next you will specify which resource to call this way (resource Contact in this example) with an array of parameters `$params`:
```php
$mj->contact($params);
```
**Info:** If you don't specify the method of the request in the array `$params` (see examples below), it will be a GET.

## Examples

### SendAPI

##### A function to send an email:

```php
function sendEmail()
{
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
  * N.B.:
    * You can send emails as carbon copies (`"cc" => "email"`) and/or as blind carbon copies (`"bcc" => "email`).
    * You can send emails to multiple `"to"`, `"cc"` and/or `"bcc"` by using arrays in the above `$params` array:

      ```php
      "to" => array(
          "1foo@bar.foobar",
          "2foo@bar.foobar",
          ...
      ),
      "cc" => array(
          "3foo@bar.foobar",
          "4foo@bar.foobar",
          ...
      ),
      "bcc" => array(
          "5foo@bar.foobar",
          "6foo@bar.foobar",
          ...
      )
      ```

##### A function to send an email with some attachments (absolute paths on your computer):

```php
function sendEmailWithAttachments()
{
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

##### A function to send an email with some inline attachments (absolute paths on your computer):

```php
function sendEmailWithInlineAttachments()
{
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

##### A function to send an email with a custom ID, as described [here](http://dev.mailjet.com/guides/send-api-guide/#customid):

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

##### A function to send an email with a event payload, as described [here](http://dev.mailjet.com/guides/send-api-guide/#payload):

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

##### A function to get your profile information:

```php
function viewProfileInfo()
{
    $mj = new Mailjet();
    $result = $mj->myprofile();

    if ($mj->_response_code == 200)
       echo "success - got profile information";
    else
       echo "error - ".$mj->_response_code;
}
```

##### A function to update the field `AddressCity` of your profile:

```php
function updateProfileInfo()
{
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

### Contact & Contact Lists

[Reference page](http://dev.mailjet.com/email-api/v3/contact/).

#### Principle functionalities

##### A function to print the list of your contacts:

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

##### A function to update your contactData resource with ID `$id`, using arrays:

```php
function updateContactData($id)
{
    $mj = new Mailjet();
    $data = array(
        array(
            'Name' => 'lastname',
            'Value' => 'Jet'
        ),
        array(
            'Name' => 'firstname',
            'Value' => 'Mail'
        )
    );

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

##### A function to create a list with name `$Lname`:

```php
function createList($Lname)
{
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

##### A function to get a list with ID `$listID`:

```php
function getList($listID)
{
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
Note: You can use unique fields of resources instead of IDs, like
`"unique" => "foo@bar.com"` in your `params` array for this example

##### A function to create a contact with email `$Cemail`:

```php
function createContact($Cemail)
{
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

##### A function to get the lists for a single contact which ID is `$contactID`:

```php
/**
 *  @param int  $contactID  The ID of the contact
 */
function getContactsLists ($contactID)
{
    $mj = new Mailjet();
    $params = array(
        "ID"    =>  $contactID
    );
    $result = $mj->contactGetContactsLists($params);
    if ($mj->_response_code == 201)
       echo "success - fetched lists for contact ".$contactID;
    else
       echo "error - ".$mj->_response_code;
    return $result;
}
```

##### A function to add the contact which ID is `$contactID` to the list which ID is `$listID`:
_The preferred method to add a single contact to a list is described at the next bullet point._

```php
function addContactToList($contactID, $listID)
{
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

##### A function to add the contact described in `$contact` to the list which id is `$listID`:

```php
/**
 *  @param  array   $contact    An array describing a contact.
 *                              Example below the function.
 *  @param  int     $listID     The ID of the list.
 *
 */
 function addDetailedContactToList ($contact, $listID)
 {
     $mj = new Mailjet(getenv('MJ_APIKEY_PUBLIC'), getenv('MJ_APIKEY_PRIVATE'));
     $params = array(
         "method" => "POST",
         "ID" => $listID
     );
     $params = array_merge($params, $contact);
     $result = $mj->contactslistManageContact($params);
     if ($mj->_response_code == 201)
        echo "success - detailed contact ".$contactID." added to the list ".$listID;
     else
        echo "error - ".$mj->_response_code;
     return $result;
 }
 // $contact array example
 /*  $contact = array(
  *      "Email"         =>  "foo@bar.com",   // Mandatory field!
  *      "Name"          =>  "FooBar",
  *      "Action"        =>  "addnoforce",
  *      "Properties"    =>  array(
  *          "Prop1" =>  "value1",
  *          ...
  *      )
  *  );
  */
```
Note:  
`action` can be **addforce**, **addnoforce**, **remove** or **unsub**.

##### A function to add, remove or unsub the contact which ID is `$contactID` to / from the list(s) contain(ed) in `$lists`:

```php
/**
 *  @param int      $contactID  The ID of the contact
 *  @param array    $lists      An array of arrays,
 *                              each one describing a list.
 *                              Example below the function.
 */
function addContactToLists ($contactID, $lists) {
    $mj = Mailjet('', '');
    $params = array(
        "method"        =>  "POST",
        "ID"            =>  $contactID,
        "ContactsLists"  =>  $lists
    );
    $result = $mj->contactManageContactsLists($params);
    if ($mj->_response_code == 204)
       echo "success - contact ".$contactID." added to the list(s)";
    else
       echo "error - ".$mj->_response_code;
    return $result;
}
// $lists array example
/*  $lists = array(
 *      array(
 *          "ListID"    =>  1,
 *          "Action"    =>  "remove"
 *      ),
 *      array(
 *          "ListID"    =>  4,
 *          "Action"    =>  "addnoforce"
 *      )
 *      // ...
 *  );
 */
```
Note:  
`action` can be **addforce**, **addnoforce**, **remove** or **unsub**.

##### A function to delete the list which ID is `$listID`:

```php
function deleteList($listID)
{
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

##### A function to get unsubscribed contact(s) from a list with ID `$listID`:

```php
function getUnsubscribedContactsFromList($listID)
{
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

##### A function to get a contact with ID `$contactID`:

```php
function getContact($contactID)
{
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
Note: You can use unique fields of resources instead of IDs, like
`"unique" => "foo@bar.com"` in your `params` array for this example

#### Asynchronous jobs

An _asynchronous job_ (in short, **async job**) is a way to add or update massive amount of data (contacts, for example) in an all-in-one call which will return a job id used to check on the progress of the job _via_ another call.

##### Performing an async job on the `contact` resource
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
function asyncTransferContactsToLists ($contacts, $lists)
{

    $mj = new Mailjet('', '');

    $params = array(
        "method"        =>  "POST",
        "ContactsLists" =>  $lists,
        "Contacts"      =>  $contacts
    );

    $asyncJobResponse = $mj->contactManageManyContacts($params);

    if ($mj->_response_code == 200)
        echo "success - proper request";
    else
        echo "error while accessing the resource - ".$mj->_response_code;

    return $asyncJobResponse;
}

// $contacts array example
/*  $contacts = array(
 *      array(
 *          "Email" =>  "foo@bar.org",
 *          ...
 *      ),
 *      array(
 *          "Email" =>  "foo2@bar.com",
 *          ...
 *      )
 *  );
 */

// $lists array example
/*  $lists = array(
 *      array(
 *          "ListID"    =>  1,
 *          "Action"    =>  "remove"
 *      ),
 *      array(
 *          "ListID"    =>  4,
 *          "Action"    =>  "addnoforce"
 *      )
 *  );
 */
```
Note:  
`action` can be **addforce**, **addnoforce**, **remove** or **unsub**.

##### Performing an async job on the `contactslist` resource
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
function asyncManageContactsToList ($contacts, $listID)
{

    $mj = new Mailjet('', '');

    $params = array(
        "method"        =>  "POST",
        "Action"        =>  "unsub",
        "Contacts"      =>  $contacts
    );

    $asyncJobResponse = $mj->contactslistManageManyContacts($params);

    if ($mj->_response_code == 200)
        echo "success - proper request";
    else
        echo "error while accessing the resource - ".$mj->_response_code;

    return $asyncJobResponse;
}

// $contacts array example
/*  $contacts = array(
 *      array(
 *          "Email" =>  "foo@bar.org",
 *          ...
 *      ),
 *      array(
 *          "Email" =>  "foo2@bar.com",
 *          ...
 *      )
 *  );
 */
```
Note:  
`action` can be **addforce**, **addnoforce**, **remove** or **unsub**.

##### Monitoring an async job
A function to get the status of a previously launched asynchronous job:

_Note_: This works both with the `contact` and the `contactslist` resources. Adjust the commented code below accordingly.
```php
/**
 *  @param array $asyncJobResponse The result object returned by the async job. (See function above)
 *
 */
function getAsyncJobStatus ($asyncJobResponse)
{
    $mj = new Mailjet('', '');

    $jobID = $asyncJobResponse->Data[0]->JobID;

    $statusParams = array(
        "method"    =>  "VIEW",
        "ID"        =>  $jobID
    );

    $status = $mj->contactManageManyContacts($statusParams);
    // OR
    // $status = $mj->contactslistManageManyContacts($statusParams);

    if ($mj->_response_code == 200)
       echo "success - status obtained";
    else
       echo "error while retrieving the status - ".$mj->_response_code;

    return status;
}
```

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

##### Managing the content of a newsletter

You can use the `DetailContent` action to manage the content of a newsletter, in Text and Html.
It has two properties: `Text-part` and `Html-part`.
You can use `GET`, `POST`, `PUT` and `DELETE` both requests on this action:
* `GET`: you get the `Text-part` and `Html-part` properties of a newsletter
* `POST`: update the content of `Text-part` and `Html-part`. If you specify only one, the other will be emptied
* `PUT`: update the content of `Text-part` and `Html-part`. You can specify only one, it will not empty the other one
* `DELETE`: update the content of `Text-part` and `Html-part` and put both to empty.

Example with a `GET` on `DetailContent`:

```php
function getNewsletterDetailcontent($newsletter_id)
{
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

##### Scheduling a newsletter

Use the `schedule` action to send a newsletter later.
You just need to perform a `POST` request to schedule a new sending and to fill the `date` property with a Timestamp format in ISO 8601: http://www.iso.org/iso/home/standards/iso8601.htm
You can also `DELETE` a schedule
Here is an example:

```php
function scheduleNewsletter($newsletter_id)
{
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

##### Sending a newsletter immediately

To send a newsletter immediately, you have two possibilities:
* `POST` a new schedule with a Timestamp which value is `NOW`
* use send (only `POST` is supported)
For the second case, here is an example:

```php
function sendNewsletter($newsletter_id)
{
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

##### Sending a newsletter to test recipients

You can also test a newsletter by sending it to some specified recipients before making the real sending.
To do so, you have to perform a `POST` request on a newsletter with action `test` like in the following example:

```php
function testNewsletter($newsletter_id)
{
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

##### Duplicating an existing newsletter

To duplicate an existing Newsletter, use the `DuplicateFrom` filter, with the Newsletter ID to duplicate. `EditMode` is `html` if the Newsletter was built using the API or advanced mode. If you used our WYSIWYG tool, set it to `tool`:

```php
function duplicateNewsletter($newsletter_id)
{
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

#### For `GET` requests:

This is easy. Simply append the filter to your parameters array, like you would for an extra parameter.

Need to show more than the first 10 `contacts` in a `contactslist` the API response contains? Use the `limit` filter:

```php
$params = array (
    "ContactsList"  =>  $contactslistID,
    "Limit" =>  "100"
);

$res = $mj->contacts($params);
```

#### For `POST` requests:

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
