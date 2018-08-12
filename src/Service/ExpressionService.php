<?php

namespace Maaaxim\Strategy\Service;

use Maaaxim\Strategy\WrongExpressionFormat;

class ExpressionService
{
    /**
     * @var string
     */
    protected static $pattern = '/(\d+)(?:\s*)([\+\-\*\/])(?:\s*)(\d+)/';

    /**
     * @var
     */
    protected $a;

    /**
     * @var
     */
    protected $b;

    /**
     * @var
     */
    protected $operator;

    /**
     * ExpressionService constructor.
     * @param $expression
     * @throws WrongExpressionFormat
     */
    public function __construct($expression)
    {
        $this->setFields($expression);
    }

    /**
     * @param $expression
     * @throws WrongExpressionFormat
     */
    protected function setFields($expression): void
    {
        $matches = [];
        if (preg_match(self::$pattern, $expression, $matches) !== false) {
            if (sizeof($matches) <= 0)
                throw new WrongExpressionFormat("Wrong expression format");
            $this->a = $matches[1];
            $this->operator = $matches[2];
            $this->b = $matches[3];
        } else {
            ;
            throw new WrongExpressionFormat("Something wrong with expression");
        }
    }

    /**
     * @return int
     */
    public function getA(): int
    {
        return $this->a;
    }

    /**
     * @return int
     */
    public function getB(): int
    {
        return $this->b;
    }

    /**
     * @return string
     */
    public function getOperator(): string
    {
        return $this->operator;
    }
}