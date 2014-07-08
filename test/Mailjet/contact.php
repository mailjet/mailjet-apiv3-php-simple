<?php
  class ContactsTest extends PHPUnit_Framework_TestCase
  {
    public function testListContacts()
    {
        $mj = new Mailjet($API_KEY, $API_SECRET_KEY);
        
        $mj->contact();
        
        $this->assertEquals(200, $mj->_response_code);
    }
    
    public function testCreateContact()
    {
        $mj = new Mailjet($API_KEY, $API_SECRET_KEY);
        
        $params = array(
          "method" => "POST",
          "Email" => "test@gmail.com"
        );
        $mj->contact($params);
        
        $this->assertEquals(200, $mj->_response_code);
    }
  }
?>
