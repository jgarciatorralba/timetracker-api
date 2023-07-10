<?php

use TimeTracker\Kernel as AppKernel;
use Symfony\Component\ErrorHandler\Debug;

require dirname(__DIR__) . '/config/bootstrap.php';

if ($_SERVER['APP_DEBUG']) {
    umask(0000);
    Debug::enable();
}

return function (array $context) {
    return new AppKernel($context['APP_ENV'], (bool) $context['APP_DEBUG']);
};
