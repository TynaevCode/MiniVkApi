<?php

namespace MiniVkApi\Utils;

use MiniVkApi\Main;

class VkRequest {
    
    /** @var string */
    public $token;
    
    /** @var string */
    public $api_ver;
    
    /** @var string */
    public $lang;
    
    /**
     * Creating a VkRequest object
     * @param string $method
     * @param mixed[] $params
     * @param string $token
     * @param string $api_ver
     * @param string $lang
     */
    public function __construct(string $method, array $params, string $token, string $api_ver, string $lang) {
        $this->method = $method;
        $this->token = $token;
        $this->api_ver = $api_ver;
        $this->lang = $lang;
        $this->params = ["converted" => $this->convertParams($params), "array" => $params];
        return $this->request();
    }
    
    /**
     * Get the method that was used
     * @return string
     */
    public function getMethod() : string {
        return $this->method;
    }
    
    /**
     * Get passed parameters
     * @return mixed[]
     */
    public function getParams() : array {
        return $this->params["array"];
    }
    
    private function request() {
        $ch = curl_init("https://api.vk.com/method/" . $this->method . "?" . $this->params["converted"]);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT_MS, (int) Main::$timeout * 1000);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT_MS, (int) Main::$con_timeout * 1000);
        $result = curl_exec($ch);
        curl_close($ch);
        var_dump($result);
        return json_decode($result, true);
    }
    
    private function convertParams(array $params) : string {
        foreach($params as $key => $value) {
            if(is_array($value)) {
                $params[$key] = implode(",", $value);
            }
            if(is_bool($value)) {
                $params[$key] = $value ? 1 : 0;
            }
        }
        if(!isset($params["access_token"])) {
            $params["access_token"] = $this->token;
        }
        if(!isset($params["v"])) {
            $params["v"] = $this->api_ver;
        }
        if(!isset($params["lang"])) {
            $params["lang"] = $this->lang;
        }
        return http_build_query($params);
    }
    
}
