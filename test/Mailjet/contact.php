
<?php

  require(__DIR__ . '/../../src/Mailjet/php-mailjet-v3-simple.class.php');

  class ContactsTest extends PHPUnit_Framework_TestCase
  {
    public function __construct()
    {
      $this->mj = new Mailjet(getenv('MJ_APIKEY_PUBLIC'), getenv('MJ_APIKEY_PRIVATE'));
      $this->LISTID = 34;
    }

    public function getCallUrl()
    {
        return $this->mj->call_url;
    }

    public function getPayload()
    {
      return $this->mj->_request_post;
    }

    public function getStatus()
    {
      return $this->mj->_response_code;
    }

    public function testListContacts()
    {
        $this->mj->contact();
        $this->assertEquals(200, $this->getStatus());
    }

    public function testPostSender()
    {
      $this->mj->sender(array("method" => "POST", "email" => "gbadi@mailjet.com"));
      $this->assertEquals("https://api.mailjet.com/v3/REST/sender", $this->getCallUrl());
      $this->assertEquals(array("email" => "gbadi@mailjet.com"), $this->getPayload());
    }

    public function testGetSender()
    {
      $this->mj->sender();
      $this->assertEquals("https://api.mailjet.com/v3/REST/sender", $this->getCallUrl());
    }

    public function testContactID()
    {
      $this->mj->contact(array("method" => "GET", "id" => 2));
      $this->assertEquals("https://api.mailjet.com/v3/REST/contact?id=2", $this->getCallUrl());
      // TODO: lowercase id doesnt work
      $this->mj->contact(array("method" => "VIEW", "ID" => 2));
      $this->assertEquals("https://api.mailjet.com/v3/REST/contact/2", $this->getCallUrl());
    }

    public function testDataCSV()
    {
      $params = array(
        "method" => "POST",
        "ID" => $this->LISTID,
        "csv_content" => "gbadi@mailjet.com,guillaume"
      );

      $this->mj->uploadCSVContactslistData($params);
      $this->assertEquals(strtolower($this->getCallUrl()), "https://api.mailjet.com/v3/data/contactslist/".$this->LISTID."/csvdata/text:plain");
    }
  }
?>
