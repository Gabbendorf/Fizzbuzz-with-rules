<?php 

namespace gabi\fizzbuzz\exceptions;

class InvalidRuleArgumentException extends \Exception {
  protected $message = "The Argument/s you entered as rule is/are not valid. Please read the instruction for more info about valid rules";
}
