\* - Necessarily
- [VkApiClient.php](#vkapiclientphp)
  - [Methods and arguments](#methods-and-arguments)
  - [Returned responses](#returned-responses)
- [VkRequest.php](#vkrequestphp)
  - [Methods and arguments](#methods-and-arguments-1)
  - [Returned responses](#returned-responses-1)
- [Main.php (plugin version)](#mainphp-plugin-version)
  - [Methods and arguments](#methods-and-arguments-2)
  - [Returned responses](#returned-responses-2)
___

### VkApiClient.php
##### Methods and arguments
- `__construct()` - Creating an Object
  - \* *string* `$token` - Token for access to VkAPI
  - *string* `$api_ver` - VkAPI version
  - *string* `$lang` - Language for VkAPI

- `setToken()` - Change access token
  - \* *string* `$token` - New access token

- `setApiVersion()` - Change VkAPI version
  - \* *string* `$api_ver` - New VkAPI version

- `setLanguage()` - Change VkAPI language
  - \* *string* `$lang` - New VkAPI language

- `execute()` - Execute a request in VkAPI
  - \* *string* `$method` - Method
  - \* *array* `$params` - Parameters for the method

##### Returned responses
- `__construct()` *(VkApiClient)* - Object "VkApiClient"
- `setToken()`, `setApiVersion()`, `setLanguage()` *(null)* - Nothing
- `execute()` *(VkRequets + array|false|null)* - Returns the "VkRequest" object and an array of response (or a negative response of type null or false)
___
### VkRequest.php
##### Methods ~~and arguments~~
- `getMethod()` - Get the method that was used
- `getParam()` - Get parameters that were used

##### Returned responses
- `getMethod()` *(string)* - Return method
- `getParams()` *(array)* - Will return parameters
___
### Main.php (plugin version)
##### Methods and arguments
- `newClient()` - Create a new object "VkApiClient"
  - \* *string* `$token` - Token for access to VkAPI

##### Returned responses
- `newClient()` *(VkApiClient)* - Returns a new object "VkApiClient"
