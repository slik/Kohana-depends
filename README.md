Usage:
======

* Copy config/depends.php to application/config/depends.php
* Edit application/config/depends.php
* And then in module's init.php:

    Depends::on('module-name'); // will autoload "module-name" module, if that module is not loaded with Kohana::modules() before