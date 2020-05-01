<?php
/**
 * Homepage Assessment Core DNA
 * 
 * PHP version 7
 *
 * @category Client
 * @package  Client
 * @author   Author <tanguybelin@hotmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     http://localhost/
 */
require 'src/Client.php';

$responseHeaders = "";
$responsePayload = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $headersKey = $_POST['headers-key'];
    $headersValues = $_POST['headers-value'];
    $payloadKeys = $_POST['payload-key'];
    $payloadValues = $_POST['payload-value'];
    $method = $_POST['method'];
    $url = $_POST['url'];

    $payload = array_combine($payloadKeys, $payloadValues);
    $headers = array_combine($headersKey, $headersValues);
    
    if ($method == "POST") {
        $response = Client\Request::post($url, $headers, $payload);
    } elseif ($method == "GET") {
        $response = Client\Request::get($url, $headers, $payload);
    } elseif ($method == "PUT") {
        $response = Client\Request::put($url, $headers, $payload);
    } elseif ($method == "DELETE") {
        $response = Client\Request::delete($url, $headers, $payload);
    } elseif ($method == "OPTIONS") {
        $response = Client\Request::options($url, $headers, $payload);
    }

    $responseHeaders = $response['headers'];
    $responsePayload = $response['payload'];
}

?>

<html>
    <head>
        <title>Core DNA Assessment</title>
        <link rel="stylesheet" 
            href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
            integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" 
            crossorigin="anonymous">
    </head>
    <body>
        <div class="container-fluid">
            <h3>Core DNA Assessment</h3>
            <div class="row">
                <form class="col-6" action="" method="post">
                    <div class="form-group">
                        <label for="url">URL</label>
                        <input type="text" class="form-control"
                            id="url" placeholder="url" name="url">
                    </div>
                    <div class="form-group">
                        <label for="method">Method</label>
                        <select class="form-control" id="method"
                         name="method" placeholder="Method">
                            <option value="GET" selected>GET</option>
                            <option value="POST">POST</option>
                            <option value="PUT">PUT</option>
                            <option value="DELETE">DELETE</option>
                            <option value="OPTIONS">OPTIONS</option>
                        </select>
                    </div>
                    <div class="form-row align-items-center">
                        <label for="headers">Custom Headers</label>
                        <div class="input-group">
                            <input type="text" class="form-control col-3 mb-2"
                                id="headers" name="headers-key[]" 
                                    placeholder="key"/>  
                            <div class="input-group-append col-9">
                                <input type="text" class="form-control mb-2"
                                    name="headers-value[]" placeholder="value"/>
                            </div>
                        </div>
                        <div class="input-group">
                            <input type="text" class="form-control col-3 mb-2"
                             id="headers" name="headers-key[]" placeholder="key"/>  
                            <div class="input-group-append col-9">
                                <input type="text" class="form-control mb-2"
                                    name="headers-value[]" placeholder="value"/>
                            </div>
                        </div>
                        <div class="input-group">
                            <input type="text" class="form-control col-3 mb-2"
                             id="headers" name="headers-key[]" placeholder="key"/>  
                            <div class="input-group-append col-9">
                                <input type="text" class="form-control mb-2" 
                                    name="headers-value[]" placeholder="value"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-row align-items-center">
                        <label>Payload (associative array)</label>
                        <div class="input-group">
                            <input type="text" class="form-control col-3 mb-2"
                                id="payload" name="payload-key[]" 
                                    placeholder="key"/>  
                            <div class="input-group-append col-9">
                                <input type="text" class="form-control mb-2"
                                    name="payload-value[]" placeholder="value"/>
                            </div>
                        </div>
                        <div class="input-group">
                            <input type="text" class="form-control col-3 mb-2"
                             id="payload" name="payload-key[]" placeholder="key"/>  
                            <div class="input-group-append col-9">
                                <input type="text" class="form-control mb-2"
                                    name="payload-value[]" placeholder="value"/>
                            </div>
                        </div>
                        <div class="input-group">
                            <input type="text" class="form-control col-3 mb-2"
                             id="payload" name="payload-key[]" placeholder="key"/>  
                            <div class="input-group-append col-9">
                                <input type="text" class="form-control mb-2" 
                                    name="payload-value[]" placeholder="value"/>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                <div class="col-6">
                    <h3>Results</h3>
                    <p><strong>Response Headers :</strong></p>
                    <p><?php print_r($responseHeaders); ?></p>
                    </br>
                    <p><strong>Response Payload :</strong></p>
                    <p><?php print_r($responsePayload); ?></p>
                </div>
            </div>
        </div>
    </body>
</html>