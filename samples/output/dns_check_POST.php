php
<?php
// Create : Sender Domain properties.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "POST",
	"ID" => "$ID",
	"DKIMRecordName" => "",
	"DKIMRecordValue" => "",
	"DKIMStatus" => "",
	"Domain" => "",
	"ID" => "",
	"IsCheckInProgress" => "false",
	"LastCheckAt" => "",
	"OwnerShipToken" => "",
	"SPFRecordValue" => "",
	"SPFStatus" => ""
);
$result = $mj->dnsCheck($params);
if ($mj->_response_code == 201){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>
