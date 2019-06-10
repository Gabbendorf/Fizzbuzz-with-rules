<?php 

namespace gabi\fizzbuzz;

class FizzbuzzRule implements Rule
{
  public function transform(array $numbers)
  {
    return array_map(array($this, "fizzbuzz"), $numbers);
  }

  private function fizzbuzz(int $number)
  {
    if (($number % 3) == 0 && ($number % 5) == 0) {
      return "fizzbuzz";
    }
    return strval($number);
  }
}
