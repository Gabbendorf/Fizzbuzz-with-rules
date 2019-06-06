<?php 

namespace unit\gabi\fizzbuzz;

use gabi\fizzbuzz\RuleFactory;
use gabi\fizzbuzz\FizzRule;
use gabi\fizzbuzz\BuzzRule;
use gabi\fizzbuzz\FizzbuzzRule;
use gabi\fizzbuzz\FizzBuzzCombinedRule;
use gabi\fizzbuzz\FizzBuzzFizzbuzzRule;
use gabi\fizzbuzz\RuleParameter;
use PHPUnit\Framework\TestCase;

class RuleFactoryTest extends TestCase {

   function setUp() {
     $this->ruleFactory = new RuleFactory();
   }

  public function testCreatesFizzRuleFromRuleParameter() {
    $rule = $this->ruleFactory->createFrom("fizz");

    $this->assertTrue($rule instanceof FizzRule);
  }

  public function testCreatesBuzzRuleFromBuzzParameter() {
    $rule = $this->ruleFactory->createFrom("buzz");

    $this->assertTrue($rule instanceof BuzzRule);
  }

  public function testCreatesFizzbuzzRuleFromFizzbuzzParameter() {
    $rule = $this->ruleFactory->createFrom("fizzbuzz");

    $this->assertTrue($rule instanceof FizzbuzzRule);
  }

  public function testCreatesFizzBuzzCombinedRuleFromFizzAndBuzzParameter() {
    $rule = $this->ruleFactory->createFrom("fizzAndBuzz");

    $this->assertTrue($rule instanceof FizzBuzzCombinedRule);
  }

  public function testCreatesFizzBuzzFizzbuzzRuleFromFizzAndBuzzAndFizzbuzzParameter() {
    $rule = $this->ruleFactory->createFrom("fizzAndBuzzAndFizzbuzz");

    $this->assertTrue($rule instanceof FizzBuzzFizzbuzzRule);
  }

  public function testCreatesFizzRuleByDefaultFromANonStandardParameter() {
    $rule = $this->ruleFactory->createFrom("");

    $this->assertTrue($rule instanceof FizzRule);
  }
}
