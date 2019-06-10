<?php 

namespace gabi\fizzbuzz;

class RuleFactory
{
  public function createFrom(string $ruleParameter)
  {
    switch($ruleParameter) {
    case "fizz":
      return new FizzRule();
    case "buzz":
      return new BuzzRule();
    case "fizzbuzz":
      return new FizzbuzzRule();
    case "fizzAndBuzz":
      return new CombinedRule(new FizzRule(), new BuzzRule());
    case "fizzAndBuzzAndFizzbuzz":
      $fizzBuzzCombinedRule = new CombinedRule(new FizzRule(), new BuzzRule());
      return new CombinedRule(new FizzbuzzRule(), $fizzBuzzCombinedRule);
    default:
      return new FizzRule();
    }
  }
}
