php
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