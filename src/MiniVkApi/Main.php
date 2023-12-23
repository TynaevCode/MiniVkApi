<?php

namespace MiniVkApi;

use pocketmine\plugin\PluginBase;

class Main extends PluginBase {
    
    /** @var int */
    public static $timeout;
    
    /** @var int */
    public static $con_timeout;
    
    function onEnable() : void {
        $this->saveDefaultConfig();
        self::$timeout = $this->getConfig()->get("timeout");
        self::$con_timeout = $this->getConfig()->get("connection_timeout");
    }
    
    /**
     * Creating a new VkApiClient object
     * @param string $token
     * @return VkApiClient
     */
    public function newClient(string $token) : VkApiClient {
        return new VkApiClient($token);
    }
    
}
