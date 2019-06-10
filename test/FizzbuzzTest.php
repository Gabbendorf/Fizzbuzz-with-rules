<?php 

namespace unit\gabi\fizzbuzz;

use gabi\fizzbuzz\Fizzbuzz;
use gabi\fizzbuzz\ArgsParser;
use gabi\fizzbuzz\RuleFactory;
use gabi\fizzbuzz\CLPrinter;
use PHPUnit\Framework\TestCase;

class FizzbuzzTest extends TestCase
{
  public function testRunsWithValidArgumentsAndPrintTransformedNumbers() {
    $args = array("/file_path", "3");
    $argsParser = new ArgsParser($args);
    $ruleFactory = new RuleFactory();
    $clPrinter = new CLPrinter();
    $fizzbuzz = new Fizzbuzz($argsParser, $ruleFactory, $clPrinter);

    $this->expectOutputString("1, 2, fizz\n");

    $fizzbuzz->runWith($args);
  }

  public function testPrintsErrorMessageForNumberAsMandatoryArgumentNotPassed() {
    $args = array("/file_path");
    $argsParser = new ArgsParser($args);
    $ruleFactory = new RuleFactory();
    $clPrinter = new CLPrinter();
    $fizzbuzz = new Fizzbuzz($argsParser, $ruleFactory, $clPrinter);

    $this->expectOutputString("Something went wrong: You need to pass at least one argument (a number) to define the range of numbers to transform\n");

    $fizzbuzz->runWith($args);
  }

  public function testPrintsErrorMessageForNonNumericMandatoryArgumentPassed() {
    $args = array("/file_path", "word");
    $argsParser = new ArgsParser($args);
    $ruleFactory = new RuleFactory();
    $clPrinter = new CLPrinter();
    $fizzbuzz = new Fizzbuzz($argsParser, $ruleFactory, $clPrinter);

    $this->expectOutputString("Something went wrong: The first argument should be a number, words won't work\n");

    $fizzbuzz->runWith($args);
  }

  public function testPrintsErrorMessageForInvalidRuleArgument() {
    $args = array("/file_path", "2", "invalid rule argument");
    $argsParser = new ArgsParser($args);
    $ruleFactory = new RuleFactory();
    $clPrinter = new CLPrinter();
    $fizzbuzz = new Fizzbuzz($argsParser, $ruleFactory, $clPrinter);

    $this->expectOutputString("Something went wrong: You entered an invalid rule argument or an invalid rule combination. Please read the instructions to find out how to use the rules.\n");

    $fizzbuzz->runWith($args);
  }
}
