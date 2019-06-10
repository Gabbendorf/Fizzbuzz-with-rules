<?php

include "vendor/autoload.php";

use gabi\fizzbuzz\ArgsParser;
use gabi\fizzbuzz\RuleFactory;
use gabi\fizzbuzz\CLPrinter;
use gabi\fizzbuzz\Fizzbuzz;

$argsParser = new ArgsParser($argv);
$ruleFactory = new RuleFactory();
$clPrinter = new CLPrinter();

$fizzbuzz = new Fizzbuzz($argsParser, $ruleFactory, $clPrinter);

$fizzbuzz->runWith($argv);
