I had a problem with autoloading classes for functional tests in TYPO3.

After some trying I figured out a working method so I don't get errors and I don't have to include all the classes manually.
Now only the `AbstractFunctionTestCase.php` has to be included in the testfile like so:

```php
require_once __DIR__ . '/../AbstractFunctionalTestCase.php'; // the path is relative and might have to be modified based on directory depth
use PhilippBauer\Acutronicdevicecenter\Tests\Functional\AbstractFunctionalTestCase;
```

First run `composer install` inside of the extension folder to generate `./vendor/autoloader.php`

Then you should have the following folder structure (shortened):

```
functestexmpl:
+ Classes
+ Tests
+- Build
+- Functional
+-- AbstractFunctionTestCase.php (this one is important)
+ vendor
+- autoload.php
+- bin
+-- phpunit
```

Then, with phpunit from a composer install in the typo3 root run:

```bash
typo3DatabaseName="functestexmpl_test" typo3DatabaseUsername="root" typo3DatabasePassword="password" typo3DatabaseHost="localhost" \
  ./vendor/bin/phpunit -c typo3/sysext/core/Build/FunctionalTests.xml typo3conf/ext/functestexmpl/Tests/Functional
```
