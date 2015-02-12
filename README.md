## User Agent
### For Laravel
User-Agent class ported from CodeIgniter to Laravel. 
It provides specific information about the user agents making requests to your app.

This project is based on [CodeIgniter](http://codeigniter.com)'s [User_Agent](http://github.com/bcit-ci/CodeIgniter) class.

### Install

1. Edit the `require` section in your `composer.json` file

	```javascript
	"require": {
		"thytanium/agent": "dev-master"
	}
	```
	
2. In the cmd run `composer update`

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
