<?php 

namespace gabi\fizzbuzz;

class FizzRule implements Rule
{
  public function transform(array $numbers)
  {
    return array_map(array($this, "fizz"), $numbers);
  }

  private function fizz(int $number)
  {
    if (($number % 3) == 0) {
      return "fizz";
    }
    return strval($number);
  }
}
