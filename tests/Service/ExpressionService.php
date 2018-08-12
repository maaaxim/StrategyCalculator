<?php

use Maaaxim\Strategy\Exception\WrongExpressionFormat;
use Maaaxim\Strategy\Service\ExpressionService as Expression;

/**
 * Created by PhpStorm.
 * User: maxim
 * Date: 8/12/18
 * Time: 3:39 PM
 */

class ExpressionService extends \PHPUnit\Framework\TestCase
{
    /**
     * @throws WrongExpressionFormat
     */
    public function testGoodExpressions()
    {
        $expression = new Expression("100 + 200");
        $this->assertEquals($expression->getA(), 100);
        $this->assertEquals($expression->getB(), 200);
        $this->assertEquals($expression->getOperator(), "+");
    }

    /**
     * @throws WrongExpressionFormat
     */
    public function testBadExpression()
    {
        $this->expectException(WrongExpressionFormat::class);
        $expression = new Expression("100 + ");
        $this->assertEquals($expression->getA(), 100);
        $this->assertEquals($expression->getB(), 200);
        $this->assertEquals($expression->getOperator(), "+");
    }
}