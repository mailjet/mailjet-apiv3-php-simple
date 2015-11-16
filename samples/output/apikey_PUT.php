php
<?php
// Modify : Manage your Mailjet API Keys. API keys are used as credentials to access the API and SMTP server.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "PUT",
	"ID" => "$ID",
	"ACL" => "",
	"IsActive" => "false",
	"Name" => ""
);
$result = $mj->apikey($params);
if ($mj->_response_code == 201){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>
