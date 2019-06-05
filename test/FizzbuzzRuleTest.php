<?php 

namespace unit\gabi\fizzbuzz;

use gabi\fizzbuzz\FizzbuzzRule;
use PHPUnit\Framework\TestCase;

class FizzbuzzRuleTest extends TestCase {
  public function testTransformsMultiplesOf5AndOf3InListIntoFizzbuzz() {
    $fizzbuzzRule = new FizzbuzzRule();

    $fifteenNumbersList = range(1, 15);
    $listTransformed = $fizzbuzzRule->transform($fifteenNumbersList);

    $expected = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "fizzbuzz");
    $this->assertSame($expected, $listTransformed);
  }
}
