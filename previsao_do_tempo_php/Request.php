<?php
class Request {
    private $client;
    private $format;

    public function __construct($url, $format = "JSON")
    {
        $this->client = curl_init($url);
        $this->format = $format;
        curl_setopt($this->client, CURLOPT_RETURNTRANSFER, true);
    }

    public function execute(){
        $result = curl_exec($this->client);


        switch ($this -> format) {
            case 'JSON':
                return json_decode($result);
            case "XML":
                return simplexml_load_string($result);
            default:
                return $result;
        }
    }
    public function __destruct()
    {
        curl_close($this->client);
    }

    public function isSuccess() {
        $code = curl_getinfo($this->client, CURLINFO_HTTP_CODE);
        return($code >= 200 & $code <=299);
    }
}
