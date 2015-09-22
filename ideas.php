<?php

class Mailjet {

  const WRAPPER_VERSION = '';

  const DEBUG = true;

  var $apikey = null;
  var $apisecret = null;

  public function __construct ($apikey = null, $apisecret = null, $preprod = false) {
    $this->version = 'v3';
    $this->secure = true;
    $this->boolean_response = true;
    $this->apikey = $apikey;
    $this->apisecret = $apisecret;
    $this->apiUrl = $this->getApiUrl($preprod);
  }

  public function __call ($resource, $args = array()) {
    $args = (sizeof($args) > 0) ? $args[0] : array();

    $this->filters = isset($args['Filters']) ? $args['Filters'] : array();
    $this->params = isset($args['Data']) ? $args['Data'] : array();

    $id = isset($args['ID']) ? $args['ID'] : '';
    $jobid = isset($args['JOBID']) ? $args['JOBID'] : '';
    $request = isset($args['method']) ? $args['method'] : 'GET';
    $unique = isset($args['unique']) ? $args['unique'] : '';

    $resource = explode('_', strtolower($resource));
    $action = $resource[1] ? $resource[1] : '';
    $resource = $resource[0];

    $result = $this->sendRequest($resource, $action, $request, $id == '' ? $unique : $id, $jobid);

    if ($this->boolean_response)
      return $result == true ? $this->_response : false;
    return $this->_response;
  }

  private function getApiUrl ($preprod)
  {
    $h = $this->secure ? 'https' : 'http';
    if ($preprod)
      return $h . '://api.preprod.mailjet.com/' . $this->version . '0';
    return $h . '://api.mailjet.com/' . $this->version;
  }

  private function curlInit ($action) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $this->url);
    // curl_setopt($ch, CURLOPT_URL, "http://requestb.in/1936sgy1");
    curl_setopt($ch, CURLOPT_USERAGENT, 'mailjet-api-v3-php-simple/' . $this->wrapperVersion . '; PHP v. ' . phpversion().'; Raw_error: '.$this->boolean_response);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
    curl_setopt($ch, CURLOPT_USERPWD, $this->apikey . ':' . $this->apisecret);

    switch ($this->_request) {
      case 'DELETE':
        curl_setopt($curl_handle, CURLOPT_CUSTOMREQUEST, 'DELETE');
        break ;

      case 'PUT':
      case 'POST':
        $contentType = 'Content-Type: ';

        switch ($action) {
          case 'csvdata':
            $contentType .= 'text:plain';
            break ;
          case 'csverror':
            $contentType .= 'text:csv';
            break ;
          default:
            $contentType .= 'application/json';
            break ;
          }

        curl_setopt($ch, CURLOPT_POST, sizeof($this->params));
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($this->params));
        curl_setopt($ch, CURLOPT_HTTPHEADER, array($contentType));
        $this->resource == 'PUT' && curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
        break ;

      default:
        break ;
    }

    return $ch;
  }

  public function buildURL ($action, $id, $jobid) {
    $path = null;

    switch ($this->_resource) {
      case 'send':
        $path = '/';
        break ;

      case 'contactslist':
        if ($action == 'csvdata')
          $path = '/DATA';

      case 'batchjob':
        if ($action == 'csverror')
          $path = '/DATA';
        break ;

      default:
        $path = '/REST';
    }

    $addings = join('/', array_filter(array(
      $path,
      $this->_resource,
      $id,
      $action,
      $jobid
    )));

    $this->url = $this->apiUrl.$addings;
  }

  public function sendRequest ($resource, $action = '', $request, $id = '', $jobid = '') {
    $this->_resource = $resource;
    $this->_request = $request;

    $this->buildURL($action, $id, $jobid);

    if (count($this->filters)) {
      $this->url = join('/?', array(
        $this->url,
        http_build_query($this->filters)
      ));
    }

    $ch = $this->curlInit($action);

    $res = curl_exec($ch);
    $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    var_dump($res, $code, $this->url);
  }
}

$apikey = getenv('MJ_APIKEY_PUBLIC');
$apisecret = getenv('MJ_APIKEY_PRIVATE');

$mj = new Mailjet($apikey, $apisecret);

$mj->send(array(
  "method" => "POST",
  "Data" => array(
    "FromEmail" => "gbadi@student.42.fr",
    "FromName" => "guillaume badi",
    "Subject" => "Hello PHP",
    "Text-part" => "Hello There !",
    "Recipients" => array(
      array("Email" => "gbadi@mailjet.com")
    )
  )
));

?>
