php
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
