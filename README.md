[![Current version](https://img.shields.io/packagist/v/maatify/google-fcm)](https://packagist.org/packages/maatify/google-fcm)
[![Packagist PHP Version Support](https://img.shields.io/packagist/php-v/maatify/google-fcm)](https://packagist.org/packages/maatify/google-fcm)
[![Monthly Downloads](https://img.shields.io/packagist/dm/maatify/google-fcm)](https://packagist.org/packages/maatify/google-fcm/stats)
[![Total Downloads](https://img.shields.io/packagist/dt/maatify/google-fcm)](https://packagist.org/packages/maatify/google-fcm/stats)

# Installation

```shell
composer require maatify/google-fcm
```

# Usage

## Initial
### Message Instance
```PHP
use Maatify\FCM\FcmHandler;

require __DIR__ . '/vendor/autoload.php';

$message = new FcmHandler(__credentials_json_file__);
```

### Notification Setter For FCM
```PHP
// Optional
$message->SetNotification('My Custom Title', 'My Custom ', __image_url__ = '');
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