php
<?php
// Create : Batch jobs running on the Mailjet infrastructure. Currently not documented.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "POST",
	"Data" => "",
	"JobType" => ""
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
