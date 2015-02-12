## User Agent
### For Laravel
User-Agent class ported from CodeIgniter to Laravel. 
It provides specific information about the user agents making requests to your app.

This project is based on [CodeIgniter](http://codeigniter.com)'s [User_Agent](http://github.com/bcit-ci/CodeIgniter) class.

1. [Install](#install)
2. [Use](#use)
  2.1. [Browser](#browser)
  2.2. [Platform](#platform)

### Install

1. Edit the `require` section in your `composer.json` file

	```javascript
	"require": {
		"thytanium/agent": "dev-master"
	}
	```
	
2. Run `composer update`

3. Edit `app/config/app.php`

	```php
	'providers' => array(
		...
		'Thytanium\Agent\AgentServiceProvider',
	);
	
	...
	
	'aliases' array(
		...
		'Agent' => 'Thytanium\Agent\Facades\Agent',
	);
	```
	
### Use
#### Browser

```php
$browser = Agent::browser() //Firefox, Chrome, etc.
```

#### Browser version

```php
$version = Agent::version() //35.0, 34.0, etc.
```

#### Platform

```php
$platform = Agent::platform() //Windows 8, Windows XP, Linux, MacOS X
```

#### Mobile

```php
$mobile = Agent::mobile() //iPhone, iPad, PlayStation 3, Android
```

#### Robot

```php
$robot = Agent::robot() //Googlebot, Bing, Yahoo
```

#### Accepted languages

```php
$languages = Agent::languages() //en-us, es-ar, en-gb
```

#### Accepted charsets

```php
$charsets = Agent::charsets() //utf-8, iso-8859-1
```

#### Is it a browser?

```php
$browser = Agent::isBrowser() //true or false
```

#### Is it a robot?

```php
$robot = Agent::isRobot() //true or false
```

#### Is it a mobile?

```php
$mobile = Agent::isMobile() //true or false
```

#### Is it a desktop?

```php
$desktop = Agent::isDesktop() //true or false
```

#### Accepts language?

```php
$language = Agent::acceptLanguage('en') //true or false
```

#### Accepts charset?

```php
$charset = Agent::acceptCharset('utf-8') //true or false
```
