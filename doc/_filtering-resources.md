#Filtering resources

```bash
https://api.mailjet.com/v3/REST/endpoint?filter1=this&filter2=that&filter3=it
```

The Mailjet API provides a set of general filters that can be applied to a <code>GET</code> request for each resource.  In addition to these general filters, each API resource has its own filters that can be used when performing the <code>GET</code>.  You can find these filters in their respective [resource description](http://dev.mailjet.com/email-api/v3/).

To use a filter in a <code>GET</code>, you can amend the resource URL with a standard query string (<code>?filter1=this&filter2=that&filter3=it</code>).

Mailjet API supports filter combination following these rules: 

 - Only the first occurrence of a filter is taken in account: "?Name=foo&Name=bar&Name=foobar" will only filter on  Name=foo. No error will be returned, all additional occurrences will be skipped. 
 - Combining filter using the query string syntax, "&" results in an AND operator behavior.
 - Some filters support OR and use a "," syntax. Example: MessageStatus on <code>[/messagesentstatistics](http://dev.mailjet.com/email-api/v3/messagesentstatistics/)</code> resource accepts MessageStatus=3,4 format. 


##The Limit Filter

```php
<?php
// View : List of 150 contacts
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "GET",
	"Limit" => "150"
);
$result = $mj->contact($params);
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
# View : List of 150 contacts
curl -s \
	-X GET \
	--user "$MJ_APIKEY_PUBLIC:$MJ_APIKEY_PRIVATE" \
	https://api.mailjet.com/v3/REST/contact?Limit=150 
```


You can limit the number of results by applying the <code>Limit</code> filter. The default value is 10 and the maximum value is 1000. 'Limit=0' delivers the maximum amount of results - 1000.


##The Offset Filter

```php
<?php
// View : List of contact with Offset, delivers 10 contacts, starting with the 25000th contact
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "GET",
	"Offset" => "25000"
);
$result = $mj->contact($params);
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
# View : List of contact with Offset, delivers 10 contacts, starting with the 25000th contact
curl -s \
	-X GET \
	--user "$MJ_APIKEY_PUBLIC:$MJ_APIKEY_PRIVATE" \
	https://api.mailjet.com/v3/REST/contact?Offset=25000 
```

You can use the <code>Offset</code> filter to retrieve a list starting from a certain offset.
<div></div>

```php
<?php
// View : List of contacts with Limit and Offset, retrieves a list of 150 contacts starting with the 25000th contact
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "GET",
	"Limit" => "150",
	"Offset" => "25000"
);
$result = $mj->contact($params);
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
# View : List of contacts with Limit and Offset, retrieves a list of 150 contacts starting with the 25000th contact
curl -s \
	-X GET \
	--user "$MJ_APIKEY_PUBLIC:$MJ_APIKEY_PRIVATE" \
	https://api.mailjet.com/v3/REST/contact?Limit=150\&Offset=25000 
```

The <code>Offset</code> filter can be combined with the <code>Limit</code> filter. 


##The Sort Filter

```php
<?php
// View : List of contact ordered by email in an ascending order
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "GET",
	"Sort" => "email"
);
$result = $mj->contact($params);
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
# View : List of contact ordered by email in an ascending order
curl -s \
	-X GET \
	--user "$MJ_APIKEY_PUBLIC:$MJ_APIKEY_PRIVATE" \
	https://api.mailjet.com/v3/REST/contact?Sort=email 
```


You can sort a GET query by specifying a property name as the value of the 'Sort' filter. The default sorting is ascending.  When a property name is postfixed with <code>+DESC</code> , the sort order is descending.  

Please note that the <code>Sort</code> filter does not work with all properties and that the <code>+DESC</code> is not available for all properties.

<div></div>
```php
<?php
// View : List of contact ordered by email in reverse order
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "GET",
	"Sort" => "email+DESC"
);
$result = $mj->contact($params);
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
# View : List of contact ordered by email in reverse order
curl -s \
	-X GET \
	--user "$MJ_APIKEY_PUBLIC:$MJ_APIKEY_PRIVATE" \
	https://api.mailjet.com/v3/REST/contact?Sort=email+DESC 
```


To retrieve the same query only in descending order, amend the URL with <code>+DESC</code>:

##Resource Filters

```php
<?php
// View : Contacts in ContactsList
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "GET",
	"ContactsList" => "$ContactsListID"
);
$result = $mj->contact($params);
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
# View : Contacts in ContactsList
curl -s \
	-X GET \
	--user "$MJ_APIKEY_PUBLIC:$MJ_APIKEY_PRIVATE" \
	https://api.mailjet.com/v3/REST/contact?ContactsList=$ContactsListID 
```


On each resource, the API provide specific filters. Visit the [reference](http://dev.mailjet.com/email-api/v3/) to see what is available.

## Unique Key Filters

```php
<?php
// View : Contact from email address
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "VIEW",
	"ID" => "$EMAIL_ADDRESS_OR_CONTACT_ID",
);
$result = $mj->contact($params);
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
# View : Contact from email address
curl -s \
	-X GET \
	--user "$MJ_APIKEY_PUBLIC:$MJ_APIKEY_PRIVATE" \
	https://api.mailjet.com/v3/REST/contact/$EMAIL_ADDRESS_OR_CONTACT_ID 
```


You can access each unique element using unique key filter. Visit the [reference](http://dev.mailjet.com/email-api/v3/) to see the keys available for each resource.

<div></div>
```php
<?php
// View : event-driven callback URLs, also called webhooks, used by the Mailjet platform when a specific action is triggered
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "VIEW",
	"ID" => "$EventType|$isBackup",
);
$result = $mj->eventcallbackurl($params);
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
# View : event-driven callback URLs, also called webhooks, used by the Mailjet platform when a specific action is triggered
curl -s \
	-X GET \
	--user "$MJ_APIKEY_PUBLIC:$MJ_APIKEY_PRIVATE" \
	https://api.mailjet.com/v3/REST/eventcallbackurl/$EventType|$isBackup 
```


In some case the unique key consist of several informations, you can call this unique key combinaison by using the seperator <code>|</code>.

## Like and Case Sensitive Filters

```php
<?php
// View : View Campaign/message/click statistics grouped by ContactsList with Like filter on Name.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "GET",
	"NameLike" => "$Name"
);
$result = $mj->liststatistics($params);
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
# View : View Campaign/message/click statistics grouped by ContactsList with Like filter on Name.
curl -s \
	-X GET \
	--user "$MJ_APIKEY_PUBLIC:$MJ_APIKEY_PRIVATE" \
	https://api.mailjet.com/v3/REST/liststatistics?NameLike=$Name 
```


The Mailjet API allows Like and Case Sensitive filtering on selected properties. Visit the [reference](http://dev.mailjet.com/email-api/v3/) to see if a filter allows this functionality. 

This fonctionality works by adding predefined keywords at the end of a filter: 

 - <code>CI</code> : case insensitive filter
 - <code>Like</code> : like filter similar to a <code>%String%</code> 
 - <code>LikeCI</code> : case insensitive like filter  

Example : <code>Name</code> filter on <code>[/contact/liststatistics](http://dev.mailjet.com/email-api/v3/liststatistics/)</code> resource. You can use <code>Name</code>, <code>NameCI</code>, <code>NameLike</code> and <code>NameLikeCI</code>.

##The Count Filter

```php
<?php
// View : Total number of contact
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "GET",
	"countOnly" => "1"
);
$result = $mj->contact($params);
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
# View : Total number of contact
curl -s \
	-X GET \
	--user "$MJ_APIKEY_PUBLIC:$MJ_APIKEY_PRIVATE" \
	https://api.mailjet.com/v3/REST/contact?countOnly=1 
```


> API response:

```json
{
	"Count": 152,
	"Data": [ ],
	"Total": 152
}
```

Use the filter <code>countOnly</code> to retrieve the number of records a resource will return. This filter will not extract any list of results but only count them. 

<aside class="notice">When you call a resource without the filter <code>countOnly</code>, <code>Count</code> and <code>Total</code> will only show you the number of elements extracted and not the global number.</aside>

##Navigation through results

To navigate on a full set of results, we advise you to either use the filter <code>countOnly</code> to know how many pages of results you will need to extract or to simply loop with a change of <code>Offset</code> until you reach an empty set of results. 





