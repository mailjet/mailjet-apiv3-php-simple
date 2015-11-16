php
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
