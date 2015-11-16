php
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
