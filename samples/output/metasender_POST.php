php
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
