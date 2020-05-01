<?php

/**
 * HTTP Client Request - Assessment Core DNA
 *
 * PHP version 7
 *
 * @category Client
 * @package  Client
 * @author   Author <tanguybelin@hotmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     http://localhost/
 */
namespace Client;

/**
 * Request Class - Assessment Core DNA
 *
 * PHP version 7
 *
 * @category Client
 * @package  Client
 * @author   Author <tanguybelin@hotmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     http://localhost/
 */
class Request
{
        
    /**
     * Post method
     *
     * @param  mixed $url        url to call
     * @param  mixed $headers    headers to add to the request
     * @param  mixed $parameters body of the request
     * @return void
     */
    public static function post($url, $headers, $parameters = null)
    {
        return self::send(Method::POST, $url, $parameters, $body);
    }

        
    /**
     * Get method
     *
     * @param  mixed $url     url to call
     * @param  mixed $headers headers to add to the request
     * @param  mixed $body    body of the request
     * @return void
     */
    public static function get($url, $headers, $body = null)
    {
        return self::send(Method::GET, $url, $headers, $body);
    }
    
    /**
     * Delete method
     *
     * @param  mixed $url     url to call
     * @param  mixed $headers headers to add to the request
     * @param  mixed $body    body of the request
     * @return void
     */
    public static function delete($url, $headers, $body = null)
    {
        return self::send(Method::GET, $url, $headers, $body);
    }
    
    /**
     * Put method
     *
     * @param  mixed $url     url to call
     * @param  mixed $headers headers to add to the request
     * @param  mixed $body    body of the request
     * @return void
     */
    public static function put($url, $headers, $body = null)
    {
        return self::send(Method::GET, $url, $headers, $body);
    }
    
    /**
     * Options method
     *
     * @param  mixed $url     url to call
     * @param  mixed $headers headers to add to the request
     * @param  mixed $body    body of the request
     * @return void
     */
    public static function options($url, $headers, $body = null)
    {
        return self::send(Method::OPTIONS, $url, $headers, $body);
    }
    
    /**
     * Send HTTP Request
     *
     * @param  mixed $method  Method for the HTTP call
     * @param  mixed $url     url to call
     * @param  mixed $headers headers to add to the request
     * @param  mixed $body    body of the request
     * @return void
     */
    public static function send($method, $url, $headers, $body = null)
    {
        $options = array(
            'http' => array(
                'header'  => $headers,
                'method'  => $method,
                'content' => http_build_query($body),
            )
        );

        $context = stream_context_create($options);
        $result = file_get_contents($url, true, $context);
        
        if ($result === false) {
            throw new Exception('Error during calling api');
        }

        $response['headers'] = $http_response_header;
        
        if (self::isJson($result)) {
            $result = self::jsonDecodeControl($result);
        }
        $response['payload'] = $result;

        return $response;
    }
    
    /**
     * Detect if the string is JSON
     *
     * @param  mixed $string string to test
     * @return void
     */
    public static function isJson($string)
    {
        json_decode($string);
        if (json_last_error() == JSON_ERROR_NONE) {
            return true;
        } else {
            return false;
        }
    }
    
    /**
     * Control encoding of JSON
     *
     * @param  mixed $data data to decode
     * @return void
     */
    public static function jsonEncodeControl($data)
    {
        $encode = json_encode($data);
        if ($encode === false || is_null($encode)) {
            throw new Exception(json_last_error());
        } else {
            return $encode;
        }
    }
    
    /**
     * Control Decoding of JSON
     *
     * @param  mixed $data data to decode
     * @return void
     */
    public static function jsonDecodeControl($data)
    {
        $decode = json_decode($data, true);
        if (!is_array($decode)) {
            throw new Exception(json_last_error());
        } else {
            return $decode;
        }
    }
}
