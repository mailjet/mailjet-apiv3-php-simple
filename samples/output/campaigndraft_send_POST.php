php
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
