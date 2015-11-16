php
<?php
// Modify : Manages a Newsletter Template Properties.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "PUT",
	"ID" => "$ID",
	"CategoryID" => "",
	"CreatedAt" => "",
	"Footer" => "",
	"FooterAddress" => "",
	"FooterWYSIWYGType" => "",
	"HeaderFilename" => "",
	"HeaderLink" => "",
	"HeaderText" => "",
	"HeaderUrl" => "",
	"Locale" => "",
	"Name" => "",
	"Permalink" => "",
	"PermalinkWYSIWYGType" => "",
	"SourceNewsLetterID" => "",
	"Status" => ""
);
$result = $mj->newslettertemplate($params);
if ($mj->_response_code == 201){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>
