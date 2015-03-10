## User Agent
### For Laravel
User-Agent class ported from CodeIgniter to Laravel. 
It provides specific information about the user agents making requests to your app.

This project is based on [CodeIgniter](http://codeigniter.com)'s [User_Agent](http://github.com/bcit-ci/CodeIgniter) class.

* [Install](#install)
	* [Laravel 4](#laravel-4)
	* [Laravel 5](#laravel-5)
* [Use](#use)
	* [Browser](#browser)
	* [Platform](#platform)
	* [Mobile](#mobile)
	* [Robot](#robot)
	* [Accepted languages](#accepted-languages)
	* [Accepted charsets](#accepted-charsets)
	* [Is it a browser?](#is-it-a-browser)
	* [Is it a robot?](#is-it-a-robot)
	* [Is it a mobile?](#is-it-a-mobile)
	* [Is it a desktop?](#is-it-a-desktop)
	* [Accepts language?](#accepts-language)
	* [Accepts charset?](#accepts-charset)
* [Contributing](#contributing)
* [Links](#links)

### Install

1. Edit the `require` section in your `composer.json` file

	#### Laravel 4

	```javascript
	"require": {
		"thytanium/agent": "1.*"
	}
	```
	
	#### Laravel 5
	
	```javascript
	"require": {
		"thytanium/agent": "2.*"
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

### Contributing
Feel free to contribute to this little project.

### Links
* [CodeIgniter](http://codeigniter.com)
* [Laravel](http://laravel.com)
