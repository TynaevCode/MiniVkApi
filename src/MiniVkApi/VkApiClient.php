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
     * Создание объекта VkApiClient
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
     * Изменить токен
     * @param string $token
     */
    public function setToken(string $token) : void {
        $this->token = $token;
    }
    
    /**
     * Изменить версию VkAPI
     * @param string $api_ver
     */
    public function setApiVersion(string $api_ver) : void {
        $this->api_ver = $api_ver;
    }
    
    /**
     * Изменить язык
     * @param string $lang
     */
    public function setLanguage(string $lang) : void {
        $this->lang = $lang;
    }
    
    /**
     * Выполнить запрос VkAPI
     * @param string $method
     * @param mixed[] $params
     * @return mixed
     */
    public function execute(string $method, array $params = []) {
        $response = new VkRequest($method, $params, $this->token, $this->api_ver, $this->lang);
        return $response;
    }
    
}