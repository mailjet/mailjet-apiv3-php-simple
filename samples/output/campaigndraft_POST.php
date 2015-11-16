php
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
