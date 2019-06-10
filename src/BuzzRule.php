<?php 

namespace gabi\fizzbuzz;

class BuzzRule implements Rule
{
  public function transform(array $numbers)
  {
    return array_map(array($this, "buzz"), $numbers);
  }

  private function buzz(int $number)
  {
    if (($number % 5) == 0) {
      return "buzz";
    }
    return strval($number);
  }
}
