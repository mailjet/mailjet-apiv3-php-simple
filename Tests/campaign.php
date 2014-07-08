<?php
	function listContacts()
	{
    $mj = new Mailjet($_ENV['API_KEY'], $_ENV['API_SECRET_KEY']);
    print_r($mj->contact());
	}
	assert_options(ASSERT_ACTIVE, 1);
	assert(http_response_code(), 200);
?>
