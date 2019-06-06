<?php 

namespace gabi\fizzbuzz\exceptions;

class NonNumericRangeArgumentException extends \Exception {
  protected $message = "The first argument should be a number, words won't work";
}
