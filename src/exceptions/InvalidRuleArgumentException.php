<?php 

namespace gabi\fizzbuzz\exceptions;

class InvalidRuleArgumentException extends \Exception
{
  protected $message = "You entered an invalid rule argument or an invalid rule combination. Please read the instructions to find out how to use the rules.";
}
