<?php

/**
 * Mailjet Public API
 *
 * @package     API v0.3
 * @author      Mailjet
 * @link        http://api.mailjet.com/
 *
 * For PHP v >= 5.3
 *
 */

class Mailjet
{
    # Wrapper version, changed for each release
    const WRAPPER_VERSION = '1.1.0';

    # Mailjet API version
    var $version = 'v3';

    # Connect with https protocol
    var $secure = true;

    # Mode debug ? 0 : none; 1 : errors only; 2 : all
    var $debug = 0;

    # Edit with your Mailjet API keys (you can find them here : https://app.mailjet.com/account/api_keys)
    var $apiKey = '';
    var $secretKey = '';

    // Ressources arrays

    /*
     *  Newsletter resources
     */
    private static $_newsletterResources = array(
        "newsletterDetailContent",
        "newsletterSend",
        "newsletterSchedule",
        "newsletterTest",
        "newsletterStatus"
    );

    /*
     * Contact resources
     *  "contactManageManyContacts" not in as it is a special case.
     */
    private static $_contactResources = array(
        "contactManageContactsLists",
        "contactGetContactsLists"
    );

    /*
     *  Contactslist resources
     */
    private static $_contactslistResources = array (
        "contactslistManageContact",
        "contactslistManageManyContacts"
    );

    /*
     *  Template resources
     */
    private static $_templateResources = array (
        "templateDetailContent"
    );

    /*
     *  dns resources
     */
    private static $_dnsResources = array (
        "dnsCheck"
    );

    # Constructor function
    public function __construct($apiKey = false, $secretKey = false, $preprod = false)
    {
        if ($apiKey) {
            $this->apiKey = $apiKey;
        }
        if ($secretKey) {
            $this->secretKey = $secretKey;
        }
        $this->apiUrl = $this->getApiUrl($preprod);
        $this->wrapperVersion = $this->readWrapperVersion();
    }

    private function getApiUrl ($preprod)
    {
        if ($preprod)
        {
            return (($this->secure) ? 'https' : 'http') . '://api.preprod.mailjet.com/' . $this->version . '0';
        }
        else
        {
            return (($this->secure) ? 'https' : 'http') . '://api.mailjet.com/' . $this->version;
        }
    }

    public function curl_setopt_custom_postfields($curl_handle, $postfields, $headers = null) {
        $algos = hash_algos();
        $hashAlgo = null;

        foreach (array('sha1', 'md5') as $preferred) {
            if (in_array($preferred, $algos)) {
                $hashAlgo = $preferred;
                break;
            }
        }

        if ($hashAlgo === null) {
            list($hashAlgo) = $algos;
        }

        $boundary =
            '----------------------------' .
            substr(hash($hashAlgo, 'cURL-php-multiple-value-same-key-support' . microtime()), 0, 12);

        $body = array();
        $crlf = "\r\n";

        foreach ($postfields as $key => $value) {
            if (is_array($value)) {
                foreach ($value as $filename => $path) {
                    // attachment
                    if (strpos($path, '@') === 0) {
                        preg_match('/^@(.*?)$/', $path, $matches);
                        list($dummy, $path) = $matches;

                        if (is_int($filename)) {
                            $filename = basename($path);
                        }

                        $body[] = '--' . $boundary;
                        $body[] = 'Content-Disposition: form-data; name="' . $key . '"; filename="' . $filename . '"';
                        $body[] = 'Content-Type: application/octet-stream';
                        $body[] = '';
                        $body[] = file_get_contents($path);
                    }
                    // Array of recipients
                    else if ('to' == $key || 'cc' == $key || 'bcc' == $key) {
                        $body[] = '--' . $boundary;
                        $body[] = 'Content-Disposition: form-data; name="' . $key . '"';
                        $body[] = '';
                        $body[] = trim($path);
                    }
                }
            }
            else {
                $body[] = '--' . $boundary;
                $body[] = 'Content-Disposition: form-data; name="' . $key . '"';
                $body[] = '';
                $body[] = $value;
            }
        }

        $body[] = '--' . $boundary . '--';
        $body[] = '';
        $contentType = 'multipart/form-data; boundary=' . $boundary;
        $content = join($crlf, $body);
        $contentLength = strlen($content);

        curl_setopt($curl_handle, CURLOPT_HTTPHEADER, array(
            'Content-Length: ' . $contentLength,
            'Expect: 100-continue',
            'Content-Type: ' . $contentType,
        ));

        curl_setopt($curl_handle, CURLOPT_POSTFIELDS, $content);
    }

    public function __call($resource, $args)
    {
        # Parameters array
        $params  = (sizeof($args) > 0) ? $args[0] : array();

        # Request method, GET by default
        if (isset($params["method"]))
        {
            $request = strtoupper($params["method"]);
            unset($params['method']);
        }
        else
        {
            $request = 'GET';
        }

        # Request ID, empty by default
        $id = isset($params["ID"]) ? $params["ID"] : '';

        /*
            Using SendAPI without the "to" parameter but with "cc" AND/OR "bcc"
            Our API needs the "to" parameter filled to send email
            We give it a default value with an email @example.org. See http://en.wikipedia.org/wiki/Example.com
        */
        if ($resource == "sendEmail" && (empty($params["to"]) && (!empty($params["cc"]) || !empty($params["bcc"])))) {
            $params["to"] = "mailjet@example.org";
        }

        if ($id == '')
        {
            # Request Unique field, empty by default
            $unique  = isset($params["unique"]) ? $params["unique"] : '';
            unset($params["unique"]);
            # Make request
            $result = $this->sendRequest($resource, $params, $request, $unique);
        }
        else
        {
            # Make request
            $result = $this->sendRequest($resource, $params, $request, $id);
        }

        # Return result
        $return = ($result === true) ? $this->_response : false;
        if ($this->debug == 2 || ($this->debug == 1 && $return == false)) {
            $this->debug();
        }

        return $return;
    }

    /**
     *
     *  @param string   $method         REST or DATA
     *  @param string   $resourceBase   Base resource
     *  @param int      $resourceID     Base resource ID
     *  @param string   $action         Action on resource
     *
     *  @return string Returns the call's url.
     */
    private function makeUrl($method, $resourceBase, $resourceID, $action)
    {
        return $this->apiUrl.'/'.$method.'/'.$resourceBase.'/'.$resourceID.'/'.strtolower($action);
    }

    /**
     *
     *  @param string   $method         REST or DATA
     *  @param string   $resourceBase   Base resource
     *  @param int      $resourceID     Base resource ID
     *  @param string   $resource       The whole resource, before parsing
     *
     *  @return string Returns the call's url.
     */
    private function makeUrlFromFilter($method, $resourceBase, $resourceID, $resource)
    {
        $matches = array();
        preg_match('/'.$resourceBase.'([a-zA-Z]+)/', $resource, $matches);

        $action = $matches[1];
        return $this->makeUrl($method, $resourceBase, $resourceID, $action);
    }

    public function requestUrlBuilder($resource, $params = array(), $request, $id)
    {
        if ($resource == "sendEmail") {
            $this->call_url = $this->apiUrl."/send/message";
        }
	else if ($resource == "send") {
            $this->call_url = $this->apiUrl."/send";  	//json support for SendAPI
        }
        else if ($resource == "uploadCSVContactslistData") {
          if (!empty($params['_contactslist_id'])) {
            $contactslist_id = $params['_contactslist_id'];
          }
          else if (!empty($params['ID'])) {
            $contactslist_id = $params['ID'];
          }
          $this->call_url = $this->makeUrl('DATA', 'Contactslist', $contactslist_id, 'CSVData/text:plain');     // Was $this->call_url = $this->apiUrl."/DATA/contactslist/". $contactslist_id ."/CSVData/text:plain";
        }
        else if (($resource == "addHTMLbody") || ($resource == "getHTMLbody")) {
            if (!empty($params['_newsletter_id'])) {
                $newsletter_id = $params['_newsletter_id'];
            }
            else if (!empty($params['ID'])) {
                $newsletter_id = $params['ID'];
            }
            $this->call_url = $this->makeUrl('DATA', 'NewsLetter', $newsletter_id, 'HTML/text/html/LAST');
        }
        else if (in_array($resource, self::$_newsletterResources))
        {
            $this->call_url = $this->makeUrlFromFilter('REST', 'newsletter', $params['ID'], $resource);         // Was $this->call_url = $this->apiUrl."/REST/newsletter/". $newsletter_id ."/".strtolower($action);
        }
        else if (in_array($resource, self::$_templateResources))
        {
            $this->call_url = $this->makeUrlFromFilter('REST', 'template', $params['ID'], $resource);
        }
	else if (in_array($resource, self::$_dnsResources))
        {
            $this->call_url = $this->makeUrlFromFilter('REST', 'dns', $params['ID'], $resource);
        }
        else if (in_array($resource, self::$_contactResources))
        {
            $this->call_url = $this->makeUrlFromFilter('REST', 'contact', $params['ID'], $resource);            // Was $this->call_url = $this->apiUrl."/REST/contact/". $contact_id . "/".strtolower($action);
        }
        else if ($resource == "contactManageManyContacts")
        {
            $this->call_url = $this->apiUrl."/REST/contact/managemanycontacts";
        }
        else if (in_array($resource, self::$_contactslistResources))
        {
            $this->call_url = $this->makeUrlFromFilter('REST', 'contactslist', $params['ID'], $resource);       // Was $this->call_url = $this->apiUrl."/REST/contactslist/". $contactslist_id . "/".strtolower($action);
        }
        else {
            $this->call_url = $this->apiUrl . '/REST/' . $resource;
        }

        if ($request == "GET" || $request == "POST") {
            if (count($params) > 0)
            {
                $this->call_url .= '?';

                foreach ($params as $key => $value) {
                    // In a GET request, put an underscore char in front of params to avoid it being treated as a filter
                    $firstChar = substr($key, 0, -(strlen($key) - 1));

                    if ($request == "GET") {
                        $okFirstChar = ($firstChar != "_");
                        $queryStringKey = $key;
                    }
                    else {
                        $okFirstChar = ($firstChar == "_");
                        $queryStringKey = substr($key, 1);
                    }

                    if ($okFirstChar && ($key != "ID"))
                    {
                        $query_string[$queryStringKey] = $queryStringKey . '=' . urlencode($value);
                        $this->call_url .= $query_string[$queryStringKey] . '&';
                    }
                }

                $this->call_url = substr($this->call_url, 0, -1);
            }
        }

        if (($request == "VIEW" || $request == "DELETE" || $request == "PUT") && $resource != "addHTMLbody" && $resource != "uploadCSVContactslistData")
        {
            if ($id != '')
            {
                if ($resource == "contactslistManageManyContacts")
                {
                    $this->call_url .= '/' . $params["JobID"];
                }
                else
                {
                    $this->call_url .= '/' . $id;
                }
            }
        }

        return $this->call_url;
    }

    public function sendRequest($resource = false, $params = array(), $request = "GET", $id = '')
    {
        # Method
        $this->_method  = $resource;
        $this->_request = $request;

        # Build request URL
        $url = $this->requestUrlBuilder($resource, $params, $request, $id);

        // fix bug for sort (ID+DESC), replace %2B in url by +
        $url = preg_replace('#Sort=(.+)%2B(DESC|ASC|)?#sUi', 'Sort=$1+$2', $url);

        # Set up and execute the curl process
        $curl_handle = curl_init();
        curl_setopt($curl_handle, CURLOPT_URL, $url);
        curl_setopt($curl_handle, CURLOPT_USERAGENT, 'mailjet-api-v3-php-simple/' . $this->wrapperVersion . '; PHP v. ' . phpversion());
        curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl_handle, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($curl_handle, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($curl_handle, CURLOPT_USERPWD, $this->apiKey . ':' . $this->secretKey);

        $this->_request_post = false;

        if (($request == 'POST') || ($request == 'PUT')):
            curl_setopt($curl_handle, CURLOPT_POST, 1);

            // Exclude filters from payload. See http://stackoverflow.com/questions/4260086/php-how-to-use-array-filter-to-filter-array-keys
            $paramsFiltered = array_filter(array_keys($params), function($k) {
                return substr($k, 0, 1) != '_';
            });
            $params = array_intersect_key($params, array_flip($paramsFiltered));

            if ($this->debug == 2) {
                var_dump($params);
            }

            if ($resource == "sendEmail") {
                $this->curl_setopt_custom_postfields($curl_handle, $params);
            }
            else if ($resource == "addHTMLbody")
            {
                curl_setopt($curl_handle, CURLOPT_POSTFIELDS, $params['html_content']);
                curl_setopt($curl_handle, CURLOPT_HTTPHEADER, array(
                    'Content-Type: text/html'
                ));
            }
            //
            else if ($resource == "uploadCSVContactslistData")
            {
              curl_setopt($curl_handle, CURLOPT_BINARYTRANSFER, TRUE);
              curl_setopt($curl_handle, CURLOPT_POSTFIELDS, $params['csv_content']);
              curl_setopt($curl_handle, CURLOPT_HTTPHEADER, array(
                'Content-Type: text/plain'
              ));
            }
            //
            else
            {
                if ((in_array($resource, self::$_newsletterResources)) ||
                    ($resource == "contactManageContactsLists") ||
                    ($resource == "contactManageManyContacts") ||
                    (in_array($resource, self::$_contactslistResources)) ||
                    (in_array($resource, self::$_templateResources)) ||
                    (in_array($resource, self::$_dnsResources)))
                {
                    unset($params['ID']);
                }

                $j_e = null;
                if (version_compare(phpversion(), '5.4.0', '<')) {
                    $j_e = str_replace('\\/', '/', json_encode($params));
                } else {
					// 64 => unescaped_slashes
                    $j_e = json_encode($params, 64);
                }

                curl_setopt($curl_handle, CURLOPT_POSTFIELDS, $j_e);
                curl_setopt($curl_handle, CURLOPT_HTTPHEADER, array(
                    'Content-Type: application/json'
                ));
            }
            $this->_request_post = $params;
        endif;

        if ($request == 'DELETE') {
            curl_setopt($curl_handle, CURLOPT_CUSTOMREQUEST, "DELETE");
        }

        if ($request == 'PUT') {
            curl_setopt($curl_handle, CURLOPT_CUSTOMREQUEST, "PUT");
        }

        $buffer = curl_exec($curl_handle);

        if ($this->debug == 2) {
            var_dump($buffer);
        }

        # Response code
        $this->_response_code = curl_getinfo($curl_handle, CURLINFO_HTTP_CODE);

        # Close curl process
        curl_close($curl_handle);

        # Return response
        if (($this->_response_code == 200) && ($resource == "getHTMLbody")) {
            $this->_response = $buffer;
        }
        else
        {
            /*
             *  This prevents the rounding error on 32 bits systems with PHP version >= 5.4
             */
            if (defined('JSON_BIGINT_AS_STRING'))
            {
                $this->_response = json_decode($buffer, false, 512, JSON_BIGINT_AS_STRING);
            }
            else
            {   // PHP v <= 5.3.* doens't support the fourth parameter of json_decode
                $this->_response = json_decode($buffer, false, 512);
            }
        }

        if ($request == 'POST') {
            return ($this->_response_code == 201 || $this->_response_code == 200) ? true : false;
        }
        if ($request == 'DELETE') {
            return ($this->_response_code == 204) ? true : false;
        }
        return ($this->_response_code == 200) ? true : false;
    }

    public function debug()
    {
        echo '<style type="text/css">';
        echo '

        #debugger {width: 100%; font-family: arial;}
        #debugger table {padding: 0; margin: 0 0 20px; width: 100%; font-size: 11px; text-align: left;border-collapse: collapse;}
        #debugger th, #debugger td {padding: 2px 4px;}
        #debugger tr.h {background: #999; color: #fff;}
        #debugger tr.Success {background:#90c306; color: #fff;}
        #debugger tr.Error {background:#c30029 ; color: #fff;}
        #debugger tr.Not-modified {background:orange ; color: #fff;}
        #debugger th {width: 20%; vertical-align:top; padding-bottom: 8px;}

        ';
        echo '</style>';

        echo '<div id="debugger">';

        if (isset($this->_response_code)):
            if (($this->_response_code == 200) || ($this->_response_code == 201) || ($this->_response_code == 204)):
                echo '<table>';
                echo '<tr class="Success"><th>Success</th><td></td></tr>';
                echo '<tr><th>Status code</th><td>' . $this->_response_code . '</td></tr>';

                if (isset($this->_response)):
                    echo '<tr><th>Response</th><td><pre>' . utf8_decode(print_r($this->_response, 1)) . '</pre></td></tr>';
                endif;

                echo '</table>';
            elseif ($this->_response_code == 304):
                echo '<table>';
                echo '<tr class="Not-modified"><th>Error</th><td></td></tr>';
                echo '<tr><th>Error no</th><td>' . $this->_response_code . '</td></tr>';
                echo '<tr><th>Message</th><td>Not Modified</td></tr>';
                echo '</table>';
            else:
                echo '<table>';
                echo '<tr class="Error"><th>Error</th><td></td></tr>';
                echo '<tr><th>Error no</th><td>' . $this->_response_code . '</td></tr>';
                if (isset($this->_response)):
                    if (is_array($this->_response) OR is_object($this->_response)):
                        echo '<tr><th>Status</th><td><pre>' . print_r($this->_response, true) . '</pre></td></tr>';
                    else:
                        echo '<tr><th>Status</th><td><pre>' . $this->_response . '</pre></td></tr>';
                    endif;
                endif;
                echo '</table>';
            endif;
        endif;

        $call_url = parse_url($this->call_url);

        echo '<table>';
        echo '<tr class="h"><th>API config</th><td></td></tr>';
        echo '<tr><th>Protocole</th><td>' . $call_url['scheme'] . '</td></tr>';
        echo '<tr><th>Host</th><td>' . $call_url['host'] . '</td></tr>';
        echo '<tr><th>Version</th><td>' . $this->version . '</td></tr>';
        echo '<tr><th>Wrapper Version</th><td>' . $this->readWrapperVersion() . '</td></tr>';
        echo '</table>';

        echo '<table>';
        echo '<tr class="h"><th>Call infos</th><td></td></tr>';
        echo '<tr><th>Resource</th><td>' . $this->_method . '</td></tr>';
        echo '<tr><th>Request type</th><td>' . $this->_request . '</td></tr>';
        echo '<tr><th>Get Arguments</th><td>';

        if (isset($call_url['query'])) {
            $args = explode("&", $call_url['query']);
            foreach ($args as $arg) {
                $arg = explode("=", $arg);
                echo '' . $arg[0] . ' = <span style="color:#ff6e56;">' . $arg[1] . '</span><br/>';
            }
        }

        echo '</td></tr>';

        if ($this->_request_post) {
            echo '<tr><th>Post Arguments</th><td>';

            foreach ($this->_request_post as $k => $v) {
                if (is_array($v))
                {
                    foreach ($v as $key => $value)
                    {
                        echo $key . ' = <span style="color:#ff6e56;">' . $value . '</span><br/>';
                    }
                }
                else
                {
                    echo $k . ' = <span style="color:#ff6e56;">' . $v . '</span><br/>';
                }
            }

            echo '</td></tr>';
        }

        echo '<tr><th>Call url</th><td>' . $this->call_url . '</td></tr>';
        echo '</table>';

        echo '</div>';
    }

    private function readWrapperVersion() {
        return Mailjet::WRAPPER_VERSION;
    }
}
