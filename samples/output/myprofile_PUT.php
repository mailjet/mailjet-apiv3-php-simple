php
<?php
// Modify : Manage user profile data such as address, payment information etc.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "PUT",
	"ID" => "$ID",
	"AddressCity" => "",
	"AddressCountry" => "",
	"AddressPostalCode" => "",
	"AddressState" => "",
	"AddressStreet" => "",
	"BillingEmail" => "",
	"BirthdayAt" => "",
	"CompanyName" => "",
	"CompanyNumOfEmployees" => "",
	"ContactPhone" => "",
	"EstimatedVolume" => "",
	"Features" => "",
	"Firstname" => "",
	"Industry" => "",
	"JobTitle" => "",
	"Lastname" => "",
	"User" => "",
	"VATNumber" => "",
	"Website" => ""
);
$result = $mj->myprofile($params);
if ($mj->_response_code == 201){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>
