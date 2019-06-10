# Fizzbuzz Command Line Application
A command line application that outputs either numbers or fizz, buzz, fizzbuzz given certain inputs.

Fizzbuzz should count up to the number provided by the first parameter and depending on the set of rules provided in the second parameter, it replaces some of the numbers with words.

The behavior of the rules fizz, buzz, and fizzbuzz are:

* If the number is a multiple of 3, output fizz instead of the number
* If the number is a multiple of 5, output buzz instead of the number
* If the number is a multiple of 3 and 5, output fizzbuzz instead of the number

## Prerequisites
* PHP from version 7
* Composer

Run `composer install` to install the dependencies.

## How to run the application from project root
`php src/Main.php <number argument> <optional rule argument/s>`

### Rules
* If no rule parameter is provided, the application will default the rule to Fizz.

**no rule argument** | **output**
-------------------- | ----------
php src/Main.php 3 | "1, 2, fizz" 

* If a rule parameter is provided, the application will apply the correct correspondent rule. A rule parameter can be made of a single value or of a set of rules.

Below are the rules accepted by the application with correspondent output:

**rule** | **output**
-------- | ----------
 php src/Main.php 15 **fizz** | "1, 2, fizz, 4, 5, fizz, 7, 8, fizz, 10, 11, fizz, 13, 14, fizz" 
 php src/Main.php 15 **buzz** | "1, 2, 3, 4, buzz, 6, 7, 8, 9, buzz, 11, 12, 13, 14, buzz" 
 php src/Main.php 15 **fizz buzz** | "1, 2, fizz, 4, buzz, fizz, 7, 8, fizz, buzz, 11, fizz, 13, 14, fizz" 
 php src/Main.php 15 **fizz buzz fizzbuzz** | "1, 2, fizz, 4, buzz, fizz, 7, 8, fizz, buzz, 11, fizz, 13, 14, fizzbuzz" 

## How to run the tests from project root
To run all tests:

`bin/phpunit --testdox test/`

To run the tests of a single file:

`bin/phpunit --testdox test/FileTestName`
