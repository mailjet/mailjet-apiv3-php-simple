php
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
