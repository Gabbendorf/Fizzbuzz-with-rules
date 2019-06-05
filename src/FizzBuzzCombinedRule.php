<?php 

namespace gabi\fizzbuzz;

use gabi\fizzbuzz\FizzRule;
use gabi\fizzbuzz\BuzzRule;

class FizzBuzzCombinedRule implements Rule {
  private $fizzRule;
  private $buzzRule;

  function __construct($fizzRule, $buzzRule)
  {
    $this->fizzRule = $fizzRule;
    $this->buzzRule = $buzzRule;
  }

  public function transform(array $numbers)
  {
    $buzzedNumbers = $this->buzzRule->transform($numbers);
    $fizzedNumbers = $this->fizzRule->transform($numbers);
    return $this->combineFizzedAndBuzzedNumbers($fizzedNumbers, $buzzedNumbers);
  }

  private function combineFizzedAndBuzzedNumbers(array $fizzedNumbers, array $buzzedNumbers)
  {
    $fizzedBuzzedNumbers = array();
    foreach ($fizzedNumbers as $index => $fizzedNumber) {
      $buzzedNumber = $buzzedNumbers[$index];
      if ($fizzedNumber != $buzzedNumber) {
	array_push($fizzedBuzzedNumbers, $this->fizzOrBuzz($fizzedNumber, $buzzedNumber));
      } else {
	array_push($fizzedBuzzedNumbers, $fizzedNumber);
      }
    }
    return $fizzedBuzzedNumbers;
  }

  private function fizzOrBuzz(string $fizzedNumber, string $buzzedNumber)
  {
    if ($fizzedNumber != "fizz") {
      return $buzzedNumber;
    } else {
      return $fizzedNumber;
    }
  }
}
