<?php
/*
 *  This script will add the contacts contained in the sample.csv file
 *  to the contactslist which ID is defined in $listID.
 *
 */

include("Client.php");

use Mailjet\API\Client as Mailjet;

function uploadCSV ($mj, $listID, $CSVContent)
{
	$uploadParams = array(
	"method" => "POST",
		"ID" => $listID,
		"csv_content" => $CSVContent
	);

	$csvUpload = $mj->uploadCSVContactslistData($uploadParams);

	if ($mj->getResponseCode() == 200)
	{
		echo "success - uploaded CSV file ";
		return $csvUpload->ID;
	}
	else
		exit("error - Couldn't upload the data - code ".$mj->getResponseCode());
}

function assignContactsToList ($mj, $listID, $uploadID)
{
	$assignParams = array(
		"method" => "POST",
		"ContactsListID" => $listID,
		"DataID" => $uploadID,
		"Method" => "addnoforce"
	);

	$csvAssign = $mj->csvimport($assignParams);

	if ($mj->getResponseCode() == 201)
	{
		echo "success - CSV data ".$uploadID." assigned to contactslist ".$listID;
		return $csvAssign->Data[0]->ID;
	}
	else
		exit("error - Couldn't assign contacts to list - code ".$mj->getResponseCode());
}

function monitor ($mj, $jobID)
{
	$monitorParmas = array (
		"method" => "VIEW",
		"ID" => $jobID
	);

	$res = $mj->batchjob($monitorParmas);

	if ($mj->getResponseCode() == 200)
	{
		echo "job ".$res->Data[0]->Status."\n";
		return $res->Data[0]->Status;
	}
	else
		exit("error - Couldn't monitor the job - code ".$mj->getResponseCode()."\n");
}

$mj = new Mailjet('MJ_APIKEY_PUBLIC', 'MJ_APIKEY_PRIVATE');

/*
 *  Don't forget to change the $listID variable to suit your particular setup.
 *
 */
$listID = 45;
$CSVContent = file_get_contents('sample.csv');

$uploadID = uploadCSV($mj, $listID, $CSVContent);

$jobID = assignContactsToList($mj, $listID, $uploadID);

$status = monitor($mj, $jobID);

?>