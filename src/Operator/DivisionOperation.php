<?php

namespace Maaaxim\Strategy\Operator;

use DivisionByZeroError;

class DivisionOperation implements OperationInterface
{
    /**
     * @param int $a
     * @param int $b
     * @return int
     * @throws DivisionByZeroError
     */
    public function calc(int $a, int $b): int
    {
        if (!$b) {
            throw new DivisionByZeroError();
        }
        return floor($a / $b);
    }
}