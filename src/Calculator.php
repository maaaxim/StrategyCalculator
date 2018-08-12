<?php

namespace Maaaxim\Strategy;

use ArgumentCountError;
use Maaaxim\Strategy\Operator\AdditionOperation;
use Maaaxim\Strategy\Operator\DivisionOperation;
use Maaaxim\Strategy\Operator\MultiplicationOperation;
use Maaaxim\Strategy\Operator\OperationInterface;
use Maaaxim\Strategy\Operator\SubtractionOperation;
use Maaaxim\Strategy\Service\ExpressionService;

class Calculator
{
    /**
     * @var OperationInterface
     */
    private $strategy;

    /**
     * @var ExpressionService
     */
    private $expression;

    /**
     * Calculator constructor.
     * @param $expression
     * @throws UnknownOperationException
     */
    public function __construct(ExpressionService $expression)
    {
        $this->expression = $expression;
        $this->strategy = $this->getStrategy($this->expression->getOperator());
    }

    /**
     * @param $operation
     * @return OperationInterface
     * @throws UnknownOperationException
     */
    private function getStrategy($operation): OperationInterface
    {
        switch ($operation) {
            case '+':
                return new AdditionOperation();
            case '-':
                return new SubtractionOperation();
            case '*':
                return new MultiplicationOperation();
            case '/':
                return new DivisionOperation();
            default :
                throw new UnknownOperationException('Unknown operation');
        }
    }

    /**
     * @return string
     */
    public function calc(): string
    {
        $result = $this->strategy->calc(
            $this->expression->getA(),
            $this->expression->getB()
        );
        return $result;
    }
}