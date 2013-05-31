## Laravel 4.x Skeleton

### License

[MIT license](http://opensource.org/licenses/MIT)

### ChangeLog

- **Version 0.2**
	- Moved to [Basset](http://jasonlewis.me/code/basset/4.0) for Asset Management
	- Added additional assets from l4layouts
	- Got rid of l4sacs requirements
	- Upgraded Bootstrap to 2.3.2
	- Got rid of laravel guard requirement
- **Version 0.1**
	- Initial release

### Includes

- Laravel (Latest and Greatest)
	- [Official Documentation](http://four.laravel.com) (Under Active Development)
- Anvard (HybridAuth) for social auth
- [codenamegary/l4layouts](https://bitbucket.org/codenamegary/l4layouts)
	- Zurb Foundation 4.1
	- Twitter Bootstrap 2.3.2
	- Font Awesome 3.1.1
- [jasonlewis/basset](http://jasonlewis.me/code/basset/4.0)
	- Simple asset collection / containers for L4, similar to assets in L3
- PagodaBox Boxfile
	- Configured for PHP 5.3.23 with mcrypt, apc and several other extensions
	- Redis cache for session and cache storage
 	- L4 configuration to match database environment variables and leverage redis
- Composer
 	- Composer.json configured and ready with phpunit and way/guard-laravel for dev environment
 	- deploy.sh script which automates wiping and re-composing (wipe vendor, reinstall / update composer)
 	- deploy.sh uses --prefer-source so NO MORE 403 limit exceeded!!
