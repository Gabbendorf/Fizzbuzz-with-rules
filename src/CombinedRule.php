<?php 

namespace gabi\fizzbuzz;

class CombinedRule implements Rule
{
  private $firstRule;
  private $secondRule;

  function __construct(Rule $firstRule, Rule $secondRule)
  {
    $this->firstRule = $firstRule;
    $this->secondRule = $secondRule;
  }

  public function transform(array $numbers)
  {
    $firstRuleTransformedNumbers = $this->firstRule->transform($numbers);
    $secondRuleTransformedNumbers = $this->secondRule->transform($numbers);
    return $this->combineTransformedNumbers($firstRuleTransformedNumbers, $secondRuleTransformedNumbers);
  }

  private function combineTransformedNumbers(array $firstRuleTransformedNumbers, array $secondRuleTransformedNumbers)
  {
    $combinedTransformedNumbers = array();
    foreach ($firstRuleTransformedNumbers as $index => $firstRuleTransformedNumber) {
      $secondRuleTransformedNumber = $secondRuleTransformedNumbers[$index];
      $combinedTransformedNumbers[$index] = $this->firstOrSecondTransformedNumber($firstRuleTransformedNumber, $secondRuleTransformedNumber);
    }
    return $combinedTransformedNumbers;
  }

  private function firstOrSecondTransformedNumber(string $firstRuleTransformedNumber, string $secondRuleTransformedNumber)
  {
    return !is_numeric($firstRuleTransformedNumber) ? $firstRuleTransformedNumber : $secondRuleTransformedNumber;
  }
}
