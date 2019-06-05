<?php 

namespace gabi\fizzbuzz;

interface Rule
{
  public function transform(array $numbers);
}
