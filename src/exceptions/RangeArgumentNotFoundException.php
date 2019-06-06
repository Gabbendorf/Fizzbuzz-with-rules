<?php 

namespace gabi\fizzbuzz\exceptions;

class RangeArgumentNotFoundException extends \Exception {
  protected $message = "You need to pass at least one argument as a number to define the range of numbers to transform";
}
