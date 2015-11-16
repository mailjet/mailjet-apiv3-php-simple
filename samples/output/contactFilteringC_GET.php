php
<?php
// View : List of contacts with Limit and Offset, retrieves a list of 150 contacts starting with the 25000th contact
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "GET",
	"Limit" => "150",
	"Offset" => "25000"
);
$result = $mj->contact($params);
if ($mj->_response_code == 200){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>
