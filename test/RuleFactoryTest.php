<?php 

namespace unit\gabi\fizzbuzz;

use gabi\fizzbuzz\RuleFactory;
use gabi\fizzbuzz\FizzRule;
use gabi\fizzbuzz\BuzzRule;
use gabi\fizzbuzz\FizzbuzzRule;
use gabi\fizzbuzz\CombinedRule;
use gabi\fizzbuzz\RuleParameter;
use PHPUnit\Framework\TestCase;

class RuleFactoryTest extends TestCase
{

   function setUp() {
     $this->ruleFactory = new RuleFactory();
   }

  public function testCreatesFizzRuleFromRuleParameter() {
    $rule = $this->ruleFactory->createFrom(RuleParameter::FIZZ);

    $this->assertTrue($rule instanceof FizzRule);
  }

  public function testCreatesBuzzRuleFromBuzzParameter() {
    $rule = $this->ruleFactory->createFrom(RuleParameter::BUZZ);

    $this->assertTrue($rule instanceof BuzzRule);
  }

  public function testCreatesFizzbuzzRuleFromFizzbuzzParameter() {
    $rule = $this->ruleFactory->createFrom(RuleParameter::FIZZBUZZ);

    $this->assertTrue($rule instanceof FizzbuzzRule);
  }

  public function testCreatesFizzBuzzCombinedRuleFromFizzAndBuzzParameter() {
    $rule = $this->ruleFactory->createFrom(RuleParameter::FIZZ_BUZZ);

    $this->assertTrue($rule instanceof CombinedRule);
  }

  public function testCreatesFizzBuzzFizzbuzzCombinedRuleFromFizzAndBuzzAndFizzbuzzParameter() {
    $rule = $this->ruleFactory->createFrom(RuleParameter::FIZZ_BUZZ_FIZZBUZZ);

    $this->assertTrue($rule instanceof CombinedRule);
  }

  public function testCreatesFizzRuleByDefaultFromANonStandardParameter() {
    $rule = $this->ruleFactory->createFrom("default");

    $this->assertTrue($rule instanceof FizzRule);
  }
}
