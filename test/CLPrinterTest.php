<?php 

namespace unit\gabi\fizzbuzz;

use gabi\fizzbuzz\CLPrinter;
use PHPUnit\Framework\TestCase;

class CLPrinterTest extends TestCase
{
  public function testPrintsNumbers() {
    $expected = "1, 2, 3, 4, buzz\n";
    $this->expectOutputString($expected);

    $clPrinter = new CLPrinter();

    $numbersToPrint = array("1", "2", "3", "4", "buzz");
    $clPrinter->printTransformedNumbers($numbersToPrint);
  }
}
