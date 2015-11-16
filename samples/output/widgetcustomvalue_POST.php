php
<?php
// Create : Specifics settings for a given Mailjet Widget. See Widget.Mailjet widget settings.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "POST",
	"Name" => "",
	"WidgetID" => ""
);
$result = $mj->widgetcustomvalue($params);
if ($mj->_response_code == 201){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>
