<?php
  class ContactsTest extends PHPUnit_Framework_TestCase
  {
    public function testListContacts()
    {
        $mj = new Mailjet(getenv('API_KEY'), getenv('API_SECRET_KEY'));
        
        $mj->contact();
        
        $this->assertEquals(200, $mj->_response_code);
    }
    
    public function testCreateContact()
    {
        $mj = new Mailjet(getenv('API_KEY'), getenv('API_SECRET_KEY'));
        
        $params = array(
          "method" => "POST",
          "Email" => "test@gmail.com"
        );
        $mj->contact($params);
        
        $this->assertEquals(201, $mj->_response_code);
    }
  }
?>
