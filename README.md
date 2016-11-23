# 4jawaly gateway Laravel package

## Installation
Begin by installing this package through Composer. Run this command from the Terminal:
```
composer require jawaly/smsgateway
```
## Laravel integration

Open config/app.php, and add a new item to the providers array.
```
Jawaly\SmsGateway\SmsServiceProvider::class
```
Add new item to aliases array:
```
'Jawaly' => Jawaly\SmsGateway\Facades\Jawaly::class
```
This will allow you to use Jawaly facade :
```
use Jawaly;
```
.
.
.
```
Jawaly::send($message);
```

## Usage

You can use the facade directly.
```
Jawaly::send($message);
```
