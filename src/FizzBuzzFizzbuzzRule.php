<?php 

namespace gabi\fizzbuzz;

use gabi\fizzbuzz\FizzBuzzCombinedRule;
use gabi\fizzbuzz\FizzbuzzRule;

class FizzBuzzFizzbuzzRule implements Rule {
  private $fizzBuzzCombinedRule;
  private $fizzbuzzRule;

  function __construct($fizzBuzzCombinedRule, $fizzbuzzRule)
  {
    $this->fizzBuzzCombinedRule = $fizzBuzzCombinedRule;
    $this->fizzbuzzRule = $fizzbuzzRule;
  }

  public function transform(array $numbers)
  {
    $fizzedAndBuzzedNumbers = $this->fizzBuzzCombinedRule->transform($numbers);
    $fizzedbuzzedNumbers = $this->fizzbuzzRule->transform($numbers);
    return $this->combineTransformedNumbers($fizzedAndBuzzedNumbers, $fizzedbuzzedNumbers);
  }

  private function combineTransformedNumbers(array $fizzedAndBuzzedNumbers, array $fizzedbuzzedNumbers)
  {
    foreach ($fizzedbuzzedNumbers as $index => $fizzedbuzzedNumber) {
      if ($fizzedbuzzedNumber == "fizzbuzz") {
	$fizzedAndBuzzedNumbers[$index] = $fizzedbuzzedNumber;
      }
    }
    return $fizzedAndBuzzedNumbers;
  }
}
