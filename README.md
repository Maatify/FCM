
[![Current version](https://img.shields.io/packagist/v/maatify/google-fcm)][pkg]
[![Packagist PHP Version Support](https://img.shields.io/packagist/php-v/maatify/google-fcm)][pkg]
[![Monthly Downloads](https://img.shields.io/packagist/dm/maatify/google-fcm)][pkg-stats]
[![Total Downloads](https://img.shields.io/packagist/dt/maatify/google-fcm)][pkg-stats]
[![Stars](https://img.shields.io/packagist/stars/maatify/google-fcm)](https://github.com/maatify/FCM/stargazers)

[pkg]: <https://packagist.org/packages/maatify/google-fcm>
[pkg-stats]: <https://packagist.org/packages/maatify/google-fcm/stats>
# About 
> Note: 
> 
> This Library is smiller to kreait/firebase-php 
> 
> View kreait/firebase-php [Docs](https://firebase-php.readthedocs.io/en/stable/cloud-messaging.html)
> 
> View kreait/firebase-php on [GitHub](https://github.com/kreait/firebase-php)
> 


# Installation

```shell
composer require maatify/google-fcm
```

# Usage
### Project Instance
```PHP
use Maatify\FCM\FcmHandler;

require __DIR__ . '/vendor/autoload.php';

$message = new FcmHandler(__credentials_json_file_location__);
```
> Note: $message will use in whole project handler
#
## Message Preparing and Send
### Notification Setter For FCM
```PHP
// Optional
$message->SetNotification('My Custom Title', 'My Custom Body', __image_url__ = '');
```

### Data Setter For FCM 
```PHP
// Optional
$message->SetDate([
        'key1'=>'value1',
        'key2'=>'value2',
    ]);
```

### Send FCM To Device Token
```PHP

try {
    // $message->sender cannot callable before setting at least one of optional setter
    $result = $message->sender->ToDeviceToken(__device_token__);
    
} catch (MessagingException|FirebaseException $e) {

    $result = (array) $e;
}

print_r($result);
```

### Send FCM To Multiple Devices Token
```PHP

// $message->sender cannot callable before setting at least one of optional setter
$result = $message->sender->ToMultipleDevicesToken([__device_token1__, __device_token2__]);

print_r($result);
```

### Send FCM To Topic
```PHP

try {
    // $message->sender cannot callable before setting at least one of optional setter
    $result = $message->sender->ToTopic(__topic__);
    
} catch (MessagingException|FirebaseException $e) {

    $result = (array) $e;
}

print_r($result);
```

## Topic Validate
If you have a set of registration tokens that you want to check for validity or if they are still registered to your project, you can use the validateTokens() method:

### Topic Validation
```PHP

try {

    $tokens = [__device_token__]; // to validate one token only
    $result = $message->TopicValidation()->ValidateRegistrationTokens($tokens);
    
} catch (MessagingException|FirebaseException $e) {

    $result = (array) $e;
}

print_r($result);
```

### Topics Validation
```PHP

try {

    $tokens = [__device_token1__, __device_token2__]; // to validate many tokens
    $result = $message->TopicValidation()->ValidateRegistrationTokens($tokens);
    
} catch (MessagingException|FirebaseException $e) {

    $result = (array) $e;
}

print_r($result);
```
> Note: 
> - `valid`    contains all tokens that are valid and registered to the current Firebase project
> - `unknown`  contains all tokens that are valid, but not registered to the current Firebase project
> - `invalid`  contains all invalid (=malformed) tokens


## Topic Management
You can subscribe one or multiple devices to one or multiple messaging topics with the following methods:

### Topic Instance 
```PHP
$topic_manager = $message->TopicManagement();
```

> Note: for all Topic Management 
> - `$registrationTokenOrTokens` can be string if one token or array if many tokens
>   ```PHP
>   $registrationTokenOrTokens = __device_token__;
>   // or
>   $registrationTokenOrTokens = [__device_token1__, __device_token2__];
>   ```
> - `$topic` is device token in string
>   ```PHP 
>   $topic = 'topic-a';
>   ```
> - `$topics` is devices tokens in array
>   ```PHP 
>   $topics = ['topic-a', 'topic-b'];
>   ```


### Subscribe To Topic
```PHP

$result = $topic_manager->SubscribeToTopic($topic, $registrationTokenOrTokens);

print_r($result);
```

### Subscribe To Topics
```PHP
$result = $topic_manager->SubscribeToTopics($topics, registrationTokenOrTokens);

print_r($result);
```

### Unsubscribe From Topic
```PHP

$result = $topic_manager->UnsubscribeFromTopic($topic, $registrationTokenOrTokens);

print_r($result);
```

### Unsubscribe From Topics
```PHP
$result = $topic_manager->SubscribeToTopics($topics, registrationTokenOrTokens);

print_r($result);
```

### Unsubscribe From All Topics
```PHP
$result = $topic_manager->UnsubscribeFromAllTopics(registrationTokenOrTokens);

print_r($result);
```




The result will return an array win which the keys are the topic names, and the values are the operation results for the individual tokens.
> Note: 
> 
> You can subscribe up to 1,000 devices in a single request. If you provide an array with over 1,000 registration tokens, the operation will fail with an error.