<?php 

namespace unit\gabi\fizzbuzz;

use gabi\fizzbuzz\ArgsParser;
use gabi\fizzbuzz\Args;
use gabi\fizzbuzz\RuleParameter;
use gabi\fizzbuzz\exceptions\RangeArgumentNotFoundException;
use gabi\fizzbuzz\exceptions\NonNumericRangeArgumentException;
use gabi\fizzbuzz\exceptions\InvalidRuleArgumentException;
use PHPUnit\Framework\TestCase;

class ArgsParserTest extends TestCase
{
  /**
   * @expectedException \gabi\fizzbuzz\exceptions\RangeArgumentNotFoundException
   */
  public function testRangeArgumentShouldBeThere() {
    $argsWithoutRangeArgument = array("file path");
    $argsParser = new ArgsParser($argsWithoutRangeArgument);

    $argsParser->parse();
  }

  /**
   * @expectedException \gabi\fizzbuzz\exceptions\NonNumericRangeArgumentException
   */
  public function testRangeArgumentIsANumber() {
    $argsWithNonNumericRangeArgument = array("file path", "no number");
    $argsParser = new ArgsParser($argsWithNonNumericRangeArgument);

    $argsParser->parse($argsWithNonNumericRangeArgument);
  }

  public function testCreatesRangeOfNumbersOutOfRangeArgument() {
    $argsWithNumericRangeArgument = array("file path", "2");
    $argsParser = new ArgsParser($argsWithNumericRangeArgument);

    $parsedArgs = $argsParser->parse($argsWithNumericRangeArgument);

    $this->assertSame(array("1", "2"), $parsedArgs->getNumericRange());
  }

  public function testCreatesDefaultRuleForNoRuleArgumentsPassed() {
    $argsWithNoRuleArgument = array("file path", "2");
    $argsParser = new ArgsParser($argsWithNoRuleArgument);

    $parsedArgs = $argsParser->parse($argsWithNoRuleArgument);

    $this->assertSame("default", $parsedArgs->getRule());
  }

  public function testCreatesRuleOutOfSingleRuleArgument() {
    $argsWithSingleRuleArgument = array("file path", "2", "fizz");
    $argsParser = new ArgsParser($argsWithSingleRuleArgument);

    $parsedArgs = $argsParser->parse($argsWithSingleRuleArgument);

    $this->assertSame(RuleParameter::FIZZ, $parsedArgs->getRule());
  }

  /**
   * @expectedException \gabi\fizzbuzz\exceptions\InvalidRuleArgumentException
   */
  public function testFirstRuleArgumentShouldBeFizzBuzzOrFizzbuzz() {
    $argsWithInvalidFirstRuleArgument = array("file path", "2", "invalid first rule argument");
    $argsParser = new ArgsParser($argsWithInvalidFirstRuleArgument);

    $argsParser->parse($argsWithInvalidFirstRuleArgument);
  }

  public function testCreatesFizzAndBuzzRuleOutOfFizzAndBuzzRuleArguments() {
    $argsWith2ValidRuleArguments = array("file path", "2", "fizz", "buzz");
    $argsParser = new ArgsParser($argsWith2ValidRuleArguments);

    $parsedArgs = $argsParser->parse($argsWith2ValidRuleArguments);

    $this->assertSame(RuleParameter::FIZZ_BUZZ, $parsedArgs->getRule());
  }

  /**
   * @expectedException \gabi\fizzbuzz\exceptions\InvalidRuleArgumentException
   */
  public function testFirstRuleArgumentShouldBeFizzAndSecondArgumentRuleShouldBeBuzz() {
    $invalidCombinationOf2RuleArguments = array("file path", "2", "fizz", "not buzz");
    $argsParser = new ArgsParser($invalidCombinationOf2RuleArguments);

    $argsParser->parse($invalidCombinationOf2RuleArguments);
  }

  public function testCreatesFizzBuzzAndFizzbuzzRuleOutOfFizzBuzzAndFizzbuzzRuleArguments() {
    $argsWith3ValidRuleArguments = array("file path", "2", "fizz", "buzz", "fizzbuzz");
    $argsParser = new ArgsParser($argsWith3ValidRuleArguments);

    $parsedArgs = $argsParser->parse($argsWith3ValidRuleArguments);

    $this->assertSame(RuleParameter::FIZZ_BUZZ_FIZZBUZZ, $parsedArgs->getRule());
  }

  /**
   * @expectedException \gabi\fizzbuzz\exceptions\InvalidRuleArgumentException
   */
  public function testThreeRuleArgumentsCombinationShouldBeFizzBuzzAndFizzbuzz() {
    $invalidCombinationOf3RuleArguments = array("file path", "2", "fizz", "not buzz", "not fizzbuzz");
    $argsParser = new ArgsParser($invalidCombinationOf3RuleArguments);

    $argsParser->parse($invalidCombinationOf3RuleArguments);
  }

  /**
   * @expectedException \gabi\fizzbuzz\exceptions\InvalidRuleArgumentException
   */
  public function testMoreThan3RuleArgumentsAreNotAllowed() {
    $tooManyRuleArguments = array("file path", "2", "fizz", "buzz", "fizzbuzz", "fizz again");
    $argsParser = new ArgsParser($tooManyRuleArguments);

    $argsParser->parse($tooManyRuleArguments);
  }
}
