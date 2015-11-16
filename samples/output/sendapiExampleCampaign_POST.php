php
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
