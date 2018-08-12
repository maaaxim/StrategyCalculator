<?php

namespace Maaaxim\Strategy\Operator;

class SubtractionOperation implements OperationInterface
{
    public function calc(int $a, int $b): int
    {
        return $a - $b;
    }
}