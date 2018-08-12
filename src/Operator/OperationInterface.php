<?php

namespace Maaaxim\Strategy\Operator;

interface OperationInterface
{
    public function calc(int $a, int $b): int;
}