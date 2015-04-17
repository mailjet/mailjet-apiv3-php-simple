<?php

use Mailjet\Mailjet;

  class ContactsTest extends PHPUnit_Framework_TestCase
  {
    public function testListContacts()
    {
        $mj = new Mailjet(getenv('API_KEY'), getenv('API_SECRET_KEY'));

        $mj->contact();

        $this->assertEquals(200, $mj->getResponseCode());
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

        $this->assertEquals(201, $mj->getResponseCode());
    }

    public function testDeleteLastContactslist()
    {
        $mj = new Mailjet(getenv('API_KEY'), getenv('API_SECRET_KEY'));

        $mj->contactslist();

        $lastid = $mj->_response->Data[count($mj->_response->Data) - 1]->ID;

        $params = array(
          "method" => "DELETE",
          "ID" => $lastid
        );
        $mj->contactslist($params);

        $this->assertEquals(204, $mj->getResponseCode());
    }
  }