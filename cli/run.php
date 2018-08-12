<?php

declare(strict_types=1);

namespace Maaaxim;

require_once "./vendor/autoload.php";

use Maaaxim\Strategy\Command\CalculateCommand;
use Symfony\Component\Console\Application;

$app = new Application('Hi. This is console calculator.', 'v1.0.0');
$app->add(new CalculateCommand());
$app->run();