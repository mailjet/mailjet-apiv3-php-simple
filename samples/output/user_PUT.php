php
<?php
// Modify : User account definition for Mailjet.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "PUT",
	"ID" => "$ID",
	"ACL" => "",
	"LastIp" => "",
	"LastLoginAt" => "",
	"Locale" => "",
	"Timezone" => "",
	"Username" => "",
	"WarnedRatelimitAt" => ""
);
$result = $mj->user($params);
if ($mj->_response_code == 201){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>
