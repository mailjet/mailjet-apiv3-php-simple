
[new]: https://github.com/mailjet/mailjet-apiv3-php

# Warning: this repository is unmaintained. Please refer to [the new one][new]

Here are all the code examples used in the previous documentation

``` php
<?php
// View : Aggregated campaign statistics grouped over intervals.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "GET",
);
$result = $mj->aggregategraphstatistics($params);
if ($mj->_response_code == 200){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
<?php
// View : Manage your Mailjet API Keys. API keys are used as credentials to access the API and SMTP server.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "GET",
);
$result = $mj->apikey($params);
if ($mj->_response_code == 200){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
<?php
// Create : Manage your Mailjet API Keys. API keys are used as credentials to access the API and SMTP server.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "POST",
	"APIKey" => "",
	"Name" => ""
);
$result = $mj->apikey($params);
if ($mj->_response_code == 201){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
<?php
// Modify : Manage your Mailjet API Keys. API keys are used as credentials to access the API and SMTP server.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "PUT",
	"ID" => "$ID",
	"ACL" => "",
	"IsActive" => "false",
	"Name" => ""
);
$result = $mj->apikey($params);
if ($mj->_response_code == 201){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
<?php
// Delete : Access rights description on API keys for subaccounts/users.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "DELETE",
	"ID" => "$ID",
);
$result = $mj->apikeyaccess($params);
if ($mj->_response_code == 204){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
<?php
// View : Access rights description on API keys for subaccounts/users.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "GET",
);
$result = $mj->apikeyaccess($params);
if ($mj->_response_code == 200){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
<?php
// Create : Access rights description on API keys for subaccounts/users.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "POST",
	"APIKeyID" => "",
	"User" => ""
);
$result = $mj->apikeyaccess($params);
if ($mj->_response_code == 201){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
<?php
// Modify : Access rights description on API keys for subaccounts/users.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "PUT",
	"ID" => "$ID",
	"AllowedAccess" => "",
	"APIKeyID" => "",
	"CreatedAt" => "",
	"CustomName" => "",
	"IsActive" => "false",
	"LastActivityAt" => "",
	"RealUser" => "",
	"Subaccount" => "",
	"User" => ""
);
$result = $mj->apikeyaccess($params);
if ($mj->_response_code == 201){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
<?php
// View : Global counts for an API Key, since its creation.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "GET",
);
$result = $mj->apikeytotals($params);
if ($mj->_response_code == 200){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
<?php
// Delete : Access token for API, used to give access to an API Key in conjunction with our IFrame API.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "DELETE",
	"ID" => "$ID",
);
$result = $mj->apitoken($params);
if ($mj->_response_code == 204){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
<?php
// View : Access token for API, used to give access to an API Key in conjunction with our IFrame API.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "GET",
);
$result = $mj->apitoken($params);
if ($mj->_response_code == 200){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
<?php
// Create : Access token for API, used to give access to an API Key in conjunction with our IFrame API.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "POST",
	"AllowedAccess" => "",
	"APIKeyID" => "",
	"TokenType" => ""
);
$result = $mj->apitoken($params);
if ($mj->_response_code == 201){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
<?php
// Modify : Access token for API, used to give access to an API Key in conjunction with our IFrame API.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "PUT",
	"ID" => "$ID",
	"ACL" => "",
	"AllowedAccess" => "",
	"APIKeyID" => "",
	"CatchedIp" => "",
	"CreatedAt" => "",
	"FirstUsedAt" => "",
	"IsActive" => "false",
	"Lang" => "",
	"LastUsedAt" => "",
	"SentData" => "",
	"Timezone" => "",
	"TokenType" => "",
	"ValidFor" => ""
);
$result = $mj->apitoken($params);
if ($mj->_response_code == 201){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
<?php
// Delete : AX testing object
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "DELETE",
	"ID" => "$ID",
);
$result = $mj->axtesting($params);
if ($mj->_response_code == 204){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
<?php
// View : AX testing object
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "GET",
);
$result = $mj->axtesting($params);
if ($mj->_response_code == 200){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
<?php
// Create : AX testing object
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "POST",
);
$result = $mj->axtesting($params);
if ($mj->_response_code == 201){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
<?php
// Modify : AX testing object
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "PUT",
	"ID" => "$ID",
	"ContactListID" => "",
	"CreatedAt" => "",
	"Deleted" => "false",
	"Mode" => "automatic",
	"Name" => "",
	"Percentage" => "",
	"RemainderAt" => "",
	"SegmentationID" => "",
	"Starred" => "false",
	"StartAt" => "",
	"Status" => "",
	"StatusString" => "",
	"WinnerClickRate" => "",
	"WinnerID" => "",
	"WinnerMethod" => "OpenRate",
	"WinnerOpenRate" => "",
	"WinnerSpamRate" => "",
	"WinnerUnsubRate" => ""
);
$result = $mj->axtesting($params);
if ($mj->_response_code == 201){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
<?php
// View : Single batch jobs running on the Mailjet infrastructure.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "VIEW",
	"ID" => "$ID_JOB",
);
$result = $mj->batchjob($params);
if ($mj->_response_code == 200){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
<?php
// View : Batch jobs running on the Mailjet infrastructure. Currently not documented.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "GET",
);
$result = $mj->batchjob($params);
if ($mj->_response_code == 200){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
<?php
// Create : Batch jobs running on the Mailjet infrastructure. Currently not documented.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "POST",
	"Data" => "",
	"JobType" => ""
);
$result = $mj->batchjob($params);
if ($mj->_response_code == 201){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
<?php
// Modify : Batch jobs running on the Mailjet infrastructure. Currently not documented.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "PUT",
	"ID" => "$ID",
	"AliveAt" => "",
	"APIKeyID" => "",
	"Blocksize" => "",
	"Count" => "1",
	"Current" => "",
	"Data" => "",
	"Errcount" => "0",
	"ErrTreshold" => "",
	"JobEnd" => "",
	"JobStart" => "",
	"JobType" => "",
	"Method" => "",
	"RefId" => "",
	"RequestAt" => "",
	"Status" => "Completed",
	"Throttle" => ""
);
$result = $mj->batchjob($params);
if ($mj->_response_code == 201){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
<?php
// View : Statistics on the bounces generated by emails sent on a given API Key.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "GET",
);
$result = $mj->bouncestatistics($params);
if ($mj->_response_code == 200){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
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

``` php
<?php
// View : Historical view of sent emails, both transactional and marketing. Each e-mail going through Mailjet is attached to a Campaign. This object is automatically generated by Mailjet.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "GET",
	"FromTS" => "1"
);
$result = $mj->a($params);
if ($mj->_response_code == 200){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
<?php
// View : Historical view of sent emails, both transactional and marketing. Each e-mail going through Mailjet is attached to a Campaign. This object is automatically generated by Mailjet.
$mj = new Mailjet();
$params = array(
    "method" => "GET",
);
$result = $mj->a($params);
if ($mj->_response_code == 200)
   echo "success - email sent";
else
   echo "error - ".$mj->_response_code;
var_dump(result);
?>

```

``` php
<?php
// View : Historical view of sent emails, both transactional and marketing. Each e-mail going through Mailjet is attached to a Campaign. This object is automatically generated by Mailjet.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "GET",
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

``` php
<?php
// Modify : Historical view of sent emails, both transactional and marketing. Each e-mail going through Mailjet is attached to a Campaign. This object is automatically generated by Mailjet.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "PUT",
	"ID" => "$ID",
	"IsDeleted" => "false",
	"IsStarred" => "false"
);
$result = $mj->campaign($params);
if ($mj->_response_code == 201){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
<?php
// Delete : User defined campaign aggregates
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "DELETE",
	"ID" => "$ID",
);
$result = $mj->campaignaggregate($params);
if ($mj->_response_code == 204){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
<?php
// View : User defined campaign aggregates
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "GET",
);
$result = $mj->campaignaggregate($params);
if ($mj->_response_code == 200){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
<?php
// Create : User defined campaign aggregates
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "POST",
);
$result = $mj->campaignaggregate($params);
if ($mj->_response_code == 201){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
<?php
// Modify : User defined campaign aggregates
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "PUT",
	"ID" => "$ID",
	"CampaignIDS" => "",
	"ContactFilterID" => "",
	"ContactsListID" => "",
	"FromDate" => "",
	"Keyword" => "",
	"Name" => "",
	"SenderID" => "",
	"ToDate" => ""
);
$result = $mj->campaignaggregate($params);
if ($mj->_response_code == 201){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
<?php
// View : CampaignDraft data. Newsletter and CampaignDraft objects are differentiated by the EditMode values.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "GET",
);
$result = $mj->campaigndraft($params);
if ($mj->_response_code == 200){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
<?php
// Create : CampaignDraft data. Newsletter and CampaignDraft objects are differentiated by the EditMode values.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "POST",
	"Locale" => "",
	"Sender" => "",
	"SenderEmail" => "",
	"Subject" => ""
);
$result = $mj->campaigndraft($params);
if ($mj->_response_code == 201){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
<?php
// Modify : CampaignDraft data. Newsletter and CampaignDraft objects are differentiated by the EditMode values.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "PUT",
	"ID" => "$ID",
	"AXFractionName" => "",
	"AXTesting" => "",
	"CampaignID" => "",
	"ContactsListID" => "",
	"CreatedAt" => "",
	"Current" => "",
	"DeliveredAt" => "",
	"EditMode" => "",
	"IsStarred" => "false",
	"IsTextPartIncluded" => "false",
	"Locale" => "",
	"ModifiedAt" => "",
	"Preset" => "",
	"ReplyEmail" => "",
	"SegmentationID" => "",
	"Sender" => "",
	"SenderEmail" => "",
	"SenderName" => "",
	"Subject" => "",
	"Template" => "",
	"Title" => "",
	"Url" => "",
	"Used" => "false"
);
$result = $mj->campaigndraft($params);
if ($mj->_response_code == 201){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
<?php
// View : CampaignDraft data. Newsletter and CampaignDraft objects are differentiated by the EditMode values.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "VIEW",
	"ID" => "$ID",
);
$result = $mj->campaigndraftDetailContent($params);
if ($mj->_response_code == 200){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
<?php
// Create : CampaignDraft data. Newsletter and CampaignDraft objects are differentiated by the EditMode values.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "POST",
	"ID" => "$ID",
	"AXFractionName" => "",
	"AXTesting" => "",
	"CampaignID" => "",
	"ContactsListID" => "",
	"CreatedAt" => "",
	"Current" => "",
	"DeliveredAt" => "",
	"EditMode" => "",
	"ID" => "",
	"IsStarred" => "false",
	"IsTextPartIncluded" => "false",
	"Locale" => "",
	"ModifiedAt" => "",
	"Preset" => "",
	"ReplyEmail" => "",
	"SegmentationID" => "",
	"Sender" => "",
	"SenderEmail" => "",
	"SenderName" => "",
	"Status" => "",
	"Subject" => "",
	"Template" => "",
	"Title" => "",
	"Url" => "",
	"Used" => "false"
);
$result = $mj->campaigndraftDetailContent($params);
if ($mj->_response_code == 201){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
<?php
// Delete : CampaignDraft data. Newsletter and CampaignDraft objects are differentiated by the EditMode values.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "DELETE",
	"ID" => "$ID",
);
$result = $mj->campaigndraftSchedule($params);
if ($mj->_response_code == 204){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
<?php
// View : CampaignDraft data. Newsletter and CampaignDraft objects are differentiated by the EditMode values.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "VIEW",
	"ID" => "$ID",
);
$result = $mj->campaigndraftSchedule($params);
if ($mj->_response_code == 200){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
<?php
// Create : CampaignDraft data. Newsletter and CampaignDraft objects are differentiated by the EditMode values.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "POST",
	"ID" => "$ID",
	"AXFractionName" => "",
	"AXTesting" => "",
	"CampaignID" => "",
	"ContactsListID" => "",
	"CreatedAt" => "",
	"Current" => "",
	"DeliveredAt" => "",
	"EditMode" => "",
	"ID" => "",
	"IsStarred" => "false",
	"IsTextPartIncluded" => "false",
	"Locale" => "",
	"ModifiedAt" => "",
	"Preset" => "",
	"ReplyEmail" => "",
	"SegmentationID" => "",
	"Sender" => "",
	"SenderEmail" => "",
	"SenderName" => "",
	"Status" => "",
	"Subject" => "",
	"Template" => "",
	"Title" => "",
	"Url" => "",
	"Used" => "false"
);
$result = $mj->campaigndraftSchedule($params);
if ($mj->_response_code == 201){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
<?php
// Modify : CampaignDraft data. Newsletter and CampaignDraft objects are differentiated by the EditMode values.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "PUT",
	"ID" => "$ID",
	"AXFractionName" => "",
	"AXTesting" => "",
	"CampaignID" => "",
	"ContactsListID" => "",
	"CreatedAt" => "",
	"Current" => "",
	"DeliveredAt" => "",
	"EditMode" => "",
	"IsStarred" => "false",
	"IsTextPartIncluded" => "false",
	"Locale" => "",
	"ModifiedAt" => "",
	"Preset" => "",
	"ReplyEmail" => "",
	"SegmentationID" => "",
	"Sender" => "",
	"SenderEmail" => "",
	"SenderName" => "",
	"Subject" => "",
	"Template" => "",
	"Title" => "",
	"Url" => "",
	"Used" => "false"
);
$result = $mj->campaigndraftSchedule($params);
if ($mj->_response_code == 201){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
<?php
// Create : CampaignDraft data. Newsletter and CampaignDraft objects are differentiated by the EditMode values.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "POST",
	"ID" => "$ID",
	"AXFractionName" => "",
	"AXTesting" => "",
	"CampaignID" => "",
	"ContactsListID" => "",
	"CreatedAt" => "",
	"Current" => "",
	"DeliveredAt" => "",
	"EditMode" => "",
	"ID" => "",
	"IsStarred" => "false",
	"IsTextPartIncluded" => "false",
	"Locale" => "",
	"ModifiedAt" => "",
	"Preset" => "",
	"ReplyEmail" => "",
	"SegmentationID" => "",
	"Sender" => "",
	"SenderEmail" => "",
	"SenderName" => "",
	"Status" => "",
	"Subject" => "",
	"Template" => "",
	"Title" => "",
	"Url" => "",
	"Used" => "false"
);
$result = $mj->campaigndraftSend($params);
if ($mj->_response_code == 201){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
<?php
// View : CampaignDraft data. Newsletter and CampaignDraft objects are differentiated by the EditMode values.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "VIEW",
	"ID" => "$ID",
);
$result = $mj->campaigndraftStatus($params);
if ($mj->_response_code == 200){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
<?php
// Create : CampaignDraft data. Newsletter and CampaignDraft objects are differentiated by the EditMode values.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "POST",
	"ID" => "$ID",
	"AXFractionName" => "",
	"AXTesting" => "",
	"CampaignID" => "",
	"ContactsListID" => "",
	"CreatedAt" => "",
	"Current" => "",
	"DeliveredAt" => "",
	"EditMode" => "",
	"ID" => "",
	"IsStarred" => "false",
	"IsTextPartIncluded" => "false",
	"Locale" => "",
	"ModifiedAt" => "",
	"Preset" => "",
	"ReplyEmail" => "",
	"SegmentationID" => "",
	"Sender" => "",
	"SenderEmail" => "",
	"SenderName" => "",
	"Status" => "",
	"Subject" => "",
	"Template" => "",
	"Title" => "",
	"Url" => "",
	"Used" => "false"
);
$result = $mj->campaigndraftTest($params);
if ($mj->_response_code == 201){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
<?php
// View : API Campaign statistics grouped over intervals
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "GET",
);
$result = $mj->campaigngraphstatistics($params);
if ($mj->_response_code == 200){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
<?php
// View : Returns a list of campaigns, including the AX campaigns
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "GET",
);
$result = $mj->campaignoverview($params);
if ($mj->_response_code == 200){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
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

``` php
<?php
// View : Click statistics for messages.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "GET",
);
$result = $mj->clickstatistics($params);
if ($mj->_response_code == 200){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
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

``` php
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

``` php
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

``` php
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

``` php
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

``` php
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

``` php
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

``` php
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

``` php
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

``` php
<?php
// View : Manage the details of a single Contact.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "VIEW",
	"ID" => "$ID_OR_EMAIL",
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

``` php
<?php
// View : Manage the details of a Contact.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "GET",
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

``` php
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

``` php
<?php
// this is call to update a contact
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "PUT",
	"ID" => "$ID_OR_EMAIL",
	"name" => "john"
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

``` php
<?php
// View : Lists a contact belong to
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "VIEW",
	"ID" => "$ID",
);
$result = $mj->contactGetContactsLists($params);
if ($mj->_response_code == 200){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
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

``` php
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

``` php
<?php
// View : Manage the details of a Contact.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "VIEW",
	"ID" => "$ID",
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

``` php
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

``` php
<?php
// Delete : This resource can be used to examine and manipulate the associated extra static data of a contact.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "DELETE",
	"ID" => "$ID",
);
$result = $mj->contactdata($params);
if ($mj->_response_code == 204){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
<?php
// View : This resource can be used to examine and manipulate the associated extra static data of a contact.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "GET",
);
$result = $mj->contactdata($params);
if ($mj->_response_code == 200){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
<?php
// Create : This resource can be used to examine and manipulate the associated extra static data of a contact.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "POST",
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

``` php
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

``` php
<?php
// Delete : A list of filter expressions for use in newsletters.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "DELETE",
	"ID" => "$ID",
);
$result = $mj->contactfilter($params);
if ($mj->_response_code == 204){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
<?php
// View : A list of filter expressions for use in newsletters.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "GET",
);
$result = $mj->contactfilter($params);
if ($mj->_response_code == 200){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
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

``` php
<?php
// Modify : A list of filter expressions for use in newsletters.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "PUT",
	"ID" => "$ID",
	"Description" => "",
	"Expression" => "",
	"Status" => "unused"
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

``` php
<?php
// Delete : This resource can be used to examine the associated extra historical data of a contact.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "DELETE",
	"ID" => "$ID",
);
$result = $mj->contacthistorydata($params);
if ($mj->_response_code == 204){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
<?php
// View : This resource can be used to examine the associated extra historical data of a contact.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "GET",
);
$result = $mj->contacthistorydata($params);
if ($mj->_response_code == 200){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
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

``` php
<?php
// Delete : Definition of available extra data items for contacts.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "DELETE",
	"ID" => "$ID",
);
$result = $mj->contactmetadata($params);
if ($mj->_response_code == 204){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
<?php
// View : Definition of available extra data items for contacts.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "GET",
);
$result = $mj->contactmetadata($params);
if ($mj->_response_code == 200){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
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

``` php
<?php
// Modify : Definition of available extra data items for contacts.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "PUT",
	"ID" => "$ID",
	"Datatype" => "str"
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

``` php
<?php
// Delete : Manage your contact lists. One Contact might be associated to one or more ContactsList.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "DELETE",
	"ID" => "$ID",
);
$result = $mj->contactslist($params);
if ($mj->_response_code == 204){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
<?php
// View : Manage your contact lists. One Contact might be associated to one or more ContactsList.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "GET",
);
$result = $mj->contactslist($params);
if ($mj->_response_code == 200){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
<?php
// View : Manage your contact lists. One Contact might be associated to one or more ContactsList.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "VIEW",
	"ID" => "$ID",
);
$result = $mj->contactslistImportList($params);
if ($mj->_response_code == 200){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
<?php
// Create : Manage your contact lists. One Contact might be associated to one or more ContactsList.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "POST",
	"ID" => "$ID",
	"Address" => "",
	"CreatedAt" => "",
	"ID" => "",
	"IsDeleted" => "false",
	"Name" => "myList",
	"SubscriberCount" => ""
);
$result = $mj->contactslistImportList($params);
if ($mj->_response_code == 201){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
<?php
// Create : Manage your contact lists. One Contact might be associated to one or more ContactsList.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "POST",
	"ID" => "$ID",
	"Address" => "",
	"CreatedAt" => "",
	"ID" => "",
	"IsDeleted" => "false",
	"Name" => "myList",
	"SubscriberCount" => ""
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

``` php
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

``` php
<?php
// View : Manage your contact lists. One Contact might be associated to one or more ContactsList.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "VIEW",
	"ID" => "$ID",
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

``` php
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

``` php
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

``` php
<?php
// Modify : Manage your contact lists. One Contact might be associated to one or more ContactsList.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "PUT",
	"ID" => "$ID",
	"IsDeleted" => "false",
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

``` php
<?php
// View : Contacts list signup request.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "GET",
);
$result = $mj->contactslistsignup($params);
if ($mj->_response_code == 200){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
<?php
// View : View message statistics for a given contact.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "GET",
);
$result = $mj->contactstatistics($params);
if ($mj->_response_code == 200){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
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

``` php
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

``` php
<?php
// View : A wrapper for the CSV importer
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "GET",
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

``` php
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

``` php
<?php
// Modify : A wrapper for the CSV importer
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "PUT",
	"ID" => "$ID",
	"ContactsListID" => "",
	"DataID" => "",
	"ErrTreshold" => "",
	"ImportOptions" => "",
	"Method" => "",
	"Status" => "Upload"
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

``` php
<?php
// View : Sender Domain properties.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "GET",
);
$result = $mj->dns($params);
if ($mj->_response_code == 200){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
<?php
// Create : Sender Domain properties.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "POST",
	"ID" => "$ID",
	"DKIMRecordName" => "",
	"DKIMRecordValue" => "",
	"DKIMStatus" => "",
	"Domain" => "",
	"ID" => "",
	"IsCheckInProgress" => "false",
	"LastCheckAt" => "",
	"OwnerShipToken" => "",
	"SPFRecordValue" => "",
	"SPFStatus" => ""
);
$result = $mj->dnsCheck($params);
if ($mj->_response_code == 201){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
<?php
// View : View Campaign/Message/Click statistics grouped per domain.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "GET",
);
$result = $mj->domainstatistics($params);
if ($mj->_response_code == 200){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
<?php
// Delete : Manage event-driven callback URLs, also called webhooks, used by the Mailjet platform when a specific action is triggered
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "DELETE",
	"ID" => "$ID",
);
$result = $mj->eventcallbackurl($params);
if ($mj->_response_code == 204){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
<?php
// View : Manage event-driven callback URLs, also called webhooks, used by the Mailjet platform when a specific action is triggered
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "GET",
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

``` php
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

``` php
<?php
// Modify : Manage event-driven callback URLs, also called webhooks, used by the Mailjet platform when a specific action is triggered
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "PUT",
	"ID" => "$ID",
	"APIKeyID" => "",
	"IsBackup" => "false",
	"Status" => "",
	"Url" => "",
	"Version" => ""
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

``` php
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

``` php
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

``` php
<?php
// View : Message click/open statistics grouped per country
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "GET",
);
$result = $mj->geostatistics($params);
if ($mj->_response_code == 200){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
<?php
// View : API Campaign/message/click statistics grouped over intervals.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "GET",
);
$result = $mj->graphstatistics($params);
if ($mj->_response_code == 200){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
<?php
// Delete : Manage the relationship between a contact and a contactslists.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "DELETE",
	"ID" => "$ID",
);
$result = $mj->listrecipient($params);
if ($mj->_response_code == 204){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
<?php
// View : Manage the relationship between a contact and a contactslists.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "GET",
);
$result = $mj->listrecipient($params);
if ($mj->_response_code == 200){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
<?php
// Create : Manage the relationship between a contact and a contactslists.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "POST",
	"ContactID" => "",
	"ListID" => ""
);
$result = $mj->listrecipient($params);
if ($mj->_response_code == 201){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
<?php
// Modify : Manage the relationship between a contact and a contactslists.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "PUT",
	"ID" => "$ID",
	"IsActive" => "false",
	"IsUnsubscribed" => "false",
	"ListID" => "",
	"UnsubscribedAt" => ""
);
$result = $mj->listrecipient($params);
if ($mj->_response_code == 201){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
<?php
// View : View statistics on Messages sent to the recipients of a given list.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "GET",
);
$result = $mj->listrecipientstatistics($params);
if ($mj->_response_code == 200){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
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

``` php
<?php
// View : View Campaign/message/click statistics grouped by ContactsList.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "GET",
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

``` php
<?php
// View : Details of Messages in a campaign
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "GET",
	"Campaign" => "$CAMPAIGN_ID"
);
$result = $mj->message($params);
if ($mj->_response_code == 200){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
<?php
// View : Details of a specific Message (e-mail) processed by Mailjet
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "VIEW",
	"ID" => "$ID_MESSAGE",
);
$result = $mj->message($params);
if ($mj->_response_code == 200){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
<?php
// View : Allows you to list and view the details of a Message (an e-mail) processed by Mailjet
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "GET",
);
$result = $mj->message($params);
if ($mj->_response_code == 200){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
<?php
// View : Event history of a message.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "VIEW",
	"ID" => "$ID_MESSAGE",
);
$result = $mj->messagehistory($params);
if ($mj->_response_code == 200){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
<?php
// View : information for a specific message
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "VIEW",
	"ID" => "$ID_MESSAGE",
);
$result = $mj->messageinformation($params);
if ($mj->_response_code == 200){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
<?php
// View : API Key campaign/message information.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "GET",
);
$result = $mj->messageinformation($params);
if ($mj->_response_code == 200){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
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

``` php
<?php
// View : statuses and events summary for a specific message
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "VIEW",
	"ID" => "$ID_MESSAGE",
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

``` php
<?php
// View : API Key Statistical campaign/message data.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "GET",
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

``` php
<?php
// View : Message state reference.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "GET",
);
$result = $mj->messagestate($params);
if ($mj->_response_code == 200){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
<?php
// View : API key Campaign/Message statistics.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "GET",
);
$result = $mj->messagestatistics($params);
if ($mj->_response_code == 200){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
<?php
// View : Mailjet API meta data.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "GET",
);
$result = $mj->metadata($params);
if ($mj->_response_code == 200){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
<?php
// View : Management of domains used for sending messages. A domain or address must be registered and validated before being used. See the related Sender object if you wish to register a given e-mail address.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "GET",
);
$result = $mj->metasender($params);
if ($mj->_response_code == 200){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
<?php
// Create : Management of domains used for sending messages. A domain or address must be registered and validated before being used. See the related Sender object if you wish to register a given e-mail address.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "POST",
	"Email" => "miss@mailjet.com"
);
$result = $mj->metasender($params);
if ($mj->_response_code == 201){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
<?php
// Modify : Management of domains used for sending messages. A domain or address must be registered and validated before being used. See the related Sender object if you wish to register a given e-mail address.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "PUT",
	"ID" => "$ID",
	"CreatedAt" => "",
	"Description" => "",
	"IsEnabled" => "false"
);
$result = $mj->metasender($params);
if ($mj->_response_code == 201){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
<?php
// View : Manage user profile data such as address, payment information etc.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "GET",
);
$result = $mj->myprofile($params);
if ($mj->_response_code == 200){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
<?php
// Modify : Manage user profile data such as address, payment information etc.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "PUT",
	"ID" => "$ID",
	"AddressCity" => "",
	"AddressCountry" => "",
	"AddressPostalCode" => "",
	"AddressState" => "",
	"AddressStreet" => "",
	"BillingEmail" => "",
	"BirthdayAt" => "",
	"CompanyName" => "",
	"CompanyNumOfEmployees" => "",
	"ContactPhone" => "",
	"EstimatedVolume" => "",
	"Features" => "",
	"Firstname" => "",
	"Industry" => "",
	"JobTitle" => "",
	"Lastname" => "",
	"User" => "",
	"VATNumber" => "",
	"Website" => ""
);
$result = $mj->myprofile($params);
if ($mj->_response_code == 201){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
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

``` php
<?php
// View : Newsletter data.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "VIEW",
	"ID" => "$ID",
);
$result = $mj->newsletter($params);
if ($mj->_response_code == 200){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
<?php
// View : Newsletter data.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "GET",
);
$result = $mj->newsletter($params);
if ($mj->_response_code == 200){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
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

``` php
<?php
// Modify : Newsletter data.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "PUT",
	"ID" => "$ID",
	"Title" => "Updated Newsletter Title"
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

``` php
<?php
// Delete : Newsletter data.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "DELETE",
	"ID" => "$ID",
);
$result = $mj->newsletterDetailContent($params);
if ($mj->_response_code == 204){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
<?php
// View : Newsletter data.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "VIEW",
	"ID" => "$ID",
);
$result = $mj->newsletterDetailContent($params);
if ($mj->_response_code == 200){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
<?php
// Create : Newsletter data.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "POST",
	"ID" => "$ID",
	"AXFraction" => "",
	"AXFractionName" => "",
	"AXTesting" => "",
	"Callback" => "",
	"CampaignID" => "",
	"ContactsListID" => "",
	"CreatedAt" => "",
	"DeliveredAt" => "",
	"EditMode" => "",
	"EditType" => "",
	"Footer" => "",
	"FooterAddress" => "",
	"FooterWYSIWYGType" => "",
	"HeaderFilename" => "",
	"HeaderLink" => "",
	"HeaderText" => "",
	"HeaderUrl" => "",
	"ID" => "",
	"Ip" => "",
	"IsHandled" => "false",
	"IsStarred" => "false",
	"IsTextPartIncluded" => "false",
	"Locale" => "en_US",
	"ModifiedAt" => "",
	"Permalink" => "",
	"PermalinkHost" => "",
	"PermalinkWYSIWYGType" => "",
	"PolitenessMode" => "",
	"ReplyEmail" => "",
	"SegmentationID" => "",
	"Sender" => "MisterMailjet",
	"SenderEmail" => "Mister@mailjet.com",
	"SenderName" => "",
	"Status" => "",
	"Subject" => "Greetings from Mailjet",
	"TemplateID" => "",
	"TestAddress" => "",
	"Title" => "",
	"Url" => ""
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

``` php
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

``` php
<?php
// Delete : Newsletter data.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "DELETE",
	"ID" => "$ID",
);
$result = $mj->newsletterSchedule($params);
if ($mj->_response_code == 204){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
<?php
// View : Newsletter data.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "VIEW",
	"ID" => "$ID",
);
$result = $mj->newsletterSchedule($params);
if ($mj->_response_code == 200){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
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

``` php
<?php
// Modify : Newsletter data.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "PUT",
	"ID" => "$ID",
	"AXFraction" => "",
	"AXFractionName" => "",
	"AXTesting" => "",
	"Callback" => "",
	"ContactsListID" => "",
	"CreatedAt" => "",
	"DeliveredAt" => "",
	"EditMode" => "",
	"EditType" => "",
	"Footer" => "",
	"FooterAddress" => "",
	"FooterWYSIWYGType" => "",
	"HeaderFilename" => "",
	"HeaderLink" => "",
	"HeaderText" => "",
	"HeaderUrl" => "",
	"Ip" => "",
	"IsHandled" => "false",
	"IsStarred" => "false",
	"IsTextPartIncluded" => "false",
	"Locale" => "en_US",
	"ModifiedAt" => "",
	"Permalink" => "",
	"PermalinkHost" => "",
	"PermalinkWYSIWYGType" => "",
	"PolitenessMode" => "",
	"ReplyEmail" => "",
	"SegmentationID" => "",
	"Sender" => "MisterMailjet",
	"SenderEmail" => "Mister@mailjet.com",
	"SenderName" => "",
	"Status" => "",
	"Subject" => "Greetings from Mailjet",
	"TemplateID" => "",
	"TestAddress" => "",
	"Title" => "",
	"Url" => ""
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

``` php
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

``` php
<?php
// View : Newsletter data.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "VIEW",
	"ID" => "$ID",
);
$result = $mj->newsletterStatus($params);
if ($mj->_response_code == 200){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
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

``` php
<?php
// View : Manages a Newsletter Template Properties.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "GET",
);
$result = $mj->newslettertemplate($params);
if ($mj->_response_code == 200){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
<?php
// Create : Manages a Newsletter Template Properties.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "POST",
	"Locale" => ""
);
$result = $mj->newslettertemplate($params);
if ($mj->_response_code == 201){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
<?php
// Modify : Manages a Newsletter Template Properties.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "PUT",
	"ID" => "$ID",
	"CategoryID" => "",
	"CreatedAt" => "",
	"Footer" => "",
	"FooterAddress" => "",
	"FooterWYSIWYGType" => "",
	"HeaderFilename" => "",
	"HeaderLink" => "",
	"HeaderText" => "",
	"HeaderUrl" => "",
	"Locale" => "",
	"Name" => "",
	"Permalink" => "",
	"PermalinkWYSIWYGType" => "",
	"SourceNewsLetterID" => "",
	"Status" => ""
);
$result = $mj->newslettertemplate($params);
if ($mj->_response_code == 201){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
<?php
// View : Manage categories for your newsletters. Allows you to group newsletters by category.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "GET",
);
$result = $mj->newslettertemplatecategory($params);
if ($mj->_response_code == 200){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
<?php
// View : Retrieve informations about messages opened at least once by their recipients.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "GET",
);
$result = $mj->openinformation($params);
if ($mj->_response_code == 200){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
<?php
// View : Retrieve statistics on e-mails opened at least once by their recipients.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "GET",
);
$result = $mj->openstatistics($params);
if ($mj->_response_code == 200){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

```  php
<?php
// View : Aggregated campaign statistics grouped over intervals.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "GET",
);
$result = $mj->aggregategraphstatistics($params);
if ($mj->_response_code == 200){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>


```

``` php
<?php
// Create : ParseRoute description
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "POST",
	"Url" => "https://www.mydomain.com/mj_parse.php"
);
$result = $mj->parseroute($params);
if ($mj->_response_code == 201){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
<?php
// Create : ParseRoute description
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "POST",
	"Url" => "https://www.mydomain.com/mj_parse.php",
	"Email" => "mjparse@mydomain.com"
);
$result = $mj->parseroute($params);
if ($mj->_response_code == 201){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
<?php
// Delete : ParseRoute description
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "DELETE",
	"ID" => "$ID",
);
$result = $mj->parseroute($params);
if ($mj->_response_code == 204){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
<?php
// View : ParseRoute description
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "GET",
);
$result = $mj->parseroute($params);
if ($mj->_response_code == 200){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
<?php
// Create : ParseRoute description
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "POST",
	"APIKeyID" => "",
	"Email" => "miss@mailjet.com",
	"Url" => ""
);
$result = $mj->parseroute($params);
if ($mj->_response_code == 201){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
<?php
// Modify : ParseRoute description
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "PUT",
	"ID" => "$ID",
	"APIKeyID" => "",
	"Url" => ""
);
$result = $mj->parseroute($params);
if ($mj->_response_code == 201){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
<?php
// View : User preferences in key=value format.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "GET",
);
$result = $mj->preferences($params);
if ($mj->_response_code == 200){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
<?php
// Delete : The preset object contains global and user defined presets (styles) independant from templates or newsletters.Access is similar to template and depends on OwnerType, Owner. No versioning is done. Presets are never referenced by their ID. The preset value is copied into the template or newsletter.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "DELETE",
	"ID" => "$ID",
);
$result = $mj->preset($params);
if ($mj->_response_code == 204){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
<?php
// View : The preset object contains global and user defined presets (styles) independant from templates or newsletters.Access is similar to template and depends on OwnerType, Owner. No versioning is done. Presets are never referenced by their ID. The preset value is copied into the template or newsletter.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "GET",
);
$result = $mj->preset($params);
if ($mj->_response_code == 200){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
<?php
// Create : The preset object contains global and user defined presets (styles) independant from templates or newsletters.Access is similar to template and depends on OwnerType, Owner. No versioning is done. Presets are never referenced by their ID. The preset value is copied into the template or newsletter.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "POST",
);
$result = $mj->preset($params);
if ($mj->_response_code == 201){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
<?php
// Modify : The preset object contains global and user defined presets (styles) independant from templates or newsletters.Access is similar to template and depends on OwnerType, Owner. No versioning is done. Presets are never referenced by their ID. The preset value is copied into the template or newsletter.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "PUT",
	"ID" => "$ID",
	"Author" => "",
	"Copyright" => "",
	"Description" => "",
	"OwnerID" => "",
	"Preset" => ""
);
$result = $mj->preset($params);
if ($mj->_response_code == 201){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
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
	"Recipients" => json_decode('[
				{
						"Email": "passenger@mailjet.com"
				}
		]', true)
);
$result = $mj->send($params);
if ($mj->_response_code == 201){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
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

``` php
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
	"Recipients" => json_decode('[
				{
						"Email": "passenger1@mailjet.com",
						"Name": "passenger 1"
				},
				{
						"Email": "passenger2@mailjet.com",
						"Name": "passenger 2"
				}
		]', true)
);
$result = $mj->send($params);
if ($mj->_response_code == 201){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
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

``` php
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
	"Recipients" => json_decode('[
				{
						"Email": "passenger@mailjet.com"
				}
		]', true),
	"Attachments" => json_decode('[
				{
						"Content-type": "text/plain",
						"Filename": "test.txt",
						"content": "VGhpcyBpcyB5b3VyIGF0dGFjaGVkIGZpbGUhISEK"
				}
		]', true)
);
$result = $mj->send($params);
if ($mj->_response_code == 201){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
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

``` php
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
	"Mj-deduplicatecampaign" => "1"
);
$result = $mj->send($params);
if ($mj->_response_code == 201){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
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

``` php
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
	"Recipients" => json_decode('[
				{
						"Email": "passenger@mailjet.com"
				}
		]', true),
	"Inline_attachments" => json_decode('[
				{
						"Content-type": "image/gif",
						"Filename": "logo.gif",
						"content": "R0lGODlhEAAQAOYAAP////748v39/Pvq1vr6+lJSVeqlK/zqyv7+/unKjJ+emv78+fb29pucnfrlwvTCi9ra2vTCa6urrWdoaurr6/Pz8uHh4vn49PO7QqGfmumaN+2uS1ZWWfr27uyuLnBxd/z8+0pLTvHAWvjar/zr2Z6cl+jal+2kKmhqcEJETvHQbPb07lBRVPv6+cjJycXFxn1+f//+/f337nF0efO/Mf306NfW0fjHSJOTk/TKlfTp0Prlx/XNj83HuPfEL+/v8PbJgueXJOzp4MG8qUNES9fQqN3d3vTJa/vq1f317P769f/8+gAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACH/C1hNUCBEYXRhWE1QPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4gPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1QIENvcmUgNS4wLWMwNjAgNjEuMTM0Nzc3LCAyMDEwLzAyLzEyLTE3OjMyOjAwICAgICAgICAiPiA8cmRmOlJERiB4bWxuczpyZGY9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkvMDIvMjItcmRmLXN5bnRheC1ucyMiPiA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtbG5zOnhtcE1NPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvbW0vIiB4bWxuczpzdFJlZj0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL3NUeXBlL1Jlc291cmNlUmVmIyIgeG1wOkNyZWF0b3JUb29sPSJBZG9iZSBQaG90b3Nob3AgQ1M1IFdpbmRvd3MiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6MjY5ODYxMzYzMkJCMTFFMDkzQkFFMkFENzVGN0JGRkYiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6MjY5ODYxMzczMkJCMTFFMDkzQkFFMkFENzVGN0JGRkYiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDoyNjk4NjEzNDMyQkIxMUUwOTNCQUUyQUQ3NUY3QkZGRiIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDoyNjk4NjEzNTMyQkIxMUUwOTNCQUUyQUQ3NUY3QkZGRiIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/PgH//v38+/r5+Pf29fTz8vHw7+7t7Ovq6ejn5uXk4+Lh4N/e3dzb2tnY19bV1NPS0dDPzs3My8rJyMfGxcTDwsHAv769vLu6ubi3trW0s7KxsK+urayrqqmop6alpKOioaCfnp2cm5qZmJeWlZSTkpGQj46NjIuKiYiHhoWEg4KBgH9+fXx7enl4d3Z1dHNycXBvbm1sa2ppaGdmZWRjYmFgX15dXFtaWVhXVlVUU1JRUE9OTUxLSklIR0ZFRENCQUA/Pj08Ozo5ODc2NTQzMjEwLy4tLCsqKSgnJiUkIyIhIB8eHRwbGhkYFxYVFBMSERAPDg0MCwoJCAcGBQQDAgEAACH5BAEAAAAALAAAAAAQABAAAAdUgACCg4SFhoeIiYRGLhaKhA0TMDgSLxAUiEIZHAUsIUQpKAo9Og6FNh8zJUNFJioYQIgJRzc+NBEkiAcnBh4iO4o8QRsjj0gaOY+CDwPKzs/Q0YSBADs="
				}
		]', true)
);
$result = $mj->send($params);
if ($mj->_response_code == 201){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
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

``` php
<?php
// This calls sends an email to the given recipient.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "POST",
	"Messages" => json_decode('[
				{
						"FromEmail": "pilot@mailjet.com",
						"FromName": "Mailjet Pilot",
						"Recipients": [
								{
										"Email": "passenger1@mailjet.com",
										"Name": "passenger 1"
								}
						],
						"Subject": "Your email flight plan!",
						"Text-part": "Dear passenger 1, welcome to Mailjet! May the delivery force be with you!",
						"Html-part": "<h3>Dear passenger 1, welcome to Mailjet!</h3><br />May the delivery force be with you!"
				},
				{
						"FromEmail": "pilot@mailjet.com",
						"FromName": "Mailjet Pilot",
						"Recipients": [
								{
										"Email": "passenger2@mailjet.com",
										"Name": "passenger 2"
								}
						],
						"Subject": "Your email flight plan!",
						"Text-part": "Dear passenger 2, welcome to Mailjet! May the delivery force be with you!",
						"Html-part": "<h3>Dear passenger 2, welcome to Mailjet!</h3><br />May the delivery force be with you!"
				}
		]', true)
);
$result = $mj->send($params);
if ($mj->_response_code == 201){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
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

``` php
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
	"Vars" => json_decode('{
				"day": "Monday"
		}', true),
	"Recipients" => json_decode('[
				{
						"Email": "passenger1@mailjet.com",
						"Name": "passenger 1"
				},
				{
						"Email": "passenger2@mailjet.com",
						"Name": "passenger 2"
				}
		]', true)
);
$result = $mj->send($params);
if ($mj->_response_code == 201){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
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

``` php
<?php
// This calls sends an email to the given recipient.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "POST",
	"FromEmail" => "pilot@mailjet.com",
	"FromName" => "Mailjet's Pilot",
	"Sender" => "pilot@mailjet.com",
	"Subject" => "Your email flight plan!",
	"Text-part" => "Dear passenger [[var:name]], welcome to Mailjet! May the delivery force be with you! Today: [[var:perk]]!",
	"Html-part" => "<h3>Dear passenger [[var:name]], welcome to Mailjet!</h3><br />May the delivery force be with you! Today: [[var:perk]]!</html>",
	"Mj-prio" => "2",
	"Mj-campaign" => "Email_Flight-Plan 1",
	"Mj-deduplicatecampaign" => "true OR y OR 1 OR NOTHING",
	"Mj-trackopen" => "0 OR 1",
	"Mj-trackclick" => "0 OR 1",
	"Mj-CustomID" => "Trackable_email_1",
	"Mj-EventPayload" => "",
	"Headers" => json_decode('{
				"X-My-Header": "my own value",
				"X-My-Header-2": "my own value 2"
		}', true),
	"Vars" => json_decode('{
				"perk": "free Millenium Falcon",
				"globalVar": "String value"
		}', true),
	"Recipients" => json_decode('[
				{
						"Email": "y.solo@mailjet.com",
						"Name": "Passenger",
						"Vars": {
								"name": "Yann Solo",
								"var2": "String value 2",
								"varN": "String value N"
						}
				},
				{
						"Email": "luke@mailjet.com",
						"Name": "Luke",
						"Vars": {
								"name": "Placeholder1",
								"var2": "String value 2",
								"varN": "String value N"
						}
				}
		]', true),
	"Attachments" => json_decode('[
				{
						"Content-type": "text/plain",
						"Filename": "test.txt",
						"content": "VGhpcyBpcyB5b3VyIGF0dGFjaGVkIGZpbGUhISEK"
				}
		]', true),
	"Inline_attachments" => json_decode('[
				{
						"Content-type": "text/plain",
						"Filename": "test.txt",
						"content": "VGhpcyBpcyB5b3VyIGF0dGFjaGVkIGZpbGUhISEK"
				}
		]', true)
);
$result = $mj->sendMessage($params);
if ($mj->_response_code == 201){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
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
	"Vars" => json_decode('{
				"day": "Monday"
		}', true),
	"Recipients" => json_decode('[
				{
						"Email": "passenger1@mailjet.com",
						"Name": "passenger 1",
						"Vars": {
								"day": "Tuesday",
								"personalmessage": "Happy birthday!"
						}
				},
				{
						"Email": "passenger2@mailjet.com",
						"Name": "passenger 2"
				}
		]', true)
);
$result = $mj->send($params);
if ($mj->_response_code == 201){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
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

``` php
<?php
// This calls sends an email to the given recipient.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "POST",
	"FromEmail" => "pilot@mailjet.com",
	"FromName" => "Mailjet Pilot",
	"Subject" => "Your email flight plan!",
	"Text-part" => "Dear [[data:firstname:"passenger"]], welcome to Mailjet! May the delivery force be with you!",
	"Html-part" => "<h3>Dear [[data:firstname:"passenger"]], welcome to Mailjet!</h3><br /> May the delivery force be with you!",
	"Recipients" => json_decode('[
				{
						"Email": "passenger1@mailjet.com",
						"Name": "passenger 1"
				},
				{
						"Email": "passenger2@mailjet.com",
						"Name": "passenger 2"
				}
		]', true)
);
$result = $mj->send($params);
if ($mj->_response_code == 201){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
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

``` php
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
	"Recipients" => json_decode('[
				{
						"Email": "passenger@mailjet.com"
				}
		]', true),
	"Headers" => json_decode('{
				"Reply-To": "copilot@mailjet.com"
		}', true)
);
$result = $mj->send($params);
if ($mj->_response_code == 201){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
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

``` php
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
	"Recipients" => json_decode('[
				{
						"Email": "passenger@mailjet.com"
				}
		]', true),
	"Mj-CustomID" => json_decode('"PassengerEticket1234"', true)
);
$result = $mj->send($params);
if ($mj->_response_code == 201){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
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

``` php
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
	"Recipients" => json_decode('[
				{
						"Email": "passenger@mailjet.com"
				}
		]', true),
	"Mj-EventPayLoad" => "Eticket,1234,row,15,seat,B"
);
$result = $mj->send($params);
if ($mj->_response_code == 201){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
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

``` php
<?php
// This calls sends an email to the given recipient.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "POST",
	"FromEmail" => "pilot@mailjet.com",
	"FromName" => "Mailjet's Pilot",
	"Sender" => "pilot@mailjet.com",
	"Recipient" => json_decode('{
				"Email": "passenger@mailjet.com",
				"Name": "Passenger",
				"Vars": {
						"name": "Yann Solo",
						"var2": "String value 2",
						"varN": "String value N"
				}
		}', true),
	"Subject" => "Your email flight plan!",
	"Text-part" => "Dear passenger [[var:name]], welcome to Mailjet! May the delivery force be with you! Today: [[var:perk]]!",
	"Html-part" => "<html>Dear passenger [[var:name]], welcome to Mailjet!</br>May the delivery force be with you! Today: [[var:perk]]!</html>",
	"Mj-prio" => "2",
	"Mj-campaign" => "Email_Flight-Plan 1",
	"Mj-deduplicatecampaign" => "true OR y OR 1 OR NOTHING",
	"Mj-trackopen" => "0 OR 1",
	"Mj-trackclick" => "0 OR 1",
	"Mj-CustomID" => "Trackable_email_1",
	"Mj-EventPayload" => "",
	"Headers" => "",
	"Vars" => json_decode('{
				"perk": "free Millenium Falcon",
				"globalVar": "String value"
		}', true),
	"Recipients" => json_decode('[
				{
						"Email": "y.solo@mailjet.com",
						"Name": "Passenger",
						"Vars": {
								"name": "Yann Solo",
								"var2": "String value 2",
								"varN": "String value N"
						}
				},
				{
						"Email": "luke@mailjet.com",
						"Name": "Luke",
						"Vars": {
								"name": "Placeholder1",
								"var2": "String value 2",
								"varN": "String value N"
						}
				}
		]', true),
	"Attachments" => "array("1stAttachment" => "@path/to/attachment.*", "@path/to/attachment2.*")",
	"Inline_attachments" => "array("1stInlineAttachment" => "@path/to/inlineAttachment.*", "@path/to/inlineAttachment2.*")"
);
$result = $mj->sendMessage($params);
if ($mj->_response_code == 201){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
<?php
// Delete : Manage an email sender for a single API key. An e-mail address or a complete domain (*) has to be registered and validated before being used to send e-mails. In order to manage a sender available across multiple API keys, see the related MetaSender resource.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "DELETE",
	"ID" => "$ID",
);
$result = $mj->sender($params);
if ($mj->_response_code == 204){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
<?php
// View : Manage an email sender for a single API key. An e-mail address or a complete domain (*) has to be registered and validated before being used to send e-mails. In order to manage a sender available across multiple API keys, see the related MetaSender resource.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "GET",
);
$result = $mj->sender($params);
if ($mj->_response_code == 200){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
<?php
// Create : Manage an email sender for a single API key. An e-mail address or a complete domain (*) has to be registered and validated before being used to send e-mails. In order to manage a sender available across multiple API keys, see the related MetaSender resource.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "POST",
	"Email" => "anothersender@mailjet.com"
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

``` php
<?php
// Modify : Manage an email sender for a single API key. An e-mail address or a complete domain (*) has to be registered and validated before being used to send e-mails. In order to manage a sender available across multiple API keys, see the related MetaSender resource.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "PUT",
	"ID" => "$ID",
	"EmailType" => "",
	"IsDefaultSender" => "false",
	"Name" => ""
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

``` php
<?php
// View : API Key sender email address message/open/click statistical information.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "GET",
);
$result = $mj->senderstatistics($params);
if ($mj->_response_code == 200){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
<?php
// Delete : 
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "DELETE",
	"ID" => "$ID",
);
$result = $mj->template($params);
if ($mj->_response_code == 204){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
<?php
// View : 
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "GET",
);
$result = $mj->template($params);
if ($mj->_response_code == 200){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
<?php
// Create : 
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "POST",
);
$result = $mj->template($params);
if ($mj->_response_code == 201){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
<?php
// Modify : 
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "PUT",
	"ID" => "$ID",
	"Author" => "",
	"Categories" => "",
	"Copyright" => "",
	"Description" => "",
	"EditMode" => "",
	"IsStarred" => "false",
	"Presets" => "",
	"Purposes" => ""
);
$result = $mj->template($params);
if ($mj->_response_code == 201){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
<?php
// View : 
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "VIEW",
	"ID" => "$ID",
);
$result = $mj->templateDetailContent($params);
if ($mj->_response_code == 200){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
<?php
// Create : 
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "POST",
	"ID" => "$ID",
	"Author" => "",
	"Categories" => "",
	"Copyright" => "",
	"Description" => "",
	"EditMode" => "",
	"ID" => "",
	"IsStarred" => "false",
	"Name" => "",
	"OwnerId" => "5",
	"OwnerType" => "",
	"Presets" => "",
	"Previews" => "",
	"Purposes" => ""
);
$result = $mj->templateDetailContent($params);
if ($mj->_response_code == 201){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
<?php
// Delete : 
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "DELETE",
	"ID" => "$ID",
);
$result = $mj->templateDetailpreviews($params);
if ($mj->_response_code == 204){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
<?php
// Create : 
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "POST",
	"ID" => "$ID",
	"Author" => "",
	"Categories" => "",
	"Copyright" => "",
	"Description" => "",
	"EditMode" => "",
	"ID" => "",
	"IsStarred" => "false",
	"Name" => "",
	"OwnerId" => "5",
	"OwnerType" => "",
	"Presets" => "",
	"Previews" => "",
	"Purposes" => ""
);
$result = $mj->templateDetailpreviews($params);
if ($mj->_response_code == 201){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
<?php
// Modify : 
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "PUT",
	"ID" => "$ID",
	"Author" => "",
	"Categories" => "",
	"Copyright" => "",
	"Description" => "",
	"EditMode" => "",
	"IsStarred" => "false",
	"Name" => "",
	"OwnerType" => "",
	"Presets" => "",
	"Purposes" => ""
);
$result = $mj->templateDetailpreviews($params);
if ($mj->_response_code == 201){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
<?php
// Delete : 
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "DELETE",
	"ID" => "$ID",
);
$result = $mj->templateDetailthumbnail($params);
if ($mj->_response_code == 204){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
<?php
// Create : 
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "POST",
	"ID" => "$ID",
	"Author" => "",
	"Categories" => "",
	"Copyright" => "",
	"Description" => "",
	"EditMode" => "",
	"ID" => "",
	"IsStarred" => "false",
	"Name" => "",
	"OwnerId" => "5",
	"OwnerType" => "",
	"Presets" => "",
	"Previews" => "",
	"Purposes" => ""
);
$result = $mj->templateDetailthumbnail($params);
if ($mj->_response_code == 201){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
<?php
// Modify : 
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "PUT",
	"ID" => "$ID",
	"Author" => "",
	"Categories" => "",
	"Copyright" => "",
	"Description" => "",
	"EditMode" => "",
	"IsStarred" => "false",
	"Name" => "",
	"OwnerType" => "",
	"Presets" => "",
	"Purposes" => ""
);
$result = $mj->templateDetailthumbnail($params);
if ($mj->_response_code == 201){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
<?php
// View : 
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "VIEW",
	"ID" => "$ID",
);
$result = $mj->templateDisplaypreview($params);
if ($mj->_response_code == 200){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
<?php
// View : 
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "VIEW",
	"ID" => "$ID",
);
$result = $mj->templateDisplaythumbnail($params);
if ($mj->_response_code == 200){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
<?php
// View : Top links clicked historgram.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "GET",
);
$result = $mj->toplinkclicked($params);
if ($mj->_response_code == 200){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
<?php
// Delete : Triggers for outgoing events.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "DELETE",
	"ID" => "$ID",
);
$result = $mj->trigger($params);
if ($mj->_response_code == 204){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
<?php
// View : Triggers for outgoing events.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "GET",
);
$result = $mj->trigger($params);
if ($mj->_response_code == 200){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
<?php
// Create : Triggers for outgoing events.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "POST",
);
$result = $mj->trigger($params);
if ($mj->_response_code == 201){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
<?php
// Modify : Triggers for outgoing events.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "PUT",
	"ID" => "$ID",
	"AddedTs" => "",
	"APIKey" => "",
	"Details" => "",
	"Event" => "",
	"User" => ""
);
$result = $mj->trigger($params);
if ($mj->_response_code == 201){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
<?php
// View : User account definition for Mailjet.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "GET",
);
$result = $mj->user($params);
if ($mj->_response_code == 200){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
<?php
// Modify : User account definition for Mailjet.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "PUT",
	"ID" => "$ID",
	"ACL" => "",
	"LastIp" => "",
	"LastLoginAt" => "",
	"Locale" => "",
	"Timezone" => "",
	"Username" => "",
	"WarnedRatelimitAt" => ""
);
$result = $mj->user($params);
if ($mj->_response_code == 201){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
<?php
// View : View statistics on User Agents. See total counts or filter per Campaign or Contacts List.API Key message Open/Click statistical data grouped per user agent (browser).
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "GET",
);
$result = $mj->useragentstatistics($params);
if ($mj->_response_code == 200){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
<?php
// Delete : Manage settings for Widgets. Widgets are small registration forms that you may include on your website to ease the process of subscribing to a Contacts List.Mailjet widget definitions.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "DELETE",
	"ID" => "$ID",
);
$result = $mj->widget($params);
if ($mj->_response_code == 204){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
<?php
// View : Manage settings for Widgets. Widgets are small registration forms that you may include on your website to ease the process of subscribing to a Contacts List.Mailjet widget definitions.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "GET",
);
$result = $mj->widget($params);
if ($mj->_response_code == 200){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
<?php
// Create : Manage settings for Widgets. Widgets are small registration forms that you may include on your website to ease the process of subscribing to a Contacts List.Mailjet widget definitions.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "POST",
	"FromID" => "",
	"ListID" => "",
	"Locale" => ""
);
$result = $mj->widget($params);
if ($mj->_response_code == 201){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
<?php
// Modify : Manage settings for Widgets. Widgets are small registration forms that you may include on your website to ease the process of subscribing to a Contacts List.Mailjet widget definitions.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "PUT",
	"ID" => "$ID",
	"CreatedAt" => "",
	"FromID" => "",
	"IsActive" => "false",
	"ListID" => "",
	"Locale" => "",
	"Name" => "",
	"Replyto" => "",
	"Sendername" => "",
	"Subject" => "",
	"Template" => ""
);
$result = $mj->widget($params);
if ($mj->_response_code == 201){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
<?php
// Delete : Specifics settings for a given Mailjet Widget. See Widget.Mailjet widget settings.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "DELETE",
	"ID" => "$ID",
);
$result = $mj->widgetcustomvalue($params);
if ($mj->_response_code == 204){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
<?php
// View : Specifics settings for a given Mailjet Widget. See Widget.Mailjet widget settings.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "GET",
);
$result = $mj->widgetcustomvalue($params);
if ($mj->_response_code == 200){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
<?php
// Create : Specifics settings for a given Mailjet Widget. See Widget.Mailjet widget settings.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "POST",
	"Name" => "",
	"WidgetID" => ""
);
$result = $mj->widgetcustomvalue($params);
if ($mj->_response_code == 201){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

``` php
<?php
// Modify : Specifics settings for a given Mailjet Widget. See Widget.Mailjet widget settings.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "PUT",
	"ID" => "$ID",
	"APIKeyID" => "",
	"Display" => "false",
	"Value" => ""
);
$result = $mj->widgetcustomvalue($params);
if ($mj->_response_code == 201){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>

```

