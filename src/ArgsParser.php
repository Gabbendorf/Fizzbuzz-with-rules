<?php 

namespace gabi\fizzbuzz;

use gabi\fizzbuzz\exceptions\RangeArgumentNotFoundException;
use gabi\fizzbuzz\exceptions\NonNumericRangeArgumentException;
use gabi\fizzbuzz\exceptions\InvalidRuleArgumentException;
use gabi\fizzbuzz\RuleParameter;

class ArgsParser
{
  const FIZZ_BUZZ_AND_FIZZBUZZ = array("fizz", "buzz", "fizzbuzz");
  private $args;

  function __construct(array $args)
  {
    $this->args = $this->removeFilePathFromArgs($args);
  }

  public function parse()
  {
    if (empty($this->args)) {
      throw new RangeArgumentNotFoundException();
    }

    $rangeArgument = $this->args[0];
    if (!is_numeric($rangeArgument)) {
      throw new NonNumericRangeArgumentException();
    }

    if (sizeof($this->args) > 4) {
      throw new InvalidRuleArgumentException();
    }

    $ruleArguments = array_slice($this->args, 1);
    return new ParsedArgs(
      $this->parseRangeArgument($rangeArgument),
      $this->parseRuleArguments($ruleArguments)
    );
  }

  private function parseRangeArgument(string $rangeArgument)
  {
    $range = range("1", $rangeArgument);
    return array_map('strval', $range);
  }

  private function parseRuleArguments(array $ruleArguments)
  {
    $argumentsCount = sizeof($ruleArguments);
    if ($argumentsCount == 0) {
      return "default";
    }
    $firstRuleArgument = $ruleArguments[0];
    if (($argumentsCount == 1) && $this->valid($firstRuleArgument)) {
      return $firstRuleArgument;
    }
    if (($argumentsCount == 2) && ($ruleArguments[0] == RuleParameter::FIZZ) && ($ruleArguments[1] == RuleParameter::BUZZ)) {
      return RuleParameter::FIZZ_BUZZ;
    }
    if (($argumentsCount == 3) && ($ruleArguments == $this::FIZZ_BUZZ_AND_FIZZBUZZ)) {
      return RuleParameter::FIZZ_BUZZ_FIZZBUZZ;
    }
    throw new InvalidRuleArgumentException();
  }

  private function removeFilePathFromArgs(array $args)
  {
    return array_slice($args, 1);
  }

  private function valid(string $firstRuleArgument)
  {
    return in_array($firstRuleArgument, $this::FIZZ_BUZZ_AND_FIZZBUZZ);
  }
}
