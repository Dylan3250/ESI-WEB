# Commandes utiles
### Divers
> Ajouter dump() : `composer require symfony/var-dumper`

> Installer sur base du composer.json/.lock : `composer install`
### Autoloader
> A ajouter pour load l'autoloader :
```json
{
    "autoload": {
        "psr-4": { "G54027\\": "dossier-classes" }
    }
}
```
> Reload l'autoloader dans la config : `composer dump-autoload`

> Inclus dans l'index.php : `require "vendor/autoload.php";`
### Tests
> Ajoute PHPUnit : `composer require phpunit/phpunit`

> Lance les tests : `vendor/bin/phpunit MyClassTest.php`