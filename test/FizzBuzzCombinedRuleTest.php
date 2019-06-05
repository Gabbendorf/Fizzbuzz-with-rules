<?php 

namespace unit\gabi\fizzbuzz;

use gabi\fizzbuzz\FizzBuzzCombinedRule;
use gabi\fizzbuzz\FizzRule;
use gabi\fizzbuzz\BuzzRule;
use PHPUnit\Framework\TestCase;

class FizzBuzzCombinedRuleTest extends TestCase {
  public function testTransformsMultiplesOf5IntoBuzzAndMultiplesOf3IntoFizz() {
    $fizzBuzzCombinedRule = new FizzBuzzCombinedRule(new FizzRule(), new BuzzRule());

    $fiveNumbersList = range(1, 5);
    $listTransformed = $fizzBuzzCombinedRule->transform($fiveNumbersList);

    $this->assertSame(array("1", "2", "fizz", "4", "buzz"), $listTransformed);
  }

  public function testMultiplesOfBoth3And5BecomeFizz() {
    $fizzBuzzCombinedRule = new FizzBuzzCombinedRule(new FizzRule(), new BuzzRule());

    $fifteenNumbersList = range(1, 15);
    $listTransformed = $fizzBuzzCombinedRule->transform($fifteenNumbersList);

    $numberMultipleOf3And5 = $listTransformed[14];
    $this->assertSame("fizz", $numberMultipleOf3And5);
  }
}
