php
<?php
// Modify : Batch jobs running on the Mailjet infrastructure. Currently not documented.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "PUT",
	"ID" => "$ID",
	"AliveAt" => "",
	"APIKeyID" => "",
	"Blocksize" => "",
	"Count" => "1",
	"Current" => "",
	"Data" => "",
	"Errcount" => "0",
	"ErrTreshold" => "",
	"JobEnd" => "",
	"JobStart" => "",
	"JobType" => "",
	"Method" => "",
	"RefId" => "",
	"RequestAt" => "",
	"Status" => "Completed",
	"Throttle" => ""
);
$result = $mj->batchjob($params);
if ($mj->_response_code == 201){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>
