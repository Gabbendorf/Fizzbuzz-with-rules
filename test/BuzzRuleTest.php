<?php 

namespace unit\gabi\fizzbuzz;

use gabi\fizzbuzz\BuzzRule;
use PHPUnit\Framework\TestCase;

class BuzzRuleTest extends TestCase
{
  public function testTransformsMultiplesOf5InListIntoBuzz() {
    $buzzRule = new BuzzRule();

    $fiveNumbersList = range(1, 5);
    $listTransformed = $buzzRule->transform($fiveNumbersList);

    $this->assertSame(array("1", "2", "3", "4", "buzz"), $listTransformed);
  }
}
