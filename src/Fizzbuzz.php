<?php 

namespace gabi\fizzbuzz;

use gabi\fizzbuzz\ArgsParser;
use gabi\fizzbuzz\RuleFactory;
use gabi\fizzbuzz\CLPrinter;
use gabi\fizzbuzz\exceptions\RangeArgumentNotFoundException;
use gabi\fizzbuzz\exceptions\InvalidRuleArgumentException;
use gabi\fizzbuzz\exceptions\NonNumericRangeArgumentException;

class Fizzbuzz
{
  private $argsParser;
  private $ruleFactory;
  private $clPrinter;

  function __construct(ArgsParser $argsParser, RuleFactory $ruleFactory, CLPrinter $clPrinter)
  {
    $this->argsParser = $argsParser;
    $this->ruleFactory = $ruleFactory;
    $this->clPrinter = $clPrinter;
  }

  public function runWith(array $parameters)
  {
    try {
      $parsedArgs = $this->argsParser->parse($parameters);
      $rule = $this->ruleFactory->createFrom($parsedArgs->getRule());
      $numbersToTransform = $parsedArgs->getNumericRange();
      $transformedNumbers = $rule->transform($numbersToTransform);

      $this->clPrinter->printTransformedNumbers($transformedNumbers);

    } catch (RangeArgumentNotFoundException |
      InvalidRuleArgumentException |
      NonNumericRangeArgumentException $e
    ) {
      echo "Something went wrong: " . $e->getMessage() . "\n";
    }
  }
 }
