<?php 

namespace gabi\fizzbuzz;

class RuleFactory {
  public function createFrom($ruleParameter)
  {
    switch($ruleParameter) {
    case "fizz":
      return new FizzRule();
    case "buzz":
      return new BuzzRule();
    case "fizzbuzz":
      return new FizzbuzzRule();
    case "fizzAndBuzz":
      return new FizzBuzzCombinedRule(new FizzRule(), new BuzzRule());
    case "fizzAndBuzzAndFizzbuzz":
      $fizzBuzzCombinedRule = new FizzBuzzCombinedRule(new FizzRule(), new BuzzRule());
      return new FizzBuzzFizzbuzzRule($fizzBuzzCombinedRule, new FizzbuzzRule());
    default:
      return new FizzRule();
    }
  }
}
