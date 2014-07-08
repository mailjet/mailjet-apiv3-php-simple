<?php
  class ContactsTest extends PHPUnit_Framework_TestCase
  {
    public function testListContacts()
    {
        $mj = new Mailjet("API_KEY", "API_SECRET_KEY");
        print_r($mj->contact());
        $this->assertEquals(http_response_code(), 200);
    }
  }
?>
