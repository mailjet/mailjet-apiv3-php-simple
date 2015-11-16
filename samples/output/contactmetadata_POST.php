php
<?php
// Create : Definition of available extra data items for contacts.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "POST",
	"Datatype" => "str",
	"Name" => "Age",
	"NameSpace" => "static"
);
$result = $mj->contactmetadata($params);
if ($mj->_response_code == 201){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>
