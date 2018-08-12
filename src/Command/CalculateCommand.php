<?php

namespace Maaaxim\Strategy\Command;

use Maaaxim\Strategy\Calculator;
use Maaaxim\Strategy\Service\ExpressionService;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class CalculateCommand
 * @package Maaaxim\Strategy\Command
 */
class CalculateCommand extends Command
{
    /**
     * @var
     */
    protected $calculator;

    /**
     * Conf
     */
    public function configure()
    {
        $this
            ->setName("calculate")
            ->setDescription("This command calculates two numbers for you")
            ->addArgument('expression', InputArgument::REQUIRED, 'Example: 1 + 2');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @throws \Maaaxim\Strategy\UnknownOperationException
     * @throws \Maaaxim\Strategy\WrongExpressionFormat
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $expression = new ExpressionService($input->getArgument("expression"));
        $this->calculator = new Calculator($expression);
        $output->writeln($this->calculator->calc());
    }
}