<?php 

namespace unit\gabi\fizzbuzz;

use gabi\fizzbuzz\CombinedRule;
use gabi\fizzbuzz\FizzBuzzFizzbuzzRule;
use gabi\fizzbuzz\FizzBuzzCombinedRule;
use gabi\fizzbuzz\FizzbuzzRule;
use gabi\fizzbuzz\FizzRule;
use gabi\fizzbuzz\BuzzRule;
use PHPUnit\Framework\TestCase;

class CombinedRuleTest extends TestCase {
  public function testTransformsNumbersAccordingToTwoRulesCombined() {
    $fizzBuzzCombinedRule = new CombinedRule(new FizzRule(), new BuzzRule());

    $fiveNumbersList = range(1, 5);
    $listTransformed = $fizzBuzzCombinedRule->transform($fiveNumbersList);

    $this->assertSame(array("1", "2", "fizz", "4", "buzz"), $listTransformed);
  }

  public function testFirstRuleWinsOverSecondRuleWhenBothTransformSameNumber() {
    $firstRule = new FizzbuzzRule();
    $secondRule = new CombinedRule(new FizzRule(), new BuzzRule());
    $fizzBuzzFizzbuzzCombinedRule = new CombinedRule($firstRule, $secondRule);

    $fifteenNumbersList = range(1, 15);
    $listTransformed = $fizzBuzzFizzbuzzCombinedRule->transform($fifteenNumbersList);

    $fifteenPotentiallyFizzAndFizzbuzz = $listTransformed[14];
    $this->assertSame("fizzbuzz", $fifteenPotentiallyFizzAndFizzbuzz);
  }
}
