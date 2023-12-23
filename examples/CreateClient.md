#### Creation using the "VkApiClient" class
```php
<?php

namespace PluginPath;

use pocketmine\plugin\PluginBase;
use MiniVkApi\VkApiClient; // Specify the path to the class "VkApiClient"

class PluginName extends PluginBase
{
    
    public function onEnable(): void
    {
        $vkToken = "vk1.a.Pd...";
        $vkApi = new VkApiClient($token);
        $response = $vkApi->execute("wall.post", [
            "message" => "Привет, мир!",
            "attachments" => "photo-152219848_457913513"
        ]);
        print_r($response);
    }
    
}
```
___

#### Creation using the "getPlugin()" method
```php
<?php

namespace PluginPath;

use pocketmine\plugin\PluginBase;

class PluginName extends PluginBase
{
    
    public function onEnable(): void
    {
        $vkApi = $this->getServer()->getPluginManager()->getPlugin("MiniVkApi");
        
        $vkToken = "vk1.a.Pd...";
        $vkApi = $vkApi->newClient($token);
        $response = $vkApi->execute("wall.post", [
            "message" => "Привет, мир!",
            "attachments" => "photo-152219848_457913513"
        ]);
        print_r($response);
    }
    
}
```
