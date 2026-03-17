# PHP | Project Starter

[![PHP Version](https://img.shields.io/badge/php->=8.3-blue)](https://www.php.net/supported-versions)
[![Composer Version](https://img.shields.io/badge/composer->=2-blue)](https://getcomposer.org/)

Quickly scaffold new PHP projects with sensible defaults.

## Requirements

* PHP v8.3 (or above)
* Composer v2 (or above)

## Provides

* [PHP-CS-Fixer]() (to enforce coding style)
* [Psalm]() (for static analysis)
* [PHPUnit]() (for unit and feature tests)

## Initial Setup

The following steps are completely optional and may be skipped. However, if you
plan on using [namespaces](https://www.php.net/manual/en/language.namespaces.rationale.php)
and following [PSR-4 convention](https://www.php-fig.org/psr/psr-4/) the steps
below may be helpful.

### Setup Script

To make initial setup easier we have provided a `bin/setup.php` script

Open the project in your terminal of choice and run the following:

```sh
php bin/setup.php
```

This will prompt you to enter the namespace (ex: `SimpleWebsite`, `Acme\FooBar`,
`My\Awesome\Project` etc.) in which you would like your classes to reside.
Namespaces may contain only letters, numbers, underscores and backslashes.

### Manual Setup

If you do not want (or cannot) use the setup script please do the following:

1. Update the `composer.json` file with:
    * An appropriate value for the project `"name"` property
    * Replace the `__YourNamespace__` values with a namespace of your choosing
2. Update (or delete) the `src/HelloWorld.php` file:
    * Replace the `__YourNamespace__` value to match your Composer file 
3. Update (or delete) the `tests/Unit/HelloWorldTest.php` file:
    * Replace the two `__YourNamespace__` values to match your Composer file
4. Delete the `bin` folder that contains the setup script
5. Run `composer dump-autoload` from the terminal

## Commands

The following Composer scripts have been pre-defined:

<dl>
    <dt><code>composer run tests:unit</code></dt>
    <dd>
        Run PHPUnit and execute all the tests located in the
        <code>/tests/Unit/</code> directory.
    </dd>
    <dt><code>composer run tests:feature</code></dt>
    <dd>
        Run PHPUnit and execute all the tests located in the
        <code>/tests/Feature/</code> directory.
    </dd>
    <dt><code>composer run tests</code></dt>
    <dd>
        Run PHPUnit and execute both the <strong>unit</strong> and
        <strong>feature</strong> test suites.
    </dd>
    <dt><code>composer run coverage</code></dt>
    <dd>
        Run PHPUnit for the unit tests and generate a code coverage report in
        the <code>/coverage</code> directory.
        <br/>
        <strong><sup>*</sup>Requires XDebug to be installed!</strong>
    </dd>
    <dt><code>composer run style</code></dt>
    <dd>
        Run PHPCsFixer to find and fix code styling issues.
    </dd>
    <dt><code>composer run psalm</code></dt>
    <dd>
        Run Psalm to perform static analysis and flag code quality issues.
    </dd>
</dl>

## Code Quality
### Code Style

### Static Analysis

### Tests