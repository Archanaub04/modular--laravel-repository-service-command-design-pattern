# Modular laravel

# Repository-Service-Command Design Pattern

This is the structure of the modular laravel application, it will create as modules using nWidart package and also used the repository-service-command design pattern for me using common command bus and grouped handlers. So that i can use this in all my projects.

Steps to set up modular laravel project

Used Larvel 12 and in laravel 12 in nWidart package. So there is no need to add modules path in composer.json. But in before version dont like this.

modular larvel:

laravel 11 setup:


1. ```laravel new projectname```


2. ```composer require nwidart/laravel-modules```


3. ```php artisan vendor:publish --provider="Nwidart\Modules\LaravelModulesServiceProvider"```


4. By default, the module classes are not loaded automatically. 
 You can autoload your modules by adding merge-plugin to the extra section:

  composer.json:

```
    "extra": {
        "laravel": {
            "dont-discover": []
        },
        "merge-plugin": {
            "include": [
                "Modules/*/composer.json"
            ]
        }
    },
```

5. ```composer dump-autoload```

6. ```php artisan module:make modulename```

7. ```php artisan module:enable modulename``` // to enable the module by default it will be disable

8. After each module creation, run:

```composer dump-autoload```

```
inside module, when importing, not use Module\modulename\App\-- - not use this instead

Modules\modulename\----use that. avoid using App
```


