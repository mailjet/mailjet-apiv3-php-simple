php
<?php
// Modify : AX testing object
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "PUT",
	"ID" => "$ID",
	"ContactListID" => "",
	"CreatedAt" => "",
	"Deleted" => "false",
	"Mode" => "automatic",
	"Name" => "",
	"Percentage" => "",
	"RemainderAt" => "",
	"SegmentationID" => "",
	"Starred" => "false",
	"StartAt" => "",
	"Status" => "",
	"StatusString" => "",
	"WinnerClickRate" => "",
	"WinnerID" => "",
	"WinnerMethod" => "OpenRate",
	"WinnerOpenRate" => "",
	"WinnerSpamRate" => "",
	"WinnerUnsubRate" => ""
);
$result = $mj->axtesting($params);
if ($mj->_response_code == 201){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>
