<?php
  class ContactsTest extends PHPUnit_Framework_TestCase
  {
    public function testListContacts()
    {
        $mj = new Mailjet(getenv('API_KEY'), getenv('API_SECRET_KEY'));

        $mj->contact();

        $this->assertEquals(200, $mj->_response_code);
    }

    public function testCreateContactslist()
    {
        $mj = new Mailjet(getenv('API_KEY'), getenv('API_SECRET_KEY'));

        $params = array(
          "method" => "POST",
          "Address" => "testcreatecontactslist@gmail.com",
          "Name" => "testCreateContactslist"
        );
        $mj->contactslist($params);

        $this->assertEquals(201, $mj->_response_code);
    }

    public function getLastContactslist()
    {
        $mj = new Mailjet(getenv('API_KEY'), getenv('API_SECRET_KEY'));

        $mj->contactslist();

        $this->assertEquals(200, $mj->_response_code);

        return $mj->_response->Data[count($mj->_response->Data) - 1]->ID;
    }

    public function deleteLastContactslist()
    {
        $mj = new Mailjet(getenv('API_KEY'), getenv('API_SECRET_KEY'));

        $lastid = getLastContactslist();

        $params = array(
          "method" => "DELETE",
          "ID" => $lastid
        );
        $mj->contactslist();

        $this->assertEquals(200, $mj->_response_code);
    }
  }
?>
