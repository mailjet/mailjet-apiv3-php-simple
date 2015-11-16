php
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
