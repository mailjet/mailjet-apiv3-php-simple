php
<?php
// Create : A filter expressions for use in newsletters.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "POST",
	"Description" => "Only contacts aged 40",
	"Expression" => "age=40",
	"Name" => "40 year olds"
);
$result = $mj->contactfilter($params);
if ($mj->_response_code == 201){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>
