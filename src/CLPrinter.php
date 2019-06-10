<?php 

namespace gabi\fizzbuzz;

class CLPrinter
{
    public function printTransformedNumbers(array $numbersToPrint)
  {
    $currentNumberPosition = 0;
    while ($currentNumberPosition < (sizeof($numbersToPrint) -1)) {
      echo $numbersToPrint[$currentNumberPosition] . ", ";
      $currentNumberPosition += 1;
    }
    echo $numbersToPrint[sizeof($numbersToPrint) -1] . "\n";
  }
}
