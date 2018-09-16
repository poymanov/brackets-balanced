<?php

namespace BracketsBalanced;

use InvalidArgumentException;

class BracketsBalanced
{
  public $string;

  public function __construct($value)
  {
    $this->string = $value;
  }

  public function verifyStringSymbols()
  {
    if (empty($this->string)) {
      throw new InvalidArgumentException('Empty string');
    }

    $pattern = '#[\w\[\]]+#m';

    if (boolval(preg_match($pattern, $this->string)) !== False) {
      throw new InvalidArgumentException('Incorrect symbols');
    }

    return true;
  }

  public function isBalanced()
  {
    try {
      $this->verifyStringSymbols();
    } catch (InvalidArgumentException $e) {
      return false;
    }

    $stack = new Stack();

    for ($i=0; $i < strlen($this->string); $i++) {
      $currentSymbol = $this->string[$i];

      if ($currentSymbol == '(') {
        $stack->push($currentSymbol);
      } else if ($currentSymbol == ')') {
        if ($stack->pop() == null) {
          return false;
        }
      }
    }

    return $stack->size() == 0;

  }
}
