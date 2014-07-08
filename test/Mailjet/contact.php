<?php
  class ContactsTest extends PHPUnit_Framework_TestCase
  {
    public function testListContacts()
    {
        $mj = new Mailjet("API_KEY", "API_SECRET_KEY");
        
        $return = $mj->contact();
        
        $this->assertEquals(200, $return);
    }
    
    public function testCreateContact()
    {
        $mj = new Mailjet("API_KEY", "API_SECRET_KEY");
        
        $params = array(
          "method" => "POST",
          "Email" => "test@gmail.com"
        );
        $return = $mj->contact($params);
        
        $this->assertEquals(200, $return);
    }
  }
?>
