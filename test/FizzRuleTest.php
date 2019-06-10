<?php 

namespace unit\gabi\fizzbuzz;

use gabi\fizzbuzz\FizzRule;
use PHPUnit\Framework\TestCase;

class FizzRuleTest extends TestCase
{
  public function testTransformsMultiplesOf3InListIntoFizz() {
    $fizzRule = new FizzRule();

    $fourNumbersList = range(1, 4);
    $listTransformed = $fizzRule->transform($fourNumbersList);

    $this->assertSame(array("1", "2", "fizz", "4"), $listTransformed);
  }
}
