<?php 

namespace gabi\fizzbuzz;

class ParsedArgs {
  private $numericRange;
  private $rule;

  function __construct(array $numericRange, $rule)
  {
    $this->numericRange = $numericRange;
    $this->rule= $rule;
  }

  public function getNumericRange()
  {
    return $this->numericRange;
  }

  public function getRule()
  {
    return $this->rule;
  }
}
