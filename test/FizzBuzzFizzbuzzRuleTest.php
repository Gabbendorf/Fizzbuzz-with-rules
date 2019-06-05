<?php 

namespace unit\gabi\fizzbuzz;

use gabi\fizzbuzz\FizzBuzzFizzbuzzRule;
use gabi\fizzbuzz\FizzBuzzCombinedRule;
use gabi\fizzbuzz\FizzbuzzRule;
use gabi\fizzbuzz\FizzRule;
use gabi\fizzbuzz\BuzzRule;
use PHPUnit\Framework\TestCase;

class FizzBuzzFizzbuzzRuleTest extends TestCase {
  public function testTransformsMultiplesOf5IntoBuzzMultiplesOf3IntoFizzAndMultiplesOfBothIntoFizzbuzz() {
    $fizzBuzzCombinedRule = new FizzBuzzCombinedRule(new FizzRule(), new BuzzRule());
    $fizzBuzzFizzbuzzRule = new FizzBuzzFizzbuzzRule($fizzBuzzCombinedRule, new FizzbuzzRule());

    $fifteenNumbersList = range(1, 15);
    $listTransformed = $fizzBuzzFizzbuzzRule->transform($fifteenNumbersList);

    $expected = array("1", "2", "fizz", "4", "buzz", "fizz", "7", "8", "fizz", "buzz", "11", "fizz", "13", "14", "fizzbuzz");
    $this->assertSame($expected, $listTransformed);
  }
}
