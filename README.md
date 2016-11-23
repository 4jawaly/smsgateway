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
...

```
Jawaly::send($message);
```
Now you can copy config file and migration file to your project using this line in terminal:
```
php artisan vendor:publish
```
This will copy jawaly.php config file and sms log database migration
If you faced any problem publishing these files just copy src/config/jawaly.php to your project config file,
and src/database/migrations/* files to your project database migrations folder.

## Config

You have to change username and password in config file "you can put them in .env file as defined".
It's better to use unicode encoding so let it to be true to use unicode to better Arabic message encoding.

You can set default sender here.

You can use file or database to store your message log, if you use database you have to migrate your database after publish package files.

## Usage

You can use the facade directly.
```
Jawaly::send($message);
```
You can set numbers in two ways:
```
Jawaly::send($message, $numbers);
```
or:
```
Jawaly::setTo($numbers)->send($message);
```

You can set sender name in two ways:
```
Jawaly::send($message, $numbers, $sender);
```
Or:
```
Jawaly::setFrom($sender)->send($message);
```

## Credit
This method doesn't take any parameters, you can use it simply:

```
Jawaly::getCredits();
```
This will return an array with credits in second element if first element true, or response message in second element if first element false.

## SMS Log

If you use database for log container in jawaly.php config file, this will store log in sms_log table every time you send message.
If you use file for log container, this will store send log in storage/logs/jawaly.log