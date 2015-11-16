php
<?php
// Create : This resource can be used to add historical data to contact.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "POST",
	"ContactID" => "$CONTACT_ID",
	"Data" => "10",
	"Name" => "Purchase"
);
$result = $mj->contacthistorydata($params);
if ($mj->_response_code == 201){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>
