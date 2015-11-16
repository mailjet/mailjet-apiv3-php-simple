php
<?php
// Modify : A wrapper for the CSV importer
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "PUT",
	"ID" => "$ID",
	"ContactsListID" => "",
	"DataID" => "",
	"ErrTreshold" => "",
	"ImportOptions" => "",
	"Method" => "",
	"Status" => "Upload"
);
$result = $mj->csvimport($params);
if ($mj->_response_code == 201){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>
