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

   function setUp() {
     $this->argsParser = new ArgsParser();
   }

  /**
   * @expectedException \gabi\fizzbuzz\exceptions\RangeArgumentNotFoundException
   */
  public function testRangeArgumentShouldBeThere() {
    $argsWithoutRangeArgument = array("file path");

    $this->argsParser->parse($argsWithoutRangeArgument);
  }

  /**
   * @expectedException \gabi\fizzbuzz\exceptions\NonNumericRangeArgumentException
   */
  public function testRangeArgumentIsANumber() {
    $argsWithNonNumericRangeArgument = array("file path", "no number");

    $this->argsParser->parse($argsWithNonNumericRangeArgument);
  }

  public function testCreatesRangeOfNumbersOutOfRangeArgument() {
    $argsWithNumericRangeArgument = array("file path", "2");

    $parsedArgs = $this->argsParser->parse($argsWithNumericRangeArgument);

    $this->assertSame(array("1", "2"), $parsedArgs->getNumericRange());
  }

  public function testCreatesDefaultRuleForNoRuleArgumentsPassed() {
    $argsWithNoRuleArgument = array("file path", "2");

    $parsedArgs = $this->argsParser->parse($argsWithNoRuleArgument);

    $this->assertSame("default", $parsedArgs->getRule());
  }

  public function testCreatesRuleOutOfSingleRuleArgument() {
    $argsWithSingleRuleArgument = array("file path", "2", "fizz");

    $parsedArgs = $this->argsParser->parse($argsWithSingleRuleArgument);

    $this->assertSame(RuleParameter::FIZZ, $parsedArgs->getRule());
  }

  /**
   * @expectedException \gabi\fizzbuzz\exceptions\InvalidRuleArgumentException
   */
  public function testFirstRuleArgumentShouldBeFizzBuzzOrFizzbuzz() {
    $argsWithInvalidFirstRuleArgument = array("file path", "2", "invalid first rule argument");

    $this->argsParser->parse($argsWithInvalidFirstRuleArgument);
  }

  public function testCreatesFizzAndBuzzRuleOutOfFizzAndBuzzRuleArguments() {
    $argsWith2ValidRuleArguments = array("file path", "2", "fizz", "buzz");

    $parsedArgs = $this->argsParser->parse($argsWith2ValidRuleArguments);

    $this->assertSame(RuleParameter::FIZZ_BUZZ, $parsedArgs->getRule());
  }

  /**
   * @expectedException \gabi\fizzbuzz\exceptions\InvalidRuleArgumentException
   */
  public function testFirstRuleArgumentShouldBeFizzAndSecondArgumentRuleShouldBeBuzz() {
    $invalidCombinationOf2RuleArguments = array("file path", "2", "fizz", "not buzz");

    $this->argsParser->parse($invalidCombinationOf2RuleArguments);
  }

  public function testCreatesFizzBuzzAndFizzbuzzRuleOutOfFizzBuzzAndFizzbuzzRuleArguments() {
    $argsWith3ValidRuleArguments = array("file path", "2", "fizz", "buzz", "fizzbuzz");

    $parsedArgs = $this->argsParser->parse($argsWith3ValidRuleArguments);

    $this->assertSame(RuleParameter::FIZZ_BUZZ_FIZZBUZZ, $parsedArgs->getRule());
  }

  /**
   * @expectedException \gabi\fizzbuzz\exceptions\InvalidRuleArgumentException
   */
  public function testThreeRuleArgumentsCombinationShouldBeFizzBuzzAndFizzbuzz() {
    $invalidCombinationOf3RuleArguments = array("file path", "2", "fizz", "not buzz", "not fizzbuzz");

    $this->argsParser->parse($invalidCombinationOf3RuleArguments);
  }

  /**
   * @expectedException \gabi\fizzbuzz\exceptions\InvalidRuleArgumentException
   */
  public function testMoreThan3RuleArgumentsAreNotAllowed() {
    $tooManyRuleArguments = array("file path", "2", "fizz", "buzz", "fizzbuzz", "fizz again");

    $this->argsParser->parse($tooManyRuleArguments);
  }
}
