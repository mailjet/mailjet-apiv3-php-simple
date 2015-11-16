php
<?php
// View: CSV upload
$CSVContent = file_get_contents('test.csv');
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
    "method" => "POST",
    "ID" => $listID,
    "csv_content" => $CSVContent
);
$result = $mj->uploadCSVContactslistData($params);
if ($mj->_response_code == 200){
   echo "success - uploaded CSV file";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>
