php
<?php
// Create : 
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "POST",
	"ID" => "$ID",
	"Author" => "",
	"Categories" => "",
	"Copyright" => "",
	"Description" => "",
	"EditMode" => "",
	"ID" => "",
	"IsStarred" => "false",
	"Name" => "",
	"OwnerId" => "5",
	"OwnerType" => "",
	"Presets" => "",
	"Previews" => "",
	"Purposes" => ""
);
$result = $mj->templateDetailpreviews($params);
if ($mj->_response_code == 201){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>
