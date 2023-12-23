<?php

namespace MiniVkApi;

use MiniVkApi\Utils\VkLanguages;
use MiniVkApi\Utils\VkRequest;

class VkApiClient {
    
    protected const API_VERSION = "5.131";
    protected const LANGUAGE = VkLanguages::RUSSIAN;
    
    /** @var string */
    public $token;
    
    /** @var string */
    public $api_ver;
    
    /** @var string */
    public $lang;
    
    /**
     * Creating a VkApiClient object
     * @param string $token
     * @param string $api_ver
     * @param string $lang
     */
    function __construct(string $token, string $api_ver = self::API_VERSION, string $lang = self::LANGUAGE) {
        $this->token = $token;
        $this->api_ver = $api_ver;
        $this->lang = $lang;
    }
    
    /**
     * Change token
     * @param string $token
     */
    public function setToken(string $token) : void {
        $this->token = $token;
    }
    
    /**
     * Change VkAPI version
     * @param string $api_ver
     */
    public function setApiVersion(string $api_ver) : void {
        $this->api_ver = $api_ver;
    }
    
    /**
     * Change language
     * @param string $lang
     */
    public function setLanguage(string $lang) : void {
        $this->lang = $lang;
    }
    
    /**
     * Execute VkAPI request
     * @param string $method
     * @param mixed[] $params
     * @return mixed
     */
    public function execute(string $method, array $params = []) {
        $response = new VkRequest($method, $params, $this->token, $this->api_ver, $this->lang);
        return $response;
    }
    
}
