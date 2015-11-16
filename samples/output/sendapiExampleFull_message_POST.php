php
<?php
// This calls sends an email to the given recipient.
$mj = new Mailjet($MJ_APIKEY_PUBLIC,$MJ_APIKEY_PRIVATE);
$params = array(
	"method" => "POST",
	"FromEmail" => "pilot@mailjet.com",
	"FromName" => "Mailjet's Pilot",
	"Sender" => "pilot@mailjet.com",
	"Subject" => "Your email flight plan!",
	"Text-part" => "Dear passenger [[var:name]], welcome to Mailjet! May the delivery force be with you! Today: [[var:perk]]!",
	"Html-part" => "<h3>Dear passenger [[var:name]], welcome to Mailjet!</h3><br />May the delivery force be with you! Today: [[var:perk]]!</html>",
	"Mj-prio" => "2",
	"Mj-campaign" => "Email_Flight-Plan 1",
	"Mj-deduplicatecampaign" => "true OR y OR 1 OR NOTHING",
	"Mj-trackopen" => "0 OR 1",
	"Mj-trackclick" => "0 OR 1",
	"Mj-CustomID" => "Trackable_email_1",
	"Mj-EventPayload" => "",
	"Headers" => json_decode('{
				"X-My-Header": "my own value",
				"X-My-Header-2": "my own value 2"
		}', true),
	"Vars" => json_decode('{
				"perk": "free Millenium Falcon",
				"globalVar": "String value"
		}', true),
	"Recipients" => json_decode('[
				{
						"Email": "y.solo@mailjet.com",
						"Name": "Passenger",
						"Vars": {
								"name": "Yann Solo",
								"var2": "String value 2",
								"varN": "String value N"
						}
				},
				{
						"Email": "luke@mailjet.com",
						"Name": "Luke",
						"Vars": {
								"name": "Placeholder1",
								"var2": "String value 2",
								"varN": "String value N"
						}
				}
		]', true),
	"Attachments" => json_decode('[
				{
						"Content-type": "text/plain",
						"Filename": "test.txt",
						"content": "VGhpcyBpcyB5b3VyIGF0dGFjaGVkIGZpbGUhISEK"
				}
		]', true),
	"Inline_attachments" => json_decode('[
				{
						"Content-type": "text/plain",
						"Filename": "test.txt",
						"content": "VGhpcyBpcyB5b3VyIGF0dGFjaGVkIGZpbGUhISEK"
				}
		]', true)
);
$result = $mj->sendMessage($params);
if ($mj->_response_code == 201){
   echo "success";
   var_dump($result);
} else {
   echo "error - ".$mj->_response_code;
   var_dump($mj->_response);
}
?>
