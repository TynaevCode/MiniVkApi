```php
// $vkApi - готовый объект "VkApiClient"

$testOne = $vkApi->execute("groups.create", [
    "title" => "Сообщество :)"
]);
print_r($testOne);

$testTwo = $vkApi->execute("account.getProfileInfo", []);
print_r($testTwo)
```
