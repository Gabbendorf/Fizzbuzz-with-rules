<?php 

namespace gabi\fizzbuzz;

use gabi\fizzbuzz\RuleParameter;

class RuleFactory
{
  public function createFrom(string $ruleParameter)
  {
    switch($ruleParameter) {
    case RuleParameter::FIZZ:
      return new FizzRule();
    case RuleParameter::BUZZ:
      return new BuzzRule();
    case RuleParameter::FIZZBUZZ:
      return new FizzbuzzRule();
    case RuleParameter::FIZZ_BUZZ:
      return new CombinedRule(new FizzRule(), new BuzzRule());
    case RuleParameter::FIZZ_BUZZ_FIZZBUZZ:
      $fizzBuzzCombinedRule = new CombinedRule(new FizzRule(), new BuzzRule());
      return new CombinedRule(new FizzbuzzRule(), $fizzBuzzCombinedRule);
    default:
      return new FizzRule();
    }
  }
}
