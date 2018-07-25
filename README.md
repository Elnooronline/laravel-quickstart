Laravel Quick Start
=====================
A non-official laravel application scaffolding that includes `adminlte`, `debugbar`, `ide-helper`, `.php_cs` and `Eslint` configurations.
Mirrored from [https://github.com/laravel/laravel.git](https://github.com/laravel/laravel.git).

## Requirements
The requirements is the same as of the [official requirements](https://laravel.com/docs/5.6/installation#server-requirements).

## Installation
You can also install Laravel via Composer by issuing the `create-project` command in your terminal:
```
composer create-project --prefer-dist elnooronline/laravel-quickstart blog
```
The above command will install a new laravel 5.6 application for you.

## Composer Scripts
We added composer scripts to avoid long and repeated commands. These scripts are:
```
composer php-cs:issues # Used for checking for any configured  php code style issues.

composer php-cs:fix # Used for fix any configured php code style issues automatically.

composer js-cs:issues # Used for fix any configured javascript code style issues automatically.

composer js-cs:fix # Used for fix any configured javascript code style issues automatically.

composer auto-complete:generate # Used for generating ide helper files.

composer api:generate # Used for generating api documentation.

composer app:clear # Used for clear application cache files such as cache, config, route, view and debugbar.
```