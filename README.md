Political Choice Library for Symfony Applications
=================================================

This library allows Symfony users to choose their political stance in the ongoing conflict between Ukraine and Russia. 
Users can select to support Ukraine, Russia, or World-Peace. 
Additionally, users can disable political messages and return to a normal Symfony application.

Installation
------------

You can install the library using Composer:

```bash 
composer require drsmithfr/symfony-political-choice
```

Usage
-----

To use the library, you must override the `bin/console` file of your project.

```php
#!/usr/bin/env php
<?php

use App\Kernel;
use DrSmithFr\ChooseYourSide\Application;

if (!is_file(dirname(__DIR__) . '/vendor/autoload_runtime.php')) {
    throw new LogicException('Symfony Runtime is missing. Try running "composer require symfony/runtime".');
}

require_once dirname(__DIR__).'/vendor/autoload_runtime.php';

return function (array $context) {
    $kernel = new Kernel($context['APP_ENV'], (bool) $context['APP_DEBUG']);

    return new Application($kernel);
};
```

> **NOTE**
> > By default, the library will display #StandWithPeace.

You can select your side by passing it to the Application as second parameter.

```php
#!/usr/bin/env php
<?php

use App\Kernel;
use DrSmithFr\ChooseYourSide\Application;
use DrSmithFr\ChooseYourSide\Side;

if (!is_file(dirname(__DIR__) . '/vendor/autoload_runtime.php')) {
    throw new LogicException('Symfony Runtime is missing. Try running "composer require symfony/runtime".');
}

require_once dirname(__DIR__).'/vendor/autoload_runtime.php';

return function (array $context) {
    $kernel = new Kernel($context['APP_ENV'], (bool) $context['APP_DEBUG']);

    return new Application($kernel, Side::APOLITICAL);
};
```

> **Accepted values**
> - `Side::APOLITICAL`
> - `Side::PEACE`
> - `Side::UKRAINE`
> - `Side::RUSSIA`

Security
--------

This library has been designed with security in mind. 
It does not collect or store any user data, and all user choices are kept private.