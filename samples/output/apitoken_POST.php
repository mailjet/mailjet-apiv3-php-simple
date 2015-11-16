php
<?php
// Create : Access token for API, used to give access to an API Key in conjunction with our IFrame API.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "POST",
	"AllowedAccess" => "",
	"APIKeyID" => "",
	"TokenType" => ""
);
$result = $mj->apitoken($params);
if ($mj->_response_code == 201){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>
