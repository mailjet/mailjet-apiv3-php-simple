<?php

include("./src/Mailjet/php-mailjet-v3-simple.class.php");

function sendEmailWithCustomID()
{
    $mj = new Mailjet(getenv('MJ_APIKEY_PUBLIC'), getenv('MJ_APIKEY_PRIVATE'));

    $params = array(
        "method" => "POST",
        "from" => "gbadi@student.42.fr",
        "to" => "gbadi@mailjet.com",
        "subject" => "Hello World!",
        "text" => "Greetings from Mailjet.",
        "mj-customid" => "helloworld+random"
    );

    $result = $mj->sendEmail($params);


    if ($mj->_response_code == 200)
       echo "success - email sent";
    else
       echo "error - ".$mj->_response_code;
	var_dump($result);
	sleep(2);
	$result = $mj->messagesentstatistics(array(
		"CustomId" => "helloworld+random"
	));

	var_dump($result);
    return $result;
}

sendEmailWithCustomID();

?>
