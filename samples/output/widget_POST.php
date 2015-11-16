php
<?php
// Create : Manage settings for Widgets. Widgets are small registration forms that you may include on your website to ease the process of subscribing to a Contacts List.Mailjet widget definitions.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "POST",
	"FromID" => "",
	"ListID" => "",
	"Locale" => ""
);
$result = $mj->widget($params);
if ($mj->_response_code == 201){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>
