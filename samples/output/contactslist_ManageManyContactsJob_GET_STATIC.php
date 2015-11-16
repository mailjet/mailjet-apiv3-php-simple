php
<?php
// View: Job information
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
    "method" => "VIEW",
    "unique" => "$ID",
    "JobID" => "$JOBID",
);
$result = $mj->contactslistManageManyContacts($params);
if ($mj->_response_code == 200){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>
