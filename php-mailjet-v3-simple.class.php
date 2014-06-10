<?php

/**
 * Mailjet Public API
 *
 * @package     API v0.3
 * @author      Mailjet
 * @link        http://api.mailjet.com/
 *
 */

class Mailjet
{
    # Connect with https protocol
    var $secure = true;

    # Mode debug ? 0 : none; 1 : errors only; 2 : all
    var $debug = 0;

    # Edit with your Mailjet API keys (you can find them here : https://app.mailjet.com/account/api_keys)
    var $apiKey = '';
    var $secretKey = '';
    
    # Constructor function
    public function __construct($apiKey = false, $secretKey = false)
    {
        if ($apiKey)
            $this->apiKey = $apiKey;
        if ($secretKey)
            $this->secretKey = $secretKey;
        $this->apiUrl = (($this->secure) ? 'https' : 'http') . '://api.mailjet.com/v3/REST';
    }
    
    public function __call($resource, $args)
    {
        # Parameters array
        $params  = (sizeof($args) > 0) ? $args[0] : array();

        # Request method, GET by default
        $request = isset($params["method"]) ? strtoupper($params["method"]) : 'GET';

        # Request ID, empty by default
        $id      = isset($params["ID"]) ? $params["ID"] : '';

        # Unset useless params
        if (isset($params["method"]))
            unset($params["method"]);
        if (isset($params["ID"]))
            unset($params["ID"]);

        # Make request
        $result = $this->sendRequest($resource, $params, $request, $id);

        # Return result
        $return = ($result === true) ? $this->_response : false;
        if ($this->debug == 2 || ($this->debug == 1 && $return == false)) {
            $this->debug();
        }

        return $return;
    }

    public function requestUrlBuilder($resource, $params = array(), $request, $id)
    {
        foreach ($params as $key => $value) {
            if ($request == "GET")
                $query_string[$key] = $key . '=' . urlencode($value);
        }

        if ($resource == "sendEmail")
            $this->call_url = "https://api.mailjet.com/v3/send/message";
        else
            $this->call_url = $this->apiUrl . '/' . $resource;

        if ($request == "VIEW" || $request == "DELETE" || $request == "PUT")
            if ($id != '')
                $this->call_url .= '/' . $id;

        return $this->call_url;
    }
    
    public function sendRequest($resource = false, $params = array(), $request = "GET", $id = '')
    {
        # Method
        $this->_method  = $resource;
        $this->_request = $request;
        
        # Build request URL
        $url = $this->requestUrlBuilder($resource, $params, $request, $id);

        # Set up and execute the curl process
        $curl_handle = curl_init();
        curl_setopt($curl_handle, CURLOPT_URL, $url);
        curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl_handle, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($curl_handle, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($curl_handle, CURLOPT_USERPWD, $this->apiKey . ':' . $this->secretKey);
        
        $this->_request_post = false;

        if (($request == 'POST') || ($request == 'PUT')):
            curl_setopt($curl_handle, CURLOPT_POST, count($params));
            curl_setopt($curl_handle, CURLOPT_POSTFIELDS, http_build_query($params));
            if ($resource == "sendEmail")
            {
                curl_setopt($curl_handle, CURLOPT_HTTPHEADER, array(
                    'Content-Type: application/x-www-form-urlencoded'
                ));
            }
            else
            {
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
            error_log(json_encode($params));
            curl_setopt($curl_handle, CURLOPT_CUSTOMREQUEST, "PUT");
        }

        $buffer = curl_exec($curl_handle);
        
        if ($this->debug == 2)
            var_dump($buffer);

        # Response code
        $this->_response_code = curl_getinfo($curl_handle, CURLINFO_HTTP_CODE);

        # Close curl process
        curl_close($curl_handle);

        # Return response
        $this->_response = json_decode($buffer);

        if ($request == 'POST')
            return ($this->_response_code == 201) ? true : false;
        if ($request == 'DELETE')
            return ($this->_response_code == 204) ? true : false;
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
                echo $k . ' = <span style="color:#ff6e56;">' . $v . '</span><br/>';
            }
            
            echo '</td></tr>';
        }
        
        echo '<tr><th>Call url</th><td>' . $this->call_url . '</td></tr>';
        echo '</table>';
        
        echo '</div>';
    }
}
