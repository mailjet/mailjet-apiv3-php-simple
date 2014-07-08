<?php
  class ContactsTest extends PHPUnit_Framework_TestCase
  {
    public function testListContacts()
    {
        $mj = new Mailjet($_ENV['API_KEY'], $_ENV['API_SECRET_KEY']);
        
        $return = $mj->contact();
        
        $this->assertEquals($return, 200);
    }
    
    public function testCreateContact()
    {
        $mj = new Mailjet($_ENV['API_KEY'], $_ENV['API_SECRET_KEY']);
        
        $params = array(
          "method" => "POST",
          "Email" => "test@gmail.com"
        );
        $return = $mj->contact($params);
        
        $this->assertEquals($return, 200);
    }
  }
?>
